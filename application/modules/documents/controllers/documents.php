<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/*
 */

/**
 * Description of documents
 *
 * @author Rodrigo Santellan
 */
class documents extends MY_Controller{
  
    function __construct()
    {
      parent::__construct();
      $this->data['menu_id'] = 'documents';
      if(!$this->isLogged())
      {
        //Si no esta logeado se tiene que ir a loguear
        $this->session->set_userdata('url_to_direct_on_login', 'documents/index');
        redirect('auth/login'); 
      }

    }
    
    function index(){
      //$this->output->enable_profiler(TRUE);  
      $this->load->model('documents/document');
      $this->data['objects_list'] = $this->document->retrieveAll('doc');
      $this->data['content'] = "documents/list";
      $this->data['docType'] = 'doc';
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
    
    function formularios(){
      //$this->output->enable_profiler(TRUE);  
      $this->load->model('documents/document');
      $this->data['objects_list'] = $this->document->retrieveAll('form');
      $this->data['content'] = "documents/list";
      $this->data['docType'] = 'form';
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
      $this->load->model('documents/document');
      $this->data['use_grid_16'] = false;
      $this->data['content'] = "documents/add";
      $object = new $this->document;
      $object->setTipo('doc');
      $this->data['object'] = $object;
      $this->load->view("admin/layout", $this->data);
    }
    
    function addForm()
    {
      $this->load->model('documents/document');
      $this->data['use_grid_16'] = false;
      $this->data['content'] = "documents/add";
      $object = new $this->document;
      $object->setTipo('form');
      $this->data['object'] = $object;
      $this->load->view("admin/layout", $this->data);
    }
    
    function edit($id)
    {
      $this->addJquery();
      $this->addColorbox();
      $this->addModuleJavascript("admin", "adminManager.js");
      $this->addModuleStyleSheet("upload", "albums.css");
      $this->addModuleJavascript("upload", "imagesAdmin.js");
      
      $this->load->model('documents/document');
      $this->data['use_grid_16'] = false;
      $this->data['content'] = "documents/edit";
      $this->data['object'] = $this->document->getById($id);
      $this->load->view("admin/layout", $this->data);
    }
    
    function save()
    {
      $this->load->library('form_validation');
      $this->load->model('documents/document');
      // Get ID from form
      $id = $this->input->post('id', true);
      
      
      $this->form_validation->set_rules('name', 'name', 'required|max_length[255]');			
      $this->form_validation->set_rules('tipo', 'tipo', 'required|max_length[255]');      
        
      $this->form_validation->set_error_delimiters('<p class="error">', '</p>');
      
      $is_valid = false;
      if (!$this->form_validation->run() == FALSE) 
      {
        $is_valid = true;
      }
      $name = set_value('name');
      $tipo = set_value('tipo');
      //var_dump($nombre);
      $obj = new $this->document;
      $obj->setName($name);
      $obj->setTipo($tipo);
      $obj->setId($id);
      //var_dump($obj);
      
      if($is_valid)
      {
        //Como es valido lo salvo
        $id = $obj->save();
        $this->session->set_flashdata("salvado", "ok");
        redirect('documents/edit/'.$id);
      }
      else
      {
        if($obj->isNew())
        {
          $this->data['use_grid_16'] = false;
          $this->data['content'] = "documents/add";
          $this->data['object'] = $obj;
          $this->load->view("admin/layout", $this->data);
        }
        else
        {
          $this->data['use_grid_16'] = false;
          $this->data['content'] = "documents/edit";
          $this->data['object'] = $obj;
          $this->load->view("admin/layout", $this->data);
        }
      }
    }
    
    function delete($id)
    {
      $this->load->model('documents/document');
      $result = $this->document->deleteById($id);
      $salida['response'] = "OK";
      $this->output
       ->set_content_type('application/json')
       ->set_output(json_encode($salida));
      //echo json_encode($salida);
      //die;
    }
}
