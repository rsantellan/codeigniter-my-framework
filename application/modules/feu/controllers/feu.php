<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Description of roche
 *
 * @author rodrigo
 */
class feu extends MY_Controller{

  private $DEFAULT_LAYOUT = "feu_layout";
  
  function __construct() {
      parent::__construct();
      $this->load->helper('upload/mimage');
      $this->load->library('upload/mupload');
	  $this->data['rscarousel'] = false;
  }

  // http://www.catchmyfame.com/2009/12/30/huge-updates-to-jquery-infinite-carousel-version-2-released/
  // http://www.catchmyfame.com/jquery/infinitecarousel2/demo/d3.html
  // https://github.com/richardscarrott/jquery-ui-carousel
  public function index()
  {
	//$this->output->enable_profiler(TRUE);
    $this->loadI18n("home", "", FALSE, TRUE, "", "feu");
    $this->loadI18n("noticia", "", FALSE, TRUE, "", "feu");
	$this->load->model('noticias/noticia');
	$this->load->model('banners/banner');
    $this->load->helper('text');
    $this->load->helper('htmlpurifier');
	$this->data['noticias'] = $this->noticia->retrieveAll(false, false, 3);
	$this->data['banners'] = $this->banner->retrieveAll(false, true);
	$this->data['content'] = 'home';
	$this->data['rscarousel'] = true;
    $this->load->view($this->DEFAULT_LAYOUT, $this->data);
    
  }
  
}