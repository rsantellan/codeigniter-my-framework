<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/*
 */

/**
 * Description of presentations
 *
 * @author Rodrigo Santellan
 */
class presentations extends MY_Controller{
  
    function __construct()
    {
      parent::__construct();
      $this->data['menu_id'] = 'presentations';
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
	  //$this->output->enable_profiler(TRUE);  
    }
    
    private function loadProduct($productId)
    {
      $this->load->model('products/product');
      $this->data['productObject'] = $this->product->getById($productId, $this->getLang(), false, false, false);
    }
    
    function index($lang, $id){
      $this->setLang($lang);
      $this->load->model('presentations/presentation');
      $this->loadProduct($id);
      $this->data['objects_list'] = $this->presentation->retrieveAll(false, $this->getLang(), $id);
      $this->data['content'] = "presentations/list";
      $this->data['productId'] = $id;
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
    
    function add($lang, $productId)
    {
      $this->setLang($lang);
      $this->load->model('presentations/presentation');
      $this->data['use_grid_16'] = false;
      $this->data['content'] = "presentations/add";
	  $this->load->model('categories/category');
      //$this->data['productId'] = $productId;
      $presentation = new $this->presentation;
      $presentation->setProductId($productId);
      $this->loadProduct($productId);
	  $this->data['object'] = $presentation;
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
      $this->addJqueryUI();
      //$this->load->model('categories/category');
      $this->load->model('presentations/presentation');
      $this->data['use_grid_16'] = false;
      $this->data['content'] = "presentations/edit";
      $this->data['countries'] = $this->presentation->retrieveAllCountries();
      $this->data['types'] = $this->presentation->retrieveCountryType();
      $this->data['compuestos'] = $this->presentation->retrieveCompuestos();
      $object = $this->presentation->getById($id, $this->getLang(), true, false, true);
      $this->data['object'] = $object;
      $this->loadProduct($object->getProductId());
      $this->load->view("admin/layout", $this->data);
    }
    
    function save()
    {
      $this->load->library('form_validation');
      $this->load->model('presentations/presentation');
      $this->data['countries'] = $this->presentation->retrieveAllCountries();
      $this->data['types'] = $this->presentation->retrieveCountryType();
      // Get ID from form
      $id = $this->input->post('id', true);
      $lang = $this->input->post('lang', true);
      $productId = $this->input->post('productId', true);
      $this->setLang($lang);
      $this->form_validation->set_rules('name', 'presentacion', 'required|max_length[255]');			
      $this->form_validation->set_rules('genericname', 'genericname', 'required|max_length[255]');			
      $this->form_validation->set_rules('activecomponent', 'activecomponent', 'required|max_length[255]');			
      $this->form_validation->set_rules('action', 'action', 'required|max_length[255]');			
      $this->form_validation->set_rules('nombreexterior', 'nombreexterior', 'max_length[255]');			
      $this->form_validation->set_rules('presentacionexterior', 'presentacionexterior', 'max_length[255]');			
      
      //var_dump($_POST['categorias']);die;  
      $this->form_validation->set_error_delimiters('<p class="error">', '</p>');
      
      $is_valid = false;
      if (!$this->form_validation->run() == FALSE) 
      {
        $is_valid = true;
      }
      $name = set_value('name');
	  $genericname = set_value('genericname');
	  $action = set_value('action');
	  $activeComponent = set_value('activecomponent');
	  $nombreexterior = set_value('nombreexterior');
	  $presentacionexterior = set_value('presentacionexterior');
      //var_dump($nombre);
      $obj = new $this->presentation;
      $obj->setName($name);
	  $obj->setLang($lang);
      $obj->setId($id);
      $obj->setProductId($productId);
      $obj->setGenericname($genericname);
      $obj->setAction($action);
      $obj->setActiveComponent($activeComponent);
	  $obj->setExteriorName($nombreexterior);
	  $obj->setExteriorPresentation($presentacionexterior);
	  //$obj->setReceta($receta);
      //var_dump($obj);
      
      if($is_valid)
      {
        //Como es valido lo salvo
        $id = $obj->save();
		//$obj->saveCategories($_POST['categorias']);
        $this->session->set_flashdata("salvado", "ok");
        redirect('presentations/edit/'.$lang."/".$id);
      }
      else
      {
        if($obj->isNew())
        {
          $this->data['use_grid_16'] = false;
          $this->data['content'] = "presentations/add";
          $this->data['object'] = $obj;
          $this->load->view("admin/layout", $this->data);
        }
        else
        {
          $this->data['use_grid_16'] = false;
          $this->data['content'] = "presentations/edit";
          $this->data['object'] = $obj;
          $this->load->view("admin/layout", $this->data);
        }
      }
    }
    
    function delete($id)
    {
      $this->load->model('presentations/presentation');
      $result = $this->presentation->deleteById($id);
      $salida['response'] = "OK";
      $this->output
       ->set_content_type('application/json')
       ->set_output(json_encode($salida));
      //echo json_encode($salida);
      //die;
    }
    
    function addCountry()
    {
      $presentationId = $this->input->post('presentationId');
      $type = $this->input->post('type');
      $country = $this->input->post('country');
      $compuesto = $this->input->post('compuesto');
      $this->load->model('presentations/presentation');
      $response = false;
      $html = '';
      try{
        $response = $this->presentation->saveCountry($presentationId, $country, $type, $compuesto);
        $countries = $this->presentation->retrieveAllCountries();
        $types = $this->presentation->retrieveCountryType();
        $data = array(
          'countryId' => $country, 
          'countryName' => $countries[$country]->name,
          'type' => $types[$type],
          'compuesto' => $compuesto,  
          'presentationId' => $presentationId,
          );
        $html = $this->load->view("countrycontainer", $data, true);
      }catch(Exception $e)
      {
        
      }
      $salida['response'] = ($response)? "OK" : 'ERROR';
      $salida['data'] = $presentationId.'-'.$type.'-'.$country;
      $salida['html'] = $html;
      $this->output
       ->set_content_type('application/json')
       ->set_output(json_encode($salida));      
    }
    
    function removeCountry($countryId, $presentationId)
    {
      $this->load->model('presentations/presentation');
      $this->presentation->removeCountry($presentationId, $countryId);
      $salida['response'] = "OK";
      $this->output
       ->set_content_type('application/json')
       ->set_output(json_encode($salida));
    }
    
    function compuesto()
    {
      $term = $this->input->get('term');
      $this->load->model('presentations/presentation');
      $data = $this->presentation->retrieveCompuestos($term);
      $return = array();
      foreach($data as $result)
      {
        $return["label"] = $result->compuesto;
      }
      $this->output
       ->set_content_type('application/json')
       ->set_output(json_encode($return));
    }
}
