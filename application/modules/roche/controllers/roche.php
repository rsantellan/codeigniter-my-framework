<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of roche
 *
 * @author rodrigo
 */
class Roche extends MY_Controller{

  private $DEFAULT_LAYOUT = "roche_layout";
  
  function __construct() {
    parent::__construct();
    //$this->loadI18n("global", "", FALSE, TRUE, "", "sitio");
    //$this->output->cache(1);
    if(!$this->isLogged() && $this->router->method != "adminLogin")
    {
      //Si no esta logeado se tiene que ir a loguear
      $this->session->set_userdata('url_to_direct_on_login', 'inicio.html');
      redirect('auth/login'); 
    }
    $this->data["menu_id"] = "";
  }
  
  public function index()
  {
    $this->data['content'] = 'home';
    $this->load->view($this->DEFAULT_LAYOUT, $this->data);
  }
  
  public function ingresar()
  {
    $this->data['content'] = 'form_usuario';
    $this->data["menu_id"] = "ingreso";
    $this->load->model('roche_usuario_model');
    $this->load->model('roche_usuario_ficha_model');
    $this->data['usuario'] = new $this->roche_usuario_model;
    $this->data['ficha'] = new $this->roche_usuario_ficha_model;
    $this->data['errores'] = array();
    $this->addJqueryUI();
    $this->load->view($this->DEFAULT_LAYOUT, $this->data);
  }
  
  public function salvarIngreso()
  {
    $this->data["menu_id"] = "ingreso";
    $this->load->library('form_validation');
    $this->load->model('roche_usuario_model');
    $this->load->model('roche_usuario_ficha_model');
    
    $this->form_validation->set_rules('name', 'nombre', 'required|trim|max_length[255]');			
    $this->form_validation->set_rules('lastname', 'apellido', 'required|max_length[255]');			
    $this->form_validation->set_rules('ci', 'cedula', 'required|max_length[255]');			
    $this->form_validation->set_rules('phone', 'telefono', 'max_length[255]');			
    $this->form_validation->set_rules('center', 'mutualista', 'max_length[255]');
    $this->form_validation->set_rules('date', 'Fecha', '');
    
    $is_valid = false;
    if (!$this->form_validation->run() == FALSE) 
    {
      $is_valid = true;
    }
    
    $name =set_value('name'); 
    $lastname = set_value('lastname');
    $ci = set_value('ci');
    $phone = set_value('phone');
    $center = set_value('center');
    $date = set_value('date');
    //var_dump($date);die;
    $usuario = new $this->roche_usuario_model;
    $usuario->setName($name);
    $usuario->setLastname($lastname);
    $usuario->setCi($ci);
    $usuario->setPhone($phone);
    $usuario->setCenter($center);
    
    $ficha = new $this->roche_usuario_ficha_model;
    $ficha->setFechaIngreso($date);
    $errores = array();
    if($is_valid)
    {
      // La primera parte es valida por lo tanto chequeo el archivo subido
      
      //Chequeo los archivos a subir.
      $config['upload_path'] = $this->roche_usuario_ficha_model->retrieveUploadPath();
      $config['allowed_types'] = 'jpg|png|JPG|PNG';
      $this -> load -> library('upload', $config);
      
      $upload_data = array();
      if (!$this->upload->do_upload('certificado')) 
      {
        $errores['cursos_upload'] = $this->upload->display_errors();
        //$this->upload->clean_errors();
        $is_valid = false;
      }
      else
      {
        $upload_data = $this->upload->data();
        //Como es valido lo salvo
        $id = $usuario->save();
        $ficha->setRocheUsuarioFicha($id);
        $ficha->save($upload_data);
        
        $this->session->set_flashdata("salvado", "ok");
        redirect('roche/ficha/'.$id);
        die;
      }
    }
    $this->data['usuario'] = $usuario;
    $this->data['ficha'] = $ficha;
    $this->data['errores'] = $errores;
    $this->data['content'] = 'form_usuario';
    $this->data["menu_id"] = "ingreso";
    $this->addJqueryUI();
    $this->load->view($this->DEFAULT_LAYOUT, $this->data);
    
  }
  
  public function ingresoSuccess()
  {
    $this->data['content'] = 'ingresoSuccess';
    $this->data["menu_id"] = "ingreso";
    $this->addJqueryUI();
    $this->load->view($this->DEFAULT_LAYOUT, $this->data);
  }
  
  public function searchCenter()
  {
    $term = $this->input->get('term');
    $this->load->model('roche_usuario_model');
    //$this->output->enable_profiler(TRUE);
    //var_dump($term);
    echo json_encode($this->roche_usuario_model->getListWithDistinctOnKeyLikeOnValue('center', $term));
    exit(0);
    //die;
  }
  
  public function searchName()
  {
    $term = $this->input->get('term');
    $this->load->model('roche_usuario_model');
    //$this->output->enable_profiler(TRUE);
    //var_dump($term);
    echo json_encode($this->roche_usuario_model->getListWithDistinctOnKeyLikeOnValue('name', $term));
    exit(0);
    //die;
  }
  
