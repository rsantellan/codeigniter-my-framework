<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/*
 */

/**
 * Description of noticias
 *
 * @author Rodrigo Santellan
 */
class noticias extends MY_Controller{
  
    function __construct()
    {
      parent::__construct();
      $this->data['menu_id'] = 'noticias';
      if(!$this->isLogged())
      {
        //Si no esta logeado se tiene que ir a loguear
        $this->session->set_userdata('url_to_direct_on_login', 'noticias/index');
        redirect('auth/login'); 
      }

    }
    
    function index(){
      //$this->output->enable_profiler(TRUE);  
      $this->load->model('noticias/noticia');
      $this->data['objects_list'] = $this->noticia->retrieveAll(false, true);
      $this->data['content'] = "noticias/list";
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
      $this->load->model('noticias/noticia');
      $this->addModuleJavascript("admin", "adminManager.js");
      $this->addModuleJavascript("admin", "tiny_mce/tiny_mce_src.js");
      $this->data['use_grid_16'] = false;
      $this->data['content'] = "noticias/add";
      $this->data['object'] = new $this->noticia;
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
      $this->load->model('noticias/noticia');
      $this->data['use_grid_16'] = false;
      $this->data['content'] = "noticias/edit";
      $this->data['object'] = $this->noticia->getById($id);
      $this->load->view("admin/layout", $this->data);
    }
    
    function save()
    {
      $this->load->library('form_validation');
      $this->load->model('noticias/noticia');
      // Get ID from form
      $id = $this->input->post('id', true);
      
      
      $this->form_validation->set_rules('name', 'name', 'required|max_length[255]');			
      $this->form_validation->set_rules('description', 'description', '');      
        
      $this->form_validation->set_error_delimiters('<p class="error">', '</p>');
      
      $is_valid = false;
      if (!$this->form_validation->run() == FALSE) 
      {
        $is_valid = true;
      }
      $name = set_value('name');
      $description = set_value('description');
      //var_dump($nombre);
      $obj = new $this->noticia;
      $obj->setName($name);
      $obj->setDescription($description);
      $obj->setId($id);
      //var_dump($obj);
      
      if($is_valid)
      {
        //Como es valido lo salvo
        $id = $obj->save();
        $this->session->set_flashdata("salvado", "ok");
        redirect('noticias/edit/'.$id);
      }
      else
      {
        $this->addModuleJavascript("admin", "adminManager.js");
        $this->addModuleJavascript("admin", "tiny_mce/tiny_mce_src.js");
        if($obj->isNew())
        {
          $this->data['use_grid_16'] = false;
          $this->data['content'] = "noticias/add";
          $this->data['object'] = $obj;
          $this->load->view("admin/layout", $this->data);
        }
        else
        {
          $this->data['use_grid_16'] = false;
          $this->data['content'] = "noticias/edit";
          $this->data['object'] = $obj;
          $this->load->view("admin/layout", $this->data);
        }
      }
    }
    
    function delete($id)
    {
      $this->load->model('noticias/noticia');
      $result = $this->noticia->deleteById($id);
      $salida['response'] = "OK";
      $this->output
       ->set_content_type('application/json')
       ->set_output(json_encode($salida));
      //echo json_encode($salida);
      //die;
    }
}
