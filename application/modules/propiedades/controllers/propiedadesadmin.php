<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

/* 
 */

/**
 * Description of propiedadesadmin
 *
 * @author Rodrigo Santellan <rodrigo.santellan at gmail.com>
 */
class propiedadesadmin extends MY_Controller{
    
  function __construct()
  {
    parent::__construct();
    $this->data['menu_id'] = 'propiedades';
    if(!$this->isLogged())
    {
      //Si no esta logeado se tiene que ir a loguear
      $this->session->set_userdata('url_to_direct_on_login', '/propiedades/propiedadesadmin/index');
      redirect('auth/login'); 
    }
	$this->addJquery();
  }
  
  function index()
  {
      //$this->output->enable_profiler(TRUE);
      $this->load->model('propiedades/propiedad_model');
      $this->data['list'] = $this->propiedad_model->retrieveAll();
      $this->data['content'] = "propiedades/admin/list";
      $this->load->helper('text');
      $this->addJquery();
      $this->addFancyBox();
      //$this->addModuleJavascript("registros", "list.js");
      $this->load->view("admin/layout", $this->data);
  }
  
    function add()
    {
      //$this->addCKEditor();
      $this->addTinyMce();
      $this->load->model('propiedades/propiedad_model');
      $this->data['use_grid_16'] = false;
      $this->data['content'] = "propiedades/admin/add";
      $this->data['object'] = new $this->propiedad_model;
      $this->load->view("admin/layout", $this->data);
    }
    
    function edit($id)
    {
      //$this->output->enable_profiler(TRUE);
      //$this->addCKEditor();
      $this->addTinyMce();
      $this->load->model('propiedades/propiedad_model');
      
      $this->data['use_grid_16'] = false;
      $this->data['content'] = "propiedades/admin/edit";
      $this->data['object'] = $this->propiedad_model->getById($id);
      $this->addUploadModuleAssets();
      $this->load->view("admin/layout", $this->data);
    }

