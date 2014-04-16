<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/*
 */

/**
 * Description of events
 *
 * @author Rodrigo Santellan
 */
class events extends MY_Controller {

  function __construct() {
    parent::__construct();
    $this->data['menu_id'] = 'events';
    if (!$this->isLogged()) {
      //Si no esta logeado se tiene que ir a loguear
      $this->session->set_userdata('url_to_direct_on_login', 'events/index');
      redirect('auth/login');
    }
    else
    {
      $user = $this->getLoggedUserData();
      if(isset($user->profile) && $user->profile !== 'admin')
      {
        $this->session->set_flashdata("permission", "No tiene los permisos suficientes");
        redirect('');
      }
    }
//	  $this->output->enable_profiler(TRUE);  
  }

  function index($lang = 'es') {
    $this->setLang($lang);
    $this->load->model('events/event');
    $this->data['objects_list'] = $this->event->retrieveAll(false, $this->getLang(), true);
    $this->data['content'] = "events/list";
    $this->load->helper('upload/mimage');
    $this->load->library('upload/mupload');
    $this->load->helper('text');
    $this->load->helper('htmlpurifier');

    $this->addJquery();
    $this->addColorbox();
    $this->addModuleJavascript("datatable", "jquery.dataTables.min.js");
    $this->addModuleStyleSheet('datatable', 'jquery.dataTables.css');
    $this->addModuleStyleSheet('datatable', 'data_table_admin.css');
    //$this->addModuleJavascript("actaadmin", "list.js");
    $this->addModuleJavascript("admin", "adminManager.js");

    $this->load->view("admin/layout", $this->data);
  }

  function add($lang = 'es') {
    $this->setLang($lang);
    $this->addModuleJavascript("admin", "adminManager.js");
    $this->addModuleJavascript("admin", "tiny_mce/tiny_mce_src.js");
    $this->load->model('events/event');
    $this->data['use_grid_16'] = false;
    $this->data['content'] = "events/add";
    $this->data['object'] = new $this->event;
    $this->load->view("admin/layout", $this->data);
  }

  function edit($lang, $id) {
    $this->setLang($lang);
    $this->addUploadModuleAssets();
    $this->addModuleJavascript("admin", "adminManager.js");
    $this->addModuleJavascript("admin", "tiny_mce/tiny_mce_src.js");
    $this->load->model('events/event');
    $this->data['use_grid_16'] = false;
    $this->data['content'] = "events/edit";
    $this->data['object'] = $this->event->getById($id, $this->getLang());
    $this->load->view("admin/layout", $this->data);
  }

  function save() {
    $this->load->library('form_validation');
    $this->load->model('events/event');
    // Get ID from form
    $id = $this->input->post('id', true);
    $lang = $this->input->post('lang', true);
    $this->setLang($lang);
    $this->form_validation->set_rules('name', 'Nombre', 'required|max_length[255]');
    $this->form_validation->set_rules('description', 'Descripcion', 'max_length[255]');
    $this->form_validation->set_rules('members', 'Miembros', 'max_length[255]');

    $this->form_validation->set_error_delimiters('<p class="error">', '</p>');

    $is_valid = false;
    if (!$this->form_validation->run() == FALSE) {
      $is_valid = true;
    }
    $name = set_value('name');
    $description = set_value('description');
    $members = set_value('members');
    //var_dump($nombre);
    $obj = new $this->event;
    $obj->setName($name);
    $obj->setLang($lang);
    $obj->setDescription($description);
    $obj->setMembers($members);
    
    $obj->setId($id);
    //var_dump($obj);

    if ($is_valid) {
      //Como es valido lo salvo
      $id = $obj->save();
      $this->session->set_flashdata("salvado", "ok");
      redirect('events/edit/' . $lang . "/" . $id);
    } else {
      if ($obj->isNew()) {
        $this->data['use_grid_16'] = false;
        $this->data['content'] = "events/add";
        $this->data['object'] = $obj;
        $this->load->view("admin/layout", $this->data);
      } else {
        $this->addUploadModuleAssets();
        $this->addModuleJavascript("admin", "adminManager.js");
        $this->addModuleJavascript("admin", "tiny_mce/tiny_mce_src.js");
        $this->data['use_grid_16'] = false;
        $this->data['content'] = "events/edit";
        $this->data['object'] = $obj;
        $this->load->view("admin/layout", $this->data);
      }
    }
  }

  function delete($id) {
    $this->load->model('events/event');
    $result = $this->event->deleteById($id);
    $salida['response'] = "OK";
    $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($salida));
    //echo json_encode($salida);
    //die;
  }

}
