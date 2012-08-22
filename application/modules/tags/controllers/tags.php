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
class tags extends MY_Controller{
  
    function __construct()
    {
      parent::__construct();
      //$this->data['menu_id'] = 'actas';
      if(!$this->isLogged())
      {
        //Si no esta logeado se tiene que ir a loguear
        $this->session->set_userdata('url_to_direct_on_login', 'actaadmin/index');
        redirect('auth/login'); 
      }
      
    }
    
    /**
     * 
     * Esto pertenece solo a los tags
     * 
     * 
     */
    
    function index()
    {
      $this->load->model('tags/tag');
      $tags_list = $this->tag->retrieveAllTags(true);
      $table = $this->load->view('tags/list_table', array('list' => $tags_list), true);
      $this->load->view('tags/list', array('table' => $table));
    }
    
    function addTag()
    {
      $this->load->model('tags/tag');
      $data['object'] = new $this->tag;
      $body = $this->load->view('tags/form', $data, true);
      $salida = array();
      $salida['body'] = $body;
      $salida['response'] = "OK";
      $this->output
         ->set_content_type('application/json')
         ->set_output(json_encode($salida));
    }
    
    function editTag($id)
    {
      
      $this->load->model('tags/tag');
      $data['object'] = $this->tag->getById($id);
      $body = $this->load->view('tags/form', $data, true);
      $salida = array();
      $salida['body'] = $body;
      $salida['response'] = "OK";
      $this->output
         ->set_content_type('application/json')
         ->set_output(json_encode($salida));
    }
    
    function save()
    {
      $this->load->library('form_validation');
      $this->load->model('tags/tag');
      // Get ID from form
      $id = $this->input->post('id', true);
      
      //$this->form_validation->set_rules('id', 'id', '');			
      $this->form_validation->set_rules('nombre', 'nombre', 'required|max_length[255]');
        
      $this->form_validation->set_error_delimiters('<p class="error">', '</p>');
      
      $is_valid = false;
      if (!$this->form_validation->run() == FALSE) 
      {
        $is_valid = true;
      }
      $nombre = set_value('nombre');
      //var_dump($nombre);
      $obj = new $this->tag;
      $obj->setName($nombre);
      $obj->setId($id);
      //var_dump($obj);
      
      if($is_valid)
      {
        //Como es valido lo salvo
        $is_new = $obj->isNew();
        $id = $obj->save();
        $salida['response'] = "OK";
        $salida['id'] = $id;
        $salida['name'] = $nombre;
        $salida['is_new'] = $is_new;
        $tags_list = $this->tag->retrieveAllTags(true);
        $table = $this->load->view('tags/list_table', array('list' => $tags_list), true);
        $salida['table'] = $table;
        $this->output
           ->set_content_type('application/json')
           ->set_output(json_encode($salida));
        //redirect('actaadmin/edit/'.$id);
      }
      else
      {
          $data['object'] = $obj;
          $body = $this->load->view('tags/form', $data, true);
          $salida = array();
          $salida['body'] = $body;
          $salida['response'] = "ERROR";
          $this->output
             ->set_content_type('application/json')
             ->set_output(json_encode($salida));
      }
    }    
    
    
    function deleteTag($id)
    {
      $this->load->model('tags/tag');
      $result = $this->tag->deleteById($id);
      $salida['response'] = "OK";
      $this->output
       ->set_content_type('application/json')
       ->set_output(json_encode($salida));
    }
    
    
    /**
     *
     * Esto solo pertenece a las actas
     * 
     * 
     * 
     */
    
    
    function viewActas($parameters)
    {
      //$this->output->enable_profiler(TRUE);
      $this->load->model('tags/tags_actas');
      $this->load->model('tags/tag');
      $id = $parameters["id"];
      $data = $this->retrieveViewActasData($id);
      $this->load->view('tags/actasTags', $data);
    }
    
    private function retrieveViewActasData($id)
    {
      
      $tags_used = $this->tag->retrieveAllTagsOfObject($this->tags_actas->retrieveTableName(), "id_acta", $id, true);
      $tags_list = $this->tag->retrieveAllTags(true);
      $data['tags'] = $this->tag->removeDuplicated($tags_list, $tags_used);
      $data['tags_used'] = $tags_used;
      $data['id'] = $id;
      return $data;
    }
    
