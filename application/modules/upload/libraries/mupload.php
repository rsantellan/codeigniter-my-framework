<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/*
 */

/**
 * Description of mUpload
 *
 * @author Rodrigo Santellan
 */
class mupload {
  
  private $documenttypes = array('pdf', 'doc', 'docx', 'xls', 'ppt', 'xlsx', 'pptx', 'ods', 'csv', 'odt');  
 
  public function checkDirectory($path){
        log_message("debug", $path);
        if (is_dir($path))
        {
            $last = $path[strlen($path)-1];
            if($last == DIRECTORY_SEPARATOR)
            {
                return $path;
            }
			return $path.DIRECTORY_SEPARATOR;
		}
		$folders = $pieces = explode(DIRECTORY_SEPARATOR, $path);
        
        $list_of_paths = array();
        array_push($list_of_paths, $path);
        unset($folders[count($folders) - 1]);
        $finish = false;
        while(count($folders) > 0 && !$finish)
        {
          $auxPath = implode(DIRECTORY_SEPARATOR, $folders);
          log_message("debug", "Directorio a chequear que exista: ". $auxPath);
          if(is_dir($auxPath))
          {
            $finish = true;
          }
          else
          {
            array_push($list_of_paths, $auxPath);
          }
          unset($folders[count($folders) - 1]);
        }
        while(count($list_of_paths) > 0 )
        {
          $newDir = array_pop($list_of_paths);
          log_message("debug", "Directorio a crear: ". $newDir);
          if(!mkdir($newDir)) {
            log_message("error", $newDir);
            throw new Exception('Unable to create format directory');
          }
          chmod($newDir,0775);
        }
        return $path.DIRECTORY_SEPARATOR;    
    }
  
    
    public function returnCacheImage($path, $width, $height, $type = 1)
    {
      $cachePath = $this->returnImageCachePath($path, $width, $height, $type);
      //var_dump($cachePath);
      if(!file_exists($cachePath))
      {
        $this->createImageCache($path, $width, $height, $type);
      }
      return $cachePath;
    }
    
    public function returnWebCacheImage($basepath, $path, $width, $height, $type = 1)
    {
      log_message("debug", filter_var($path, FILTER_VALIDATE_URL));
        //var_dump(filter_var($path, FILTER_VALIDATE_URL));
        
      if (filter_var($path, FILTER_VALIDATE_URL) !== false)
      {
          return $path;
      }
      $cachePath = $this->returnCacheImage($path, $width, $height, $type);
      $mPath = str_replace(FCPATH, "", $cachePath);
      log_message("debug", $mPath);
      return $basepath.$mPath;
      
    }
    public function returnImageCachePath($path, $width, $height, $type = 1)
    {
      //log_message("INFO", " El supuesto path es: ". $path);
      $path = $this->retrieveDocumentsFilesPath($path);
      $aux = $width."x".$height."_".$type;
      $file_path = $this->returnBasicCachePath($path);// $this->get_path_of_file($mPath);
      $file_name = $this->get_file_of_path($path);
      $mPath = $file_path.DIRECTORY_SEPARATOR.$aux.DIRECTORY_SEPARATOR.$file_name;
      log_message("debug", $mPath);
      
      //log_message("INFO", " El path final es: ". $mPath);
      return $mPath;
    }
    
    public function returnBasicCachePath($path)
    {
      $cacheDir = FCPATH. 'assets'.DIRECTORY_SEPARATOR.'cache'.DIRECTORY_SEPARATOR;
      $mPath = str_replace(FCPATH, $cacheDir, $path);
      $file_path = $this->get_path_of_file($mPath);
      return $file_path;
    }
    
    public function createImageCache($path, $width, $height, $type = 1)
    {
      $path = $this->retrieveDocumentsFilesPath($path);
      
      $mPath = $this->returnImageCachePath($path, $width, $height, $type);
      $cachePath = $this->get_path_of_file($mPath);
      //echo ' <br/> cache path '.$cachePath;
      
      
      $this->checkDirectory($cachePath);
      //log_message("INFO", "Los parametros que estoy pasando son, width: ". $width. " | height : ".$height);
      //log_message("INFO", " El supuesto path es: ". $path);
      //log_message("INFO", " El supuesto cache path es: ". $mPath);
      if(class_exists("Imagick"))
      {
        $CI =& get_instance();
        $CI->load->library('mimagick', true, NULL, 'mImagick');
        $CI->mimagick->basicThumbnail($path, $mPath, $type, $width, $height); 
      }
      else
      {
		if($this->exec_enabled())
		{
		  $CI =& get_instance();
          $CI->load->library('mimagickexec', true, NULL, 'mImagickExec');
          $CI->mimagickexec->basicThumbnail($path, $mPath, $type, $width, $height); 
		}
		else 
		{
		  $CI =& get_instance();
          $CI->load->library('mgd', true, NULL, 'mgd');
          $CI->mgd->basicThumbnail($path, $mPath, $type, $width, $height);
		}
      }
      
      
    }
    
