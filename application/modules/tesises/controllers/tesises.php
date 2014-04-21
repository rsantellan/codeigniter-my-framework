<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/*
 */

/**
 * Description of actaadmin
 *
 * @author Rodrigo Santellan <rodrigo.santellan at inswitch.us>
 */
class tesises extends MY_Controller{
  
    private $layout = 'admin/layout_bootstrap';
    
    
    function __construct()
    {
      parent::__construct();
      $this->data['menu'] = 'tesises';
      if(!$this->isLogged())
      {
        //Si no esta logeado se tiene que ir a loguear
        $this->session->set_userdata('url_to_direct_on_login', 'tesises/index');
        redirect('auth/login'); 
      }
      $this->load->model('tesises/tesis');
    }
    
    function index(){
      $this->addColorbox();
      $this->addAdminBasicJs();
      $this->data['list'] = $this->tesis->retrieveAll();
      $this->data['content'] = "tesises/list";
      $this->load->helper('text');
      $this->load->helper('htmlpurifier');
      $this->addBootstrapDataTable();
      $this->addModuleJavascript('admin', 'start-datatable.js');
      $this->load->view($this->layout, $this->data);
    }
    
    
    function add()
    {
      $this->data['content'] = "tesises/add";
      $this->data['object'] = new $this->tesis;
      $this->load->view($this->layout, $this->data);
    }
    
    function edit($id)
    {
      //var_dump(FCPATH);
      $this->data['content'] = "tesises/edit";
      $this->data['object'] = $this->tesis->getById($id);
      $this->load->view($this->layout, $this->data);
    }
    
    function save()
    {
      $this->load->library('form_validation');
      
      // Get ID from form
      $id = $this->input->post('id', true);
      
      //$this->form_validation->set_rules('id', 'id', '');			
      $this->form_validation->set_rules('titulo', 'titulo', 'required|max_length[255]');
      $this->form_validation->set_rules('subtitulo', 'Autor', 'required|max_length[255]');
      $this->form_validation->set_rules('orientadores', 'orientadores', 'required|max_length[255]');
      $this->form_validation->set_rules('tribunal', 'tribunal', 'required|max_length[255]');
      $this->form_validation->set_rules('defensa', 'defensa', 'required|max_length[255]');
      $this->form_validation->set_rules('academica', 'academica', 'max_length[255]');
      
      $this->form_validation->set_error_delimiters('<p class="error">', '</p>');
      
      $is_valid = false;
      if (!$this->form_validation->run() == FALSE) 
      {
        $is_valid = true;
      }
      $titulo = set_value('titulo');
      $subtitulo = set_value('subtitulo');
      $orientadores = set_value('orientadores');
      $tribunal = set_value('tribunal');
      $defensa = set_value('defensa');
      $academica = set_value('academica');
      
      //var_dump($nombre);
      $obj = new $this->tesis;
      $obj->setTitulo($titulo);
      $obj->setSubtitulo($subtitulo);
      $obj->setOrientadores($orientadores);
      $obj->setTribunal($tribunal);
      $obj->setDefensa($defensa);
      $obj->setAcademica($academica);
      
      $obj->setId($id);
      
      
      if($is_valid)
      {
        //Como es valido lo salvo
        $id = $obj->save();
        $this->session->set_flashdata("salvado", "ok");
        redirect('tesises/edit/'.$id);
      }
      else
      {
        if($obj->isNew())
        {
          $this->data['use_grid_16'] = false;
          $this->data['content'] = "tesises/add";
          $this->data['object'] = $obj;
          $this->load->view($this->layout, $this->data);
        }
        else
        {
          $this->data['content'] = "tesises/edit";
          $this->data['object'] = $obj;
          $this->load->view($this->layout, $this->data);
        }
      }
    }
    
    function delete($id)
    {
      $result = $this->tesis->deleteById($id);
      $salida['response'] = "OK";
      $this->output
       ->set_content_type('application/json')
       ->set_output(json_encode($salida));
      //echo json_encode($salida);
      //die;
    }
}
