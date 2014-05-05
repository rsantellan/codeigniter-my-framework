<?php

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

if(class_exists("Imagick"))
{
    echo 'imagick extension available';
}
else
{
    if($this->exec_enabled())
    {
        echo 'exec extension available';
    }
    else
    {
        echo 'Image by GD';
    }
}
          
