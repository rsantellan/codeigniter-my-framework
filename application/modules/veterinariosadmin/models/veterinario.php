<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/*
 */

/**
 * Description of veterinario
 *
 * @author Rodrigo Santellan
 */
class veterinario extends MY_Model{
  
  private $id;
  private $contacto;
  private $name;
  private $isboss = 0;
  private $localidad = '';
  
  function __construct()
  {
    parent::__construct();
    $this->setTablename('veterinario');
  }
    
  public function getId() {
    return $this->id;
  }

  public function setId($id) {
    $this->id = $id;
  }

  public function getContacto() {
    return $this->contacto;
  }

  public function setContacto($link) {
    $this->contacto = $link;
  }

  public function getName() {
    return $this->name;
  }

  public function setName($name) {
    $this->name = $name;
  }
  
  public function getIsboss() {
      return $this->isboss;
  }

  public function setIsboss($isboss) {
      $this->isboss = $isboss;
  }

  public function getLocalidad() {
    return $this->localidad;
  }

  public function setLocalidad($localidad) {
    $this->localidad = $localidad;
  }

  public function retrieveAll($returnObjects = FALSE, $isboss = null)
  {
    $this->db->order_by("ordinal", "desc");
    if($isboss !== null)
    {
        $this->db->where('isboss', (int)$isboss);
    }
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
        $aux = new veterinario();
        $aux->setId($obj->id);
        $aux->setName($obj->name);
        $aux->setContacto($obj->contacto);
        $aux->setLocalidad($obj->localidad);
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
    $data["contacto"] = $this->getContacto();
    $data["isboss"] = $this->getIsboss();
    $data["localidad"] = $this->getLocalidad();
    $data["ordinal"] = $this->retrieveLastOrder();
    $this->db->insert($this->getTablename(), $data);
    $id = $this->db->insert_id(); 
    
    return $id;
  }

  private function edit()
  {
    $data = array(
        'name' => $this->getName(),
        'contacto' => $this->getContacto(),
        "isboss" => $this->getIsboss(),
        "localidad" => $this->getLocalidad(),
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
          $aux = new veterinario();
          $aux->setId($obj->id);
          $aux->setName($obj->name);
          $aux->setContacto($obj->contacto);
          $aux->setIsboss($obj->isboss);
          $aux->setLocalidad($obj->localidad);
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
