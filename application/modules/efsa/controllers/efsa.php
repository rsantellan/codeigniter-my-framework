<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of efsa
 *
 * @author Rodrigo Santellan
 */
class efsa extends MY_Controller{
  
  private $DEFAULT_LAYOUT = "efsa_layout";

  function __construct() {
    parent::__construct();
    $this->loadI18n("menu", $this->getLanguageFile(), FALSE, TRUE, "", "efsa");
    //$this->output->enable_profiler(TRUE);
  }
  
  public function index()
  {
    $this->loadI18n("home", $this->getLanguageFile(), FALSE, TRUE, "", "efsa");
	$this->data['content'] = 'home';
	$this->load->view($this->DEFAULT_LAYOUT, $this->data);
  }
  
  public function integrantes($type)
  {
	//var_dump($type);
	$this->data['menu'] = 'integrantes';
	$this->loadI18n("integrantes", $this->getLanguageFile(), FALSE, TRUE, "", "efsa");
	$this->data['content'] = 'integrantes';
	$this->load->model('integrantes/integrante');
	$this->load->helper('upload/mimage');
	$this->load->library('upload/mupload');
	$this->data['list'] = $this->integrante->retrieveAll(null, null, false, true, $type);
	$this->data['type'] = $type;
	$this->load->view($this->DEFAULT_LAYOUT, $this->data);
  }
  
  public function integrante($id, $slug)
  {
	$this->loadI18n("integrantes", $this->getLanguageFile(), FALSE, TRUE, "", "efsa");
	$this->load->model('integrantes/integrante');
	$this->load->helper('upload/mimage');
	$this->load->library('upload/mupload');
	$this->load->helper('text');
	$this->load->helper('htmlpurifier');
	$this->data['object'] = $this->integrante->getById($id, false, true);
	$this->load->view('efsa/integrante', $this->data);
  }
  
  public function publicaciones($type)
  {
	$this->data['menu'] = 'publicaciones';
	$this->data['content'] = 'publicaciones';
	$this->loadI18n("publicaciones", $this->getLanguageFile(), FALSE, TRUE, "", "efsa");
	$this->load->model('publicaciones/publicacion');
	$this->data['list'] = $this->publicacion->retrieveAccordeon($type);
	$this->data['type'] = $type;
	$this->load->view($this->DEFAULT_LAYOUT, $this->data);
  }
  
  
}


