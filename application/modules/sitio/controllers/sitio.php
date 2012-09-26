<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of sitio
 *
 * @author Rodrigo Santellan
 */

class Sitio extends MY_Controller {
  
  function __construct() {
    parent::__construct();
    $this->loadI18n("global", "", FALSE, TRUE, "", "sitio");
  }
  
  public function index()
  {
    $this->data['slider'] = true;
    $this->data['content'] = 'home';
    $this->load->view('layout', $this->data);
  }
  
  public function historia()
  {
    $this->data['menu_id'] = 'historia';
    $this->data['content'] = 'historia';
    $this->load->view('layout', $this->data);
  }
  
  public function clientes()
  {
    $this->data['menu_id'] = 'clientes';
    $this->data['content'] = 'clientes';
    $this->load->view('layout', $this->data);
  }
  
  public function certificacion()
  {
    $this->data['menu_id'] = 'certificacion';
    $this->data['content'] = 'certificacion';
    $this->load->view('layout', $this->data);
  }
}
