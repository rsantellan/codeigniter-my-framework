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
    $this->data['object'] = $this->llamado->getById($id, false);
    $this->data['content'] = "llamados/show";
    $this->load->view($this->layout, $this->data);
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


