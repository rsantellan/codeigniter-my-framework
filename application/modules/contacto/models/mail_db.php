<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/*
 */

/**
 * Description of mail_db
 *
 * @author Rodrigo Santellan
 */
class mail_db extends MY_Model{
  
  private $id;
  private $direccion;
  private $tipo;
  private $nombre;
  private $funcion;
  private $arr_tipo = array(""=>"", "from"=>"from", "to"=>"to", "cc"=>"cc", "bcc"=>"bcc", "reply"=>"reply");
  private $arr_funcion = array("contacto"=>"contacto");
  
  function __construct()
  {
      parent::__construct();
      $this->setTablename('mail_db');
  }
  
  public function getId() {
      return $this->id;
  }
    
  public function getDireccion() {
      return $this->direccion;
  }
  
  public function getTipo() {
      return $this->tipo;
  }
  
  public function getArrTipo() {
      return $this->arr_tipo;
  }
  
  public function getNombre() {
      return $this->nombre;
  }
  
  public function getFuncion() {
      return $this->funcion;
  }
  
  public function getArrFuncion() {
      return $this->arr_funcion;
  }
  
  public function setId($id) {
      $this->id = $id;
  }
  
  public function setDireccion($direccion) {
      $this->direccion = $direccion;
  }
  
  public function setTipo($tipo) {
      $this->tipo = $tipo;
  }
  
  public function setNombre($nombre) {
      $this->nombre = $nombre;
  }
  
  public function setFuncion($funcion) {
      $this->funcion = $funcion;
  }
  
  function retrieveMailInfoByFuncion($function)
  {
    $this->db->where('funcion', $function);
    $query = $this->db->get($this->getTablename());
    $from = array();
    $to = array();
    $cc = array();
    $bcc = array();
    $reply = array();
    
    foreach($query->result() as $row)
    {
      switch ($row->tipo) {
        case "to":
          $to[] = $row->direccion;
          //$to['nombre'] = $row->nombre;
          break;
        case "from":
          $from['direccion'] = $row->direccion;
          $from['nombre'] = $row->nombre;
          break;
        case "cc":
          $cc[] = $row->direccion;
          break;
        case "bcc":
          $bcc[] = $row->direccion;
          break;
        case "reply":
          $reply['direccion'] = $row->direccion;
          $reply['nombre'] = $row->nombre;
          break;
        default:
          break;
      }
    }
    $return = array();
    $return['from'] = $from;
    $return['to'] = $to;
    $return['cc'] = $cc;
    $return['bcc'] = $bcc;
    $return['reply'] = $reply;
    return $return;
  }
  
  function retrieveContactMailInfo()
  {
    return $this->retrieveMailInfoByFuncion('contacto');
  }
  
  
  
  public function retrieveAllMailDbData()
  {
    $this->db->order_by("funcion", "desc");
    $query = $this->db->get($this->getTablename());
    $retorno = array();
    $ultimo = "";
    foreach($query->result() as $row)
    {
      if(!isset($retorno[$row->funcion]))
      {
        $retorno[$row->funcion] = array();
      }
      $retorno[$row->funcion][] = $row;
    }
    return $retorno;
  }
  
  public function deleteById($id)
  {
    $this->db->where('id', $id);
    return $this->db->delete($this->getTablename());
  }
  
  public function getById($id, $return_obj = true)
    {
      $this->db->where('id', $id);
      $this->db->limit('1');
      $query = $this->db->get($this->getTablename());
      if( $query->num_rows() == 1 ){
        // One row, match!
        $obj = $query->row();        
        if($return_obj)
        {
          $aux = new mail_db();
          $aux->setId($obj->id);
          $aux->setDireccion($obj->direccion);
          $aux->setTipo($obj->tipo);
          $aux->setNombre($obj->nombre);
          $aux->setFuncion($obj->funcion);
          return $aux;
        }
        return $obj;
      } else {
        // None
        return NULL;
      }
    }
    
    public function isNew(){
      if($this->getId() == "" || is_null($this->getId()))
      {
        return true;
      }
    }
    
    public function save()
    {
      if($this->isNew())
      {
        return $this->saveNew();
      }
      else
      {
        return $this->edit();
      }
    }
    
    private function saveNew()
    {
      $data = array();
      $data["direccion"] = $this->getDireccion();
      $data["tipo"] = $this->getTipo();
      $data["nombre"] = $this->getNombre();
    $data["funcion"] = $this->getFuncion();
      $this->db->insert($this->getTablename(), $data);
      $id = $this->db->insert_id(); 
      return $id;
    }
    
    private function edit()
    {
    $data = array();
      $data["direccion"] = $this->getDireccion();
      $data["nombre"] = $this->getNombre();
    $data["tipo"] = $this->getTipo();
    $data["funcion"] = $this->getFuncion();
      $this->db->where('id', $this->getId());
      $this->db->update($this->getTablename(), $data);
      
      return $this->getId();
    }
}
