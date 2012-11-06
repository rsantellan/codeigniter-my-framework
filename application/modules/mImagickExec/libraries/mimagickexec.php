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
    //var_dump($cacheFile);
    log_message('error',$cacheFile);
    $config = array();
    $config['image_library'] = 'imagemagick';
    $config['source_image'] = $file;
    $config['new_image'] = $cacheFile;
    //$config['create_thumb'] = TRUE;
    //$config['maintain_ratio'] = FALSE;
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
    $CI->image_lib->resize();
    
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