<?php

/**
 * Description of llamados
 *
 * @author Rodrigo Santellan
 */
class llamados extends MY_Controller{
  private $layout = 'admin/layout_bootstrap';
    
    
  function __construct()
  {
    parent::__construct();
    $this->data['menu'] = 'llamados';
    if(!$this->isLogged())
    {
      //Si no esta logeado se tiene que ir a loguear
      $this->session->set_userdata('url_to_direct_on_login', 'novedades/index');
      redirect('auth/login'); 
    }
    $this->load->model('llamados/llamado');
  }
  
  public function index()
  {
    $this->data['list'] = $this->llamado->retrieveAll();
    $this->data['content'] = "llamados/list";
    $this->load->helper('text');
    $this->load->helper('htmlpurifier');
    $this->addAdminBasicJs();
    $this->addBootstrapDataTable();
    $this->addModuleJavascript('admin', 'start-datatable.js');
    $this->load->view($this->layout, $this->data);
  }
  
  function show($id)
  {
    $this->load->model('llamados/llamadoarchivo');
    $this->data['object'] = $this->llamado->getById($id, false);
    $this->data['media'] = $this->llamadoarchivo->getByLlamado($id);
    $this->data['content'] = "llamados/show";
    $this->load->view($this->layout, $this->data);
  }
  
  public function archivo($id){
    $this->load->model('llamados/llamadoarchivo');
    $file = $this->llamadoarchivo->getSimpleId($id);

    $this->load->helper('download');
    $data = file_get_contents($file->filepath.$file->filename); // Read the file's contents
    $name = $file->filename;
    force_download($name, $data);
  }
  
  function delete($id)
  {
    $result = $this->llamado->deleteById($id);
    $salida['response'] = "OK";
    $this->output
     ->set_content_type('application/json')
     ->set_output(json_encode($salida));
    //echo json_encode($salida);
    //die;
  }
}


