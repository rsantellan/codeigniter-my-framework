<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

/* 
 */

/**
 * Description of blog
 *
 * @author Rodrigo Santellan
 */
class blog extends MY_Controller
{
  
  function __construct()
  {
    parent::__construct();
    $this->data['menu_id'] = 'blog';
  }
  
  public function index($id = null)
  {
    $this->output->enable_profiler(TRUE);

    $this->load->model('blog/blog_model');
    //Tengo que obtener el ultimo blog.
    
    if(is_null($id))
    {
      $this->data['mBlog'] = $this->blog_model->retrieveLast();
    }
    else
    {
      $this->data['mBlog'] = $this->blog_model->getById($id);
    }
    //Tengo que obtener la lista de nombres que no incluyan los anteriores
    $this->data['list'] = $this->blog_model->retrieveAll(true, "updated_at");
    
    //Preparo la salida
    $this->data['content'] = 'blog/index';
    $this->load->view('layout', $this->data);
  }
   
}
