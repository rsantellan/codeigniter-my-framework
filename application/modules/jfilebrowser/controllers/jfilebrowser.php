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
    $this->load->library('upload/mupload');
    $this->load->helper('upload/mimage');
    $this->load->model('jfilebrowser/jfilebrowser_model');
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
    //$directorios = array();
    //$directorios = jfilebrowser::directoryList();
    $this->data['directorios'] = $this->jfilebrowser_model->directoryList();
    $this->data['id'] = $this->input->post('directorio');
    $this->load->view('templateSubirArchivo', $this->data);
    //return $this->renderText($this->getPartial( 'templateSubirArchivo', array('directorios' => $directorios) ));
  }
  
}
