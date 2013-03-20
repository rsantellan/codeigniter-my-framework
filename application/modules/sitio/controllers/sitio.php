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
    $this->load->helper('upload/mimage');
    $this->load->library('upload/mupload');
    $this->load->helper('text');
    $this->data['apartamentos_list'] = $this->propiedad_model->retrieveAllWithImage(true, false, NULL);
    //$this->output->enable_profiler(TRUE);
    $this->load->view('layout', $this->data);
  }
  
  public function ventas()
  {
    $this->data['menu_id'] = 'ventas';
    $this->data['content'] = 'ventas';
    $this->load->model('propiedades/propiedad_model');
    $this->load->helper('upload/mimage');
    $this->load->library('upload/mupload');
    $this->load->helper('text');
    $this->data['apartamentos_list'] = $this->propiedad_model->retrieveAllWithImage(false, true, NULL);
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
