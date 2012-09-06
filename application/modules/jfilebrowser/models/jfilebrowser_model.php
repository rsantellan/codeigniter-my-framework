<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

/* 
 */

/**
 * Description of jfilebrowser_model
 *
 * @author Rodrigo Santellan <rodrigo.santellan at inswitch.us>
 */
class jfilebrowser_model extends MY_Model
{
  
    
  
    private function getPath()
    {
      return dirname(__FILE__).DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."assets".DIRECTORY_SEPARATOR."uploads".DIRECTORY_SEPARATOR."jfilebrowser";
    }
    
    public function directoryList()
    {
      
      $directorios = array();
      $dirs = $this->getCategories(array('path' => $this->getPath(), 'order' => 'desc', 'absolute' => true));
      foreach($dirs as $directorio){
          $data = new stdClass();
          $data->name = $directorio;
          $data->cant = $this->getCantFiles($directorio);
          $directorios[] = $data;
          unset ($data);
      }
      return $directorios;
    }
    
    public function getCantFiles($category)
    {
      $total = 0;
      $handle = opendir($this->getPath() . DIRECTORY_SEPARATOR . $category);
      if ($handle)
      {
          while (false !== ($file = readdir($handle)))
          {
              if ($file != "." && $file != ".." && $file != ".svn" && $file != ".depdblock" && $file != ".channels" && $file != ".depdb" && $file != ".filemap" && $file != ".registry" && $file != ".lock")
              {
                  $total++;
              }
          }
          closedir($handle);
      }
      return $total;
    }
    
    public function getFiles($category)
    {
        $path = $this->getPath(). DIRECTORY_SEPARATOR . $category;
        return $this->getImagesByDate(array('path' => $path, 'order' => 'desc', 'absolute' => true));
    }

    public function createDirectory($directory)
    {
        if(file_exists($this->getPath(). DIRECTORY_SEPARATOR . $directory))
        {
            throw new Exception('Directory already exist', 101);
        }
        $ci =& get_instance();
        return $ci->mupload->checkDirectory($this->getPath(). DIRECTORY_SEPARATOR . $directory);
    }

    public function deleteDirectory($directory)
    {
        if(!file_exists($this->getPath(). DIRECTORY_SEPARATOR . $directory))
        {
            throw new Exception('Directory not exist', 102);
        }
        $files = $this->getFiles($directory);
        foreach($files as $file)
        {
//          var_dump($file);
            $this->deleteFile($directory, $file["original_name"]);
        }
        if (!@rmdir($this->getPath(). DIRECTORY_SEPARATOR . $directory))
        {
        	throw new Exception('directory can not delete');
        }
    }

    public function deleteFile($directory, $filename)
    {
        log_message("debug", $this->getPath(). DIRECTORY_SEPARATOR . $directory . DIRECTORY_SEPARATOR . $filename);
        if(!file_exists($this->getPath(). DIRECTORY_SEPARATOR . $directory . DIRECTORY_SEPARATOR . $filename))
        {
            throw new Exception('File not exist', 103);
        }
        $ci =& get_instance();
        $ci->mupload->deleteImage($this->getPath(). DIRECTORY_SEPARATOR . $directory . DIRECTORY_SEPARATOR . $filename);
    }

    public function find($directory, $name)
    {
        $mdImageFiles = MdFileHandler::getList($this->getPath(). DIRECTORY_SEPARATOR . $directory);
        foreach($mdImageFiles as $mdImageFile)
        {
            if($mdImageFile->getName() == $name)
            {
                return $mdImageFile;
            }
        }
        throw new Exception('file not exist', 104);
    }
    
    
    public function getImagesByDate($options = array()){
      $ci =& get_instance();
      return $ci->mupload->getListByDate(self::getPathFromOptions($options));
    }

    public function getCategories($options = array()){
      $ci =& get_instance();
      return $ci->mupload->getFolders(self::getPathFromOptions($options));
    }



    /*
     * options
     *  [path]                       | carpeta donde se buscaran las imagenes
     *  [absolute] => false          | si esta opcion es true se usara la opcion [path] absolutamente, false usa siempre la ruta por defecto como base y la opcion[path] como directorio
     */
    private function getPathFromOptions($options){

        if(!isset($options['path'])){
            $path = self::PATH;
        }else{
            $path = $options['path'];
        }
        $ci =& get_instance();
        if (isset($options['path']) AND isset($options['absolute']) AND $options['absolute'] === false)
            $path = $ci->mupload->checkPathFormat(self::PATH) . $path;
        
        $path = $ci->mupload->checkPathFormat($path);

        return $path;
    }
}
