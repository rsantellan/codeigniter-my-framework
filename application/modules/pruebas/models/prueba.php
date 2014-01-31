<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/*
 */

/**
 * Description of tags_actas
 *
 * @author Rodrigo Santellan
 */
class prueba extends MY_Model{
  
  const PRUEBALARGA = 1;
  const PRUEBACORTA = 2;
    
  private $id;
  
  private $name;
  
  private $type;
  
  function __construct()
  {
    parent::__construct();
    $this->setTablename('prueba');
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

  public function getType() {
      return $this->type;
  }

  public function setType($type) {
      $this->type = $type;
  }

  public function getPruebasType()
  {
      return array(
          self::PRUEBALARGA => 'Prueba Larga',
          self::PRUEBACORTA => 'Prueba Corta',
      );
  }
  
  public function retrieveAllForSelect()
  {
      return $this->getPruebasType();
  }
  
  public function retrieveAll($returnObjects = FALSE, $getAvatares = false, $type = null)
  {
    $this->db->order_by("ordinal", "desc");
    if($type !== null)
    {
        $this->db->where('type', $type);
    }
    $query = $this->db->get($this->getTablename());
    
    if(!$returnObjects)
    {
      if(!$getAvatares)
      {
        return $query->result();
      }
      $data = array();
      foreach($query->result() as $row)
      {
        
        $row->clasificado = $this->retrieveAvatar("clasificado", $row->id);
        $row->puntaje = $this->retrieveAvatar("puntaje", $row->id);
        $data[] = $row;
      }
      return $data;
      
    }
    else
    {
      $salida = array();
      foreach($query->result() as $obj)
      {
        $aux = new prueba();
        $aux->setId($obj->id);
        $aux->setName($obj->name);
        $aux->setType($obj->type);
        $salida[$obj->id] = $aux;
      }
      return $salida;
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
    $data["name"] = $this->getName();
    $data["type"] = $this->getType();
    $data["ordinal"] = $this->retrieveLastOrder();
    $this->db->insert($this->getTablename(), $data);
    $id = $this->db->insert_id(); 
    if(!is_null($id) && $id != 0)
    {
      $ci =& get_instance();
      $ci->load->model('upload/album');
      $ci->album->createAlbum($id, $this->getObjectClass(), 'clasificado'); 
      $ci->album->createAlbum($id, $this->getObjectClass(), 'puntaje'); 
    }
    return $id;
  }

  private function edit()
  {
    $data = array(
        'name' => $this->getName(),
        'type' => $this->getType(),
     );
    $this->db->where('id', $this->getId());
    $this->db->update($this->getTablename(), $data);

    return $this->getId();
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
          $aux = new prueba();
          $aux->setId($obj->id);
          $aux->setName($obj->name);
          $aux->setType($obj->type);
          return $aux;
        }
        return $obj;
      } else {
        // None
        return NULL;
      }
    }  
    
    public function getObjectClass()
    {
      return get_class($this);
    }
}
