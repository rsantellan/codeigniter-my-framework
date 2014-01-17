<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/*
 */

/**
 * Description of banners
 *
 * @author Rodrigo Santellan <rodrigo.santellan at inswitch.us>
 */
class banners extends MY_Controller{
  
    function __construct()
    {
      parent::__construct();
      $this->data['menu_id'] = 'banners';
      if(!$this->isLogged())
      {
        //Si no esta logeado se tiene que ir a loguear
        $this->session->set_userdata('url_to_direct_on_login', 'banners/index');
        redirect('auth/login'); 
      }

    }
    
    function index(){
      //$this->output->enable_profiler(TRUE);  
      $this->load->model('banners/banner');
      $this->data['objects_list'] = $this->banner->retrieveAll(false, true);
      $this->data['content'] = "banners/list";
      $this->load->helper('upload/mimage');
      $this->load->library('upload/mupload');
      
      $this->addJquery();
      $this->addFancyBox();
      $this->addModuleJavascript("datatable", "jquery.dataTables.min.js");
      $this->addModuleStyleSheet('datatable', 'jquery.dataTables.css');
      $this->addModuleStyleSheet('datatable', 'data_table_admin.css');
      //$this->addModuleJavascript("actaadmin", "list.js");
      $this->addModuleJavascript("admin", "adminManager.js");
      $this->load->view("admin/layout", $this->data);
    }
    
    function add()
    {
      $this->load->model('banners/banner');
      $this->data['use_grid_16'] = false;
      $this->data['content'] = "banners/add";
      $this->data['object'] = new $this->banner;
      $this->load->view("admin/layout", $this->data);
    }
    
    function edit($id)
    {
      $this->addJquery();
      $this->addFancyBox();
      $this->addModuleJavascript("admin", "adminManager.js");
      $this->addModuleStyleSheet("upload", "albums.css");
      $this->addModuleJavascript("upload", "imagesAdmin.js");
      
      $this->load->model('banners/banner');
      $this->data['use_grid_16'] = false;
      $this->data['content'] = "banners/edit";
      $this->data['object'] = $this->banner->getById($id);
      $this->load->view("admin/layout", $this->data);
    }
    
    function save()
    {
      $this->load->library('form_validation');
      $this->load->model('banners/banner');
      // Get ID from form
      $id = $this->input->post('id', true);
      
      
      $this->form_validation->set_rules('name', 'name', 'required|max_length[255]');			
      $this->form_validation->set_rules('link', 'link', 'required|max_length[255]');      
        
      $this->form_validation->set_error_delimiters('<p class="error">', '</p>');
      
      $is_valid = false;
      if (!$this->form_validation->run() == FALSE) 
      {
        $is_valid = true;
      }
      $name = set_value('name');
      $link = set_value('link');
      //var_dump($nombre);
      $obj = new $this->banner;
      $obj->setName($name);
      $obj->setLink($link);
      $obj->setId($id);
      //var_dump($obj);
      
      if($is_valid)
      {
        //Como es valido lo salvo
        $id = $obj->save();
        $this->session->set_flashdata("salvado", "ok");
        redirect('banners/edit/'.$id);
      }
      else
      {
        if($obj->isNew())
        {
          $this->data['use_grid_16'] = false;
          $this->data['content'] = "banners/add";
          $this->data['object'] = $obj;
          $this->load->view("admin/layout", $this->data);
        }
        else
        {
          $this->data['use_grid_16'] = false;
          $this->data['content'] = "banners/edit";
          $this->data['object'] = $obj;
          $this->load->view("admin/layout", $this->data);
        }
      }
    }
    
    function delete($id)
    {
      $this->load->model('banners/banner');
      $result = $this->banner->deleteById($id);
      $salida['response'] = "OK";
      $this->output
       ->set_content_type('application/json')
       ->set_output(json_encode($salida));
      //echo json_encode($salida);
      //die;
    }
}
