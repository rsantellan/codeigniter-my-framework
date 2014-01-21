<?php 

if ( ! function_exists('thumbnail_image'))
{

  function thumbnail_image($basepath, $path, $width, $height, $type = 3)
  {
    log_message("debug", $path);
    $ci = &get_instance();
    $ci->load->library("mupload");
    return $ci->mupload->returnWebCacheImage($basepath, $path, $width, $height, $type);
  }
  
  
}