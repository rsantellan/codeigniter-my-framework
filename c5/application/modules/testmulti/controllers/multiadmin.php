<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

/* 
 */

/**
 * Description of multiadmin
 *
 * @author Rodrigo Santellan <rodrigo.santellan at inswitch.us>
 */
class multiadmin extends MY_Controller{
  
  function __construct()
  {
    parent::__construct();
    $this->data['menu_id'] = 'contacto';
    if(!$this->isLogged())
    {
      //Si no esta logeado se tiene que ir a loguear
      $this->session->set_userdata('url_to_direct_on_login', 'contactoadmin/index');
      redirect('auth/login'); 
    }
	$this->addJquery();
  }
  
  function index()
  {
    $this->load->model('testmulti/multi');
    /*
    $this->load->library("pagination");
    $config = array();
    $config["base_url"] = base_url()."testmulti/admin/list";
    $config["total_rows"] = $this->multi->record_count();
    $config["per_page"] = 10;
    $config["uri_segment"] = 4;
    $this->pagination->initialize($config);
    $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
    $data["results"] = $this->multi->retrieveData($config["per_page"], $page);
    $data["links"] = $this->pagination->create_links();
    */
    $this->data['list'] = $this->multi->retrieveData();
    $this->data['content'] = "testmulti/admin/list";

    $this->addJquery();
    $this->addFancyBox();
    //$this->addModuleJavascript("registros", "list.js");
    $this->load->view("admin/layout", $this->data);
  }
    
  function add()
  {
    $this->load->model('testmulti/multi');
    $this->load->model('testmulti/multi18n');
    $this->data['use_grid_16'] = false;
    $this->data['content'] = "testmulti/admin/add";
    $this->data['object'] = $this->multi->retrieveObject();
    $this->load->view("admin/layout", $this->data);
  }
    
  function edit($id)
  {
    $this->load->model('testmulti/multi');
    $this->load->model('testmulti/multi18n');
    $this->data['use_grid_16'] = false;
    $this->data['content'] = "testmulti/admin/edit";
    $this->data['object'] = $this->multi->retrieveObject($id);
    $this->load->view("admin/layout", $this->data);
    
  }
  
  function delete($id)
  {
    $this->load->model('testmulti/multi');
    $result = $this->multi->deleteById($id);
    $response = "ERROR";
    if($result) $response = "OK";
    $salida = array();
    $salida['response'] = $response;
    $this->output
      ->set_content_type('application/json')
      ->set_output(json_encode($salida));
    //echo json_encode($salida);
    //die;
  }
    
  function save()
  {
    $this->output->enable_profiler(TRUE);
    $this->load->library('form_validation');
    $this->load->model('testmulti/multi');
    $this->load->model('testmulti/multi18n');
    // Get ID from form
    $id = $this->input->post('id', true);
    $this->form_validation->set_rules('fecha', 'fecha', '');			
    $this->form_validation->set_rules('color', 'color', 'max_length[125]');
    
    $langs = $this->config->item('supported_languages');
    $lang_data = array();
    
    foreach($langs as $key => $value)
    {
      
      $this->form_validation->set_rules("nombre[".$key."]", 'nombre: '.$key, 'required|max_length[125]');
      $aux_data = "";
      if(isset($_POST["nombre"]))
      {
        if(isset($_POST["nombre"][$key]))
        {
          $aux_data = $_POST["nombre"][$key];
        }
      }
    
      $lang_data[$key] = $aux_data; 
    }
    $is_valid = false;

    if (!$this->form_validation->run() == FALSE) 
    {
      $is_valid = true;
    }
    $fecha =set_value('fecha'); 
    $color = set_value('color');
    $obj = new $this->multi;
    $obj->setId($id);
    $obj->setColor($color);
    $obj->setFecha($fecha);
    $obj_aux_i18n = array();
    foreach($lang_data as $key => $value)
    {
      $obji18n = new $this->multi18n;
      $obji18n->setLang($key);
      $obji18n->setName($value);
      $obji18n->setId($id);
      $obj_aux_i18n[$key] = $obji18n;
    }
    $obj->setLangList($obj_aux_i18n);
    if($is_valid)
    {
      $id = $obj->save();
      $this->session->set_flashdata("salvado", "ok");
      redirect('testmulti/multiadmin/edit/'.$id);
    }
    else
    {
      if($obj->isNew())
      {
        $this->data['use_grid_16'] = false;
        $this->data['content'] = "testmulti/admin/add";
        $this->data['object'] = $obj;
        $this->load->view("admin/layout", $this->data);
      }
    }
    
  }
  
}
