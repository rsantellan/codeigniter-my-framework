<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Description of roche
 *
 * @author rodrigo
 */
class celsius extends MY_Controller{

  private $DEFAULT_LAYOUT = "celsius_layout";
  
  
  function __construct() {
      parent::__construct();
      $this->load->helper('upload/mimage');
      $this->load->library('upload/mupload');
	  $this->data['rscarousel'] = false;
	  $this->data['jsGoogleMap'] = false;
      $this->loadI18n("menu", "", FALSE, TRUE, "", "feu");
      $this->data['menu'] = 'inicio';
//      $this->output->enable_profiler(TRUE);
  }

  public function index()
  {
	//$this->output->enable_profiler(TRUE);
	
    $this->load->view($this->DEFAULT_LAYOUT, $this->data);
    
  }
  

}