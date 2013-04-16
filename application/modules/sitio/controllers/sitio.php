<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of sitio
 *
 * @author Rodrigo Santellan
 */

class Sitio extends MY_Controller {
  
  function __construct() {
    parent::__construct();
    //$this->loadI18n("global", "", FALSE, TRUE, "", "sitio");
    //$this->output->cache(1);
    $this->data['servicio_id'] = "";
  }
  
  public function index()
  {
    //$this->data['slider'] = true;
    $this->data['content'] = 'home';
    $this->addStyleSheet('global.css');
    $this->addJavascript("jquery.panelgallery-2.0.0.js");
    $this->addJavascript("index_slider.js");
    $this->addJquery();
    $this->load->view('layout', $this->data);
  }
  
  public function quienesSomos()
  {
    $this->data['content'] = 'quienessomos';
    $this->data['menu_id'] = 'quienessomos';
    $this->load->view('layout', $this->data);
  }
  
  public function obras()
  {
    $this->data['content'] = 'obras';
    $this->data['menu_id'] = 'obras';
    $this->load->view('layout', $this->data);
  }
  
  public function proyectos()
  {
    $this->data['content'] = 'proyectos';
    $this->data['menu_id'] = 'proyectos';
    $this->addJquery();
    $this->addJavascript("proyectos.js");
    $this->addJavascript("jquery.fancybox-1.3.4.pack.js");
    $this->addJavascript("jquery.mousewheel-3.0.4.pack.js");
    $this->addStyleSheet("jquery.fancybox-1.3.4.css");
    $this->load->view('layout', $this->data);
  }
  
  
  public function alquileres()
  {
    $this->data['menu_id'] = 'alquileres';
    $this->data['content'] = 'alquiler';
    $this->load->model('propiedades/propiedad_model');
    $this->data['zonas'] = $this->propiedad_model->retrieveDistinct("ubicacion");
    $this->data['dormitorios'] = $this->propiedad_model->retrieveDistinct("dormitorios");
    $this->data['banos'] = $this->propiedad_model->retrieveDistinct("banos");
    $this->data['garage'] = $this->propiedad_model->retrieveDistinct("garage");
    $this->load->helper('upload/mimage');
    $this->load->library('upload/mupload');
    $this->load->helper('text');
    $this->data['apartamentos_list'] = $this->propiedad_model->retrieveAllWithImage(true, false, NULL);
    //$this->output->enable_profiler(TRUE);
    $this->load->view('layout', $this->data);
  }
  
  public function searchAlquiler()
  {
    $this->data['menu_id'] = 'alquileres';
    $this->data['content'] = 'alquiler';
    $this->load->model('propiedades/propiedad_model');
    
    /***
     * Obtengo los datos de la consulta
     **/
    $operacion = $this->input->get('operacion');
    $type = $this->input->get('type');
    $zone = $this->input->get('zone');
    $price = $this->input->get('price');
    $bedroom = $this->input->get('bedroom');
    $bathroom = $this->input->get('bathroom');
    $garage = $this->input->get('garage');
    
    $parameteres = array(
        'operacion' => $operacion,
        //'type' => $type,
        'ubicacion' => $zone,
        'dormitorios' => $bedroom,
        'banos' => $bathroom,
        'garage' => $garage,
    );
    if($zone == "0")
    {
      unset($parameteres['ubicacion']);
    }
    if($bedroom == "0")
    {
      unset($parameteres['dormitorios']);
    }
    if($bathroom == "0")
    {
      unset($parameteres['banos']);
    }
    if($garage == "0")
    {
      unset($parameteres['garage']);
    }
    $precio_order = 'desc';
    if($price == "1")
    {
      $precio_order = 'asc';
    }
    $this->data['searchOperacion'] = $operacion;
    $this->data['searchZone'] = $zone;
    $this->data['searchPrice'] = $price;
    $this->data['searchBedroom'] = $bedroom;
    $this->data['searchBathroom'] = $bathroom;
    $this->data['searchGarage'] = $garage;
    //$this->data['searchType'] = $type;
    $this->data['zonas'] = $this->propiedad_model->retrieveDistinct("ubicacion");
    $this->data['dormitorios'] = $this->propiedad_model->retrieveDistinct("dormitorios");
    $this->data['banos'] = $this->propiedad_model->retrieveDistinct("banos");
    $this->data['garage'] = $this->propiedad_model->retrieveDistinct("garage");
    $this->load->helper('upload/mimage');
    $this->load->library('upload/mupload');
    $this->load->helper('text');
    $this->data['apartamentos_list'] = $this->propiedad_model->retrieveSearchWithImage($parameteres, NULL, 'precio_alquiler', $precio_order);
    //$this->output->enable_profiler(TRUE);
    $this->load->view('layout', $this->data);
  }
  
