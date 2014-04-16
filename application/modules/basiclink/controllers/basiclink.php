<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/*
 */

/**
 * Description of basiclink
 *
 * @author Rodrigo Santellan
 */
class basiclink extends MY_Controller{
  
    function __construct()
    {
      parent::__construct();
      $this->data['menu_id'] = 'basiclink';
      if(!$this->isLogged())
      {
        //Si no esta logeado se tiene que ir a loguear
        $this->session->set_userdata('url_to_direct_on_login', 'basiclink/index');
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
    }
    
    function index(){
      //$this->output->enable_profiler(TRUE);  
      $this->load->model('basiclink/link');
      $this->data['objects_list'] = $this->link->retrieveAll(false, true);
      $this->data['content'] = "basiclink/list";
      $this->load->helper('upload/mimage');
      $this->load->library('upload/mupload');
      $this->load->helper('text');
      $this->load->helper('htmlpurifier');
      
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
      $this->load->model('basiclink/link');
      $this->addModuleJavascript("admin", "adminManager.js");
      $this->data['use_grid_16'] = false;
      $this->data['content'] = "basiclink/add";
      $this->data['object'] = new $this->link;
      $this->load->view("admin/layout", $this->data);
    }
    
    function edit($id)
    {
      $this->addUploadModuleAssets();
      $this->addModuleJavascript("admin", "adminManager.js");
      $this->load->model('basiclink/link');
      $this->data['use_grid_16'] = false;
      $this->data['content'] = "basiclink/edit";
      $this->data['object'] = $this->link->getById($id);
      $this->load->view("admin/layout", $this->data);
    }
    
    function save()
    {
      $this->load->library('form_validation');
      $this->load->model('basiclink/link');
      // Get ID from form
      $id = $this->input->post('id', true);
      
      
      $this->form_validation->set_rules('name', 'name', 'required|max_length[255]');			
      $this->form_validation->set_rules('url', 'url', 'required|max_length[255]');			
      $this->form_validation->set_error_delimiters('<p class="error">', '</p>');
      
      $is_valid = false;
      if (!$this->form_validation->run() == FALSE) 
      {
        $is_valid = true;
      }
      $name = set_value('name');
      $url = set_value('url');
      $obj = new $this->link;
      $obj->setName($name);
      $obj->setUrl($url);
      $obj->setId($id);
      //var_dump($obj);
      
      if($is_valid)
      {
        //Como es valido lo salvo
        $id = $obj->save();
        $this->session->set_flashdata("salvado", "ok");
        redirect('basiclink/edit/'.$id);
      }
      else
      {
        $this->addModuleJavascript("admin", "adminManager.js");
        $this->addModuleJavascript("admin", "tiny_mce/tiny_mce_src.js");
        if($obj->isNew())
        {
          $this->data['use_grid_16'] = false;
          $this->data['content'] = "basiclink/add";
          $this->data['object'] = $obj;
          $this->load->view("admin/layout", $this->data);
        }
        else
        {
          $this->addUploadModuleAssets();
          $this->addModuleJavascript("admin", "adminManager.js");
          $this->data['use_grid_16'] = false;
          $this->data['content'] = "basiclink/edit";
          $this->data['object'] = $obj;
          $this->load->view("admin/layout", $this->data);
        }
      }
    }
    
    function delete($id)
    {
      $this->load->model('basiclink/link');
      $result = $this->link->deleteById($id);
      $salida['response'] = "OK";
      $this->output
       ->set_content_type('application/json')
       ->set_output(json_encode($salida));
      //echo json_encode($salida);
      //die;
    }
}
