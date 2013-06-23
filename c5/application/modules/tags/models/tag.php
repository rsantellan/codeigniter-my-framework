<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/*
 */

/**
 * Description of tags_actas
 *
 * @author Rodrigo Santellan <rodrigo.santellan at inswitch.us>
 */
class tag extends MY_Model{
  
  private $id;
  private $color;
  private $name;
  
  function __construct()
  {
    parent::__construct();
    $this->setTablename('tags');
  }
    
  public function getId() {
    return $this->id;
  }

  public function setId($id) {
    $this->id = $id;
  }

  public function getColor() {
    return $this->color;
  }

  public function setColor($color) {
    $this->color = $color;
  }

  public function getName() {
    return $this->name;
  }

  public function setName($name) {
    $this->name = $name;
  }

  public function retrieveAllTagsOfObject($joinTable, $joinColumn, $objectId, $returnObjects = FALSE)
  {
    $this->db->select($this->getTablename().'.*');
    $this->db->from($this->getTablename());
    $join_sql = $joinTable.".id_tag = ".$this->getTablename().".id";
    $this->db->join($joinTable, $join_sql, "left");
    $this->db->where($joinTable.".".$joinColumn, $objectId);
    $query = $this->db->get();
    if(!$returnObjects)
    {
      return $query->result();
    }
    else
    {
      $salida = array();
      foreach($query->result() as $obj)
      {
        $aux = new tag();
        $aux->setId($obj->id);
        $aux->setName($obj->name);
        $aux->setColor($obj->color);
        $salida[$obj->id] = $aux;
      }
      return $salida;
    }
  }
  
  public function retrieveAllTags($returnObjects = FALSE)
  {
    $query = $this->db->get($this->getTablename());
    if(!$returnObjects)
    {
      return $query->result();
    }
    else
    {
      $salida = array();
      foreach($query->result() as $obj)
      {
        $aux = new tag();
        $aux->setId($obj->id);
        $aux->setName($obj->name);
        $aux->setColor($obj->color);
        $salida[$obj->id] = $aux;
      }
      return $salida;
    }
  }
  
  /**
   *
   * Devuelve la lista 1 sin los valores que se encuentra en la lista 2
   * 
   * @param type $list1
   * @param type $list2 
   */
  public function removeDuplicated($list1, $list2)
  {
    foreach($list2 as $key => $value)
    {
      if(isset($list1[$key]))
      {
        unset($list1[$key]);
      }
    }
    return $list1;
  }
  
  function get_random_color() 
  { 
     $c = "";
     for ($i = 0; $i<6; $i++) 
     { 
         $c .=  dechex(rand(0,15)); 
     } 
     return "#".$c; 
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
    $data["color"] = $this->get_random_color();
    $this->db->insert($this->getTablename(), $data);
    $id = $this->db->insert_id(); 
    return $id;
  }

  private function edit()
  {
    $data = array(
        'name' => $this->getName()
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
          $aux = new tag();
          $aux->setId($obj->id);
          $aux->setName($obj->name);
          $aux->setColor($obj->color);
          return $aux;
        }
        return $obj;
      } else {
        // None
        return NULL;
      }
    }  
    
    public function retrieveTagsIn($text, $joinTable, $joinColumn)
    {
      $this->db->select($this->getTablename().'.*');
      $this->db->from($this->getTablename());
      $join_sql = $joinTable.".id_tag = ".$this->getTablename().".id";
      $this->db->join($joinTable, $join_sql, "left");
      $this->db->where($joinTable.".".$joinColumn, $objectId);
      $this->db->like("name", $text);
      $query = $this->db->get();
      $salida = array();
      foreach($query->result() as $obj)
      {
        $aux = new tag();
        $aux->setId($obj->id);
        $aux->setName($obj->name);
        $aux->setColor($obj->color);
        $salida[$obj->id] = $aux;
      }
      return $salida;
    }
    
    public function getObjectClass()
    {
      return get_class($this);
    }
}
