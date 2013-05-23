<?php
if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/**
 * Description of roche_usuario_ficha_model
 *
 * @author rodrigo
 */
class roche_usuario_ficha_model extends MY_Model{
  
  private $id;
  private $fecha_ingreso;
  private $filepath;
  private $filename;
  private $roche_usuario_ficha;
  
  function __construct()
  {
      parent::__construct();
      $this->setTablename('roche_usuarios_ficha');
  }
  
  public function getId() {
    return $this->id;
  }

  public function setId($id) {
    $this->id = $id;
  }

  public function getFechaIngreso() {
    return $this->fecha_ingreso;
  }

  public function setFechaIngreso($fecha_ingreso) {
    $this->fecha_ingreso = $fecha_ingreso;
  }

  public function getRocheUsuarioFicha() {
    return $this->roche_usuario_ficha;
  }

  public function setRocheUsuarioFicha($roche_usuario_ficha) {
    $this->roche_usuario_ficha = $roche_usuario_ficha;
  }


  public function getFilepath() {
    return $this->filepath;
  }

  public function setFilepath($filepath) {
    $this->filepath = $filepath;
  }

  public function getFilename() {
    return $this->filename;
  }

  public function setFilename($filename) {
    $this->filename = $filename;
  }

  public function retrieveUploadPath()
  {
    return "./assets/uploads/roche/";
  }
  
  public function isNew()
  {
    if($this->getId() == "" || is_null($this->getId()))
    {
      return true;
    }
  }
  
  public function save($upload_data = array())
  {
    if($this->isNew())
    {
      return $this->saveNew($upload_data);
    }
    else
    {
      return $this->edit($upload_data);
    }
  }
  
  private function saveNew($upload_data)
  {
    $data = array();
    $data["roche_usuarios_id"] = $this->getRocheUsuarioFicha();
    $data["fecha_ingreso"] = $this->getFechaIngreso();
    $data["filepath"] = $upload_data["file_path"];
    $data["filename"] = $upload_data["file_name"];
    $this->db->insert($this->getTablename(), $data);
    $id = $this->db->insert_id(); 
    return $id;
  }
  
  private function edit($upload_data)
  {
    
    $data = array();
    $data["roche_usuarios_id"] = $this->getRocheUsuarioFicha();
    $data["fecha_ingreso"] = $this->getFechaIngreso();
    $data["filepath"] = $this->getFilepath();// $upload_data["file_path"];
    $data["filename"] = $this->getFilename();// $upload_data["file_name"];
    $this->db->where('id', $this->getId());
    $this->db->update($this->getTablename(), $data);
    return $this->getId();
  }
  
  public function retrieveById($id, $retrieve_object = false)
  {
    $this->db->where('id', $id);
    $query = $this->db->get($this->getTablename());
    
    if( $query->num_rows() == 1 ){
      
      if(!$retrieve_object)
      {
        return $query->row(); 
      }
      else
      {
        $aux = $query->row();
        $obj = new roche_usuario_ficha_model();
        $obj->setFechaIngreso($aux->fecha_ingreso);
        $obj->setRocheUsuarioFicha($aux->roche_usuarios_id);
        $obj->setFilepath($aux->filepath);
        $obj->setFilename($aux->filename);
        $obj->setId($aux->id);
        return $obj;
      }
      
    }else{
      return NULL;
    }
  }
  
  public function retrieveByUsuarioId($usuario_id, $retrieve_object = false)
  {
    $this->db->where('roche_usuarios_id', $usuario_id);
    $query = $this->db->get($this->getTablename());
    $data = array();
    if($query->num_rows() > 0)
    {
      foreach($query->result() as $row)
      {
        if(!$retrieve_object)
        {
          $data[] = $row;
        }
        else
        {
          $obj = new roche_usuario_ficha_model();
          $obj->setFechaIngreso($row->fecha_ingreso);
          $obj->setRocheUsuarioFicha($row->roche_usuarios_id);
          $obj->setFilepath($row->filepath);
          $obj->setFilename($row->filename);
          $obj->setId($row->id);
          $data[] = $obj;
        }
        
      }
    }
    return $data;
  }
  
  public function delete()
  {
    if($this->deletePhisicalFile())
    {
      return parent::simpleDeleteById($this->getId());
    }
  }
  
  public function deletePhisicalFile()
  {
    $file = $this->getFilepath().$this->getFilename();
    if (file_exists($file)) { 
      @unlink ($file); 
    }
    return true;
  }

  public function retrieveStatics()
  {
      return $this->db->count_all($this->getTablename());
  }

  
}
