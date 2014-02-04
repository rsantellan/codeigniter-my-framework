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
	$this->loadI18n("empresa", $this->getLanguageFile(), FALSE, TRUE, "", "celsius");
	$this->data['content'] = 'salonconferencias';
	$this->load->view($this->DEFAULT_LAYOUT, $this->data);
  }
  
  public function category($lang, $id, $slug)
  {
	
  }
  

}