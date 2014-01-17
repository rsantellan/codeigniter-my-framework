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
    
    function sortWithParameters($sortModule, $sortModel, $sortAttribute, $parameterModule, $parameterModel)
    {
        //$this->load->model($sortModule.'/'.$sortModel);
        $this->load->model($parameterModule.'/'.$parameterModel);
        $this->data['parameter_list_data'] = $this->$parameterModel->retrieveAllForSelect();
        $this->data['sort_module'] = $sortModule;
        $this->data['sort_model'] = $sortModel;
        $this->data['sort_attribute'] = $sortAttribute;
        $this->load->view('ordenable/sortableAttributes', $this->data);
    }
    
    function retrieveData()
    {
        $parameterid = $this->input->post('parameterid');
        $module = $this->input->post('sort_module');
        $model = $this->input->post('sort_model');
        $sort_attribute = $this->input->post('sort_attribute');
        $this->load->model($module.'/'.$model);
        $list = $this->$model->retrieveForSortWithParameter($sort_attribute, $parameterid);
        $salida['response'] = "OK";
        $salida['list'] = $list;
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($salida));
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


