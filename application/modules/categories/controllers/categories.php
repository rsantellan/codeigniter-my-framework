<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/*
 */

/**
 * Description of categories
 *
 * @author Rodrigo Santellan
 */
class categories extends MY_Controller{
  
    function __construct()
    {
      parent::__construct();
      $this->data['menu_id'] = 'categories';
      if(!$this->isLogged())
      {
        //Si no esta logeado se tiene que ir a loguear
        $this->session->set_userdata('url_to_direct_on_login', 'categories/index');
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
      $this->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file'));
	  //$this->output->enable_profiler(TRUE);  
    }
    
    function index($lang = 'es'){
      $this->setLang($lang);
      $this->load->model('categories/category');
      $this->data['objects_list'] = $this->category->retrieveAll(false, $this->getLang(), 'ordinal');
      $this->data['content'] = "categories/list";
      //$this->load->helper('upload/mimage');
      //$this->load->library('upload/mupload');
      
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
      $this->load->model('categories/category');
      $this->data['use_grid_16'] = false;
      $this->data['content'] = "categories/add";
      $this->data['object'] = new $this->category;
	  $this->load->view("admin/layout", $this->data);
    }
    
    function edit($lang, $id)
    {
      $this->setLang($lang);
      $this->addUploadModuleAssets();
      $this->addModuleJavascript("admin", "adminManager.js");
      
      $this->load->model('categories/category');
      $this->data['use_grid_16'] = false;
      $this->data['content'] = "categories/edit";
      $this->data['object'] = $this->category->getById($id, $this->getLang());
      $this->load->view("admin/layout", $this->data);
    }
    
    function save()
    {
      $this->load->library('form_validation');
      $this->load->model('categories/category');
      // Get ID from form
      $id = $this->input->post('id', true);
      $lang = $this->input->post('lang', true);
      $this->setLang($lang);
      $this->form_validation->set_rules('name', 'name', 'required|max_length[255]');			
      $this->form_validation->set_rules('onlyExterior', 'onlyExterior', '');			
        
      $this->form_validation->set_error_delimiters('<p class="error">', '</p>');
      
      $is_valid = false;
      if (!$this->form_validation->run() == FALSE) 
      {
        $is_valid = true;
      }
      $name = set_value('name');
	  $onlyExterior = (int) set_value('onlyExterior');
      $obj = new $this->category;
      $obj->setName($name);
	  $obj->setOnlyexterior($onlyExterior);
	  $obj->setLang($lang);
      $obj->setId($id);
      //var_dump($obj);
      
      if($is_valid)
      {
        //Como es valido lo salvo
        $id = $obj->save();
        $this->cache->delete('categorieslist-'.$lang);
        $this->session->set_flashdata("salvado", "ok");
        redirect('categories/edit/'.$lang."/".$id);
      }
      else
      {
        if($obj->isNew())
        {
          $this->data['use_grid_16'] = false;
          $this->data['content'] = "categories/add";
          $this->data['object'] = $obj;
          $this->load->view("admin/layout", $this->data);
        }
        else
        {
          $this->addUploadModuleAssets();
          $this->data['use_grid_16'] = false;
          $this->data['content'] = "categories/edit";
          $this->data['object'] = $obj;
          $this->load->view("admin/layout", $this->data);
        }
      }
    }
    
    function delete($id)
    {
      $this->load->model('categories/category');
      $result = $this->category->deleteById($id);
      $this->cache->delete('categorieslist-es');
      $this->cache->delete('categorieslist-en');
      $salida['response'] = "OK";
      $this->output
       ->set_content_type('application/json')
       ->set_output(json_encode($salida));
      //echo json_encode($salida);
      //die;
    }
}
