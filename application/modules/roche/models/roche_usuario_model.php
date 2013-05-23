<?php
if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/**
 * Description of roche_usuario_model
 *
 * @author rodrigo
 */
class roche_usuario_model extends MY_Model{
  
  private $id;
  private $name;
  private $lastname;
  private $ci;
  private $phone;
  private $center;
  
  function __construct()
  {
      parent::__construct();
      $this->setTablename('roche_usuarios');
  }
  
  public function getId() {
    return $this->id;
  }

  public function setId($id) {
    $this->id = $id;
  }

  public function getName() {
    return $this->name;
  }

  public function setName($name) {
    $this->name = $name;
  }

  public function getLastname() {
    return $this->lastname;
  }

  public function setLastname($lastname) {
    $this->lastname = $lastname;
  }

  public function getCi() {
    return $this->ci;
  }

  public function setCi($ci) {
    $this->ci = $ci;
  }

  public function getPhone() {
    return $this->phone;
  }

  public function setPhone($phone) {
    $this->phone = $phone;
  }

  public function getCenter() {
    return $this->center;
  }

  public function setCenter($center) {
    $this->center = $center;
  }
  
  public function isNew()
  {
    if($this->getId() == "" || is_null($this->getId()))
    {
      return true;
    }
    return false;
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
    $data["name"] = $this->getName();
    $data["lastname"] = $this->getLastname();
    $data["ci"] = $this->getCi();
    $data["phone"] = $this->getPhone();
    $data["center"] = $this->getCenter();
    $res = $this->db->insert($this->getTablename(), $data);
    if(!$res)
    {
      throw new Exception($this->db->_error_message());
    }
    $id = $this->db->insert_id();
    
    return $id;
  }
  
  private function edit()
  {
    $data = array();
    $data["name"] = $this->getName();
    $data["lastname"] = $this->getLastname();
    $data["ci"] = $this->getCi();
    $data["phone"] = $this->getPhone();
    $data["center"] = $this->getCenter();
    $this->db->where('id', $this->getId());
    $res = $this->db->update($this->getTablename(), $data);
    if(!$res)
    {
      throw new Exception($this->db->_error_message());
    }
    return $this->getId();
  }

  
  public function getListWithDistinctOnKeyLikeOnValue($key, $value)
  {
    $this->db->select('distinct('.$key.')');
    $this->db->like($key, $value);
    $query = $this->db->get($this->getTablename());
    $resultado = array();
    if($query->num_rows() > 0)
    {
      foreach($query->result() as $row)
      {
        $resultado[] = $row->$key;
      }
    }
    return $resultado;
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
        $obj = new roche_usuario_model();
        $obj->setName($aux->name);
        $obj->setLastname($aux->lastname);
        $obj->setCi($aux->ci);
        $obj->setPhone($aux->phone);
        $obj->setCenter($aux->center);
        $obj->setId($aux->id);
        return $obj;
      }
      
    }else{
      return NULL;
    }
  }
  
  public function retrieveStatics()
  {
      return $this->db->count_all($this->getTablename());
  }
  
  public function retrieveSearch($parameters = array(), $order_by = "roche_usuarios.name", $order_type = "desc", $limit = null)
  {
    if(isset($parameters['date']))
    {
      $parameters['roche_usuarios_ficha.fecha_ingreso'] = $parameters['date'];
      unset($parameters['date']);
    }
    
    $this->db->where($parameters);
    if(is_null($order_by))
    {
      $this->db->order_by("roche_usuarios.id", "desc"); 
    }
    else
    {
      $this->db->order_by($order_by, $order_type);
    }
    if(!is_null($limit))
    {
      $limit_number = (int) $limit;
      if($limit_number > 0)
      {
        $this->db->limit($limit);
      }
    }
    $this->db->join('roche_usuarios_ficha', 'roche_usuarios_ficha.roche_usuarios_id = roche_usuarios.id');
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


