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
    $this->data['servicio_id'] = "";
  }
  
  public function index()
  {
    $this->data['slider'] = true;
    $this->data['content'] = 'home';
    $this->addStyleSheet('global.css');
    $this->addJavascript("jquery.min.js");
    $this->addJavascript("slides.min.jquery.js");
    $this->addJavascript("index_slider.js");
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
  
  public function serviciosOptions($parameters)
  {
    $this->load->model('categorias/categorias_model');
    $data = array();
    $data['servicio_id'] = $parameters['servicio_id'];
    $data['list'] = $this->categorias_model->retrieveAll();
    $this->load->view('servicios_menu', $data);
  }
  
  public function servicios($id)
  {
    //var_dump($id);
    $this->load->helper('htmlpurifier');
    $this->load->model('categorias/categorias_model');
    $this->data['categoria'] = $this->categorias_model->getById($id, FALSE);
    //var_dump($this->data['categoria']);
    $this->data['category_list'] = $this->categorias_model->retrieveAll();
    $this->data['menu_id'] = 'servicios';
    $this->data['servicio_id'] = 'servicios_'.$id;
    $this->data['content'] = 'servicios';
    $this->load->view('layout', $this->data);
  }
}