    function delete($id)
    {
      $this->load->model('propiedades/propiedad_model');
      $result = $this->propiedad_model->deleteById($id);
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
      $this->load->model('propiedades/propiedad_model');
      // Get ID from form
      $id = $this->input->post('id', true);

      $this->form_validation->set_rules('titulo', 'titulo', 'required|max_length[255]');
      $this->form_validation->set_rules('detalle', 'Detalle', 'required|max_length[1000]');			
      $this->form_validation->set_rules('ubicacion', 'Ubicacion', 'required|max_length[255]');			
      $this->form_validation->set_rules('garantia', 'Garantia', 'max_length[255]');			
      $this->form_validation->set_rules('financia', 'Financia', 'max_length[255]');			
      $this->form_validation->set_rules('metros', 'Metros', 'is_numeric');			
      $this->form_validation->set_rules('dormitorios', 'Dormitorios', 'max_length[255]');			
      $this->form_validation->set_rules('banos', 'Baños', 'is_numeric');			
      $this->form_validation->set_rules('calefaccion', 'Calefacción', 'max_length[255]');			
      $this->form_validation->set_rules('garage', 'Garage', '');			
      $this->form_validation->set_rules('precio_alquiler', 'precio_alquiler', 'is_numeric');			
      $this->form_validation->set_rules('moneda_alquiler', 'moneda_alquiler', '');
      $this->form_validation->set_rules('precio_venta', 'precio_venta', 'is_numeric');			
      $this->form_validation->set_rules('moneda_venta', 'moneda_venta', '');
      $this->form_validation->set_rules('visibilidad', 'visibilidad', '');
      $this->form_validation->set_rules('alquiler', 'alquiler', '');
      $this->form_validation->set_rules('alquiler_temporal', 'alquiler_temporal', '');
      $this->form_validation->set_rules('venta', 'venta', '');
	  $this->form_validation->set_rules('esta_alquilada', 'esta_alquilada', '');
      $this->form_validation->set_rules('esta_vendida', 'esta_vendida', '');
      $this->form_validation->set_error_delimiters('<p class="error">', '</p>');
      $is_valid = false;
      if (!$this->form_validation->run() == FALSE) 
      {
        $is_valid = true;
      }
      $titulo =set_value('titulo'); 
      $detalle = set_value('detalle');
      $ubicacion = set_value('ubicacion');
      $garantia = set_value('garantia');
      $financia = set_value('financia');
      $metros = set_value('metros');
      $dormitorios = set_value('dormitorios');
      $banos = set_value('banos');
      $calefaccion = set_value('calefaccion');
      $garage = set_value('garage');
      $precio_alquiler = set_value('precio_alquiler');
      $moneda_alquiler = set_value('moneda_alquiler');
      $precio_venta = set_value('precio_venta');
      $moneda_venta = set_value('moneda_venta');
      $visibilidad = set_value('visibilidad');
      $alquiler = set_value('alquiler');
      $alquiler_temporal = set_value('alquiler_temporal');
      $venta = set_value('venta');
      $esta_alquilada = set_value('esta_alquilada');
      $esta_vendida = set_value('esta_vendida');
	  
      $obj = new $this->propiedad_model;
      $obj->setTitulo($titulo);
      $obj->setDetalle($detalle);
      $obj->setUbicacion($ubicacion);
      $obj->setGarantia($garantia);
	  $obj->setFinancia($financia);
      $obj->setMetros($metros);
      $obj->setDormitorios($dormitorios);
      $obj->setBanios($banos);
      $obj->setCalefaccion($calefaccion);
      $obj->setGarage($garage);
	  $obj->setPrecioAlquiler($precio_alquiler);
	  $obj->setMonedaAlquiler($moneda_alquiler);
	  $obj->setPrecioVenta($precio_venta);
	  $obj->setMonedaVenta($moneda_venta);
      $obj->setVisible($visibilidad);
      $obj->setAlquiler($alquiler);
      $obj->setAlquilerTemporal($alquiler_temporal);
      $obj->setVenta($venta);
	  $obj->setEstaAlquilada($esta_alquilada);
	  $obj->setEstaVendida($esta_vendida);
	  
      $obj->setId($id);
      
      if($is_valid)
      {
        //Como es valido lo salvo
        $id = $obj->save();
        $this->session->set_flashdata("salvado", "ok");
        redirect('propiedades/propiedadesadmin/edit/'.$id);
      }
      else
      {
        $this->load->model('categorias/categorias_model');
        $this->data['category_list'] = $this->categorias_model->retrieveAll();
        if($obj->isNew())
        {
          $this->data['use_grid_16'] = false;
          $this->data['content'] = "propiedades/admin/add";
          $this->data['object'] = $obj;
          $this->load->view("admin/layout", $this->data);
        }
        else
        {
          $this->addUploadModuleAssets();
          $this->data['use_grid_16'] = false;
          $this->data['content'] = "propiedades/admin/edit";
          $this->data['object'] = $obj;
          $this->load->view("admin/layout", $this->data);
        }
      }
    }
    
    function sort()
    {
      //$this->output->enable_profiler(TRUE);
      $this->load->model('propiedades/propiedad_model');
      $this->data['sort_list'] = $this->propiedad_model->retrieveForSort();
      
      $this->load->view('propiedades/admin/sortable', $this->data);
    }
    
    function applySort()
    {
      $lista = $this->input->post('listItem');
      $this->load->model('propiedades/propiedad_model');
      //$this->output->enable_profiler(TRUE);
      /*
      $cantidad = count($lista) - 1;
      while($cantidad >= 0)
      {
        //echo $lista[$cantidad] . " - ".$cantidad . "|";
        $this->propiedad_model->updateOrder($lista[$cantidad], $cantidad);
        $cantidad --;
      }
      */
      $cantidad = 0;
      while($cantidad <= count($lista) - 1)
      {
        //echo $lista[$cantidad] . " - ".$cantidad . "|";
        $this->propiedad_model->updateOrder($lista[$cantidad], (count($lista) - $cantidad));
        $cantidad ++;
      }
      
      $salida = array();
      $salida['response'] = "OK";
      
      echo json_encode($salida);
      //die;
    }
}