	function exec_enabled() {
	  $available = true;
	  if (ini_get('safe_mode')) {
		  $available = false;
	  } else {
		  $d = ini_get('disable_functions');
		  $s = ini_get('suhosin.executor.func.blacklist');
		  if ("$d$s") {
			  $array = preg_split('/,\s*/', "$d,$s");
			  if (in_array('exec', $array)) {
				  $available = false;
			  }
		  }
	  }
	  return $available;
	}
	
    public function retrieveDocumentsFilesPath($path)
    {
      $extension = $this->get_file_extension($path);
      $basic_path = FCPATH. 'assets'.DIRECTORY_SEPARATOR."upload".DIRECTORY_SEPARATOR."images".DIRECTORY_SEPARATOR;
      switch ($extension) {
        case "pdf":
            return $basic_path."adobe_acrobat_pdf_icon.jpg";
          break;
        case "doc":
        case "docx":
        case "odt":
            return $basic_path."office_word_icon.png";
          break;
        case "xls":
        case "xlsx":
        case "ods":
        case "csv":
            return $basic_path."office_excel_icon.png";
          break;
        case "ppt":
        case "pptx":
            return $basic_path."office_powerpoint_icon.png";
          break;        
        default:
          return $path;
        break;
      }
    }
	
	public function isFilePathDocument($path)
	{
	  $extension = strtolower($this->get_file_extension($path));
	  return $this->isExtensionDocument($extension);
	}
	
	public function isExtensionDocument($extension)
	{
	  $extension = strtolower($extension);
      if(in_array($extension, $this->documenttypes))
      {
          return true;
      }
      else
      {
          return false;
      }
	  if($extension == 'pdf' || $extension == 'doc' || $extension == 'docx' || $extension == 'xls' || $extension == 'xlsx' || $extension == 'ppt' || $extension == 'pptx'  || $extension == 'ods'  || $extension == 'csv' || $extension == 'odt')
	  {
		return true;
	  }
	  else
	  {
		return false;
	  }
	}
    
    public function get_path_of_file($path)
    {
      $pieces = explode(DIRECTORY_SEPARATOR, $path);
      unset($pieces[count($pieces) - 1]);
      $mPath = implode(DIRECTORY_SEPARATOR, $pieces);
      return $mPath;
    }
    
    /**
     *
     * @author Rodrigo Santellan
     * 
     */    
    public function get_file_of_path($path)
    {
      $pieces = explode(DIRECTORY_SEPARATOR, $path);
      return $pieces[count($pieces) - 1];
    }
    
    
    
    /**
     *
     * @author Rodrigo Santellan
     * 
     */
    public function get_file_extension($file_name) {
        return substr(strrchr($file_name, '.'), 1);
    }

    /**
     *
     * @author Rodrigo Santellan
     * 
     */
    public function get_file_name($file_name) {
        return substr($file_name, 0, strrpos($file_name, '.'));
        //return substr(strrchr($file_name,'.'),0);
    }    
    
    public function deleteImage($path)
    {
      //Tendria que chequear siempre que no exista una en el cache.
      $this->deleteImageCache($path);
      if(file_exists($path))
      {
        unlink($path);
      }
    }
    
    public function deleteImageCache($path)
    {
      $cache_dir = $this->returnBasicCachePath($path);
      $file_name = $this->get_file_of_path($path);
      $list = scandir($cache_dir);
      foreach($list as $dir)
      {
        if($dir != "." && $dir != ".." && $dir != ".svn")
        {
          $aux = $cache_dir.DIRECTORY_SEPARATOR.$dir.DIRECTORY_SEPARATOR.$file_name;
          if(file_exists($aux))
          {
            unlink($aux);
          }
          
        } 
      }
    }
    
