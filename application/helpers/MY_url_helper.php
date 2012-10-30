<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function url_title($str, $separator = '-', $lowercase = FALSE)
{
    if ($separator == 'dash') 
    {
        $separator = '-';
    }
    else if ($separator == 'underscore')
    {
        $separator = '_';
    }

    $str = strip_tags($str);
    $str = preg_replace("`\[.*\]`U", "", $str);
    $str = preg_replace('`&(amp;)?#?[a-z0-9]+;`i', '-', $str);
    $str = htmlentities($str, ENT_COMPAT, 'utf-8');
    $str = preg_replace("`&([a-z])(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig|quot|rsquo);`i", "\\1", $str);
    $str = preg_replace(array("`[^a-z0-9]`i", "`[-]+`"), "-", $str);
    
    if ($lowercase === TRUE)
    {
        $str = strtolower($str);
    }

    return trim($str, $separator);
}

/**
 * Site URL
 * Used when creating internal anchors, translates a uri into the current language
 */
function site_url($uri, $lang = FALSE) {
	$CI =& get_instance();
	//$CI->load->config('language');
	$use_urilang = $CI->config->item('use_urilang');
    if(!$use_urilang)
    {
      return $CI->config->site_url($uri);
    }
	if(!is_array($uri)) {
		$uri = explode('?', $uri);
		$query = isset($uri[1]) ? '?'.$uri[1] : '';
		$uri = explode('/', ltrim($uri[0], '/'));
	}
	
	if(!$lang)
    {
      $lang = $CI->config->item('language');
      $use_session = $CI->config->item('use_session');
      if(!$use_session)
      {
        // defined language is not supported or not specified, check for cookie
        $lang = $CI->input->cookie('pref_lang', true);
      }
      else
      {
        // defined language is not supported or not specified, check for session
        $lang = $CI->session->userdata('pref_lang');
      }
    }
    
	//$lang_code = array_search($lang, $CI->config->item('language_codes'));
	array_unshift($uri, $lang);
	return $CI->config->site_url($uri).$query;
}

/**
 * Language Menu
 * Returns a unordered list of links to switch languages
 * @param	$class Class of the list 
 * @return	string $links The list of language links
 */
function language_menu($class = "") {
	$CI =& get_instance();
	$CI->load->config('language');
	$CI->load->helper('html');
	
	$languages = $CI->config->item('supported_languages');
	$page = $CI->uri->uri_string() ? $CI->uri->uri_string() : $CI->router->default_controller;
    //var_dump($CI->urilang->auxLangIsSupported('es'));
    if($page != $CI->router->default_controller)
    {
      $segment_array = $CI->uri->segment_array();
      if($CI->urilang->auxLangIsSupported($segment_array[1]))
      {
        unset($segment_array[1]);
      }
      $page = implode("/", $segment_array);
    }
	$links = array();
	foreach($languages as $lang => $name)
	{
		if($lang != $CI->config->item('language'))
		{
			$links[] = anchor(site_url($page, $lang), $name);
		}
	}
	return ul($links, array('class'=>$class));
}

/* End of file MY_url_helper.php */
/* Location: ./application/helpers/MY_url_helper.php */