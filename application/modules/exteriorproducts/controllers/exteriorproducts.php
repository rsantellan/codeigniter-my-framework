<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/*
 */

/**
 * Description of exteriorproducts
 *
 * @author Rodrigo Santellan
 */
class exteriorproducts extends MY_Controller{
  
    function __construct()
    {
      parent::__construct();
      $this->data['menu_id'] = 'exteriorproducts';
      if(!$this->isLogged())
      {
        //Si no esta logeado se tiene que ir a loguear
        $this->session->set_userdata('url_to_direct_on_login', 'exteriorproducts/index');
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
	  //$this->output->enable_profiler(TRUE);  
    }
    
    function index(){
      
	  $this->setLang('es');
      $this->load->model('exteriorproducts/exteriorproduct');
      $this->load->model('categories/category');
      $this->data['categories_list'] = $this->category->retrieveAll(false, $this->getLang(), 'ordinal');
	  $this->data['countries_list'] = $this->exteriorproduct->retrieveAllCountries();
	  $this->data['presence_types'] = $this->exteriorproduct->retrieveCountryType();
      $this->data['objects_list'] = $this->exteriorproduct->retrieveAll(false);
	  
      $this->data['content'] = "exteriorproducts/list";
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
      $this->load->model('categories/category');
	  $this->load->model('exteriorproducts/exteriorproduct');
	  $this->setLang('es');
      $this->data['categories_list'] = $this->category->retrieveAll(false, $this->getLang(), 'ordinal');
	  $this->data['countries_list'] = $this->exteriorproduct->retrieveAllCountries();
	  $this->data['presence_types'] = $this->exteriorproduct->retrieveCountryType();
	  
      $this->addModuleJavascript("admin", "adminManager.js");
      $this->data['use_grid_16'] = false;
      $this->data['content'] = "exteriorproducts/add";
      $this->data['object'] = new $this->exteriorproduct;
      $this->load->view("admin/layout", $this->data);
    }
    
    function edit($id)
    {
	  $this->load->model('categories/category');
	  $this->load->model('exteriorproducts/exteriorproduct');
	  $this->setLang('es');
      $this->data['categories_list'] = $this->category->retrieveAll(false, $this->getLang(), 'ordinal');
	  $this->data['countries_list'] = $this->exteriorproduct->retrieveAllCountries();
	  $this->data['presence_types'] = $this->exteriorproduct->retrieveCountryType();
	  $this->addModuleJavascript("admin", "adminManager.js");
      
      $this->data['use_grid_16'] = false;
      $this->data['content'] = "exteriorproducts/edit";
      $this->data['object'] = $this->exteriorproduct->getById($id);
      $this->load->view("admin/layout", $this->data);
    }
    
    function save()
    {
      $this->load->library('form_validation');
      $this->load->model('exteriorproducts/exteriorproduct');
      // Get ID from form
      $id = $this->input->post('id', true);
      
      
      $this->form_validation->set_rules('name', 'Nombre', 'required|max_length[255]');			
      $this->form_validation->set_rules('genericname', 'Nombre generico', 'max_length[255]');
      $this->form_validation->set_rules('categoryid', 'Categoria', 'required');
      $this->form_validation->set_rules('presencetype', 'Tipo de presencia', 'required');
	  $this->form_validation->set_rules('presentation', 'Presentación', 'max_length[255]');
	  $this->form_validation->set_rules('compuesto', 'Compuesto', 'max_length[255]');
      $this->form_validation->set_error_delimiters('<p class="error">', '</p>');
      
      $is_valid = false;
      if (!$this->form_validation->run() == FALSE) 
      {
        $is_valid = true;
      }
      $name = set_value('name');
      $genericname = set_value('genericname');
	  $countryid = set_value('countryid');
	  $categoryid = set_value('categoryid');
	  $presencetype = set_value('presencetype');
	  $presentation = set_value('presentation');
	  $compuesto = set_value('compuesto');
      $obj = new $this->exteriorproduct;
      $obj->setName($name);
      $obj->setGenericname($genericname);
	  $obj->setCategoryid($categoryid);
	  $obj->setPresencetype($presencetype);
	  $obj->setPresentation($presentation);
	  $obj->setCompuesto($compuesto);
      $obj->setId($id);
      
	  $paises = array();
      if(isset($_POST['countryid']))
      {
		$paises = $_POST['countryid'];
		foreach($paises as $pais)
		{
		  $obj->addCountry($pais);
		}
		
        
      }
	  //var_dump($paises);die;
      if($is_valid)
      {
        //Como es valido lo salvo
        $id = $obj->save();
		$obj->saveCountries($id, $paises);
        $this->session->set_flashdata("salvado", "ok");
        redirect('exteriorproducts/edit/'.$id);
      }
      else
      {
        $this->addModuleJavascript("admin", "adminManager.js");
        $this->addModuleJavascript("admin", "tiny_mce/tiny_mce_src.js");
        if($obj->isNew())
        {
		  $this->load->model('categories/category');
		  $this->data['categories_list'] = $this->category->retrieveAll(false, $this->getLang(), 'ordinal');
		  $this->data['countries_list'] = $this->exteriorproduct->retrieveAllCountries();
		  $this->data['presence_types'] = $this->exteriorproduct->retrieveCountryType();
          $this->data['use_grid_16'] = false;
          $this->data['content'] = "exteriorproducts/add";
          $this->data['object'] = $obj;
          $this->load->view("admin/layout", $this->data);
        }
        else
        {
          $this->addUploadModuleAssets();
          $this->addModuleJavascript("admin", "adminManager.js");
          $this->data['use_grid_16'] = false;
          $this->data['content'] = "exteriorproducts/edit";
          $this->data['object'] = $obj;
          $this->load->view("admin/layout", $this->data);
        }
      }
    }
    
    function delete($id)
    {
      $this->load->model('exteriorproducts/exteriorproduct');
      $result = $this->exteriorproduct->deleteById($id);
      $salida['response'] = "OK";
      $this->output
       ->set_content_type('application/json')
       ->set_output(json_encode($salida));
      //echo json_encode($salida);
      //die;
    }
}
