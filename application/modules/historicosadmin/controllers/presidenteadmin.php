<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/*
 */

/**
 * Description of presidentes
 *
 * @author Rodrigo Santellan <rodrigo.santellan at inswitch.us>
 */
class presidenteadmin extends MY_Controller{
  
    function __construct()
    {
      parent::__construct();
      $this->data['menu_id'] = 'presidenteadmin';
      if(!$this->isLogged())
      {
        //Si no esta logeado se tiene que ir a loguear
        $this->session->set_userdata('url_to_direct_on_login', 'historicosadmin/presidenteadmin/index');
        redirect('auth/login'); 
      }

    }
    
    function index(){
      //$this->output->enable_profiler(TRUE);  
      $this->load->model('historicosadmin/presidente');
      $this->data['objects_list'] = $this->presidente->retrieveAll(false, true);
      $this->data['content'] = "historicosadmin/presidenteadmin/list";
      $this->load->helper('upload/mimage');
      $this->load->library('upload/mupload');
      
      $this->addJquery();
      $this->addFancyBox();
      //$this->addModuleJavascript("actaadmin", "list.js");
      $this->addModuleJavascript("admin", "adminManager.js");
      $this->load->view("admin/layout", $this->data);
    }
    
    function add()
    {
      $this->load->model('historicosadmin/presidente');
      $this->data['use_grid_16'] = false;
      $this->data['content'] = "historicosadmin/presidenteadmin/add";
      $this->data['object'] = new $this->presidente;
      $this->load->view("admin/layout", $this->data);
    }
    
    function edit($id)
    {
      $this->addJquery();
      $this->addFancyBox();
      $this->addModuleJavascript("admin", "adminManager.js");
      $this->addModuleStyleSheet("upload", "albums.css");
      $this->addModuleJavascript("upload", "imagesAdmin.js");
      
      $this->load->model('historicosadmin/presidente');
      $this->data['use_grid_16'] = false;
      $this->data['content'] = "historicosadmin/presidenteadmin/edit";
      $this->data['object'] = $this->presidente->getById($id);
      $this->load->view("admin/layout", $this->data);
    }
    
    function save()
    {
      $this->load->library('form_validation');
      $this->load->model('historicosadmin/presidente');
      // Get ID from form
      $id = $this->input->post('id', true);
      
      
      $this->form_validation->set_rules('name', 'name', 'required|max_length[255]');			
      $this->form_validation->set_rules('periodo', 'periodo', 'required|max_length[255]');      
        
      $this->form_validation->set_error_delimiters('<p class="error">', '</p>');
      
      $is_valid = false;
      if (!$this->form_validation->run() == FALSE) 
      {
        $is_valid = true;
      }
      $name = set_value('name');
      $periodo = set_value('periodo');
      //var_dump($nombre);
      $obj = new $this->presidente;
      $obj->setName($name);
      $obj->setPeriodo($periodo);
      $obj->setId($id);
      //var_dump($obj);
      
      if($is_valid)
      {
        //Como es valido lo salvo
        $id = $obj->save();
        $this->session->set_flashdata("salvado", "ok");
        redirect('historicosadmin/presidenteadmin/edit/'.$id);
      }
      else
      {
        if($obj->isNew())
        {
          $this->data['use_grid_16'] = false;
          $this->data['content'] = "historicosadmin/presidenteadmin/add";
          $this->data['object'] = $obj;
          $this->load->view("admin/layout", $this->data);
        }
        else
        {
          $this->data['use_grid_16'] = false;
          $this->data['content'] = "historicosadmin/presidenteadmin/edit";
          $this->data['object'] = $obj;
          $this->load->view("admin/layout", $this->data);
        }
      }
    }
    
    function delete($id)
    {
      $this->load->model('historicosadmin/presidente');
      $result = $this->presidente->deleteById($id);
      $salida['response'] = "OK";
      $this->output
       ->set_content_type('application/json')
       ->set_output(json_encode($salida));
      //echo json_encode($salida);
      //die;
    }
}
