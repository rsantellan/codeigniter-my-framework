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
      $this->output->enable_profiler(TRUE);
    $this->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file'));
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

  public function index($lang = 'es') {
    $this->setLang($lang);
    $this->loadMenuData();
    $this->data['content'] = 'home';
    $this->data['contentTopHome'] = 'homeCarrousel';
    $this->data['topHome'] = true;
    $this->load->view($this->DEFAULT_LAYOUT, $this->data);
  }

  public function presentacion($lang) {
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

  public function infraestructura($lang) {
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

  public function mercados($lang) {
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

  public function recursoshumanos($lang) {
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

  public function salonconferencias($lang) {
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

  public function novedades($lang, $page = 1) {
    $this->data['menu'] = 'novedades';
    $this->data['submenu'] = 'novedades';
    $this->setLang($lang);
    $this->loadMenuData();
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
    $this->data['menu'] = 'casoestudio';
    $this->data['submenu'] = 'casoestudio';
    $this->setLang($lang);
    $this->loadMenuData();
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

    $this->data['menu'] = 'eventos';
    $this->data['submenu'] = 'eventos';
    $this->setLang($lang);
    $this->loadMenuData();
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

    $this->data['menu'] = 'congresos';
    $this->data['submenu'] = 'congresos';
    $this->setLang($lang);
    $this->loadMenuData();
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
    
    $this->loadUsedProduct($this->product->getById($usedProduct->id, $lang, false, true));
    $this->data['content'] = 'categoria';
    $this->load->view($this->DEFAULT_LAYOUT, $this->data);
  }

  private function loadUsedProduct($productStdObject)
  {
    $this->load->model('presentations/presentation');
    $this->data['presentations'] = $this->presentation->retrieveAll(false, $this->getLang(), $productStdObject->id, true);
    $this->data['usedProduct'] = $productStdObject;
    $this->data['medicdata'] = $this->product->retrieveMedicAlbumData($this->getLang(), $productStdObject->id);
  }
  
  public function consultamedico($lang) {
    $this->data['menu'] = 'consulta_medicos';
    $this->data['submenu'] = 'consulta_medicos';
    $this->setLang($lang);
    $this->loadMenuData();
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

    if (!$this->_ciRegex($this->input->post('cedula_identidad'))) {
      $errores['cedula_identidad'] = 'Cedula de identidad con formato incorrecto.';
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

}
