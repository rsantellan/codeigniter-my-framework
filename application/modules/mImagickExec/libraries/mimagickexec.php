<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

/* 
 */

/**
 * Description of mimagickexec
 *
 * @author Rodrigo Santellan <rsantellan at gmail.com>
 */
class mimagickexec {
    
  /**
   *
   * Es la libreria basica para crear thumbnails o mejor dicho resize de imagenes.
   * 
   * @param type $file
   * @param type $cacheFile
   * @param type $type
   * @param type $width
   * @param type $height
   * @return type 
   * @author Rodrigo Santellan
   */
  public function basicThumbnail($file, $cacheFile, $type = imagickExecThumbnailTypes::NORMAL, $width = 200, $height = 200)
  {
    if(!imagickExecThumbnailTypes::isValidtype($type))
    {
      throw new Exception("Invalid thumbnail type check class imagickExecThumbnailTypes");
    }
    log_message('info', "el tipo es el siguiente: ".$type);
    //die('aca');
    //var_dump($cacheFile);
    log_message('info',$cacheFile);
    $config = array();
    $config['image_library'] = 'imagemagick';
    $config['source_image'] = $file;
    $config['new_image'] = $cacheFile;
    //$config['create_thumb'] = TRUE;
    if($type == imagickExecThumbnailTypes::FIXED)
    {
      return $this->actualCropResizeFunction($file, $cacheFile, $width, $height);
      $config['maintain_ratio'] = FALSE;
    }

    
    $config['width'] = $width;
    $config['height'] = $height;
    log_message('error', "width: ".$width . " height:".$height );
    $CI =& get_instance();
    if(isset($CI->image_lib))
    {
      $CI->image_lib->clear();
      $CI->image_lib->initialize($config);
    }
    else
    {
      $CI->load->library('image_lib', $config); 
    }
    if($type == imagickExecThumbnailTypes::CROP)
    {
      $CI->image_lib->crop();
    }
    else 
    {
      $CI->image_lib->resize();
    }
  }
  
  private function actualCropResizeFunction($file, $cacheFile, $width = 200, $height = 200)
  {
    $cmd = "convert -quality 90";
    
    $maximun = $width;
    if($width < $height)
    {
      $maximun = $height;
    }
    $cmd .= " -resize ".$maximun;
    $cmd .= " -gravity center -crop ".$width."x".$height."+0+0";
    $cmd .= " \"$file\" \"$cacheFile\" 2>&1";
    $retval = 1;
    log_message('debug', $cmd);
    @exec($cmd, $output, $retval);
    //	Did it work?
    if ($retval > 0)
    {
        log_message('log_message', 'imglib_image_process_failed');
        //$this->set_error('imglib_image_process_failed');
        return FALSE;
    }
    // Set the file to 777
    @chmod($cacheFile, FILE_WRITE_MODE);

    return TRUE;
  }
}

class imagickExecThumbnailTypes {
  const NORMAL = 1;
  const FIT = 2;
  const FIXED = 3;
  const CROP = 4;
  
  public static function isValidtype($type)
  {
    switch($type)
    {
      case self::NORMAL:
        return true;
        break;
      case self::FIT:
        return true;
        break;
      case self::FIXED:
        return true;
        break;
      case self::CROP:
        return true;
        break;
      default:
        return false;
        break;
    }
  }
  
}

class imagickExecColors {
  const PINK = 'pink';
  const BLACK = 'black';
  const WHITE = 'white';
  const BLUE = 'blue';
  const RED = 'red';
  const LIGHTBLUE = 'light blue';
}

class imagickExecExtensions {
  const JPG = 'jpg';
  const PNG = 'png';
}
