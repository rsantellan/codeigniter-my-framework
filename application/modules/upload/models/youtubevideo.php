<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/**
 * Description of youtubevideo
 *
 * @author rodrigo
 */
class youtubevideo {
    
    
    
    public function retrieveYoutubeId()
    {
        $video_id = null;
        if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match)) {
            $video_id = $match[1];
        }
    }
}


