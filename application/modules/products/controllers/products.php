<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/*
 */

/**
 * Description of products
 *
 * @author Rodrigo Santellan
 */
class products extends MY_Controller{
  
    function __construct()
    {
      parent::__construct();
      $this->data['menu_id'] = 'products';
      if(!$this->isLogged())
      {
        //Si no esta logeado se tiene que ir a loguear
        $this->session->set_userdata('url_to_direct_on_login', 'products/index');
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
//	  $this->output->enable_profiler(TRUE);  
    }
    
    function index($lang = 'es'){
      $this->setLang($lang);
      $this->load->model('products/product');
      $this->data['objects_list'] = $this->product->retrieveAll(false, $this->getLang(), true);
      $this->data['content'] = "products/list";
      $this->load->helper('upload/mimage');
      $this->load->library('upload/mupload');
      
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
      $this->load->model('products/product');
      $this->data['use_grid_16'] = false;
      $this->data['content'] = "products/add";
	  $this->load->model('categories/category');
	  $this->data['categories'] = $this->category->retrieveAll(false, $this->getLang());
      $this->data['object'] = new $this->product;
	  $this->load->view("admin/layout", $this->data);
    }
    
    function edit($lang, $id)
    {
      $this->setLang($lang);
      $this->addJquery();
      $this->addColorbox();
      $this->addModuleJavascript("admin", "adminManager.js");
      $this->addModuleStyleSheet("upload", "albums.css");
      $this->addModuleJavascript("upload", "imagesAdmin.js");
      $this->load->model('categories/category');
	  $this->data['categories'] = $this->category->retrieveAll(false, $this->getLang());
      $this->load->model('products/product');
      $this->data['use_grid_16'] = false;
      $this->data['content'] = "products/edit";
      $this->data['object'] = $this->product->getById($id, $this->getLang(), true, false, true);
      $this->load->view("admin/layout", $this->data);
    }
    
    function save()
    {
      $this->load->library('form_validation');
      $this->load->model('products/product');
      // Get ID from form
      $id = $this->input->post('id', true);
      $lang = $this->input->post('lang', true);
      $this->setLang($lang);
      $this->form_validation->set_rules('name', 'name', 'required|max_length[255]');			
      $this->form_validation->set_rules('receta', 'receta', '');			
      //var_dump($_POST['categorias']);die;  
      $this->form_validation->set_error_delimiters('<p class="error">', '</p>');
      
      $is_valid = false;
      if (!$this->form_validation->run() == FALSE) 
      {
        $is_valid = true;
      }
      $name = set_value('name');
	  $receta = set_value('receta');
      //var_dump($nombre);
      $obj = new $this->product;
      $obj->setName($name);
	  $obj->setLang($lang);
      $obj->setId($id);
	  $obj->setReceta($receta);
      //var_dump($obj);
      
      if($is_valid)
      {
        //Como es valido lo salvo
        $id = $obj->save();
		$obj->saveCategories($_POST['categorias']);
        $this->session->set_flashdata("salvado", "ok");
        redirect('products/edit/'.$lang."/".$id);
      }
      else
      {
        if($obj->isNew())
        {
          $this->data['use_grid_16'] = false;
          $this->data['content'] = "products/add";
          $this->data['object'] = $obj;
          $this->load->view("admin/layout", $this->data);
        }
        else
        {
          $this->data['use_grid_16'] = false;
          $this->data['content'] = "products/edit";
          $this->data['object'] = $obj;
          $this->load->view("admin/layout", $this->data);
        }
      }
    }
    
    function delete($id)
    {
      $this->load->model('products/product');
      $result = $this->product->deleteById($id);
      $salida['response'] = "OK";
      $this->output
       ->set_content_type('application/json')
       ->set_output(json_encode($salida));
      //echo json_encode($salida);
      //die;
    }
}
