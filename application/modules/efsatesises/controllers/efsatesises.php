<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/*
 */

/**
 * Description of efsatesises
 *
 * @author Rodrigo Santellan
 */
class efsatesises extends MY_Controller{
  
    private $layout = 'admin/layout_bootstrap';
    
    
    function __construct()
    {
      parent::__construct();
      $this->data['menu'] = 'efsatesises';
      if(!$this->isLogged())
      {
        //Si no esta logeado se tiene que ir a loguear
        $this->session->set_userdata('url_to_direct_on_login', 'efsatesises/index');
        redirect('auth/login'); 
      }
      $this->load->model('efsatesises/efsatesis');
      //$this->output->enable_profiler(TRUE);
    }
    
    function index(){
	  //$this->efsatesis->retrieveAccordeon(1);
      $this->addColorbox();
      $this->addAdminBasicJs();
      $this->load->helper('upload/mimage');
      $this->load->library('upload/mupload');
      $this->data['list'] = $this->efsatesis->retrieveAll(null, null, false, false);
      $this->data['content'] = "efsatesises/list";
      $this->load->helper('text');
      $this->load->helper('htmlpurifier');
      $this->addBootstrapDataTable();
      $this->addModuleJavascript('admin', 'start-datatable.js');
      $this->load->view($this->layout, $this->data);
    }
    
    
    function add()
    {
      $this->data['content'] = "efsatesises/add";
      $this->data['object'] = new $this->efsatesis;
      $this->addTinyMce();
      $this->addModuleJavascript('admin', 'start-basic-tiny.js');
      $this->load->view($this->layout, $this->data);
    }
    
    function edit($id)
    {
      //var_dump(FCPATH);
      $this->addTinyMce();
      $this->addModuleJavascript('admin', 'start-basic-tiny.js');
      $this->addUploadModuleAssets();
      
      $this->data['content'] = "efsatesises/edit";
      $this->data['object'] = $this->efsatesis->getById($id);
      $this->load->view($this->layout, $this->data);
    }
    
    function save()
    {
      $this->load->library('form_validation');
      
      // Get ID from form
      $id = $this->input->post('id', true);
      
      $this->form_validation->set_rules('description', 'description', 'required|trim|max_length[65535]');
      $this->form_validation->set_error_delimiters('<p class="error">', '</p>');
      
      $is_valid = false;
      if (!$this->form_validation->run() == FALSE) 
      {
        $is_valid = true;
      }
      $description = html_escape(set_value('description'), ENT_COMPAT | 0, 'UTF-8');
      //var_dump($nombre);
      $obj = new $this->efsatesis;
	  $obj->setDescription($description);
      $obj->setId($id);
	  
      if($is_valid)
      {
        //Como es valido lo salvo
        $id = $obj->save();
        $this->session->set_flashdata("salvado", "ok");
        redirect('efsatesises/edit/'.$id);
      }
      else
      {
        $this->addTinyMce();
        $this->addModuleJavascript('admin', 'start-basic-tiny.js');
        if($obj->isNew())
        {
          $this->data['use_grid_16'] = false;
          $this->data['content'] = "efsatesises/add";
          $this->data['object'] = $obj;
          $this->load->view($this->layout, $this->data);
        }
        else
        {
          $this->addUploadModuleAssets();
          $this->data['content'] = "efsatesises/edit";
          $this->data['object'] = $obj;
          $this->load->view($this->layout, $this->data);
        }
      }
    }
    
    function delete($id)
    {
      $result = $this->efsatesis->deleteById($id);
      $salida['response'] = "OK";
      $this->output
       ->set_content_type('application/json')
       ->set_output(json_encode($salida));
      //echo json_encode($salida);
      //die;
    }
}
