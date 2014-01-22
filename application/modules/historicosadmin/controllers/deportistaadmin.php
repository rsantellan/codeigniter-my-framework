<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/*
 */

/**
 * Description of deportistas
 *
 * @author Rodrigo Santellan
 */
class deportistaadmin extends MY_Controller{
  
    function __construct()
    {
      parent::__construct();
      $this->data['menu_id'] = 'deportistaadmin';
      if(!$this->isLogged())
      {
        //Si no esta logeado se tiene que ir a loguear
        $this->session->set_userdata('url_to_direct_on_login', 'historicosadmin/deportistaadmin/index');
        redirect('auth/login'); 
      }

    }
    
    function index(){
      //$this->output->enable_profiler(TRUE);  
      $this->load->model('historicosadmin/deportista');
      $this->data['objects_list'] = $this->deportista->retrieveAll(false, true);
      $this->data['content'] = "historicosadmin/deportistaadmin/list";
      $this->load->helper('upload/mimage');
      $this->load->library('upload/mupload');
      
      $this->addJquery();
      $this->addColorbox();
      //$this->addModuleJavascript("actaadmin", "list.js");
      $this->addModuleJavascript("datatable", "jquery.dataTables.min.js");
      $this->addModuleStyleSheet('datatable', 'jquery.dataTables.css');
      $this->addModuleStyleSheet('datatable', 'data_table_admin.css');
      $this->addModuleJavascript("admin", "adminManager.js");
      $this->load->view("admin/layout", $this->data);
    }
    
    function add()
    {
      $this->load->model('historicosadmin/deportista');
      $this->data['use_grid_16'] = false;
      $this->data['content'] = "historicosadmin/deportistaadmin/add";
      $this->data['object'] = new $this->deportista;
      $this->load->view("admin/layout", $this->data);
    }
    
    function edit($id)
    {
      $this->addJquery();
      $this->addColorbox();
      $this->addModuleJavascript("admin", "adminManager.js");
      $this->addModuleStyleSheet("upload", "albums.css");
      $this->addModuleJavascript("upload", "imagesAdmin.js");
      
      $this->load->model('historicosadmin/deportista');
      $this->data['use_grid_16'] = false;
      $this->data['content'] = "historicosadmin/deportistaadmin/edit";
      $this->data['object'] = $this->deportista->getById($id);
      $this->load->view("admin/layout", $this->data);
    }
    
    function save()
    {
      $this->load->library('form_validation');
      $this->load->model('historicosadmin/deportista');
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
      $obj = new $this->deportista;
      $obj->setName($name);
      $obj->setPeriodo($periodo);
      $obj->setId($id);
      //var_dump($obj);
      
      if($is_valid)
      {
        //Como es valido lo salvo
        $id = $obj->save();
        $this->session->set_flashdata("salvado", "ok");
        redirect('historicosadmin/deportistaadmin/edit/'.$id);
      }
      else
      {
        if($obj->isNew())
        {
          $this->data['use_grid_16'] = false;
          $this->data['content'] = "historicosadmin/deportistaadmin/add";
          $this->data['object'] = $obj;
          $this->load->view("admin/layout", $this->data);
        }
        else
        {
          $this->data['use_grid_16'] = false;
          $this->data['content'] = "historicosadmin/deportistaadmin/edit";
          $this->data['object'] = $obj;
          $this->load->view("admin/layout", $this->data);
        }
      }
    }
    
    function delete($id)
    {
      $this->load->model('historicosadmin/deportista');
      $result = $this->deportista->deleteById($id);
      $salida['response'] = "OK";
      $this->output
       ->set_content_type('application/json')
       ->set_output(json_encode($salida));
      //echo json_encode($salida);
      //die;
    }
}
