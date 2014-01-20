<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/*
 */

/**
 * Description of jornadatemas
 *
 * @author Rodrigo Santellan
 */
class jornadatemas extends MY_Controller{
  
    function __construct()
    {
      parent::__construct();
      $this->data['menu_id'] = 'jornadatemas';
      if(!$this->isLogged())
      {
        //Si no esta logeado se tiene que ir a loguear
        $this->session->set_userdata('url_to_direct_on_login', 'jornadatemas/index');
        redirect('auth/login'); 
      }

    }
    
    function index($jornadaId = null){
      //$this->output->enable_profiler(TRUE);  
      //var_dump($jornadaId);
      $this->load->model('jornadatemas/jornadatema');
      
      $this->data['objects_list'] = $this->jornadatema->retrieveAll(false, true, $jornadaId);
      $this->data['content'] = "jornadatemas/list";
      $this->load->helper('upload/mimage');
      $this->load->library('upload/mupload');
      $this->load->model('jornadas/jornada');
      $nombreJornada = null;
      if($jornadaId !== null)
      {
          $this->load->model('jornadas/jornada');
          $jornada = $this->jornada->getById($jornadaId, false);
          $nombreJornada = $jornada->name;
      }
      $this->data['nombreJornada'] = $nombreJornada;
      $this->data['jornadas_list'] = $this->jornada->retrieveAllForSelect();
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
      $this->load->model('jornadas/jornada');
      $this->data['jornadas_list'] = $this->jornada->retrieveAllForSelect();  
      $this->load->model('jornadatemas/jornadatema');
      $this->addModuleJavascript("admin", "adminManager.js");
      $this->addModuleJavascript("admin", "tiny_mce/tiny_mce_src.js");
      $this->data['use_grid_16'] = false;
      $this->data['content'] = "jornadatemas/add";
      $this->data['object'] = new $this->jornadatema;
      $this->load->view("admin/layout", $this->data);
    }
    
    function edit($id)
    {
      $this->addJquery();
      $this->addFancyBox();
      $this->addModuleJavascript("admin", "adminManager.js");
      $this->addModuleJavascript("admin", "tiny_mce/tiny_mce_src.js");
      $this->addModuleStyleSheet("upload", "albums.css");
      $this->addModuleJavascript("upload", "imagesAdmin.js");
      $this->load->model('jornadas/jornada');
      $this->data['jornadas_list'] = $this->jornada->retrieveAllForSelect();  
      
      $this->load->model('jornadatemas/jornadatema');
      $this->data['use_grid_16'] = false;
      $this->data['content'] = "jornadatemas/edit";
      $this->data['object'] = $this->jornadatema->getById($id);
      $this->load->view("admin/layout", $this->data);
    }
    
    function save()
    {
      $this->load->library('form_validation');
      $this->load->model('jornadatemas/jornadatema');
      $this->load->model('jornadas/jornada');
      $this->data['jornadas_list'] = $this->jornada->retrieveAllForSelect();  
      // Get ID from form
      $id = $this->input->post('id', true);
      
      
      $this->form_validation->set_rules('name', 'name', 'required|max_length[255]');			
      $this->form_validation->set_rules('orator', 'orator', 'max_length[255]');
      $this->form_validation->set_rules('jornadaid', 'jornadaid', 'required');
        
      $this->form_validation->set_error_delimiters('<p class="error">', '</p>');
      
      $is_valid = false;
      if (!$this->form_validation->run() == FALSE) 
      {
        $is_valid = true;
      }
      $name = set_value('name');
      $orator = set_value('orator');
      $jornadaid = set_value('jornadaid');
      //var_dump($nombre);
      $obj = new $this->jornadatema;
      $obj->setName($name);
      $obj->setOrator($orator);
      $obj->setJornadaid($jornadaid);
      $obj->setId($id);
      
      
      if($is_valid)
      {
        //Como es valido lo salvo
        $id = $obj->save();
        $this->session->set_flashdata("salvado", "ok");
        redirect('jornadatemas/edit/'.$id);
      }
      else
      {
        $this->addModuleJavascript("admin", "adminManager.js");
        $this->addModuleJavascript("admin", "tiny_mce/tiny_mce_src.js");
        if($obj->isNew())
        {
          $this->data['use_grid_16'] = false;
          $this->data['content'] = "jornadatemas/add";
          $this->data['object'] = $obj;
          $this->load->view("admin/layout", $this->data);
        }
        else
        {
          $this->data['use_grid_16'] = false;
          $this->data['content'] = "jornadatemas/edit";
          $this->data['object'] = $obj;
          $this->load->view("admin/layout", $this->data);
        }
      }
    }
    
    function delete($id)
    {
      $this->load->model('jornadatemas/jornadatema');
      $result = $this->jornadatema->deleteById($id);
      $salida['response'] = "OK";
      $this->output
       ->set_content_type('application/json')
       ->set_output(json_encode($salida));
      //echo json_encode($salida);
      //die;
    }
}