    public function getFolders($path = LOCAL_PATH){
        $array = array();
        $path = $this->checkPathFormat($path);
        if (is_dir($path)) {
            if ($dh = opendir($path)) {
                while (($file = readdir($dh)) !== false) {
                    if(is_dir($path . $file) AND $file != '.' AND $file != '..' AND $file != '.svn'){
                        array_push($array, $file);
                    }
                }
            }
        }
        return $array;
    }
    
    
    public function getListByDate($path = LOCAL_PATH){
        if(is_null($path)){ throw new Exception('path is null or LOCAL_PATH in app.yml is null'); }
        $pics = $this->getList($path);
        usort($pics,'cmpDate');
        return $pics;
    }
    
    public function checkPathFormat($path){
    	return $this->checkDirectory($path);
    }
    
    public function getList($path = LOCAL_PATH){
        $array = array();
        $path = $this->checkPathFormat($path);
        if (is_dir($path)) {
            if ($dh = opendir($path)) {
                while (($file = readdir($dh)) !== false) {
                    //echo '<br>Nombre de archivo:' . $file . ' : Es un: ' . filetype($path . $file);
                    if (is_dir($path . $file) AND $file != '.' AND $file != '..' AND $file != '.svn'){
                       //echo '<br>Directorio:' . $path . $file;
                       self::getList($path . $file . "/");
                    }else {
                        if($file != '.' AND $file != '..' AND $file != '.svn'){
                            $myFile = $this->retrieveFile($path , $file);
                            if(!is_null($myFile))
                            {
                              array_push($array, $myFile);
                            }
                        }

                    }
                }
                closedir($dh);
            }
        }else{

            throw new Exception('invalid source');

        }
        return $array;
    }
    
    private static $imageSupportedTypes = array(
                                              'gif' => 'gif', 
                                              'jpg' => 'jpg',																							'jpeg'=> 'jpeg',
                                              'png' => 'png'
                                              );
  
    private static $concreteFileSupportedTypes = array(
                                                    'doc' => 'doc', 
                                                    'docx' => 'docx', 
                                                    'pdf' => 'pdf',
                                                    'xls' => 'xls', 
                                                    'xlsx' => 'xlsx', 
                                                    'ppt' => 'ppt', 
                                                    'pptx' => 'pptx'
                                                    );
  
    public function retrieveFile($path, $file)
    {
      $file_extension =  substr(strrchr($file, '.'), 1);
      if (array_key_exists(strtolower($file_extension), self::$imageSupportedTypes)) 
      {
        return $this->retrieveImageFile($path . $file, $file_extension);// new mdImageFile($path . $file); 
      }

      if (array_key_exists(strtolower($file_extension), self::$concreteFileSupportedTypes)) 
      {
        return $this->retrieveConcreteFile($path , $file, $file_extension);// new mdConcreteFile($path , $file); 
      }  
      return null;
    }
    
    /**
     *
     * Devuelve un array con todos los datos correspondientes a la imagen
     * 
     * @author Rodrigo Santellan 
     */
    public function retrieveImageFile($image, $extension)
    {
      $imageInfo = array();
      $size                             = getimagesize($image);
      $stat                             = stat($image);
      $imageInfo['last_modification'] = $stat['mtime'];
      $imageInfo['width']         = $size[0];
      $imageInfo['height']        = $size[1];
      $imageInfo['type']          = $size[2];
      $imageInfo['mime']          = $size['mime'];
      $imageInfo['route']         = $image;
      $imageInfo['original_name'] = basename($image);
      $imageInfo['original'] = $image;
      $imageInfo['extension'] = $extension;
      return $imageInfo;
    }
    
    /**
     *
     * Devuelve un array con toda la info del archivo.
     * 
     * @param type $file
     * @param type $extension 
     * @author Rodrigo Santellan
     */
    public function retrieveConcreteFile($file, $extension)
    {
      $fileInfo = array();
      $stat  = stat($path.$file);
      $fileInfo['last_modification'] = $stat['mtime'];
      $fileInfo['route']         = $path;
      $fileInfo['original_name'] = $filename;
      $fileInfo['type'] = $extension;
      $fileInfo['extension'] = $extension;
      
    }
}

function cmpDate($a, $b){
    if ($a['last_modification'] == $b['last_modification']) {
        return 0;
    }
    /*
    if(sfConfig::get( 'sf_image_order_ascending', false ))
    {
        return ($a->getLastModification() < $b->getLastModification()) ? 1 : -1;
    }
    */
    return ($a['last_modification'] < $b['last_modification']) ? -1 : 1;

}

function cmpName($a, $b){

    if (strtoupper($a->getName()) == strtoupper($b->getName())) {
        return 0;
    }

    return (strtoupper($a->getName()) < strtoupper($b->getName())) ? -1 : 1;

}