  public function searchLastname()
  {
    $term = $this->input->get('term');
    $this->load->model('roche_usuario_model');
    //$this->output->enable_profiler(TRUE);
    //var_dump($term);
    echo json_encode($this->roche_usuario_model->getListWithDistinctOnKeyLikeOnValue('lastname', $term));
    exit(0);
    //die;
  }
  
  public function searchCi()
  {
    $term = $this->input->get('term');
    $this->load->model('roche_usuario_model');
    //$this->output->enable_profiler(TRUE);
    //var_dump($term);
    echo json_encode($this->roche_usuario_model->getListWithDistinctOnKeyLikeOnValue('ci', $term));
    exit(0);
    //die;
  }
  
  public function searchPhone()
  {
    $term = $this->input->get('term');
    $this->load->model('roche_usuario_model');
    //$this->output->enable_profiler(TRUE);
    //var_dump($term);
    echo json_encode($this->roche_usuario_model->getListWithDistinctOnKeyLikeOnValue('phone', $term));
    exit(0);
    //die;
  }
  
  public function buscar()
  {
    $this->data['content'] = 'buscar';
    $this->data["menu_id"] = "busqueda";
    $this->data['showListado'] = false;
    $this->addJqueryUI();
    $this->load->view($this->DEFAULT_LAYOUT, $this->data);
  }
  
  
  public function aBuscar()
  {
    $this->output->enable_profiler(TRUE);
    $this->load->model('roche_usuario_model');
    
    /***
     * Obtengo los datos de la consulta
     **/
    $name = $this->input->get('name');
    $lastname = $this->input->get('lastname');
    $ci = $this->input->get('ci');
    $phone = $this->input->get('phone');
    $center = $this->input->get('center');
    $date = $this->input->get('date');
    
    if($date == false && $center == false && $phone == false && $ci == false && $lastname == false && $name == false)
    {
      $parameters = unserialize($this->session->userdata('search_parameters'));
      if(isset($parameters['name'])){
        $name = $parameters['name'];
      }else{
        $name = "";
      }
      if(isset($parameters['lastname'])){
        $lastname = $parameters['lastname'];
      }else{
        $lastname = "";
      }
      if(isset($parameters['ci'])){
        $ci = $parameters['ci'];
      }else{
        $ci = "";
      }
      if(isset($parameters['phone'])){
        $phone = $parameters['phone'];
      }else{
        $phone = "";
      }
      if(isset($parameters['center'])){
        $phone = $parameters['center'];
      }else{
        $phone = "";
      }
      if(isset($parameters['date'])){
        $date = $parameters['date'];
      }else{
        $date = "";
      }
      //var_dump($parameters);
    }
    else
    {
      $parameters = array(
        'name' => $name,
        'lastname' => $lastname,
        'ci' => $ci,
        'phone' => $phone,
        'center' => $center,
        'date' => $date,
      );
      
      if(trim($name) == ""){
        unset($parameters['name']);
      }
      if(trim($lastname) == ""){
        unset($parameters['lastname']);
      }
      if(trim($ci) == ""){
        unset($parameters['ci']);
      }
      if(trim($phone) == ""){
        unset($parameters['phone']);
      }
      if(trim($center) == ""){
        unset($parameters['center']);
      }
      if(trim($date) == ""){
        unset($parameters['date']);
      }
    }
    
    /***
     * 
     * Vuelvo a pasar los datos
     * 
     **/
    $this->data['name'] = $name;
    $this->data['lastname'] = $lastname;
    $this->data['ci'] = $ci;
    $this->data['phone'] = $phone;
    $this->data['center'] = $center;
    $this->data['date'] = $date;
    
    
    /***
     * Hago la busqueda
     */
    $this->data['showListado'] = true;
    $listado = array();
    if(count($parameters) > 0)
    {
      $listado = $this->roche_usuario_model->retrieveSearch($parameters);
      $this->data['noParameters'] = false;
      $this->session->set_userdata('search_parameters', serialize($parameters));
    }
    else
    {
      $this->data['noParameters'] = true;
    }
    $this->data['listado'] = $listado;
    $this->data['content'] = 'buscar';
    $this->data["menu_id"] = "busqueda";
    $this->addJqueryUI();
    $this->load->view($this->DEFAULT_LAYOUT, $this->data);
  }
  
  
  public function ficha($id)
  {
    
    $this->output->enable_profiler(TRUE);
    $this->load->model('roche_usuario_model');
    $this->load->model('roche_usuario_ficha_model');
    $usuario = $this->roche_usuario_model->retrieveById($id);
    if(is_null($usuario))
    {
      show_error("El usuario no existe");
    }
    
    $fichas = $this->roche_usuario_ficha_model->retrieveByUsuarioId($id);
    //var_dump($fichas);
    $this->data['path'] = $this->roche_usuario_ficha_model->retrieveUploadPath();
    $this->data['usuario'] = $usuario;
    $this->data['fichas'] = $fichas;
    $this->data['menu_id'] = 'ingreso';
    $this->data['content'] = 'fichas';
    $this->load->view($this->DEFAULT_LAYOUT, $this->data);
  }
}

