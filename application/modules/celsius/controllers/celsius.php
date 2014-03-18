<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/**
 * Description of roche
 *
 * @author rodrigo
 */
class celsius extends MY_Controller {

  private $DEFAULT_LAYOUT = "celsius_layout";

  function __construct() {
    parent::__construct();
    //$this->load->helper('upload/mimage');
    //$this->load->library('upload/mupload');
    //$this->loadI18n("menu", "", FALSE, TRUE, "", "feu");
    $this->data['menu'] = 'inicio';
    $this->data['submenu'] = 'inicio';
    $this->data['topHome'] = false;
    //$this->output->enable_profiler(TRUE);
    $this->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file'));
    $this->data['login_user'] = '';
    $this->data['errores'] = array();
    $this->data['isLogged'] = $this->isLogged();
    $this->data['user'] = NULL;
    if($this->data['isLogged'])
    {
      $this->data['user'] = $this->getLoggedUserData();
    }
    $this->data['englishurl'] = '';
    $this->data['spanishurl'] = '';
  }

  private function loadMenuData() {
    $this->loadI18n("menu", $this->getLanguageFile(), FALSE, TRUE, "", "celsius");
    $this->load->model('categories/category');
    $cache_key = 'categorieslist-' . $this->getLang();
    $categoriesList = $this->cache->get($cache_key);
    if (!$categoriesList) {
      $categoriesList = $this->category->retrieveAll(false, $this->getLang());
      $this->cache->save($cache_key, $categoriesList, 300);
    }
    $this->data['menuCategoryList'] = $categoriesList;
  }
  
  private function changeUrlData($spanish, $english)
  {
    $spanishLang = 'es';
    $englishLang = 'en';
    $this->data['englishurl'] = $englishLang.'/'.$english;
    $this->data['spanishurl'] = $spanishLang.'/'.$spanish;
  }

  public function index($lang = 'es') {
    $this->loadIndex($lang);
    $this->load->view($this->DEFAULT_LAYOUT, $this->data);
  }
  
  private function loadIndex($lang)
  {
    $this->setLang($lang);
    $this->loadMenuData();
    $this->changeUrlData('', '');
    $this->load->model('news/mnew');
    $this->load->helper('upload/mimage');
    $this->load->library('upload/mupload');
    $this->load->model('basiclink/link');
    $this->load->helper('text');
    $this->load->helper('htmlpurifier');
    $this->data['sliderLinks'] = $this->link->retrieveAll(false, true);
    $this->data['sliderNews'] = $this->mnew->retrieveAllSlider($lang);
    $this->data['news'] = $this->mnew->retrieveAll(false, $lang, true, 2, 0);
    $this->data['content'] = 'home';
    $this->data['contentTopHome'] = 'homeCarrousel';
    $this->data['topHome'] = true;
    $this->loadI18n("home", $this->getLanguageFile(), FALSE, TRUE, "", "celsius");
  }

  public function presentacion($lang) {
    $this->data['menu'] = 'empresa';
    $this->data['submenu'] = 'presentacion';
    $this->setLang($lang);
    $this->loadMenuData();
    $this->changeUrlData('presentacion.html', 'presentation.html');
    $title = $this->lang->line('title_presentacion');
    $this->appendTitle($title);
    $this->loadI18n("empresa", $this->getLanguageFile(), FALSE, TRUE, "", "celsius");
    $this->data['content'] = 'presentacion';
    $this->load->view($this->DEFAULT_LAYOUT, $this->data);
  }

  public function infraestructura($lang) {
    $this->data['menu'] = 'empresa';
    $this->data['submenu'] = 'infraestructura';
    $this->setLang($lang);
    $this->loadMenuData();
    $this->changeUrlData('infraestructura.html', 'infrastructure.html');
    $title = $this->lang->line('title_infraestructura');
    $this->appendTitle($title);
    $this->loadI18n("empresa", $this->getLanguageFile(), FALSE, TRUE, "", "celsius");
    $this->data['content'] = 'infraestructura';
    $this->load->view($this->DEFAULT_LAYOUT, $this->data);
  }

  public function mercados($lang) {
    $this->data['menu'] = 'empresa';
    $this->data['submenu'] = 'mercados';
    $this->setLang($lang);
    $this->loadMenuData();
    $this->changeUrlData('mercados.html', 'markets.html');
    $title = $this->lang->line('title_mercados');
    $this->appendTitle($title);
    $this->loadI18n("empresa", $this->getLanguageFile(), FALSE, TRUE, "", "celsius");
    $this->data['content'] = 'mercados';
    $this->load->view($this->DEFAULT_LAYOUT, $this->data);
  }

  public function recursoshumanos($lang) {
    $this->data['menu'] = 'empresa';
    $this->data['submenu'] = 'recursoshumanos';
    $this->setLang($lang);
    $this->loadMenuData();
    $this->changeUrlData('recursos-humanos.html', 'human-resources.html');
    $title = $this->lang->line('title_recursoshumanos');
    $this->appendTitle($title);
    $this->loadI18n("empresa", $this->getLanguageFile(), FALSE, TRUE, "", "celsius");
    $this->data['content'] = 'recursoshumanos';
    $this->load->view($this->DEFAULT_LAYOUT, $this->data);
  }

  public function salonconferencias($lang) {
    $this->data['menu'] = 'salonconferencias';
    $this->data['submenu'] = 'salonconferencias';
    $this->setLang($lang);
    $this->loadMenuData();
    $this->changeUrlData('salon-conferencias.html', 'conference-room.html');
    $title = $this->lang->line('title_salon_conferencia');
    $this->appendTitle($title);
    $this->loadI18n("empresa", $this->getLanguageFile(), FALSE, TRUE, "", "celsius");
    $this->data['content'] = 'salonconferencias';
    $this->load->view($this->DEFAULT_LAYOUT, $this->data);
  }

