<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ordenable
 *
 * @author rodrigo
 */
class ordenable extends MY_Controller{
    
    function __construct()
    {
      parent::__construct();
      $this->data['menu_id'] = 'admin';
      if(!$this->isLogged())
      {
        //Si no esta logeado se tiene que ir a loguear
        $this->session->set_userdata('url_to_direct_on_login', 'admin/index');
        redirect('auth/login'); 
      }

    }
    
    function sort($module, $model, $showField)
    {
        $this->load->model($module.'/'.$model);
        $this->data['sort_list'] = $this->$model->retrieveForSort($showField);
        $this->data['sort_field'] = $showField;
        $this->data['sort_module'] = $module;
        $this->data['sort_model'] = $model;
        $this->load->view('ordenable/sortable', $this->data);
    }
    
    function applySort()
    {
        $lista = $this->input->post('listItem');
        $module = $this->input->post('module');
        $model = $this->input->post('model');
        
        $this->load->model($module.'/'.$model);
        $maximo = count($lista) - 1;
        $cantidad = 0;
        while($cantidad <= $maximo)
        {
          $this->$model->updateOrder($lista[$maximo - $cantidad], $cantidad);
          $cantidad ++;
        }
        $salida = array();
        $salida['response'] = "OK";
      
        echo json_encode($salida);
        die;
    }
}


