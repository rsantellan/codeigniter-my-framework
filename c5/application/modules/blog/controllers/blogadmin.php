<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

/* 
 */

/**
 * Description of blogadmin
 *
 * @author Rodrigo Santellan <rodrigo.santellan at inswitch.us>
 */
class blogadmin extends MY_Controller{
    
  function __construct()
  {
    parent::__construct();
    $this->data['menu_id'] = 'blog';
    if(!$this->isLogged())
    {
      //Si no esta logeado se tiene que ir a loguear
      $this->session->set_userdata('url_to_direct_on_login', '/blog/blogadmin/index');
      redirect('auth/login'); 
    }
	$this->addJquery();
  }
  
  function index()
  {
      $this->load->model('blog/blog_model');
      $this->data['list'] = $this->blog_model->retrieveAll();
      $this->data['content'] = "blog/admin/list";
      
      $this->addJquery();
      $this->addFancyBox();
      //$this->addModuleJavascript("registros", "list.js");
      $this->load->view("admin/layout", $this->data);
  }
  
    function add()
    {
      //$this->addCKEditor();
      $this->addTinyMce();
      $this->load->model('blog/blog_model');
      $this->data['use_grid_16'] = false;
      $this->data['content'] = "blog/admin/add";
      $this->data['object'] = new $this->blog_model;
      $this->load->view("admin/layout", $this->data);
    }
    
    function edit($id)
    {
      //$this->output->enable_profiler(TRUE);
      //$this->addCKEditor();
      $this->addTinyMce();
      $this->load->model('blog/blog_model');
      $this->data['use_grid_16'] = false;
      $this->data['content'] = "blog/admin/edit";
      $this->data['object'] = $this->blog_model->getById($id);
      $this->load->view("admin/layout", $this->data);
    }

    function save()
    {
      //var_dump($_POST);die;
    //$this->output->enable_profiler(TRUE);
      //$this->addCKEditor();
      $this->addTinyMce();
      $this->load->library('form_validation');
      $this->load->model('blog/blog_model');
      // Get ID from form
      $id = $this->input->post('id', true);
      
      $this->form_validation->set_rules('title', 'title', 'required|max_length[255]');			
      $this->form_validation->set_rules('body', 'body', '');			
      $this->form_validation->set_rules('visible', 'visible', '');
      $this->form_validation->set_error_delimiters('<p class="error">', '</p>');
      $is_valid = false;
      if (!$this->form_validation->run() == FALSE) 
      {
        $is_valid = true;
      }
      $title =set_value('title'); 
      $body = set_value('body');
      $visible = set_value('visible');
      
      $obj = new $this->blog_model;
      $obj->setTitle($title);
      $obj->setId($id);
      $obj->setBody($body);
      $obj->setVisible($visible);
      
      if($is_valid)
      {
        //Como es valido lo salvo
        $id = $obj->save();
        $this->session->set_flashdata("salvado", "ok");
        redirect('blog/blogadmin/edit/'.$id);
      }
      else
      {
        if($obj->isNew())
        {
          $this->data['use_grid_16'] = false;
          $this->data['content'] = "blog/admin/add";
          $this->data['object'] = $obj;
          $this->load->view("admin/layout", $this->data);
        }
        else
        {
          $this->data['use_grid_16'] = false;
          $this->data['content'] = "blog/admin/edit";
          $this->data['object'] = $obj;
          $this->load->view("admin/layout", $this->data);
        }
      }
    }    
}
