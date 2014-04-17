<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of sumuy
 *
 * @author rodrigo
 */
class sumuy extends MY_Controller{
  
  private $DEFAULT_LAYOUT = "sumuy_layout";

  function __construct() {
    parent::__construct();
	
  }
  
  public function index()
  {
	$this->data['content'] = 'home';
	$this->load->view($this->DEFAULT_LAYOUT, $this->data);
  }
}


