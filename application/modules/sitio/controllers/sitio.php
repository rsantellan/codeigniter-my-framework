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
    //$this->output->cache(1);
  }
  
  public function index()
  {
    $this->data['slider'] = true;
    $this->data['content'] = 'home';
    $this->load->view('layout', $this->data);
  }
  
  public function historia()
  {
    $this->loadI18n("historia", "", FALSE, TRUE, "", "sitio");
    $this->data['menu_id'] = 'historia';
    $this->data['content'] = 'historia';
    $this->load->view('layout', $this->data);
  }
  
  public function clientes()
  {
    $this->loadI18n("clientes", "", FALSE, TRUE, "", "sitio");
    $this->data['menu_id'] = 'clientes';
    $this->data['content'] = 'clientes';
    $this->load->view('layout', $this->data);
  }
  
  public function certificacion()
  {
	$this->loadI18n("certificacion", "", FALSE, TRUE, "", "sitio");
    $this->data['menu_id'] = 'certificacion';
    $this->data['content'] = 'certificacion';
    $this->load->view('layout', $this->data);
  }
  
  public function serviciosOptions()
  {
    $this->load->model('categorias/categorias_model');
    $data = array();
    $data['list'] = $this->categorias_model->retrieveAll();
    $this->load->view('servicios_menu', $data);
  }
}
