<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

/* 
 */

/**
 * Description of proyectosadmin
 *
 * @author Rodrigo Santellan <rodrigo.santellan at gmail.com>
 */
class proyectoadmin extends MY_Controller{
    
  function __construct()
  {
    parent::__construct();
    $this->data['menu_id'] = 'proyectos';
    if(!$this->isLogged())
    {
      //Si no esta logeado se tiene que ir a loguear
      $this->session->set_userdata('url_to_direct_on_login', '/proyectos/proyectosadmin/index');
      redirect('auth/login'); 
    }
	$this->addJquery();
  }
  
  function index()
  {
      $this->load->model('proyectos/proyectos_model');
      $this->data['list'] = $this->proyectos_model->retrieveAll();
      $this->data['content'] = "proyectos/admin/list";
      
      $this->addJquery();
      $this->addFancyBox();
      //$this->addModuleJavascript("registros", "list.js");
      $this->load->view("admin/layout", $this->data);
  }
  
    function add()
    {
      //$this->addCKEditor();
      $this->addTinyMce();
      $this->load->model('proyectos/proyectos_model');
      $this->data['use_grid_16'] = false;
      $this->data['content'] = "proyectos/admin/add";
      $this->data['object'] = new $this->proyectos_model;
      $this->load->view("admin/layout", $this->data);
    }
    
    function edit($id)
    {
      //$this->output->enable_profiler(TRUE);
      //$this->addCKEditor();
      $this->addTinyMce();
      $this->load->model('proyectos/proyectos_model');
      $this->data['use_grid_16'] = false;
      $this->data['content'] = "proyectos/admin/edit";
      $this->data['object'] = $this->proyectos_model->getById($id);
      $this->load->view("admin/layout", $this->data);
    }

    function delete($id)
    {
      $this->load->model('proyectos/proyectos_model');
      $result = $this->proyectos_model->deleteById($id);
      $response = "ERROR";
      if($result) $response = "OK";
      $salida = array();
      $salida['response'] = $response;
      $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($salida));
    }
  
    function save()
    {
      //var_dump($_POST);die;
    //$this->output->enable_profiler(TRUE);
      //$this->addCKEditor();
      $this->addTinyMce();
      $this->load->library('form_validation');
      $this->load->model('proyectos/proyectos_model');
      // Get ID from form
      $id = $this->input->post('id', true);

      $this->form_validation->set_rules('nombre', 'nombre', 'required|max_length[255]');			
      $this->form_validation->set_rules('cliente', 'cliente', 'required|max_length[255]');			
      $this->form_validation->set_rules('tipo_de_trabajo', 'Tipo de Trabajo', 'required|max_length[1000]');			
      $this->form_validation->set_rules('descripcion', 'descripcion', 'required|max_length[1000]');
      $this->form_validation->set_error_delimiters('<p class="error">', '</p>');
      $is_valid = false;
      if (!$this->form_validation->run() == FALSE) 
      {
        $is_valid = true;
      }
      $nombre =set_value('nombre'); 
      $cliente = set_value('cliente');
      $tipo_de_trabajo = set_value('tipo_de_trabajo');
      $descripcion = set_value('descripcion');
      
      $obj = new $this->proyectos_model;
      $obj->setNombre($nombre);
      $obj->setCliente($cliente);
      $obj->setTipo_trabajo($tipo_de_trabajo);
      $obj->setDescripcion($descripcion);
      
      $obj->setId($id);
      
      if($is_valid)
      {
        //Como es valido lo salvo
        $id = $obj->save();
        $this->session->set_flashdata("salvado", "ok");
        redirect('proyectos/proyectoadmin/edit/'.$id);
      }
      else
      {
        if($obj->isNew())
        {
          $this->data['use_grid_16'] = false;
          $this->data['content'] = "proyectos/admin/add";
          $this->data['object'] = $obj;
          $this->load->view("admin/layout", $this->data);
        }
        else
        {
          $this->data['use_grid_16'] = false;
          $this->data['content'] = "proyectos/admin/edit";
          $this->data['object'] = $obj;
          $this->load->view("admin/layout", $this->data);
        }
      }
    }    
}
