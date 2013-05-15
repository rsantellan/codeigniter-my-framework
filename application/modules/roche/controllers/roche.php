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
      //var_dump($config);
      $this -> load -> library('upload', $config);
      //$this->upload->initialize($config);
      
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
        
        try{
          $id = $usuario->save();
          $ficha->setRocheUsuarioFicha($id);
          $ficha->save($upload_data);

          $this->session->set_flashdata("salvado", "ok");
          redirect('roche/ficha/'.$id);
          die;
        }catch(Exception $e)
        {
          $is_valid = false;
          $errores[] = "<p>CI duplicada</p>";
        }
        
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
    //$this->output->enable_profiler(TRUE);
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
    $order_aux = $this->input->get('order');
    $order_type = $this->input->get('type');
    
    if($date == false && $center == false && $phone == false && $ci == false && $lastname == false && $name == false)
    {
      $parameters = unserialize($this->session->userdata('search_parameters'));
      if($parameters == false)
        $parameters = array();
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
    if($order_aux == false || is_null($order_aux))
    {
      $order = "roche_usuarios.name";
      $order_type = "desc";
      $order_aux = 'name';
    }
    else
    {
      $order = "";
      switch ($order_aux) {
        case "name":
          $order = "roche_usuarios.name";
          break;
        case "lastname":
          $order = "roche_usuarios.lastname";
          break;
        case "center":
          $order = "roche_usuarios.center";
          break;
        case "fecha":
          $order = "roche_usuarios_ficha.fecha_ingreso";
          break;
        default:
          $order = "roche_usuarios.name";
          break;
      }
      //var_dump($order_aux);
      //var_dump($order_type);
    }
    //var_dump($parameters);die;
    /***
     * 
     * Vuelvo a pasar los datos
     * 
     **/
    $this->data['order'] = $order_aux;
    $this->data['order_type'] = $order_type;
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
      $listado = $this->roche_usuario_model->retrieveSearch($parameters, $order, $order_type);
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
    
    //$this->output->enable_profiler(TRUE);
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
    $this->addJquery();
    $this->data['use_noty'] = true;
    $this->addJavascript("roche/fichas.js");
    $this->load->view($this->DEFAULT_LAYOUT, $this->data);
  }
  
  public function editar($id)
  {
    //$this->output->enable_profiler(TRUE);
    $this->data['use_noty'] = true;
    $this->load->model('roche_usuario_model');
    $this->load->model('roche_usuario_ficha_model');
    $usuario = $this->roche_usuario_model->retrieveById($id, true);
    if(is_null($usuario))
    {
      show_error("El usuario no existe");
    }
    $errores = array();
    $is_valid = false;
    if($this->input->server('REQUEST_METHOD') == "POST")
    {
      //Como es post obtenga la ficha a la cual subir el archivo
      $ficha_id = $this->input->post('ficha_id');
      $obj = $this->roche_usuario_ficha_model->retrieveById($ficha_id, true);
      if(is_null($obj))
      {
        $is_valid = false;
      }
      else
      {
        //Chequeo los archivos a subir.
        $config['upload_path'] = $this->roche_usuario_ficha_model->retrieveUploadPath();
        $config['allowed_types'] = 'jpg|png|JPG|PNG';
        $this -> load -> library('upload', $config);
        
        $upload_data = array();
        if (!$this->upload->do_upload('certificado')) 
        {
          $errores[$ficha_id] = $this->upload->display_errors();
          //$this->upload->clean_errors();
          $is_valid = false;
        }
        else
        {
          $is_valid = true;
          $upload_data = $this->upload->data();
          //Como es valido lo salvo
          
          //Primero borro el archivo anterior
          $obj->deletePhisicalFile();
          
          try{
            //$id = $usuario->save();
            //$ficha->setRocheUsuarioFicha($id);
            $obj->setFilepath($upload_data["file_path"]);
            $obj->setFilename($upload_data["file_name"]);
            $obj->save();

            $this->session->set_flashdata("salvado", "ok");
            //redirect('roche/edit/'.$id);
            //die;
          }catch(Exception $e)
          {
            $is_valid = false;
            $errores[] = "<p>CI duplicada</p>";
          }
        }
      }
      //var_dump($is_valid);
      //var_dump($errores);
    }
    $fichas = $this->roche_usuario_ficha_model->retrieveByUsuarioId($id);
    //var_dump($fichas);
    $this->data['path'] = $this->roche_usuario_ficha_model->retrieveUploadPath();
    $this->data['usuario'] = $usuario;
    $this->data['fichas'] = $fichas;
    $this->data['errores'] = $errores;
    $this->data['is_valid'] = $is_valid;
    $this->data['menu_id'] = 'ingreso';
    $this->data['content'] = 'editar';
    $this->addJavascript("roche/editUserFile.js");
    $this->addJqueryUI();
    $this->load->view($this->DEFAULT_LAYOUT, $this->data);
  }
  
  public function salvarUsuarioSimple()
  {
    if( $this->input->is_ajax_request())
    {
      $this->load->library('form_validation');
      $this->load->model('roche_usuario_model');
      
      $this->form_validation->set_rules('name', 'nombre', 'required|trim|max_length[255]');			
      $this->form_validation->set_rules('lastname', 'apellido', 'required|max_length[255]');			
      $this->form_validation->set_rules('ci', 'cedula', 'required|max_length[255]');			
      $this->form_validation->set_rules('phone', 'telefono', 'max_length[255]');			
      $this->form_validation->set_rules('center', 'mutualista', 'max_length[255]');      
      $is_valid = false;
      $errores = "";
      if (!$this->form_validation->run() == FALSE) 
      {
        $is_valid = true;
        $name =set_value('name'); 
        $lastname = set_value('lastname');
        $ci = set_value('ci');
        $phone = set_value('phone');
        $center = set_value('center');
        // Get ID from form
        $id = $this->input->post('id', true);
        
        //var_dump($date);die;
        $usuario = new $this->roche_usuario_model;
        $usuario->setName($name);
        $usuario->setLastname($lastname);
        $usuario->setCi($ci);
        $usuario->setPhone($phone);
        $usuario->setCenter($center);
        $usuario->setId($id);
        try{
          $usuario->save();
        }catch(Exception $e)
        {
          $is_valid = false;
          $errores = "<p>CI duplicada</p>";
        }
        
        
      }else{
        $errores = validation_errors();
      }
      echo json_encode(array('response' => ($is_valid)? "OK": "ERROR", 'errores' => $errores));
      die(0);
    }
  }
  
  public function salvarFechaSimple()
  {
    if( $this->input->is_ajax_request())
    {
      $this->load->library('form_validation');
      $this->load->model('roche_usuario_ficha_model');

      $this->form_validation->set_rules('date', 'Fecha', '');

      $is_valid = false;
      if (!$this->form_validation->run() == FALSE) 
      {
        $is_valid = true;
      }
      
      $date = $this->input->post('date');
      if(trim($date) == "") 
        $date = NULL;
      $id = $this->input->post('id');
      $obj = $this->roche_usuario_ficha_model->retrieveById($id, true);
      
      if(is_null($obj))
      {
        $is_valid = false;
      }
      else
      {
        
        $obj->setFechaIngreso($date);
        $obj->save();
      }
      $errores = "";
      echo json_encode(array('response' => ($is_valid)? "OK": "ERROR", 'errores' => $errores));
      die(0);
    }
  }
  
  public function agregarCertificado($id)
  {
    //$this->output->enable_profiler(TRUE);
    $this->load->library('form_validation');
    $this->load->model('roche_usuario_ficha_model');

    $this->form_validation->set_rules('date', 'Fecha', '');

    $is_valid = false;
    if (!$this->form_validation->run() == FALSE) 
    {
      $is_valid = true;
    }
    $date = set_value('date');
    
    if(trim($date) == "") 
      $date = NULL;
    
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
        
        try{
          $ficha->setRocheUsuarioFicha($id);
          $ficha->save($upload_data);

          $this->session->set_flashdata("ficha_salvada", "ok");
          redirect('roche/ficha/'.$id);
          die;
        }catch(Exception $e)
        {
          $is_valid = false;
          $errores[] = "<p>CI duplicada</p>";
        }
        
      }
    }
    $this->addJqueryUI();
    $this->data['errores'] = $errores;
    $this->data["id"] = $id;
    $this->data['ficha'] = $ficha;
    $this->data['menu_id'] = 'ingreso';
    $this->data['content'] = 'form_certificado';
    $this->load->view($this->DEFAULT_LAYOUT, $this->data);
  }
  
  public function imprimir($id)
  {
    $this->load->model('roche_usuario_model');
    $this->load->model('roche_usuario_ficha_model');
    $usuario = $this->roche_usuario_model->retrieveById($id);
    if(is_null($usuario))
    {
      show_error("El usuario no existe");
    }
    
    $fichas = $this->roche_usuario_ficha_model->retrieveByUsuarioId($id);
    //var_dump($id);
    $this->load->library('fpdf');
    $this->load->library('mypdf');
    $this->mypdf->pdf = new mypdf();
    
    $this->mypdf->loadUser($usuario);
    $add_page = false;
    foreach($fichas as $ficha)
    {
      $this->mypdf->loadFile($ficha, $add_page);
      $add_page = true;
    }
    
    //$this->mypdf->AddPage('P');
    
    //$m = 'something';
    //$this->mypdf->MultiCell(250, 4, $m, 0, "C");
    $file_name = $usuario->id." ".$usuario->name." ".$usuario->lastname.".pdf";
    $this->mypdf->Output($file_name, "D");
    exit(0);
  }
  
  public function eliminar($id){
    
    $this->load->model('roche_usuario_model');
    $this->load->model('roche_usuario_ficha_model');
    $usuario = $this->roche_usuario_model->retrieveById($id, true);
    if(is_null($usuario))
    {
      show_error("El usuario no existe");
    }
    $fichas = $this->roche_usuario_ficha_model->retrieveByUsuarioId($id, true);
    $errores = "";
    $is_valid = false;
    $do_delete = true;
    foreach($fichas as $ficha){
      if($do_delete)
      {
        $is_valid = $ficha->delete();
        if(!$is_valid)
        {
          $do_delete = false;
          $errores = "Error borrando los certificados";
        }  
      }
    }
    if($do_delete)
    {
      $is_valid = $usuario->simpleDeleteById($usuario->getId());
    }
    echo json_encode(array('response' => ($is_valid)? "OK": "ERROR", 'errores' => $errores));
    die(0);
  }
  
  public function eliminarCertificado($id){
    $this->load->model('roche_usuario_ficha_model');
    $ficha = $this->roche_usuario_ficha_model->retrieveById($id, true);
    $errores = "";
    $is_valid = false;
    if(is_null($ficha))
    {
      // error
      $errores = "No existe el certificado a eliminar";
    }
    else 
    {
      //Ok
      //Delete object
      $is_valid = $ficha->delete();
    }
    echo json_encode(array('response' => ($is_valid)? "OK": "ERROR", 'errores' => $errores));
    die(0);
  }
}

