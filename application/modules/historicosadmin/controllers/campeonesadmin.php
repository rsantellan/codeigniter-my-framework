<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/*
 */

/**
 * Description of campeons
 *
 * @author Rodrigo Santellan
 */
class campeonesadmin extends MY_Controller{
  
    function __construct()
    {
      parent::__construct();
      $this->data['menu_id'] = 'campeonesadmin';
      if(!$this->isLogged())
      {
        //Si no esta logeado se tiene que ir a loguear
        $this->session->set_userdata('url_to_direct_on_login', 'historicosadmin/campeonesadmin/index');
        redirect('auth/login'); 
      }

    }
    
    function index(){
      //$this->output->enable_profiler(TRUE);  
      $this->load->model('historicosadmin/campeon');
      $this->data['objects_list'] = $this->campeon->retrieveAll(false, true);
      $this->data['content'] = "historicosadmin/campeonesadmin/list";
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
      $this->load->model('historicosadmin/campeon');
      $this->data['use_grid_16'] = false;
      $this->data['content'] = "historicosadmin/campeonesadmin/add";
      $this->data['object'] = new $this->campeon;
      $this->load->view("admin/layout", $this->data);
    }
    
    function edit($id)
    {
      $this->addJquery();
      $this->addFancyBox();
      $this->addModuleJavascript("admin", "adminManager.js");
      $this->addModuleStyleSheet("upload", "albums.css");
      $this->addModuleJavascript("upload", "imagesAdmin.js");
      
      $this->load->model('historicosadmin/campeon');
      $this->data['use_grid_16'] = false;
      $this->data['content'] = "historicosadmin/campeonesadmin/edit";
      $this->data['object'] = $this->campeon->getById($id);
      $this->load->view("admin/layout", $this->data);
    }
    
    function save()
    {
      $this->load->library('form_validation');
      $this->load->model('historicosadmin/campeon');
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
      $obj = new $this->campeon;
      $obj->setName($name);
      $obj->setPeriodo($periodo);
      $obj->setId($id);
      //var_dump($obj);
      
      if($is_valid)
      {
        //Como es valido lo salvo
        $id = $obj->save();
        $this->session->set_flashdata("salvado", "ok");
        redirect('historicosadmin/campeonesadmin/edit/'.$id);
      }
      else
      {
        if($obj->isNew())
        {
          $this->data['use_grid_16'] = false;
          $this->data['content'] = "historicosadmin/campeonesadmin/add";
          $this->data['object'] = $obj;
          $this->load->view("admin/layout", $this->data);
        }
        else
        {
          $this->data['use_grid_16'] = false;
          $this->data['content'] = "historicosadmin/campeonesadmin/edit";
          $this->data['object'] = $obj;
          $this->load->view("admin/layout", $this->data);
        }
      }
    }
    
    function delete($id)
    {
      $this->load->model('historicosadmin/campeon');
      $result = $this->campeon->deleteById($id);
      $salida['response'] = "OK";
      $this->output
       ->set_content_type('application/json')
       ->set_output(json_encode($salida));
      //echo json_encode($salida);
      //die;
    }
}