  public function novedades($lang, $page = 1) {
    $this->data['menu'] = 'novedades';
    $this->data['submenu'] = 'novedades';
    $this->setLang($lang);
    $this->loadMenuData();
    $this->changeUrlData('novedades.html', 'news.html');
    $this->loadI18n("novedades", $this->getLanguageFile(), FALSE, TRUE, "", "celsius");
    if ($page < 0 || (int) $page == 0)
      $page = 1;
    $rows = 5;
    $title = $this->lang->line('title_novedades');
    if ($page > 1) {
      $this->appendTitle($title . " - " . $page);
    } else {
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

  public function novedad($lang, $id, $slug) {
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

  public function casoestudio($lang, $page = 1) {
    if (!$this->isLogged()) {
      //Si no esta logeado se tiene que ir a loguear
      $this->session->set_userdata('url_to_direct_on_login', '');
      redirect($lang);
    }
    if($this->data['user']->profile !== 'admin' ||  $this->data['user']->profile !== 'medico')
    {
      $this->session->set_userdata('url_to_direct_on_login', '');
      redirect($lang);
    }
    $this->data['menu'] = 'casoestudio';
    $this->data['submenu'] = 'casoestudio';
    $this->setLang($lang);
    $this->loadMenuData();
    $this->changeUrlData('casos-estudio.html', 'study-case.html');
    $this->loadI18n("casoestudio", $this->getLanguageFile(), FALSE, TRUE, "", "celsius");
    if ($page < 0 || (int) $page == 0)
      $page = 1;
    $title = $this->lang->line('title_casoestudio');
    if ($page > 1) {
      $this->appendTitle($title . " - " . $page);
    } else {
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

  public function downloadFile($lang, $fileId) {
    $this->load->model('upload/albumcontent');
    $file = $this->albumcontent->getFile($fileId);
    $aux = $file; //[0];
    $this->load->helper('download');
    $data = file_get_contents($aux->path); // Read the file's contents
    $name = $aux->name;
    force_download($name, $data);
  }

  public function eventos($lang, $page = 1) {
    if (!$this->isLogged()) {
      //Si no esta logeado se tiene que ir a loguear
      $this->session->set_userdata('url_to_direct_on_login', '');
      redirect($lang);
    }
    if($this->data['user']->profile !== 'admin' ||  $this->data['user']->profile !== 'medico')
    {
      $this->session->set_userdata('url_to_direct_on_login', '');
      redirect($lang);
    }
    $this->data['menu'] = 'eventos';
    $this->data['submenu'] = 'eventos';
    $this->setLang($lang);
    $this->loadMenuData();
    $this->changeUrlData('eventos.html', 'events.html');
    $this->loadI18n("eventos", $this->getLanguageFile(), FALSE, TRUE, "", "celsius");
    if ($page < 0 || (int) $page == 0) {
      $page = 1;
    }
    $title = $this->lang->line('title_eventos');
    if ($page > 1) {
      $this->appendTitle($title . " - " . $page);
    } else {
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

  public function congresos($lang, $page = 1) {
    if (!$this->isLogged()) {
      //Si no esta logeado se tiene que ir a loguear
      $this->session->set_userdata('url_to_direct_on_login', '');
      redirect($lang);
    }
    if($this->data['user']->profile !== 'admin' ||  $this->data['user']->profile !== 'medico')
    {
      $this->session->set_userdata('url_to_direct_on_login', '');
      redirect($lang);
    }
    $this->data['menu'] = 'congresos';
    $this->data['submenu'] = 'congresos';
    $this->setLang($lang);
    $this->loadMenuData();
    $this->changeUrlData('congresos.html', 'congress.html');
    $this->loadI18n("congresos", $this->getLanguageFile(), FALSE, TRUE, "", "celsius");
    if ($page < 0 || (int) $page == 0) {
      $page = 1;
    }
    $title = $this->lang->line('title_congresos');
    if ($page > 1) {
      $this->appendTitle($title . " - " . $page);
    } else {
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
    $this->data['menu'] = 'productos';
    $this->data['submenu'] = $slug;
    $this->setLang($lang);
    $this->loadMenuData();
    $this->changeUrlData('', '');
    $this->loadI18n("producto", $this->getLanguageFile(), FALSE, TRUE, "", "celsius");
    $this->load->model('categories/category');
    $this->load->model('products/product');
    $this->load->helper('upload/mimage');
    $this->load->library('upload/mupload');
    $category = $this->category->getById($id, $lang, false);
    $this->data['category'] = $category;
    $title = $this->lang->line('title_categoria').$category->name;
    $this->appendTitle($title);
    $products = $this->product->retrieveByCategory($lang, $category->id);
    $this->data['products'] = $products;
    $usedProduct = array_shift(array_values($products));
    if($usedProduct !== null)
    {
      $this->loadUsedProduct($this->product->getById($usedProduct->id, $lang, false, true));
    }
    $this->data['content'] = 'categoria';
    $this->load->view($this->DEFAULT_LAYOUT, $this->data);
  }

  private function loadUsedProduct($productStdObject)
  {
    //var_dump($productStdObject);
    $this->load->model('presentations/presentation');
    $this->data['presentations'] = $this->presentation->retrieveAll(false, $this->getLang(), $productStdObject->id, true);
    $this->data['usedProduct'] = $productStdObject;
    $this->data['medicdata'] = $this->product->retrieveMedicAlbumData($this->getLang(), $productStdObject->id);
  }
  
  public function product($lang, $id, $slug, $productId, $productSlug)
  {
    $this->data['menu'] = 'productos';
    $this->data['submenu'] = $slug;
    $this->setLang($lang);
    $this->loadMenuData();
    $this->changeUrlData('', '');
    $this->loadI18n("producto", $this->getLanguageFile(), FALSE, TRUE, "", "celsius");
    $this->load->model('categories/category');
    $this->load->model('products/product');
    $this->load->helper('upload/mimage');
    $this->load->library('upload/mupload');
    $category = $this->category->getById($id, $lang, false);
    $this->data['category'] = $category;
    $title = $this->lang->line('title_categoria').$category->name;
    $this->appendTitle($title);
    $products = $this->product->retrieveByCategory($lang, $category->id);
    $this->data['products'] = $products;
    //var_dump($productId);die;
    $this->loadUsedProduct($this->product->getById($productId, $lang, false, true));
    $this->data['content'] = 'categoria';
    $this->load->view($this->DEFAULT_LAYOUT, $this->data);
  }
  
  public function presencia($lang)
  {
    $this->data['menu'] = 'exterior';
    $this->data['submenu'] = 'exterior';
    $this->setLang($lang);
    $this->loadMenuData();
    $this->changeUrlData('presencia-exterior.html', 'international-presence.html');
    $title = $this->lang->line('title_presencia_exterior');
    $this->appendTitle($title);
    $this->loadI18n("presenciaexterior", $this->getLanguageFile(), FALSE, TRUE, "", "celsius");
    $this->data['content'] = 'presencia';
    $this->load->model('products/product');
    $this->load->model('presentations/presentation');
    $this->data['countries'] = $this->presentation->retrieveAllCountries();
    $tableData = array();
    foreach($this->data['menuCategoryList'] as $category)
    {
//      var_dump($category);
//      echo '<hr/>';
      $categoryData = array();
      $products = $this->product->retrieveByCategory($lang, $category->id);
      foreach($products as $product)
      {
//        var_dump($product);
//        echo '<hr/>';
        $presentations = $this->presentation->retrieveAll(false, $this->getLang(), $product->id);
        foreach($presentations as $presentation)
        {
//          var_dump($presentation);
//          echo '<hr/>';  
          $countryData = $this->presentation->retrieveRawPresentationCountryData($presentation->id);
          if(count($countryData) > 0)
          {
            $aux = new stdClass();
            $aux->product = $product->name;
            $aux->genericname = $presentation->genericname;
            $aux->presentation = $presentation->name;
            $countriesTypes = array();
            foreach($this->data['countries'] as $country)
            {
              $countriesTypes[$country->id]['presencia'] = '';
            }
            foreach($countryData as $usedCountryData)
            {
              if($usedCountryData->compuesto !== "")
              {
                $countriesTypes[$usedCountryData->country_id]['compuesto'] = $usedCountryData->compuesto;
              }
              $countriesTypes[$usedCountryData->country_id]['presencia'] = $usedCountryData->presencia;
            }
            $aux->countries = $countriesTypes;
            $categoryData[] = $aux;
          }
//          var_dump($countryData);
//          echo '<hr/>';  
        }
        //var_dump($presentations);
      }
      //
      if(count($categoryData)> 0)
      {
        $tableData[$category->id] = $categoryData;
      }
      
    }
    //var_dump($tableData);
    $this->data['tableData'] = $tableData;
    $this->load->view($this->DEFAULT_LAYOUT, $this->data);
  }
  
  public function trabaja($lang)
  {
    $this->data['menu'] = 'trabajar_lab';
    $this->data['submenu'] = 'trabajar_lab';
    $this->setLang($lang);
    $this->loadMenuData();
    $this->changeUrlData('trabaja-con-nosotros.html', 'work-with-us.html');
    $title = $this->lang->line('title_consulta_medicos');
    $this->appendTitle($title);
    $this->loadI18n("trabajaconnosotros", $this->getLanguageFile(), FALSE, TRUE, "", "celsius");
    $this->data['content'] = 'trabaja';
    $this->load->library('form_validation');
    $this->load->helper('form');
    $this->load->helper('url');
    $word = $this->input->post('word');
    $errores = array();
    $captcha = true;
    $mensajeEnviado = false;
    $message = NULL;
    if (true || $this->input->post() && ($word == $this->session->userdata('word'))) {
      $captcha = true;
    } else {
      if (!empty($word) || $this->input->post()) {
        $errores["captcha"] = "Captcha invalido";
      }
    }
    
    if($_SERVER['REQUEST_METHOD'] === 'POST')
    {
      if (!$this->_ciRegex($this->input->post('cedula'))) {
        $errores['cedula_identidad'] = 'Cedula de identidad con formato incorrecto.';
      }
      $areasCounter = 0;
      if($this->input->post('quimicofarmaceuticorecibido'))
        $areasCounter++;
      if($this->input->post('quimicofarmaceuticoestudiante'))
        $areasCounter++;
      if($this->input->post('quimicotecnologorecibido'))
        $areasCounter++;
      if($this->input->post('quimicotecnologoestudiante'))
        $areasCounter++;
      if($this->input->post('mantenimientomecanico'))
        $areasCounter++;
      if($this->input->post('operariopreparador'))
        $areasCounter++;
      if($this->input->post('depositologisticaexpedicion'))
        $areasCounter++;
      if($this->input->post('limpieza'))
        $areasCounter++;
      if($this->input->post('comprascomercionexterios'))
        $areasCounter++;
      if($this->input->post('ventascomercialpromocion'))
        $areasCounter++;
      if($this->input->post('administrativosfinancieroscontable'))
        $areasCounter++;
      if($this->input->post('sistemainformatica'))
        $areasCounter++;
      if($this->input->post('recepcionistasecretaria'))
        $areasCounter++;
      if($this->input->post('cientificoinvestigadores'))
        $areasCounter++;
      if($this->input->post('estudiantessinexperiencia'))
        $areasCounter++;
      if($areasCounter > 3)
      {
        $errores['areas'] = 'Tiene mas de tres areas elegidas';
      }
    }
    
    $this->form_validation->set_rules('nombre', 'nombre', 'required|max_length[255]');			
    $this->form_validation->set_rules('apellido', 'apellido', 'required|max_length[255]');			
    $this->form_validation->set_rules('cedula', 'cedula', 'required|max_length[255]');			
    $this->form_validation->set_rules('email', 'email', 'required|valid_email|max_length[255]');			
    $this->form_validation->set_rules('direccion', 'direccion', 'max_length[255]');			
    $this->form_validation->set_rules('ciudad', 'ciudad', 'max_length[255]');			
    $this->form_validation->set_rules('pais', 'pais', 'max_length[255]');			
    $this->form_validation->set_rules('phone', 'phone', 'max_length[255]');			
    $this->form_validation->set_rules('fax', 'fax', 'max_length[255]');			
    //$this->form_validation->set_rules('cv', 'cv', 'required|max_length[255]');
    $this->form_validation->set_rules('quimicofarmaceuticorecibido', 'quimicofarmaceuticorecibido', '');
    $this->form_validation->set_rules('quimicofarmaceuticoestudiante', 'quimicofarmaceuticoestudiante', '');
    $this->form_validation->set_rules('quimicotecnologorecibido', 'quimicotecnologorecibido', '');
    $this->form_validation->set_rules('quimicotecnologoestudiante', 'quimicotecnologoestudiante', '');
    $this->form_validation->set_rules('mantenimientomecanico', 'mantenimientomecanico', '');
    $this->form_validation->set_rules('operariopreparador', 'operariopreparador', '');
    $this->form_validation->set_rules('depositologisticaexpedicion', 'depositologisticaexpedicion', '');
    $this->form_validation->set_rules('limpieza', 'limpieza', '');
    $this->form_validation->set_rules('comprascomercionexterios', 'comprascomercionexterios', '');
    $this->form_validation->set_rules('ventascomercialpromocion', 'ventascomercialpromocion', '');
    $this->form_validation->set_rules('administrativosfinancieroscontable', 'administrativosfinancieroscontable', '');
    $this->form_validation->set_rules('sistemainformatica', 'sistemainformatica', '');
    $this->form_validation->set_rules('recepcionistasecretaria', 'recepcionistasecretaria', '');
    $this->form_validation->set_rules('cientificoinvestigadores', 'cientificoinvestigadores', '');
    $this->form_validation->set_rules('estudiantessinexperiencia', 'estudiantessinexperiencia', '');
    
    
    
    $this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');    
    if ($this->form_validation->run() !== FALSE && count($errores) == 0) {
        //var_dump(';aca');
        $form_data = array(
                    'nombre' => set_value('nombre'),
                    'apellido' => set_value('apellido'),
                    'cedula' => set_value('cedula'),
                    'email' => set_value('email'),
                    'direccion' => set_value('direccion'),
                    'ciudad' => set_value('ciudad'),
                    'pais' => set_value('pais'),
                    'phone' => set_value('phone'),
                    'fax' => set_value('fax'),
                    'quimicofarmaceuticorecibido' => set_value('quimicofarmaceuticorecibido'),
                    'quimicofarmaceuticoestudiante' => set_value('quimicofarmaceuticoestudiante'),
                    'quimicotecnologorecibido' => set_value('quimicotecnologorecibido'),
                    'quimicotecnologoestudiante' => set_value('quimicotecnologoestudiante'),
                    'mantenimientomecanico' => set_value('mantenimientomecanico'),
                    'operariopreparador' => set_value('operariopreparador'),
                    'depositologisticaexpedicion' => set_value('depositologisticaexpedicion'),
                    'limpieza' => set_value('limpieza'),
                    'comprascomercionexterios' => set_value('comprascomercionexterios'),
                    'ventascomercialpromocion' => set_value('ventascomercialpromocion'),
                    'administrativosfinancieroscontable' => set_value('administrativosfinancieroscontable'),
                    'sistemainformatica' => set_value('sistemainformatica'),
                    'recepcionistasecretaria' => set_value('recepcionistasecretaria'),
                    'cientificoinvestigadores' => set_value('cientificoinvestigadores'),
                    'estudiantessinexperiencia' => set_value('estudiantessinexperiencia'),
                );
        $config['upload_path'] = FCPATH."assets".DIRECTORY_SEPARATOR."protectedfiles";//sys_get_temp_dir();
        $config['allowed_types'] = 'pdf|doc|docx';
        $this -> load -> library('upload', $config);
        //var_dump($_FILES['cv']);
        if (!$this->upload->do_upload('cv')) {
          $errores['cv'] = $this->upload->display_errors();
        }else{
          $uploadData = $this->upload->data();
          $form_data['cv'] = $uploadData['file_name'];
          $form_data['cvfile'] = $uploadData['file_path'];
          $this->load->model('trabajaconnosotros/curriculum');
          //var_dump($form_data);
          $id = $this->curriculum->save($form_data);
          if($id > 0)
          {
            $this->load->model('contacto/mail_db');
            $return = $this->mail_db->retrieveMailInfoByFuncion('trabaja');
            $this->load->library('email');

            $this->email->from($return['from']['direccion'], $return['from']['nombre']);
            $this->email->to($return['to']); 
            if(isset($return['cc']))
            {
              $this->email->cc($return['cc']); 
            }
            if(isset($return['bcc']))
            {
              $this->email->bcc($return['bcc']);
            }

            $this->email->reply_to($form_data['email'], $form_data['nombre']);

            $this->email->subject('[Celsius WEB]Trabaja con nosotros');
            $mail = $this->load->view('mailTrabajaConNosotros', $form_data, true);
            $this->email->message($mail); 
            $this->email->attach($form_data['cvfile'].$form_data['cv']);
            $this->email->send();
            $message = "CV Enviado";
          }
        }
        
    }
    $this->load->helper('captcha');
    $vals = array(
        'img_path' => './captcha/',
        'img_url' => $this->config->base_url() . "captcha/",
        'img_width' => '200',
        'img_height' => 30,
        'border' => 0,
        'expiration' => 7200,
        'usecaps' => false
    );

    // create captcha image
    $cap = create_captcha($vals);
    // store image html code in a variable
    $this->data['captchaImage'] = $cap['image'];
    // store the captcha word in a session
    $this->session->set_userdata('word', $cap['word']);
    $this->data['messageSent'] = $mensajeEnviado;
    $this->data['errores'] = $errores;
    $this->data['message'] = $message;
    
    $this->load->view($this->DEFAULT_LAYOUT, $this->data);
  }
  
  public function consultamedico($lang) {
    $this->data['menu'] = 'consulta_medicos';
    $this->data['submenu'] = 'consulta_medicos';
    $this->setLang($lang);
    $this->loadMenuData();
    $this->changeUrlData('consulta-medico.html', 'medic-consultation.html');
    $title = $this->lang->line('title_consulta_medicos');
    $this->appendTitle($title);
    $this->loadI18n("consultamedico", $this->getLanguageFile(), FALSE, TRUE, "", "celsius");
    $this->data['content'] = 'consultamedico';

    $word = $this->input->post('word');
    $errores = array();
    $captcha = true;
    $mensajeEnviado = false;
    $message = NULL;
    if (true || $this->input->post() && ($word == $this->session->userdata('word'))) {
      $captcha = true;
    } else {
      if (!empty($word) || $this->input->post()) {
        $errores["captcha"] = "Captcha invalido";
      }
    }

    $this->load->library('form_validation');
    $this->load->helper('form');
    $this->load->helper('url');

    $this->form_validation->set_rules('nombre', 'nombre', 'required|max_length[255]');
    $this->form_validation->set_rules('apellido', 'apellido', 'required|max_length[255]');
    $this->form_validation->set_rules('cedula_identidad', 'Cedula Identidad', 'required|max_length[255]');
    $this->form_validation->set_rules('email', 'email', 'required|valid_email|max_length[255]');
    $this->form_validation->set_rules('direccion', 'direccion', 'max_length[255]');
    $this->form_validation->set_rules('ciudad', 'ciudad', 'max_length[255]');
    $this->form_validation->set_rules('pais', 'pais', 'max_length[255]');
    $this->form_validation->set_rules('telefono', 'telefono', 'max_length[255]');
    $this->form_validation->set_rules('profesion', 'profesion', 'max_length[255]');
    $this->form_validation->set_rules('consulta', 'consulta', 'required');
    if($_SERVER['REQUEST_METHOD'] === 'POST')
    {
      if (!$this->_ciRegex($this->input->post('cedula_identidad'))) {
        $errores['cedula_identidad'] = 'Cedula de identidad con formato incorrecto.';
      }
    }
    

    $this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
    if ($this->form_validation->run() !== FALSE && count($errores) > 0) {
      // build array for the model

      $form_data = array(
          'nombre' => set_value('nombre'),
          'apellido' => set_value('apellido'),
          'cedula_identidad' => set_value('cedula_identidad'),
          'email' => set_value('email'),
          'direccion' => set_value('direccion'),
          'ciudad' => set_value('ciudad'),
          'pais' => set_value('pais'),
          'telefono' => set_value('telefono'),
          'profesion' => set_value('profesion'),
          'consulta' => set_value('consulta')
      );
      $this->load->model('contacto/mail_db');
      $return = $this->mail_db->retrieveMailInfoByFuncion('medicos');
      $this->load->library('email');

      $this->email->from($return['from']['direccion'], $return['from']['nombre']);
      $this->email->to($return['to']); 
      if(isset($return['cc']))
      {
        $this->email->cc($return['cc']); 
      }
      if(isset($return['bcc']))
      {
        $this->email->bcc($return['bcc']);
      }

      $this->email->reply_to($form_data['email'], $form_data['nombre']);

      $this->email->subject('[Celsius WEB]Consulta a medicos desde el sitio web');
      $message = $this->load->view('mailConsultaMedicos', $form_data, true);
      $this->email->message($message); 

      $this->email->send();
      $message = 'Mensaje enviado con exito';
      //Debug
      //echo $this->email->print_debugger();die;
    }

    $this->load->helper('captcha');
    $vals = array(
        'img_path' => './captcha/',
        'img_url' => $this->config->base_url() . "captcha/",
        'img_width' => '200',
        'img_height' => 30,
        'border' => 0,
        'expiration' => 7200,
        'usecaps' => false
    );

    // create captcha image
    $cap = create_captcha($vals);
    // store image html code in a variable
    $this->data['captchaImage'] = $cap['image'];
    // store the captcha word in a session
    $this->session->set_userdata('word', $cap['word']);
    $this->data['messageSent'] = $mensajeEnviado;
    $this->data['errores'] = $errores;
    $this->data['message'] = $message;

    $this->load->view($this->DEFAULT_LAYOUT, $this->data);
  }

  public function _ciRegex($ci) {
    //throw new Exception('aca');
    //var_dump($ci);
    $data = preg_match('/[1-9]?[0-9]{6}-[0-9]/', $ci);
    //var_dump($data);
    if ($data > 0) {
      return true;
    }
    return false;
  }

  public function contacto($lang) {
    $this->data['menu'] = 'contacto';
    $this->data['submenu'] = 'contacto';
    $this->setLang($lang);
    $this->loadMenuData();
    $this->changeUrlData('contacto.html', 'contact.html');
    $title = $this->lang->line('title_contacto');
    $this->appendTitle($title);
    $this->loadI18n("contacto", $this->getLanguageFile(), FALSE, TRUE, "", "celsius");
    $this->data['content'] = 'contacto';


    $this->load->library('form_validation');
    $this->load->helper('form');
    $this->load->helper('url');

    $this->form_validation->set_rules('motivo', 'motivo', 'required|max_length[255]');
    $this->form_validation->set_rules('nombre', 'nombre', 'required|max_length[255]');
    $this->form_validation->set_rules('apellido', 'apellido', 'required|max_length[255]');
    $this->form_validation->set_rules('direccion', 'direccion', 'max_length[255]');
    $this->form_validation->set_rules('ciudad', 'ciudad', 'max_length[255]');
    $this->form_validation->set_rules('pais', 'pais', 'max_length[255]');
    $this->form_validation->set_rules('telefono', 'telefono', 'max_length[255]');
    $this->form_validation->set_rules('fax', 'fax', 'max_length[255]');
    $this->form_validation->set_rules('email', 'email', 'required|valid_email|max_length[255]');
    $this->form_validation->set_rules('empresa', 'empresa', 'max_length[255]');
    $this->form_validation->set_rules('cargo', 'cargo', 'max_length[255]');
    $this->form_validation->set_rules('consulta', 'consulta', 'required');
    $this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
    if ($this->form_validation->run() !== FALSE) {
      // build array for the model

      $form_data = array(
          'motivo' => set_value('motivo'),
          'nombre' => set_value('nombre'),
          'apellido' => set_value('apellido'),
          'direccion' => set_value('direccion'),
          'ciudad' => set_value('ciudad'),
          'pais' => set_value('pais'),
          'telefono' => set_value('telefono'),
          'fax' => set_value('fax'),
          'email' => set_value('email'),
          'empresa' => set_value('empresa'),
          'cargo' => set_value('cargo'),
          'consulta' => set_value('consulta')
      );
      $this->load->model('contacto/mail_db');
      $return = $this->mail_db->retrieveContactMailInfo();
      $this->load->library('email');

      $this->email->from($return['from']['direccion'], $return['from']['nombre']);
      $this->email->to($return['to']); 
      if(isset($return['cc']))
      {
        $this->email->cc($return['cc']); 
      }
      if(isset($return['bcc']))
      {
        $this->email->bcc($return['bcc']);
      }

      $this->email->reply_to($form_data['email'], $form_data['nombre']);

      $this->email->subject('[Celsius WEB]Contacto desde el sitio web');
      $message = $this->load->view('mailContacto', $form_data, true);
      $this->email->message($message); 

      $this->email->send();
      $message = 'Mensaje enviado con exito';
      //Debug
      //echo $this->email->print_debugger();die;
    }

    $this->load->view($this->DEFAULT_LAYOUT, $this->data);
  }
  
  function logout($lang)
  {
    $this->load->library('tank_auth');
    $this->tank_auth->logout();
    $this->load->helper(array('url'));
    redirect('');
  }
  
  function login($lang)
  {
    $this->load->helper(array('form', 'url'));
    $this->load->library('form_validation');
    $this->load->library('auth/tank_auth');
    $this->loadI18n("tank_auth", $this->getLanguageFile(), FALSE, TRUE, "", "auth");
    //$this->lang->load('tank_auth');	
    $errores = array();
    if ($this->tank_auth->is_logged_in()) {									// logged in
        redirect('');
    } elseif ($this->tank_auth->is_logged_in(FALSE)) {						// logged in, not activated
        redirect('/auth/send_again/');

    } else {
        $data['login_by_username'] = ($this->config->item('login_by_username', 'tank_auth') AND
        $this->config->item('use_username', 'tank_auth'));
        $data['login_by_email'] = $this->config->item('login_by_email', 'tank_auth');

        $this->form_validation->set_rules('login', 'Login', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');

        // Get login for counting attempts to login
        if ($this->config->item('login_count_attempts', 'tank_auth') AND
                ($login = $this->input->post('login'))) {
            $login = $this->security->xss_clean($login);
        } else {
            $login = '';
        }

        $data['errors'] = array();

        if ($this->form_validation->run()) {								// validation ok
            if ($this->tank_auth->login(
                    $this->form_validation->set_value('login'),
                    $this->form_validation->set_value('password'),
                    $this->form_validation->set_value('remember'),
                    $data['login_by_username'],
                    $data['login_by_email'])) {								// success
              redirect('');
            } else {
                $errors = $this->tank_auth->get_error_message();
                if (isset($errors['banned'])) {								// banned user
                    //$this->_show_message($this->lang->line('auth_message_banned').' '.$errors['banned']);
                  $errores['banned'] = $this->lang->line('auth_message_banned').' '.$errors['banned'];
                } elseif (isset($errors['not_activated'])) {				// not activated user
                    redirect('/auth/send_again/');
                } else {													// fail
                    foreach ($errors as $k => $v)	$errores[$k] = $this->lang->line($v);
                }
            }
        }
        $this->data['errores'] = $errores;
        $this->data['login_user'] = $this->form_validation->set_value('login');
//        $this->setLang($lang);
//        $this->loadMenuData();
//        $this->data['content'] = 'home';
//        $this->data['contentTopHome'] = 'homeCarrousel';
//        $this->data['topHome'] = true;
        $this->loadIndex($lang);
        $this->load->view($this->DEFAULT_LAYOUT, $this->data);
    }
  }

  function user($lang)
  {
    if (!$this->isLogged()) {
      //Si no esta logeado se tiene que ir a loguear
      $this->session->set_userdata('url_to_direct_on_login', '');
      redirect($lang);
    }
    $this->setLang($lang);
    $this->loadMenuData();
    $this->changeUrlData('usuario.html', 'user.html');
    $this->loadI18n("usuario", $this->getLanguageFile(), FALSE, TRUE, "", "celsius");
    $this->data['content'] = 'usuario';
    
    $this->load->view($this->DEFAULT_LAYOUT, $this->data);
  }
  
  
  function search($lang)
  {
    $this->setLang($lang);
    $this->loadMenuData();
    $this->changeUrlData('usuario.html', 'user.html');
    $this->loadI18n("busqueda", $this->getLanguageFile(), FALSE, TRUE, "", "celsius");
    $this->loadI18n("producto", $this->getLanguageFile(), FALSE, TRUE, "", "celsius");
    
    $query = $this->input->get('q');
    $this->load->model('products/product');
    $this->load->model('presentations/presentation');
    
    $productos = $this->product->search($lang, $query);
    
    $presentations = $this->presentation->search($lang, $query);
    foreach($presentations as $presentation)
    {
      if(isset($productos[$presentation->product_id]))
      {
        $producto = $productos[$presentation->product_id];
        $producto->presentations[] = $presentation;
        $productos[$presentation->product_id] = $producto;
      }
      else
      {
        $producto = $this->product->getById($presentation->product_id, $lang, false, false, true);
        $producto->presentations = array();
        $producto->presentations[] = $presentation;
        $productos[$presentation->product_id] = $producto;
      }
    }
    
    $this->data['products'] = $productos;
    $this->data['content'] = 'busqueda';
    $this->data['query'] = $query;
    
    $this->load->view($this->DEFAULT_LAYOUT, $this->data);
  }
  
  function saveEditUser()
  {
    if (!$this->isLogged()) {
      //Si no esta logeado se tiene que ir a loguear
      $this->session->set_userdata('url_to_direct_on_login', '');
      throw new Exception("Usuario no logueado");
    }
    $this->data['errors'] = array();
    $this->config->load('tank_auth', false, false, 'auth');
    $this->load->library('tank_auth', true, NULL, 'auth');
    $this->load->model('auth/users');
    $this->load->helper(array('form', 'url'));
    $this->load->library('form_validation');
    $id = $this->data['user']->id;
    $user = $this->users->retrieve_user_by_id($id);
    $this->form_validation->set_rules('username', 'Usuario', 'trim|required|xss_clean|min_length[' . $this->config->item('username_min_length', 'tank_auth') . ']|max_length[' . $this->config->item('username_max_length', 'tank_auth') . ']|alpha_dash');
    $this->form_validation->set_rules('email', 'Correo electronico', 'trim|required|xss_clean|valid_email');
    $this->form_validation->set_rules('especialidad', 'Especialidad', 'trim|required|xss_clean|max_length[255]');
    $this->form_validation->set_rules('cjp', 'Número de Caja Profesional', 'trim|required|xss_clean|max_length[255]');
    $this->form_validation->set_rules('direccion', 'Dirección', 'max_length[255]');
    $this->form_validation->set_rules('telefono', 'Teléfono', 'max_length[255]');
    $data['errors'] = array();
    $valid = false;
    $oldUsername = $user->username;
    if ($this->form_validation->run()) {        // validation ok
        $valid = true;
    }
    if($_SERVER['REQUEST_METHOD'] === 'POST')
    {
      //var_dump('aca');
      $user->username = set_value('username');
      $user->email = set_value('email');
      $user->especialidad = set_value('especialidad');
      $user->cjp = set_value('cjp');
      $user->direccion = set_value('direccion');
      $user->telefono = set_value('telefono');
      $user->profile = set_value('permisos');
    }
    //var_dump($user);
    if($valid)
    {
      if($oldUsername != $user->username)
      {
        if(!$this->tank_auth->is_username_available($user->username))
        {
          $data['errors']['usernameinvalid'] = 'El nombre de usuario ya existe';
          $valid = false;
        }
      }
      if($valid)
      {
        //var_dump('lo tengo que salvar!!');
        $data = array(
            'username' => $user->username,
            'email' => $user->email,
            'especialidad' => $user->especialidad,
            'cjp' => $user->cjp,
            'direccion' => $user->direccion,
            'telefono' => $user->telefonos
        );
        $counter = $this->users->edit($data, $id);
        //var_dump($counter);
        if($counter >= 0)
        {
          $this->tank_auth->reload_user_data($id);
        }
        else
        {
          $data['errors']['dberror'] = 'Hubo un problema en el sistema, intente mas tarde';
        }
      }
    }
    $data['errors']['form'] = $this->form_validation->error_array();
    $salida = array();
    $salida['response'] = ($valid)?"OK": 'ERROR';
    $salida['errores'] = $data['errors'];
      $this->output
       ->set_content_type('application/json')
       ->set_output(json_encode($salida));
  }
  
  function changeUserPass()
  {
    if (!$this->isLogged()) {
      //Si no esta logeado se tiene que ir a loguear
      $this->session->set_userdata('url_to_direct_on_login', '');
      throw new Exception("Usuario no logueado");
    }
    $this->config->load('tank_auth', false, false, 'auth');
    $this->load->library('tank_auth', true, NULL, 'auth');
    $this->load->model('auth/users');
    $this->load->helper(array('form', 'url'));
    $this->load->library('form_validation');
    $this->form_validation->set_rules('old_password', 'Old Password', 'trim|required|xss_clean');
    $this->form_validation->set_rules('new_password', 'New Password', 'trim|required|xss_clean|min_length['.$this->config->item('password_min_length', 'tank_auth').']|max_length['.$this->config->item('password_max_length', 'tank_auth').']|alpha_dash');
    $this->form_validation->set_rules('confirm_new_password', 'Confirm new Password', 'trim|required|xss_clean|matches[new_password]');

    $data['errors'] = array();
    $valid = false;
    if ($this->form_validation->run()) {								// validation ok
        if ($this->tank_auth->change_password(
                $this->form_validation->set_value('old_password'),
                $this->form_validation->set_value('new_password'))) {	// success
            
          $valid = true;

        } else {														// fail
            $errors = $this->tank_auth->get_error_message();
            foreach ($errors as $k => $v)	$data['errors'][$k] = $this->lang->line($v);
        }
    }
    $data['errors']['form'] = $this->form_validation->error_array();
    $salida = array();
    $salida['response'] = ($valid)?"OK": 'ERROR';
    $salida['errores'] = $data['errors'];
      $this->output
       ->set_content_type('application/json')
       ->set_output(json_encode($salida));
  }
  
  function registro($lang)
  {
    $this->setLang($lang);
    $this->loadMenuData();
    $this->loadI18n("registro", $this->getLanguageFile(), FALSE, TRUE, "", "celsius");
    $this->changeUrlData('registro.html', 'register.html');
    $this->data['content'] = 'registro';
    $this->load->helper(array('form', 'url'));
    $this->load->library('form_validation');
    $this->config->load('tank_auth', false, false, 'auth');
    $this->load->library('tank_auth', true, NULL, 'auth');
    $errores = array();
    $use_username = $this->config->item('use_username', 'tank_auth');
    $this->form_validation->set_rules('username', 'Usuario', 'trim|required|xss_clean|min_length[' . $this->config->item('username_min_length', 'tank_auth') . ']|max_length[' . $this->config->item('username_max_length', 'tank_auth') . ']|alpha_dash');
    $this->form_validation->set_rules('email', 'Correo electronico', 'trim|required|xss_clean|valid_email');
    $this->form_validation->set_rules('password', 'Contraseña', 'trim|required|xss_clean|min_length[' . $this->config->item('password_min_length', 'tank_auth') . ']|max_length[' . $this->config->item('password_max_length', 'tank_auth') . ']|alpha_dash');
    $this->form_validation->set_rules('confirm_password', 'Repetir contraseña', 'trim|required|xss_clean|matches[password]');
    $this->form_validation->set_rules('especialidad', 'Especialidad', 'trim|required|xss_clean|max_length[255]');
    $this->form_validation->set_rules('cjp', 'Número de Caja Profesional', 'trim|required|xss_clean|max_length[255]');
    $this->form_validation->set_rules('direccion', 'Dirección', 'max_length[255]');
    $this->form_validation->set_rules('telefono', 'Teléfono', 'max_length[255]');
    $guardado = false;
    if ($this->form_validation->run()) {
      if (!is_null($data = $this->tank_auth->create_user(
                      $use_username ? $this->form_validation->set_value('username', 'tank_auth') : '', 
                      $this->form_validation->set_value('email'), 
                      $this->form_validation->set_value('password'), 
                      false, 
                      $this->form_validation->set_value('especialidad'), 
                      $this->form_validation->set_value('cjp'), 
                      $this->form_validation->set_value('direccion'), 
                      $this->form_validation->set_value('telefono'), 
                      'medico',
                      false
              ))) {
        $guardado = true;
        //Sending user email
        $htmlUserMail = $this->load->view('mailRegister', array(), true);
        $this->load->model('contacto/mail_db');
        $return = $this->mail_db->retrieveContactMailInfo();
        $this->load->library('email');

        $this->email->from($return['from']['direccion'], $return['from']['nombre']);
        $this->email->to($this->form_validation->set_value('email')); 
        $this->email->bcc($return['to']); 
        $this->email->subject($this->lang->line('registro_bienvenido_celsius'));
        $this->email->message($htmlUserMail); 
        $this->email->send();
        $message = "CV Enviado";
      }else{
        $errors = $this->tank_auth->get_error_message();
        $this->loadI18n("tank_auth", $this->getLanguageFile(), FALSE, TRUE, "", "auth");
        foreach ($errors as $k => $v){
          
          $errores[$k] = $this->lang->line($v);
        }
          
      }
        
    }
    $this->data['errors'] = $errores;
    $this->data['guardado'] = $guardado;
    $this->load->view($this->DEFAULT_LAYOUT, $this->data);
  }
}