    function addActaTag()
    {
      $actaId = $this->input->post("actaId");
      $tagId = $this->input->post("tagId");
      $this->load->model('tags/tags_actas');
      $this->tags_actas->save($actaId, $tagId);
      $this->load->model('tags/tag');
      $data = $this->retrieveViewActasData($actaId);
      $body = $this->load->view('tags/actasTags', $data, true);
      $salida = array();
      $salida['body'] = $body;
      $salida['response'] = "OK";
      $this->output
         ->set_content_type('application/json')
         ->set_output(json_encode($salida));
    }
    
    function removeActaTag()
    {
      $actaId = $this->input->post("actaId");
      $tagId = $this->input->post("tagId");
      $this->load->model('tags/tags_actas');
      $this->tags_actas->remove($actaId, $tagId);
      $this->load->model('tags/tag');
      $data = $this->retrieveViewActasData($actaId);
      $body = $this->load->view('tags/actasTags', $data, true);
      $salida = array();
      $salida['body'] = $body;
      $salida['response'] = "OK";
      $this->output
         ->set_content_type('application/json')
         ->set_output(json_encode($salida));
    }
    
    function refreshActasTags($id)
    {
      $this->load->model('tags/tag');
      $this->load->model('tags/tags_actas');
      $data = $this->retrieveViewActasData($id);
      $body = $this->load->view('tags/actasTags', $data, true);
      $salida = array();
      $salida['body'] = $body;
      $salida['response'] = "OK";
      $this->output
         ->set_content_type('application/json')
         ->set_output(json_encode($salida));
    }

    /**
     *
     * Esto solo pertenece a las novedades
     * 
     * 
     * 
     */
    
    
    function viewNovedades($parameters)
    {
      //$this->output->enable_profiler(TRUE);
      $this->load->model('tags/tags_novedades');
      $this->load->model('tags/tag');
      $id = $parameters["id"];
      $data = $this->retrieveViewNovedadesData($id);
      $this->load->view('tags/novedadesTags', $data);
    }
    
    private function retrieveViewNovedadesData($id)
    {
      
      $tags_used = $this->tag->retrieveAllTagsOfObject($this->tags_novedades->retrieveTableName(), "id_novedad", $id, true);
      $tags_list = $this->tag->retrieveAllTags(true);
      $data['tags'] = $this->tag->removeDuplicated($tags_list, $tags_used);
      $data['tags_used'] = $tags_used;
      $data['id'] = $id;
      return $data;
    }
    
    function addNovedadTag()
    {
      $actaId = $this->input->post("actaId");
      $tagId = $this->input->post("tagId");
      $this->load->model('tags/tags_novedades');
      $this->tags_novedades->save($actaId, $tagId);
      $this->load->model('tags/tag');
      $data = $this->retrieveViewNovedadesData($actaId);
      $body = $this->load->view('tags/novedadesTags', $data, true);
      $salida = array();
      $salida['body'] = $body;
      $salida['response'] = "OK";
      $this->output
         ->set_content_type('application/json')
         ->set_output(json_encode($salida));
    }
    
    function removeNovedadTag()
    {
      $actaId = $this->input->post("actaId");
      $tagId = $this->input->post("tagId");
      $this->load->model('tags/tags_novedades');
      $this->tags_novedades->remove($actaId, $tagId);
      $this->load->model('tags/tag');
      $data = $this->retrieveViewNovedadesData($actaId);
      $body = $this->load->view('tags/novedadesTags', $data, true);
      $salida = array();
      $salida['body'] = $body;
      $salida['response'] = "OK";
      $this->output
         ->set_content_type('application/json')
         ->set_output(json_encode($salida));
    }
    
    function refreshNovedadesTags($id)
    {
      $this->load->model('tags/tag');
      $this->load->model('tags/tags_novedades');
      $data = $this->retrieveViewNovedadesData($id);
      $body = $this->load->view('tags/novedadesTags', $data, true);
      $salida = array();
      $salida['body'] = $body;
      $salida['response'] = "OK";
      $this->output
         ->set_content_type('application/json')
         ->set_output(json_encode($salida));
    }

    
}
