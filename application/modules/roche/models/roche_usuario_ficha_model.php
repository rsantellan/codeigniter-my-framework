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
  private $roche_usuario_ficha;
  private $fecha_ingreso;
  
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

  public function getRocheUsuarioFicha() {
    return $this->roche_usuario_ficha;
  }

  public function setRocheUsuarioFicha($roche_usuario_ficha) {
    $this->roche_usuario_ficha = $roche_usuario_ficha;
  }

  public function getFechaIngreso() {
    return $this->fecha_ingreso;
  }

  public function setFechaIngreso($fecha_ingreso) {
    $this->fecha_ingreso = $fecha_ingreso;
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
  
  public function save($upload_data)
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
    $data["nombre"] = $this->getNombre();
    $data["cliente"] = $this->getCliente();
    $data["tipo_de_trabajo"] = $this->getTipo_trabajo();
    $data["descripcion"] = $this->getDescripcion();
    $data["updated_at"] =  date('Y-m-d H:i:s');
    $this->db->where('id', $this->getId());
    $this->db->update($this->getTablename(), $data);

    return $this->getId();
  }
  
  public function retrieveByUsuarioId($usuario_id)
  {
    $this->db->where('roche_usuarios_id', $usuario_id);
    $query = $this->db->get($this->getTablename());
    $data = array();
    if($query->num_rows() > 0)
    {
      foreach($query->result() as $row)
      {
        $data[] = $row;
      }
    }
    return $data;
  }


  
}