  public function ventas()
  {
    $this->data['menu_id'] = 'ventas';
    $this->data['content'] = 'ventas';
    $this->load->model('propiedades/propiedad_model');
    
    $this->data['zonas'] = $this->propiedad_model->retrieveDistinct("ubicacion");
    $this->data['dormitorios'] = $this->propiedad_model->retrieveDistinct("dormitorios");
    $this->data['banos'] = $this->propiedad_model->retrieveDistinct("banos");
    $this->data['garage'] = $this->propiedad_model->retrieveDistinct("garage");
    
    $this->load->helper('upload/mimage');
    $this->load->library('upload/mupload');
    $this->load->helper('text');
    $this->data['apartamentos_list'] = $this->propiedad_model->retrieveAllWithImage(false, true, NULL);
    //$this->output->enable_profiler(TRUE);
    $this->load->view('layout', $this->data);
  }
  
  public function searchVentas()
  {
    $this->data['menu_id'] = 'ventas';
    $this->data['content'] = 'ventas';
    $this->load->model('propiedades/propiedad_model');
    
    /***
     * Obtengo los datos de la consulta
     **/
    $operacion = $this->input->get('operacion');
    $type = $this->input->get('type');
    $zone = $this->input->get('zone');
    $price = $this->input->get('price');
    $bedroom = $this->input->get('bedroom');
    $bathroom = $this->input->get('bathroom');
    $garage = $this->input->get('garage');
    
    $parameteres = array(
        //'type' => $type,
        'ubicacion' => $zone,
        'dormitorios' => $bedroom,
        'banos' => $bathroom,
        'garage' => $garage,
    );
    if($zone == "0")
    {
      unset($parameteres['ubicacion']);
    }
    if($bedroom == "0")
    {
      unset($parameteres['dormitorios']);
    }
    if($bathroom == "0")
    {
      unset($parameteres['banos']);
    }
    if($garage == "0")
    {
      unset($parameteres['garage']);
    }
    $precio_order = 'desc';
    if($price == "2")
    {
      $precio_order = 'asc';
    }
    $this->data['searchOperacion'] = $operacion;
    $this->data['searchZone'] = $zone;
    $this->data['searchPrice'] = $price;
    $this->data['searchBedroom'] = $bedroom;
    $this->data['searchBathroom'] = $bathroom;
    $this->data['searchGarage'] = $garage;
    $this->data['zonas'] = $this->propiedad_model->retrieveDistinct("ubicacion");
    $this->data['dormitorios'] = $this->propiedad_model->retrieveDistinct("dormitorios");
    $this->data['banos'] = $this->propiedad_model->retrieveDistinct("banos");
    $this->data['garage'] = $this->propiedad_model->retrieveDistinct("garage");
    $this->load->helper('upload/mimage');
    $this->load->library('upload/mupload');
    $this->load->helper('text');
    $this->data['apartamentos_list'] = $this->propiedad_model->retrieveSearchWithImage($parameteres, NULL, 'precio_venta', $precio_order);
    //$this->output->enable_profiler(TRUE);
    $this->load->view('layout', $this->data);
  }
  
  public function alquiler($id)
  {
    $this->data['menu_id'] = 'alquileres';
    $this->data['content'] = 'detalleAlquiler';
    $this->load->helper('upload/mimage');
    $this->load->library('upload/mupload');
    $this->load->model('propiedades/propiedad_model');
    $this->load->model('upload/album');
    $this->load->model('upload/images');
    
    $this->data['propiedad'] = $this->propiedad_model->getById($id, FALSE);
    $album = $this->album->retrieveObjectAlbum($id, $this->propiedad_model->getObjectClass(), "default");
    
    $this->data["images"] = $this->images->retrieveAlbumImages($album->id);
    //$this->output->enable_profiler(TRUE);
    $this->addJquery();
    $this->addJavascript("propiedad.js");
    $this->addJavascript("jquery.fancybox-1.3.4.pack.js");
    $this->addJavascript("jquery.mousewheel-3.0.4.pack.js");
    $this->addStyleSheet("jquery.fancybox-1.3.4.css");
    $this->load->view('layout', $this->data);
  }
  
  public function venta($id)
  {
    $this->data['menu_id'] = 'ventas';
    $this->data['content'] = 'detalleVenta';
    $this->load->helper('upload/mimage');
    $this->load->library('upload/mupload');
    $this->load->model('propiedades/propiedad_model');
    $this->load->model('upload/album');
    $this->load->model('upload/images');
    
    $this->data['propiedad'] = $this->propiedad_model->getById($id, FALSE);
    $album = $this->album->retrieveObjectAlbum($id, $this->propiedad_model->getObjectClass(), "default");
    
    $this->data["images"] = $this->images->retrieveAlbumImages($album->id);
    //$this->output->enable_profiler(TRUE);
    $this->addJquery();
    $this->addJavascript("propiedad.js");
    $this->addJavascript("jquery.fancybox-1.3.4.pack.js");
    $this->addJavascript("jquery.mousewheel-3.0.4.pack.js");
    $this->addStyleSheet("jquery.fancybox-1.3.4.css");
    $this->load->view('layout', $this->data);
  }
  
}
