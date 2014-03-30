<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/*
 */

/**
 * Description of club
 *
 * @author Rodrigo Santellan
 */
class club extends MY_Model{
  
  private $id;
  private $link;
  private $name;
  private $description;
  private $location;
  private $departmentid;
  private $numero;
  
  function __construct()
  {
    parent::__construct();
    $this->setTablename('club');
  }
    
  public function getId() {
    return $this->id;
  }

  public function setId($id) {
    $this->id = $id;
  }

  public function getLink() {
    return $this->link;
  }

  public function setLink($link) {
    $this->link = $link;
  }

  public function getName() {
    return $this->name;
  }

  public function setName($name) {
    $this->name = $name;
  }
  
  public function getDescription() {
      return $this->description;
  }

  public function setDescription($description) {
      $this->description = $description;
  }

  public function getLocation() {
      return $this->location;
  }

  public function setLocation($location) {
      $this->location = $location;
  }

  public function getDepartmentid() {
      return $this->departmentid;
  }

  public function setDepartmentid($departmentid) {
      $this->departmentid = $departmentid;
  }
  
  public function getNumero() {
      return $this->numero;
  }

  public function setNumero($numero) {
      $this->numero = $numero;
  }

  public function retrieveAll($returnObjects = FALSE, $retrieveAvatar = FALSE, $orderby = "departmentid, ordinal", $order = 'desc')
  {
    $this->db->order_by($orderby, $order);
    $query = $this->db->get($this->getTablename());
    
    if(!$returnObjects)
    {
      if(!$retrieveAvatar)
      {
        return $query->result();
      }
      $data = array();
      foreach($query->result() as $row)
      {
        
        $row->avatar = $this->retrieveAvatar("default", $row->id);
        $row->avatarCamiseta = $this->retrieveAvatar("camiseta", $row->id);
        $data[] = $row;
      }
      return $data;
    }
    else
    {
      $salida = array();
      foreach($query->result() as $obj)
      {
        $aux = new club();
        $aux->setId($obj->id);
        $aux->setName($obj->name);
        $aux->setLink($obj->link);
        $aux->setDescription($obj->description);
        $aux->setLocation($obj->location);
        $aux->setDepartmentid($obj->departmentid);
        $aux->setNumero($obj->number);
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
    $data["link"] = $this->getLink();
    $data["ordinal"] = $this->retrieveLastOrder();
    $data["description"] = $this->getDescription();
    $data["location"] = $this->getLocation();
    $data["departmentid"] = $this->getDepartmentid();
    $data["number"] = $this->getNumero();
    
    $this->db->insert($this->getTablename(), $data);
    $id = $this->db->insert_id(); 
    if(!is_null($id) && $id != 0)
    {
      $ci =& get_instance();
      $ci->load->model('upload/album');
      $ci->album->createAlbum($id, $this->getObjectClass()); 
      $ci->album->createAlbum($id, $this->getObjectClass(), 'camiseta'); 
    }
    return $id;
  }

  private function edit()
  {
    $data = array(
        'name' => $this->getName(),
        'link' => $this->getLink(),
        'description' => $this->getDescription(),
        'location' => $this->getLocation(),
        'departmentid' => $this->getDepartmentid(),
        'number' => $this->getNumero(),
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
          $aux = new club();
          $aux->setId($obj->id);
          $aux->setName($obj->name);
          $aux->setLink($obj->link);
          $aux->setDescription($obj->description);
          $aux->setLocation($obj->location);
          $aux->setDepartmentid($obj->departmentid);
          $aux->setNumero($obj->number);
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
