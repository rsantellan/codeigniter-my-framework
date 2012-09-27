<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

/* 
 */

/**
 * Description of jfilebrowser
 *
 * @author Rodrigo Santellan <rodrigo.santellan at inswitch.us>
 */
class jfilebrowser extends MY_Controller
{
  
  public function __construct() {
    parent::__construct();
    if(!$this->isLogged())
    {
      //Si no esta logeado se tiene que ir a loguear
      $this->session->set_userdata('url_to_direct_on_login', 'contactoadmin/index');
      redirect('auth/login'); 
    }
    $this->load->library('upload/mupload');
    $this->load->library('mImagick/mimagick');
    $this->load->helper('upload/mimage');
    $this->load->model('jfilebrowser/jfilebrowser_model');
    $this->loadI18n("jfilebrowser");
  }
  
  public function index()
  {
    
    //Pido directorios
    $this->data['directorios'] = $this->jfilebrowser_model->directoryList();
    $this->load->view('index', $this->data);
  }
  
  public function templateCrearDirectorio()
  {
    $this->load->view('templateCrearDirectorio', $this->data);
  }
  
  public function crearDirectorio()
  {
    $returnData = array();
    try
    {
        $name = $this->input->post('nombre', true);
        if(!$name)
        {
            throw new Exception('nombreVacio', 100);
        }
        $name = preg_replace("/[^A-Za-z0-9]/", "", $name);
        //$name = ereg_replace("[^A-Za-z0-9]", "", $name);
        $this->jfilebrowser_model->createDirectory($name);

        $directorios = $this->jfilebrowser_model->directoryList();
        $body = $this->load->view('index', array('directorios' => $directorios), true);
        //return $this->renderText(json_encode(array('response' => 'OK', 'content' => $this->getPartial('index', array('directorios' => $directorios)))));
        $returnData["response"] = "OK";
        $returnData["content"] = $body;
        
    }
    catch(Exception $e)
    {
        //TO DO
        //manejar codigo de exepciones para mostrar mensaje adecuado
        //return $this->renderText(json_encode(array('response' => 'ERROR', 'content' => $e->getMessage())));
        $returnData["response"] = "ERROR";
        $returnData["content"] = $e->getMessage();
    }
    echo json_encode($returnData);
    
  }
  
  public function verCategoria()
  {
    
    $name = $this->input->post('id');
    if(!$name)
    {
      $name = $this->input->get('id');
    }
    $view = $this->input->post('view');
    if(!$view)
    {
      $view = 'thumbnails';
    }
    if($view != "thumbnails")
    {
      $view = "list";
    }
    $archivos = $this->jfilebrowser_model->getFiles($name);
    $salida = $this->load->view('menu_categorias', array('id' => $name, 'activo' => $view), true);
    $salida .= $this->load->view($view, array('directorio' => $name, 'archivos' => $archivos), true);
    echo $salida;
  }
  
  public function templateSubirArchivo()
  {
    //Pido directorios
    
    $this->data['directorios'] = $this->jfilebrowser_model->directoryList();
    $this->data['id'] = $this->input->post('directorio');
    $this->load->view('templateSubirArchivo', $this->data);
    //return $this->renderText($this->getPartial( 'templateSubirArchivo', array('directorios' => $directorios) ));
  }
  
  public function borrarArchivo()
  {
    
    $name = $this->input->post('name');
    $directorio = $this->input->post('directorio');
    $view = $this->input->post('view');
    
    try
    {
      // Borro
      $this->jfilebrowser_model->deleteFile($directorio, $name);
      $archivos = $this->jfilebrowser_model->getFiles($directorio);
      if(!$view)
      {
        $view = 'thumbnails';
      }
      if($view != "thumbnails")
      {
        $view = "list";
      }
      $salida = $this->load->view($view, array('directorio' => $directorio, 'archivos' => $archivos), true);
      echo json_encode(array('response' => 'OK', 'content' => $salida));
    }
    catch(Exception $e)
    {
      echo json_encode(array('response' => 'ERROR', 'content' => $e->getMessage()));
    }
  }
  
  public function borrarDirectorio()
  {
    $name = $this->input->post('nombre');
    
    try
    {
      // Borro
      $this->jfilebrowser_model->deleteDirectory($name);
      $this->data['directorios'] = $this->jfilebrowser_model->directoryList();
      $this->data['id'] = $this->input->post('directorio');
      $salida = $this->load->view('templateSubirArchivo', $this->data, true);
      
      echo json_encode(array('response' => 'OK', 'content' => $salida));
    }
    catch(Exception $e)
    {
      echo json_encode(array('response' => 'ERROR', 'content' => $e->getMessage()));
    }
  }
  
  public function templateView()
  {
    $name = $this->input->post('name');
    $directorio = $this->input->post('directorio'); 
    try 
    {
      $archivo = $this->jfilebrowser_model->find($directorio, $name);
      $this->data['archivo'] = $archivo;
      $this->data['directorio'] = $directorio;
      $salida = $this->load->view('templateView', $this->data, true);
      echo json_encode(array('response' => 'OK', 'content' => $salida));
    }
    catch(Exception $e)
    {
      echo json_encode(array('response' => 'ERROR', 'content' => $e->getMessage()));
    }
    
  }
  
  public function getUrl()
  {
    $ancho = $this->input->post('width');
    $alto = $this->input->post('height');
    $directorio = $this->input->post('directory');
    $name = $this->input->post('name');
    $archivo = $this->jfilebrowser_model->find($directorio, $name);
    $path = thumbnail_image($archivo['original'], $ancho, $alto);
	log_message("debug", base_url().$path);
	log_message("debug", "/".$path);
	$variables = explode("/", $path);
	$aux = array();
	foreach($variables as $var)
	{
	  if($var == "..")
	  {
		array_pop($aux);
	  }
	  else
	  {
		$aux[] = $var;
	  }
	}
	$sPath = implode("/", $aux);
	log_message("debug", "/".$sPath);
	echo "/".$sPath;
    
  }
}
