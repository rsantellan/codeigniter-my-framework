<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('my_format_mysql_date'))
{
    function my_format_mysql_date($date = '', $format = "d/m/Y ")
    {
      if(is_null($date))
        return $date;
        $date = explode("-", $date);
      $unixtime = mktime(0, 0, 0, $date[1], $date[2], $date[0]);
      return date($format, $unixtime); 
    }   
}