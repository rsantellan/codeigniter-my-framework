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
  
  public function docencia()
  {
	$this->data['menu'] = 'docencia';
	$this->data['content'] = 'docencia';
	$this->loadI18n("docencia", $this->getLanguageFile(), FALSE, TRUE, "", "efsa");
	$this->load->view($this->DEFAULT_LAYOUT, $this->data);
  }
  
  public function docenciagrado($type)
  {
	$this->data['menu'] = 'docencia';
	$this->data['content'] = 'docenciagrado';
	$this->loadI18n("docencia", $this->getLanguageFile(), FALSE, TRUE, "", "efsa");
	$this->load->model('integrantes/integrante');
	$this->load->helper('upload/mimage');
	$this->load->library('upload/mupload');
	$this->load->helper('text');
    $this->load->helper('htmlpurifier');
	$this->load->model('efsadocencias/efsadocencia');
	$this->data['list'] = $this->efsadocencia->retrieveAll(null, null, false, true, $type);
	$this->data['type'] = $type;
	$this->load->view($this->DEFAULT_LAYOUT, $this->data);
  }
  
  public function descargar($fileId)
  {
	
	$this->load->model('upload/albumcontent');
    $file = $this->albumcontent->getFile($fileId);
	$aux = $file;//[0];
    $this->load->helper('download');
    $data = file_get_contents($aux->basepath.$aux->path); // Read the file's contents
    $name = $aux->name;
    force_download($name, $data);
	die(0);
  }
  
  public function extension()
  {
	$this->data['menu'] = 'extension';
	$this->data['content'] = 'extension';
	$this->loadI18n("extension", $this->getLanguageFile(), FALSE, TRUE, "", "efsa");
	$this->load->view($this->DEFAULT_LAYOUT, $this->data);
  }
  
  public function extensionlistado()
  {
	$this->data['menu'] = 'extension';
	$this->data['content'] = 'extensionlistado';
	$this->loadI18n("extension", $this->getLanguageFile(), FALSE, TRUE, "", "efsa");
	$this->load->helper('text');
    $this->load->helper('htmlpurifier');
	$this->load->model('efsaextensiones/efsaextension');
	$this->data['list'] = $this->efsaextension->retrieveAll(null, null, false, true);
	$this->load->view($this->DEFAULT_LAYOUT, $this->data);
  }
  
  public function investigacion()
  {
	$this->data['menu'] = 'investigacion';
	$this->data['content'] = 'investigacion';
	$this->loadI18n("investigacion", $this->getLanguageFile(), FALSE, TRUE, "", "efsa");
	$this->load->view($this->DEFAULT_LAYOUT, $this->data);
  }
  
}


