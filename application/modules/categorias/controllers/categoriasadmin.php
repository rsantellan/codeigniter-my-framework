<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

/* 
 */

/**
 * Description of categoriasadmin
 *
 * @author Rodrigo Santellan <rodrigo.santellan at gmail.com>
 */
class categoriasadmin extends MY_Controller{
    
  function __construct()
  {
    parent::__construct();
    $this->data['menu_id'] = 'categorias';
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
      $this->load->model('categorias/categorias_model');
      $this->data['list'] = $this->categorias_model->retrieveAll();
      $this->data['content'] = "categorias/admin/list";
      $this->load->helper('htmlpurifier');
      $this->load->helper('text');
      $this->addJquery();
      $this->addColorbox();
      //$this->addModuleJavascript("registros", "list.js");
      $this->load->view("admin/layout", $this->data);
  }
  
    function add()
    {
      //$this->addCKEditor();
      $this->addTinyMce();
      $this->load->model('categorias/categorias_model');
      $this->data['use_grid_16'] = false;
      $this->data['content'] = "categorias/admin/add";
      $this->data['object'] = new $this->categorias_model;
      $this->load->view("admin/layout", $this->data);
    }
    
    function edit($id)
    {
      //$this->output->enable_profiler(TRUE);
      //$this->addCKEditor();
      $this->addTinyMce();
      $this->load->model('categorias/categorias_model');
      $this->data['use_grid_16'] = false;
      $this->data['content'] = "categorias/admin/edit";
      $this->data['object'] = $this->categorias_model->getById($id);
      $this->load->view("admin/layout", $this->data);
    }

    function delete($id)
    {
      $this->load->model('categorias/categorias_model');
      $result = $this->categorias_model->deleteById($id);
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
      $this->load->model('categorias/categorias_model');
      // Get ID from form
      $id = $this->input->post('id', true);

      $this->form_validation->set_rules('nombre', 'nombre', 'required|max_length[255]');
      $this->form_validation->set_rules('descripcion', 'descripcion', 'max_length[1000]');
      $this->form_validation->set_error_delimiters('<p class="error">', '</p>');
      $is_valid = false;
      if (!$this->form_validation->run() == FALSE) 
      {
        $is_valid = true;
      }
      $nombre =set_value('nombre'); 
      $description = set_value('descripcion');
      
      $obj = new $this->categorias_model;
      $obj->setName($nombre);
      $obj->setDescription($description);
      
      $obj->setId($id);
      
      if($is_valid)
      {
        //Como es valido lo salvo
        $id = $obj->save();
        $this->session->set_flashdata("salvado", "ok");
        redirect('categorias/categoriasadmin/edit/'.$id);
      }
      else
      {
        if($obj->isNew())
        {
          $this->data['use_grid_16'] = false;
          $this->data['content'] = "categorias/admin/add";
          $this->data['object'] = $obj;
          $this->load->view("admin/layout", $this->data);
        }
        else
        {
          $this->data['use_grid_16'] = false;
          $this->data['content'] = "categorias/admin/edit";
          $this->data['object'] = $obj;
          $this->load->view("admin/layout", $this->data);
        }
      }
    }
    
    function sort()
    {
      $this->load->model('categorias/categorias_model');
      $this->data['sort_list'] = $this->categorias_model->retrieveForSort();
      
      $this->load->view('categorias/admin/sortable', $this->data);
    }
    
    function applySort()
    {
      $lista = $this->input->post('listItem');
      $this->load->model('categorias/categorias_model');
      /*
      $cantidad = count($lista) - 1;
      while($cantidad >= 0)
      {
        //echo $lista[$cantidad] . " - ".$cantidad . "|";
        $this->categorias_model->updateOrder($lista[$cantidad], $cantidad);
        $cantidad --;
      }
      */
      $cantidad = 0;
      while($cantidad <= count($lista) - 1)
      {
        //echo $lista[$cantidad] . " - ".$cantidad . "|";
        $this->categorias_model->updateOrder($lista[$cantidad], (count($lista) - $cantidad));
        $cantidad ++;
      }
      
      $salida = array();
      $salida['response'] = "OK";
      
      echo json_encode($salida);
      die;
    }
}
