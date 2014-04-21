<?php

/**
 * Description of inscripciones
 *
 * @author Rodrigo Santellan
 */
class inscripciones extends MY_Controller{
  private $layout = 'admin/layout_bootstrap';
    
    
  function __construct()
  {
    parent::__construct();
    $this->data['menu'] = 'inscripciones';
    if(!$this->isLogged())
    {
      //Si no esta logeado se tiene que ir a loguear
      $this->session->set_userdata('url_to_direct_on_login', 'novedades/index');
      redirect('auth/login'); 
    }
    $this->load->model('inscripciones/inscripcion');
  }
  
  public function index()
  {
    $this->data['list'] = $this->inscripcion->retrieveAll();
    $this->data['content'] = "inscripciones/list";
    $this->load->helper('text');
    $this->load->helper('htmlpurifier');
    $this->addAdminBasicJs();
    $this->addBootstrapDataTable();
    $this->addModuleJavascript('admin', 'start-datatable.js');
    $this->load->view($this->layout, $this->data);
  }
  
  function show($id)
  {
    $this->load->model('inscripciones/inscripcionarchivo');
    $this->data['object'] = $this->inscripcion->getById($id, false);
    $this->data['media'] = $this->inscripcionarchivo->getByInscripcion($id);
    $this->data['content'] = "inscripciones/show";
    $this->load->view($this->layout, $this->data);
  }
  
  public function archivo($id){
    $this->load->model('inscripciones/inscripcionarchivo');
    $file = $this->inscripcionarchivo->getSimpleId($id);
    //$aux = $file; //[0];
    $this->load->helper('download');
    $data = file_get_contents($file->filepath.$file->filename); // Read the file's contents
    $name = $file->filename;
    force_download($name, $data);
  }
  
  function delete($id)
  {
    //die('aca');
    $this->load->model('inscripciones/inscripcionarchivo');
    $datos = $this->inscripcionarchivo->getByInscripcion($id);
    foreach($datos as $media)
    {
      $this->inscripcionarchivo->deleteAllById($media->id);
    }
    $result = $this->inscripcion->deleteById($id);
    $salida['response'] = "OK";
    $this->output
     ->set_content_type('application/json')
     ->set_output(json_encode($salida));
    //echo json_encode($salida);
    //die;
  }
}


