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
	$this->addJquery();
  }
  
  /*function index(){
      $this->load->model('contacto/mail_db');
      $this->data['list'] = $this->mail_db->retrieveAllMailDbData();
      
      $funcion_list = array();
      
      foreach($this->data['list'] as $key => $funcion)
      {
        $row_list = array();
        foreach($funcion as $row)
        {
          $row_list[] = $this->load->view('contacto/contacto_admin_row', array('row' => $row), true);
        }
        $funcion_list[$key] = $row_list;
        //var_dump($funcion);
        //var_dump($key);
      }
      
      $this->data['content_rows'] = $funcion_list;
      $this->data['content'] = "contacto/contacto_admin";
      
      $this->addJquery();
      $this->addFancyBox();
      //$this->addModuleJavascript("actaadmin", "list.js");
      $this->load->view("admin/layout", $this->data);
    }*/
    
    function index(){
      $this->load->model('contacto/mail_db');
      $this->data['list'] = $this->mail_db->retrieveAllMailDbData();
      $this->data['content'] = "contacto/contactoadmin/list";
      
      $this->addJquery();
      $this->addFancyBox();
      $this->addModuleJavascript("registros", "list.js");
      $this->load->view("admin/layout", $this->data);
    }
    
    function addContacto()
    {
      $this->load->model('contacto/mail_db');
      $this->data['use_grid_16'] = false;
      $this->data['content'] = "contacto/contactoadmin/add";
      $this->data['object'] = new $this->mail_db;
      $this->load->view("admin/layout", $this->data);
    }
    
    function editContacto($id)
    {
      $this->load->model('contacto/mail_db');
      $this->data['use_grid_16'] = false;
      $this->data['content'] = "contacto/contactoadmin/edit";
      $this->data['object'] = $this->mail_db->getById($id);
      $this->load->view("admin/layout", $this->data);
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
          $this->data['use_grid_16'] = false;
          $this->data['content'] = "contacto/contactoadmin/add";
          $this->data['object'] = $obj;
          $this->load->view("admin/layout", $this->data);
        }
        else
        {
          $this->data['use_grid_16'] = false;
          $this->data['content'] = "contacto/contactoamdin/edit";
          $this->data['object'] = $obj;
          $this->load->view("admin/layout", $this->data);
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
