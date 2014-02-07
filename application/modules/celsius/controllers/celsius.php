<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Description of roche
 *
 * @author rodrigo
 */
class celsius extends MY_Controller{

  private $DEFAULT_LAYOUT = "celsius_layout";
  
  
  function __construct() {
      parent::__construct();
      //$this->load->helper('upload/mimage');
      //$this->load->library('upload/mupload');
	  //$this->loadI18n("menu", "", FALSE, TRUE, "", "feu");
      $this->data['menu'] = 'inicio';
      $this->data['submenu'] = 'inicio';
      $this->data['topHome'] = false;
//      $this->output->enable_profiler(TRUE);
  }

  private function loadMenuData()
  {
	$this->loadI18n("menu", $this->getLanguageFile(), FALSE, TRUE, "", "celsius");
	$this->load->model('categories/category');
    $this->data['menuCategoryList'] = $this->category->retrieveAll(false, $this->getLang());
  }
  
  public function index($lang = 'es')
  {
	$this->setLang($lang);
	$this->loadMenuData();
	$this->data['content'] = 'home';
	$this->data['contentTopHome'] = 'homeCarrousel';
	$this->data['topHome'] = true;
    $this->load->view($this->DEFAULT_LAYOUT, $this->data);
    
  }
  
  public function presentacion($lang)
  {
	$this->data['menu'] = 'empresa';
	$this->data['submenu'] = 'presentacion';
	$this->setLang($lang);
	$this->loadMenuData();
  $title = $this->lang->line('title_presentacion');
  $this->appendTitle($title);
	$this->loadI18n("empresa", $this->getLanguageFile(), FALSE, TRUE, "", "celsius");
	$this->data['content'] = 'presentacion';
	$this->load->view($this->DEFAULT_LAYOUT, $this->data);
  }
  
  public function infraestructura($lang)
  {
	$this->data['menu'] = 'empresa';
	$this->data['submenu'] = 'infraestructura';
	$this->setLang($lang);
	$this->loadMenuData();
  $title = $this->lang->line('title_infraestructura');
  $this->appendTitle($title);
	$this->loadI18n("empresa", $this->getLanguageFile(), FALSE, TRUE, "", "celsius");
	$this->data['content'] = 'infraestructura';
	$this->load->view($this->DEFAULT_LAYOUT, $this->data);
  }
  
  public function mercados($lang)
  {
	$this->data['menu'] = 'empresa';
	$this->data['submenu'] = 'mercados';
	$this->setLang($lang);
	$this->loadMenuData();
  $title = $this->lang->line('title_mercados');
  $this->appendTitle($title);
	$this->loadI18n("empresa", $this->getLanguageFile(), FALSE, TRUE, "", "celsius");
	$this->data['content'] = 'mercados';
	$this->load->view($this->DEFAULT_LAYOUT, $this->data);
  }
  
  public function recursoshumanos($lang)
  {
	$this->data['menu'] = 'empresa';
	$this->data['submenu'] = 'recursoshumanos';
	$this->setLang($lang);
	$this->loadMenuData();
  $title = $this->lang->line('title_recursoshumanos');
  $this->appendTitle($title);
	$this->loadI18n("empresa", $this->getLanguageFile(), FALSE, TRUE, "", "celsius");
	$this->data['content'] = 'recursoshumanos';
	$this->load->view($this->DEFAULT_LAYOUT, $this->data);
  }
  
  public function salonconferencias($lang)
  {
	$this->data['menu'] = 'salonconferencias';
	$this->data['submenu'] = 'salonconferencias';
	$this->setLang($lang);
	$this->loadMenuData();
  $title = $this->lang->line('title_salon_conferencia');
  $this->appendTitle($title);
	$this->loadI18n("empresa", $this->getLanguageFile(), FALSE, TRUE, "", "celsius");
	$this->data['content'] = 'salonconferencias';
	$this->load->view($this->DEFAULT_LAYOUT, $this->data);
  }
  
  public function novedades($lang, $page = 1)
  {
    $this->data['menu'] = 'novedades';
    $this->data['submenu'] = 'novedades';
    $this->setLang($lang);
    $this->loadMenuData();
    $this->loadI18n("novedades", $this->getLanguageFile(), FALSE, TRUE, "", "celsius");
    if($page < 0 || (int) $page == 0)
            $page = 1;
    $rows = 5;
    $title = $this->lang->line('title_novedades');
    if($page > 1)  
    {
      $this->appendTitle($title." - ".$page);
    }
    else
    {
      $this->appendTitle($title);
    }  
    $this->load->model('news/mnew');
    $this->load->helper('upload/mimage');
    $this->load->library('upload/mupload');
    $this->load->helper('text');
    $this->load->helper('htmlpurifier');
    $this->data['novedadeslist'] = $this->mnew->retrieveAll(false, $this->getLang(), true, $rows, $rows * ($page - 1));
    $records = $this->mnew->countAllRecords();
    $this->data['cantidad'] = $records;
    $this->data['pages'] = ceil($records / $rows);
    $this->data['page'] = $page;
    $this->data['content'] = 'novedades';
    $this->load->view($this->DEFAULT_LAYOUT, $this->data);
  }
  
