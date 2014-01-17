<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/*
 */

/**
 * Description of presidente
 *
 * @author Rodrigo Santellan <rodrigo.santellan at inswitch.us>
 */
class presidente extends MY_Model{
  
  private $id;
  private $periodo;
  private $name;
  
  function __construct()
  {
    parent::__construct();
    $this->setTablename('presidente');
  }
    
  public function getId() {
    return $this->id;
  }

  public function setId($id) {
    $this->id = $id;
  }

  public function getPeriodo() {
    return $this->periodo;
  }

  public function setPeriodo($periodo) {
    $this->periodo = $periodo;
  }

  public function getName() {
    return $this->name;
  }

  public function setName($name) {
    $this->name = $name;
  }

  public function retrieveAll($returnObjects = FALSE, $retrieveAvatar = FALSE)
  {
    $this->db->order_by("ordinal", "desc");
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
        $data[] = $row;
      }
      return $data;
    }
    else
    {
      $salida = array();
      foreach($query->result() as $obj)
      {
        $aux = new presidente();
        $aux->setId($obj->id);
        $aux->setName($obj->name);
        $aux->setPeriodo($obj->periodo);
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
    $data["periodo"] = $this->getPeriodo();
    $data["ordinal"] = $this->retrieveLastOrder();
    $this->db->insert($this->getTablename(), $data);
    $id = $this->db->insert_id(); 
    if(!is_null($id) && $id != 0)
    {
      $ci =& get_instance();
      $ci->load->model('upload/album');
      $ci->album->createAlbum($id, $this->getObjectClass()); 
    }
    return $id;
  }

  private function edit()
  {
    $data = array(
        'name' => $this->getName(),
        'periodo' => $this->getPeriodo(),
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
          $aux = new presidente();
          $aux->setId($obj->id);
          $aux->setName($obj->name);
          $aux->setPeriodo($obj->periodo);
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