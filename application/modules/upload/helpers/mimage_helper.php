<?php 

if ( ! function_exists('thumbnail_image'))
{

  function thumbnail_image($path, $width, $height, $type = 3)
  {
    $ci = &get_instance();
    $ci->load->library("mupload");
    return $ci->mupload->returnWebCacheImage($path, $width, $height, $type);
  }
  
  
}