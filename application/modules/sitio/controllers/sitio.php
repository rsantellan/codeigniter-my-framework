<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of sitio
 *
 * @author Rodrigo Santellan
 */

class Sitio extends MY_Controller {
  
  function __construct() {
    parent::__construct();
    $this->loadI18n("global", "", FALSE, TRUE, "", "sitio");
    //$this->output->cache(1);
    $this->data['servicio_id'] = "";
  }
  
  public function index()
  {
    $this->data['slider'] = true;
    $this->data['content'] = 'home';
    $this->addStyleSheet('global.css');
    $this->addJavascript("jquery.min.js");
    $this->addJavascript("slides.min.jquery.js");
    $this->addJavascript("index_slider.js");
    $this->load->view('layout', $this->data);
  }
  
  public function historia()
  {
    $this->loadI18n("historia", "", FALSE, TRUE, "", "sitio");
    $this->data['menu_id'] = 'historia';
    $this->data['content'] = 'historia';
    $this->load->view('layout', $this->data);
  }
  
  public function clientes()
  {
    $this->loadI18n("clientes", "", FALSE, TRUE, "", "sitio");
    $this->data['menu_id'] = 'clientes';
    $this->data['content'] = 'clientes';
    $this->load->view('layout', $this->data);
  }
  
  public function certificacion()
  {
	$this->loadI18n("certificacion", "", FALSE, TRUE, "", "sitio");
    $this->data['menu_id'] = 'certificacion';
    $this->data['content'] = 'certificacion';
    $this->load->view('layout', $this->data);
  }
  
  public function serviciosOptions($parameters)
  {
    $this->load->model('categorias/categorias_model');
    $data = array();
    $data['servicio_id'] = $parameters['servicio_id'];
    $data['list'] = $this->categorias_model->retrieveAll();
    $this->load->view('servicios_menu', $data);
  }
  
  public function servicios($id)
  {
    //var_dump($id);
    $this->loadI18n("servicios", "", FALSE, TRUE, "", "sitio");
    $this->load->helper('htmlpurifier');
    $this->load->helper('text');
    $this->load->helper('upload/mimage');
    $this->load->library('upload/mupload');
    $this->load->model('categorias/categorias_model');
    $this->load->model('proyectos/proyectos_model');
    $this->data['categoria'] = $this->categorias_model->getById($id, FALSE);
    if(is_null($this->data['categoria']))
    {
      show_404('Categoria no existente' , 'No existe una categoria con ese nombre e id: '.$id);
    }
    //var_dump($this->data['categoria']);
    $this->data['category_list'] = $this->categorias_model->retrieveAll();
    $this->data['proyectos'] = $this->proyectos_model->retrieveAllByCategory($id);
    $this->data['menu_id'] = 'servicios';
    $this->data['servicio_id'] = 'servicios_'.$id;
    $this->data['content'] = 'servicios';
    $this->load->view('layout', $this->data);
  }
  
  public function proyecto($id)
  {
    $this->loadI18n("servicios", "", FALSE, TRUE, "", "sitio");
    $this->addJavascript("jquery-1.4.3.min.js");
    $this->addJavascript("jquery.fancybox-1.3.4.pack.js");
    $this->addJavascript("proyectos.js");
    $this->addStyleSheet("jquery.fancybox-1.3.4.css");
    
    $this->load->helper('htmlpurifier');
    $this->load->helper('upload/mimage');
    $this->load->library('upload/mupload');
    $this->load->model('categorias/categorias_model');
    $this->load->model('proyectos/proyectos_model');
    $this->load->model('upload/album');
    $this->load->model('upload/images');
    
    $this->data['proyecto'] = $this->proyectos_model->getById($id, FALSE);
    if(is_null($this->data['proyecto']))
    {
      show_404('Proyecto no existente' , 'No existe un proyecto con ese nombre e id: '.$id);
    }
    //var_dump($this->data['proyecto']);
    $album = $this->album->retrieveObjectAlbum($id, $this->proyectos_model->getObjectClass(), "default");
    //var_dump($album);
    $this->data["images"] = $this->images->retrieveAlbumImages($album->id);
    $this->data['category_list'] = $this->categorias_model->retrieveAll();
    
    $this->data['menu_id'] = 'servicios';
    $this->data['servicio_id'] = 'servicios_'.$this->data['proyecto']->categoria_id;
    $this->data['content'] = 'proyecto';
    $this->load->view('layout', $this->data);
  }
  
  public function destacados()
  {
    $data = array();
    $this->load->model('proyectos/proyectos_model');
    $this->load->helper('upload/mimage');
    $this->load->library('upload/mupload');
    $data['proyectos'] = $this->proyectos_model->retrieveAllWithImage(3);
    
    $this->load->view('destacados', $data);
  }
}
