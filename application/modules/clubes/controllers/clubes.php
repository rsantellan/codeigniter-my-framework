<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/*
 */

/**
 * Description of clubes
 *
 * @author Rodrigo Santellan
 */
class clubes extends MY_Controller{
  
    function __construct()
    {
      parent::__construct();
      $this->data['menu_id'] = 'clubes';
      if(!$this->isLogged())
      {
        //Si no esta logeado se tiene que ir a loguear
        $this->session->set_userdata('url_to_direct_on_login', 'clubes/index');
        redirect('auth/login'); 
      }

    }
    
    function index(){
      //$this->output->enable_profiler(TRUE);  
      $this->load->model('clubes/club');
      $this->data['objects_list'] = $this->club->retrieveAll(false, true);
      $this->data['content'] = "clubes/list";
      $this->load->helper('upload/mimage');
      $this->load->library('upload/mupload');
      $this->load->model('departamentos/departamento');
      $this->data['departments_list'] = $this->departamento->retrieveAllForSelect();
      $this->addJquery();
      $this->addColorbox();
      $this->addModuleJavascript("datatable", "jquery.dataTables.min.js");
      $this->addModuleStyleSheet('datatable', 'jquery.dataTables.css');
      $this->addModuleStyleSheet('datatable', 'data_table_admin.css');      
      //$this->addModuleJavascript("actaadmin", "list.js");
      $this->addModuleJavascript("admin", "adminManager.js");
      $this->load->view("admin/layout", $this->data);
    }
    
    function add()
    {
      $this->load->model('departamentos/departamento');
      $this->data['departments_list'] = $this->departamento->retrieveAllForSelect();  
      $this->load->model('clubes/club');
      $this->addModuleJavascript("admin", "adminManager.js");
      $this->addModuleJavascript("admin", "tiny_mce/tiny_mce_src.js");
      $this->data['use_grid_16'] = false;
      $this->data['content'] = "clubes/add";
      $this->data['object'] = new $this->club;
      $this->load->view("admin/layout", $this->data);
    }
    
    function edit($id)
    {
      $this->addJquery();
      $this->addColorbox();
      $this->addModuleJavascript("admin", "adminManager.js");
      $this->addModuleJavascript("admin", "tiny_mce/tiny_mce_src.js");
      $this->addModuleStyleSheet("upload", "albums.css");
      $this->addModuleJavascript("upload", "imagesAdmin.js");
      $this->load->model('departamentos/departamento');
      $this->data['departments_list'] = $this->departamento->retrieveAllForSelect();  
      
      $this->load->model('clubes/club');
      $this->data['use_grid_16'] = false;
      $this->data['content'] = "clubes/edit";
      $this->data['object'] = $this->club->getById($id);
      $this->load->view("admin/layout", $this->data);
    }
    
    function save()
    {
      $this->load->library('form_validation');
      $this->load->model('clubes/club');
      $this->load->model('departamentos/departamento');
      $this->data['departments_list'] = $this->departamento->retrieveAllForSelect();  
      // Get ID from form
      $id = $this->input->post('id', true);
      
      
      $this->form_validation->set_rules('name', 'name', 'required|max_length[255]');			
      $this->form_validation->set_rules('link', 'link', 'max_length[255]');
      $this->form_validation->set_rules('description', 'description', '');			
      $this->form_validation->set_rules('location', 'location', 'max_length[255]');			
      $this->form_validation->set_rules('departmentid', 'departmentid', 'required');
      $this->form_validation->set_rules('numero', 'numero', 'is_natural');
        
      $this->form_validation->set_error_delimiters('<p class="error">', '</p>');
      
      $is_valid = false;
      if (!$this->form_validation->run() == FALSE) 
      {
        $is_valid = true;
      }
      $name = set_value('name');
      $link = set_value('link');
      $description = set_value('description');
      $location = set_value('location');
      $departmentid = set_value('departmentid');
      $numero = set_value('numero');
      //var_dump($nombre);
      $obj = new $this->club;
      $obj->setName($name);
      $obj->setLink($link);
      $obj->setDescription($description);
      $obj->setLocation($location);
      $obj->setDepartmentid($departmentid);
      $obj->setNumero($numero);
      $obj->setId($id);
      //var_dump($obj);
      
      if($is_valid)
      {
        //Como es valido lo salvo
        $id = $obj->save();
        $this->session->set_flashdata("salvado", "ok");
        redirect('clubes/edit/'.$id);
      }
      else
      {
        $this->addModuleJavascript("admin", "adminManager.js");
        $this->addModuleJavascript("admin", "tiny_mce/tiny_mce_src.js");
        if($obj->isNew())
        {
          $this->data['use_grid_16'] = false;
          $this->data['content'] = "clubes/add";
          $this->data['object'] = $obj;
          $this->load->view("admin/layout", $this->data);
        }
        else
        {
          $this->data['use_grid_16'] = false;
          $this->data['content'] = "clubes/edit";
          $this->data['object'] = $obj;
          $this->load->view("admin/layout", $this->data);
        }
      }
    }
    
    function delete($id)
    {
      $this->load->model('clubes/club');
      $result = $this->club->deleteById($id);
      $salida['response'] = "OK";
      $this->output
       ->set_content_type('application/json')
       ->set_output(json_encode($salida));
      //echo json_encode($salida);
      //die;
    }
}
