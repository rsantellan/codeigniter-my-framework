<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/*
 */

/**
 * Description of contactoadmin
 *
 * @author Rodrigo Santellan
 */
class contactoadmin extends MY_Controller{
  
  private $layout = 'admin/layout_bootstrap';
  
  function __construct()
  {
    parent::__construct();
    $this->data['menu_id'] = 'contacto';
    if(!$this->isLogged())
    {
      //Si no esta logeado se tiene que ir a loguear
      $this->session->set_userdata('url_to_direct_on_login', 'contactoadmin/index');
      redirect('auth/login'); 
    }
    else
    {
      $user = $this->getLoggedUserData();
      if(isset($user->profile) && $user->profile !== 'admin')
      {
        $this->session->set_flashdata("permission", "No tiene los permisos suficientes");
        redirect('');
      }
    }
	$this->addJquery();
  }
  
  function index(){
    $this->load->model('contacto/mail_db');
    $this->data['list'] = $this->mail_db->retrieveAllMailDbData();
    $this->data['content'] = "contacto/contactoadmin/list";

    $this->addBootstrapDataTable();
    $this->addAdminBasicJs();
    $this->addModuleJavascript('admin', 'start-datatable.js');
    $this->load->view($this->layout, $this->data);
  }
    
    function addContacto()
    {
      $this->load->model('contacto/mail_db');
      $this->data['content'] = "contacto/contactoadmin/add";
      $this->data['object'] = new $this->mail_db;
      $this->load->view($this->layout, $this->data);
    }
    
    function editContacto($id)
    {
      $this->load->model('contacto/mail_db');
      $this->data['content'] = "contacto/contactoadmin/edit";
      $this->data['object'] = $this->mail_db->getById($id);
      $this->load->view($this->layout, $this->data);
    }
    
    function saveContacto()
    {
    //$this->output->enable_profiler(TRUE);
      $this->load->library('form_validation');
      $this->load->model('contacto/mail_db');
      // Get ID from form
      $id = $this->input->post('id', true);
      
      //$this->form_validation->set_rules('id', 'id', '');			
      $this->form_validation->set_rules('direccion', 'direccion', 'valid_email|required|xss_clean|max_length[255]');			
      $this->form_validation->set_rules('tipo', 'tipo', 'required|xss_clean|max_length[64]');
      $this->form_validation->set_rules('nombre', 'nombre', 'required|xss_clean|max_length[255]');
      $this->form_validation->set_rules('funcion', 'funcion', 'required|xss_clean|max_length[64]');
      $this->form_validation->set_error_delimiters('<p class="error">', '</p>');
      $is_valid = false;
      if (!$this->form_validation->run() == FALSE) 
      {
        $is_valid = true;
      }
      $direccion =set_value('direccion'); 
      $tipo = set_value('tipo');
    $nombre = set_value('nombre');
    $funcion = set_value('funcion');
      //var_dump($nombre);
      $obj = new $this->mail_db;
      $obj->setDireccion($direccion);
      $obj->setId($id);
    $obj->setTipo($tipo);
    $obj->setNombre($nombre);
    $obj->setFuncion($funcion);
      //var_dump($obj);
      if($is_valid)
      {
    //Como es valido lo salvo
        $id = $obj->save();
        $this->session->set_flashdata("salvado", "ok");
        redirect('contacto/contactoadmin/editContacto/'.$id);
      }
      else
      {
        if($obj->isNew())
        {
          $this->data['content'] = "contacto/contactoadmin/add";
          $this->data['object'] = $obj;
          $this->load->view($this->layout, $this->data);
        }
        else
        {
          $this->data['content'] = "contacto/contactoamdin/edit";
          $this->data['object'] = $obj;
          $this->load->view($this->layout, $this->data);
        }
      }
    }
    
    function deleteContacto($id)
    {
      $this->load->model('contacto/mail_db');
      $result = $this->mail_db->deleteById($id);
      $salida['response'] = "OK";
      $this->output
       ->set_content_type('application/json')
       ->set_output(json_encode($salida));
      //echo json_encode($salida);
      //die;
    }
  
}
