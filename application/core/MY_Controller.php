<?php

/**
 * Description of MY_Controller
 *
 * @author rodrigo
 */
class MY_Controller extends MX_Controller
{

  protected $data;
  
  //put your code here
  protected $title = null;//'Code Igniter my framework';
  // The template will use this to include default.css by default
  //public $styles = array('default');
  protected $styles = array();
  
  protected $lenguage = "";
  
  public function __construct()
  {
	  parent::__construct();
      if(is_null($this->title))
      {
        //$this->config->load('views');
        $this->title = $this->config->item('app_title');
      }
	  $this->data["title"] = $this->title;
	  $is_logged_in = $this->session->userdata('is_logged_in');
	  if(isset($is_logged_in) && $is_logged_in == true)
	  {
		$lang = $this->session->userdata('language');
		if(isset($lang))
		{
		  $lenguage = $lang;
		}
		else 
		{
		  $config =& get_config();
		  $lenguage = $config['language'];
		}
		$this->data["username"] = $this->session->userdata('username');
		$this->loadI18n("header");
		$this->loadEnabledModules();
	  }
      
	  $this->data["stylesheet"] = array();
	  $this->data["javascript"] = array();
	  $this->data["dashboard"] = false;
	  $this->data["leftBoxOn"] = false;
      $this->data['jquery_on'] = false;
      $this->data['jquery_ui_on'] = false;
      $this->data['fancybox_on'] = false;
      $this->data['colorbox_on'] = false;
      $this->data['menu_id'] = "home";
	  $this->data['ckeditor_on'] = false;
	  $this->data['tinymce_on'] = false;
	  $this->data['use_noty'] = false;

  }

  public function setTitle($title)
  {
    $this->data['title'] = $title;
  }
  
  public function loadI18n($langfile, $lang = '', $return = FALSE, $add_suffix = TRUE, $alt_path = '', $_module = '')
  {
	if($langfile != "")
	{
	  $this->lang->load($langfile, $lang, $return, $add_suffix, $alt_path, $_module);
	}
  }
  
  public function loadEnabledModules()
  {
	$modules = $this->config->item('modules_enables');
	$this->data['enabled_modules'] = $modules;
  }
  
  public function isLogged()
  {
    $this->load->library('tank_auth', true, NULL, 'auth');
    $is_logged = $this->tank_auth->is_logged_in();
    return $is_logged;
  }
  
  protected function addJavascript($javascript)
  {
	$this->data["javascript"][$javascript] = $javascript;
	//array_push( $this->data["javascript"] , $javascript);
  }
  
  protected function addModuleJavascript($module, $javascript)
  {
	$auxJavascript = "../".$module."/js/".$javascript;
	array_push( $this->data["javascript"] , $auxJavascript);
  }
  
  protected function addStyleSheet($stylesheet)
  {
	$this->data["stylesheet"][$stylesheet] = $stylesheet;
	//array_push( $this->data["stylesheet"] , $stylesheet);
  }
  
  protected function addModuleStyleSheet($module, $stylesheet)
  {
	$auxStylesheet = "../".$module."/css/".$stylesheet;
	array_push( $this->data["stylesheet"] , $auxStylesheet);
  }
  
  protected function addJquery()
  {
    $this->data['jquery_on'] = true;
  }
  
  protected function addJqueryUI()
  {
	$this->addJquery();
    $this->data['jquery_ui_on'] = true;
  }
  
  protected function addFancyBox()
  {
    $this->addColorbox();
    //$this->data['fancybox_on'] = true;
  }
  
  protected function addColorbox()
  {
      $this->addJquery();
      $this->data['colorbox_on'] = true;
  }
  protected function addCKEditor()
  {
    $this->addJquery();
    $this->data['ckeditor_on'] = true;
  }
  
  protected function addTinyMce()
  {
    $this->addJquery();
    $this->data['tinymce_on'] = true;
  }
  
  protected function addUploadModuleAssets()
  {
	$this->addJquery();
	$this->addColorbox();
	$this->addModuleStyleSheet("upload", "albums.css");
	$this->addModuleJavascript("upload", "imagesAdmin.js");
  }
}

