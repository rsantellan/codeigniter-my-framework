<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/*
 */

/**
 * Description of trabajaconnosotros
 *
 * @author Rodrigo Santellan
 */
class trabajaconnosotros extends MY_Controller{
  
    function __construct()
    {
      parent::__construct();
      $this->data['menu_id'] = 'trabajaconnosotros';
      if(!$this->isLogged())
      {
        //Si no esta logeado se tiene que ir a loguear
        $this->session->set_userdata('url_to_direct_on_login', 'trabajaconnosotros/index');
        redirect('auth/login'); 
      }

    }
    
    function index(){
      //$this->output->enable_profiler(TRUE);  
      $this->load->model('trabajaconnosotros/curriculum');
      $this->data['objects_list'] = $this->curriculum->retrieveAll();
      $this->data['content'] = "trabajaconnosotros/list";
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
    
    function show($id)
    {
      $this->load->model('trabajaconnosotros/curriculum');
      $this->data['use_grid_16'] = false;
      $this->data['content'] = "trabajaconnosotros/show";
      $this->data['object'] = $this->curriculum->getById($id);
      $this->load->view("admin/layout", $this->data);
    }
    
    function cv($id)
    {
      $this->load->model('trabajaconnosotros/curriculum');
      $obj = $this->curriculum->getById($id);
      $this->load->helper('download');
      $data = file_get_contents($obj->cvfile.$obj->cv); // Read the file's contents
      $name = $obj->cv;
      force_download($name, $data);
      
    }
    
    function delete($id)
    {
      $this->load->model('trabajaconnosotros/curriculum');
      $result = $this->curriculum->deleteById($id);
      $salida['response'] = "OK";
      $this->output
       ->set_content_type('application/json')
       ->set_output(json_encode($salida));
      //echo json_encode($salida);
      //die;
    }
}
