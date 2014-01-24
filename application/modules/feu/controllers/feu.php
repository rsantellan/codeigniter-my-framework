<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Description of roche
 *
 * @author rodrigo
 */
class feu extends MY_Controller{

  private $DEFAULT_LAYOUT = "feu_layout";
  
  public function index()
  {
    $this->data['content'] = 'home';
    $this->load->view($this->DEFAULT_LAYOUT, $this->data);
  }
  
}