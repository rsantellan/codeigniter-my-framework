<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/*
 */

/**
 * Description of studycases
 *
 * @author Rodrigo Santellan
 */
class studycases extends MY_Controller{
  
    function __construct()
    {
      parent::__construct();
      $this->data['menu_id'] = 'studycases';
      if(!$this->isLogged())
      {
        //Si no esta logeado se tiene que ir a loguear
        $this->session->set_userdata('url_to_direct_on_login', 'studycases/index');
        redirect('auth/login'); 
      }
//	  $this->output->enable_profiler(TRUE);  
    }
    
    function index($lang = 'es'){
      $this->setLang($lang);
      $this->load->model('studycases/studycase');
      $this->data['objects_list'] = $this->studycase->retrieveAll(false, $this->getLang(), true);
      $this->data['content'] = "studycases/list";
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
    
    function add($lang = 'es')
    {
      $this->setLang($lang);
      $this->addJqueryUI();
	    $this->addModuleJavascript("admin", "adminManager.js");
      $this->addModuleJavascript("admin", "tiny_mce/tiny_mce_src.js");
      $this->load->model('studycases/studycase');
      $this->data['use_grid_16'] = false;
      $this->data['content'] = "studycases/add";
      $this->data['object'] = new $this->studycase;
      $this->load->view("admin/layout", $this->data);
    }
    
    function edit($lang, $id)
    {
      $this->setLang($lang);
      $this->addJquery();
      $this->addColorbox();
      $this->addModuleJavascript("admin", "adminManager.js");
      $this->addModuleJavascript("admin", "tiny_mce/tiny_mce_src.js");
      $this->addModuleStyleSheet("upload", "albums.css");
      $this->addModuleJavascript("upload", "imagesAdmin.js");
      $this->load->model('studycases/studycase');
      $this->data['use_grid_16'] = false;
      $this->data['content'] = "studycases/edit";
      $this->data['object'] = $this->studycase->getById($id, $this->getLang());
      $this->load->view("admin/layout", $this->data);
    }
    
    function save()
    {
      $this->load->library('form_validation');
      $this->load->model('studycases/studycase');
      // Get ID from form
      $id = $this->input->post('id', true);
      $lang = $this->input->post('lang', true);
      $this->setLang($lang);
      $this->form_validation->set_rules('name', 'name', 'required|max_length[255]');			
      $this->form_validation->set_rules('description', 'description', '');
	  $this->form_validation->set_rules('slider', 'slider', '');
	  
      $this->form_validation->set_error_delimiters('<p class="error">', '</p>');
      
      $is_valid = false;
      if (!$this->form_validation->run() == FALSE) 
      {
        $is_valid = true;
      }
      $name = set_value('name');
	  $description = set_value('description');
	  $slider = set_value('slider');
      //var_dump($nombre);
      $obj = new $this->studycase;
      $obj->setName($name);
	  $obj->setLang($lang);
	  $obj->setDescription($description);
	  $obj->setIsSlider($slider);
      $obj->setId($id);
      //var_dump($obj);
      
      if($is_valid)
      {
        //Como es valido lo salvo
        $id = $obj->save();
        $this->session->set_flashdata("salvado", "ok");
        redirect('studycases/edit/'.$lang."/".$id);
      }
      else
      {
        if($obj->isNew())
        {
          $this->data['use_grid_16'] = false;
          $this->data['content'] = "studycases/add";
          $this->data['object'] = $obj;
          $this->load->view("admin/layout", $this->data);
        }
        else
        {
          $this->data['use_grid_16'] = false;
          $this->data['content'] = "studycases/edit";
          $this->data['object'] = $obj;
          $this->load->view("admin/layout", $this->data);
        }
      }
    }
    
    function delete($id)
    {
      $this->load->model('studycases/studycase');
      $result = $this->studycase->deleteById($id);
      $salida['response'] = "OK";
      $this->output
       ->set_content_type('application/json')
       ->set_output(json_encode($salida));
      //echo json_encode($salida);
      //die;
    }
}
