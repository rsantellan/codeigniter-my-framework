<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

/* 
 */

/**
 * Description of mgd
 *
 * @author Rodrigo Santellan
 */
class mgd {
    
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
  public function basicThumbnail($file, $cacheFile, $type = gdThumbnailTypes::NORMAL, $width = 200, $height = 200)
  {
    if(!gdThumbnailTypes::isValidtype($type))
    {
      throw new Exception("Invalid thumbnail type check class gdThumbnailTypes");
    }
    //var_dump($cacheFile);
    log_message('error',$cacheFile);
    $config = array();
    $config['image_library'] = 'gd2';
    //$config['image_library'] = 'gd';
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

class gdThumbnailTypes {
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

class gdColors {
  const PINK = 'pink';
  const BLACK = 'black';
  const WHITE = 'white';
  const BLUE = 'blue';
  const RED = 'red';
  const LIGHTBLUE = 'light blue';
}

class gdExtensions {
  const JPG = 'jpg';
  const PNG = 'png';
}