  public function novedad($lang, $id, $slug)
  {
      $this->setLang($lang);
      $this->loadI18n("novedades", $this->getLanguageFile(), FALSE, TRUE, "", "celsius");
      $this->load->model('news/mnew');
      $this->load->helper('upload/mimage');
      $this->load->library('upload/mupload');
      $this->load->helper('text');
      $this->load->helper('htmlpurifier');
      
      $this->data['object'] = $this->mnew->getById($id, $this->getLang(), false, true);
      $this->data['content'] = 'novedad';
      $this->load->view('celsius_novedad_layout', $this->data);
  }
  
  
  public function casoestudio($lang, $page = 1)
  {
      $this->data['menu'] = 'casoestudio';
      $this->data['submenu'] = 'casoestudio';
      $this->setLang($lang);
      $this->loadMenuData();
      $this->loadI18n("casoestudio", $this->getLanguageFile(), FALSE, TRUE, "", "celsius");
      if($page < 0 || (int) $page == 0)
		    $page = 1;
      $title = $this->lang->line('title_casoestudio');
		  if($page > 1)  
      {
        $this->appendTitle($title." - ".$page);
      }
      else
      {
        $this->appendTitle($title);
      }
      $rows = 6;
      $this->load->model('studycases/studycase');
      $this->load->helper('upload/mimage');
      $this->load->library('upload/mupload');
      $this->load->helper('text');
      $this->load->helper('htmlpurifier');
      $this->data['objectlist'] = $this->studycase->retrieveAll(false, $this->getLang(), true, $rows, $rows * ($page - 1));
      $records = $this->studycase->countAllRecords();
      $this->data['cantidad'] = $records;
      $this->data['pages'] = ceil($records / $rows);
      $this->data['page'] = $page;
      $this->data['content'] = 'casoestudio';  
      $this->load->view($this->DEFAULT_LAYOUT, $this->data);
  }
  
  public function downloadFile($lang, $fileId)
  {
    $this->load->model('upload/albumcontent');
    $file = $this->albumcontent->getFile($fileId);
    $aux = $file;//[0];
    $this->load->helper('download');
    $data = file_get_contents($aux->path); // Read the file's contents
    $name = $aux->name;
    force_download($name, $data);
  }
  
  
  public function eventos($lang, $page = 1)
  {
      
      $this->data['menu'] = 'eventos';
      $this->data['submenu'] = 'eventos';
      $this->setLang($lang);
      $this->loadMenuData();
      $this->loadI18n("eventos", $this->getLanguageFile(), FALSE, TRUE, "", "celsius");
      if($page < 0 || (int) $page == 0)
      {
        $page = 1;
      }
      $title = $this->lang->line('title_eventos');
		  if($page > 1)  
      {
        $this->appendTitle($title." - ".$page);
      }
      else
      {
        $this->appendTitle($title);
      }
      $rows = 12;
      $this->load->model('events/event');
      $this->load->helper('upload/mimage');
      $this->load->library('upload/mupload');
      $this->load->helper('text');
      $this->load->helper('htmlpurifier');
      $this->data['objectlist'] = $this->event->retrieveAll(false, $this->getLang(), true, $rows, $rows * ($page - 1));
      $records = $this->event->countAllRecords();
      $this->data['cantidad'] = $records;
      $this->data['pages'] = ceil($records / $rows);
      $this->data['page'] = $page;
      $this->data['content'] = 'eventos';  
      $this->load->view($this->DEFAULT_LAYOUT, $this->data);
  }
  
  public function congresos($lang, $page = 1)
  {
      
      $this->data['menu'] = 'congresos';
      $this->data['submenu'] = 'congresos';
      $this->setLang($lang);
      $this->loadMenuData();
      $this->loadI18n("congresos", $this->getLanguageFile(), FALSE, TRUE, "", "celsius");
      if($page < 0 || (int) $page == 0)
      {
        $page = 1;
      }
      $title = $this->lang->line('title_congresos');
		  if($page > 1)  
      {
        $this->appendTitle($title." - ".$page);
      }
      else
      {
        $this->appendTitle($title);
      }
      $rows = 12;
      $this->load->model('congress/ocongress');
      $this->load->helper('upload/mimage');
      $this->load->library('upload/mupload');
      $this->load->helper('text');
      $this->load->helper('htmlpurifier');
      $this->data['objectlist'] = $this->ocongress->retrieveAll(false, $this->getLang(), true, $rows, $rows * ($page - 1));
      $records = $this->ocongress->countAllRecords();
      $this->data['cantidad'] = $records;
      $this->data['pages'] = ceil($records / $rows);
      $this->data['page'] = $page;
      $this->data['content'] = 'congresos';  
      $this->load->view($this->DEFAULT_LAYOUT, $this->data);
  }
  
  public function category($lang, $id, $slug)
  {
	
  }
  

}
