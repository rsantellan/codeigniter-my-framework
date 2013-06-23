<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

/* 
 */

/**
 * Description of Multi
 *
 * @author Rodrigo Santellan <rsantellan at gmail.com>
 */
class multi extends MY_Model
{
  private $id;
  private $fecha;
  private $color;
  private $langList;
  
  
  public function getId() {
    return $this->id;
  }

  public function setId($id) {
    $this->id = $id;
  }

  public function getFecha() {
    return $this->fecha;
  }

  public function setFecha($fecha) {
    $this->fecha = $fecha;
  }

  public function getColor() {
    return $this->color;
  }

  public function setColor($color) {
    $this->color = $color;
  }

  public function getLangList() {
    return $this->langList;
  }

  public function setLangList($langList) {
    $this->langList = $langList;
  }

  function __construct()
  {
      parent::__construct();
      $this->setTablename('multi');
  }
  
  public function record_count() 
  {
      return $this->db->count_all($this->getTableName());
  }
  
  public function retrieveObject($id = null)
  {
    $obj = NULL;
    $langs = $this->config->item('supported_languages');
    //var_dump($langs);
    if(!is_null($id))
    {
      $obj = $this->getById($id, true);
      $aux = new multi18n();
      $obj->setLangList($aux->getById($id, true));
    }
    else
    {
      $obj = new multi();
      $list = array();
      
      foreach($langs as $key => $value)
      {
        $aux = new multi18n();
        $aux->setLang($key);
        $list[$key] = $aux;
      }
      $obj->setLangList($list);
    }
    
    return $obj;
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
        $aux = new multi();
        $aux->setId($obj->id);
        $aux->setFecha($obj->fecha);
        $aux->setColor($obj->color);
        return $aux;
      }
      return $obj;
    } else {
      // None
      return NULL;
    }
  }
  
  public function retrieveData()
  {
    $this->db->select('*');
    $this->db->from($this->getTableName());
    $this->db->join('multi_i18n', 'multi_i18n.id = '.$this->getTableName().'.id');
    $this->db->where('multi_i18n.lang', "es");
    $query = $this->db->get();
    
    $data = array();
    if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }
        return $data;
    }
    return $data;
   
  }
  
  public function isNew()
  {
    if($this->getId() == "" || is_null($this->getId()))
    {
      return true;
    }
    else
    {
      return false;
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
  
  private function edit()
  {
    $data = array();
    $data["color"] = $this->getColor();
    $data["fecha"] = $this->getFecha();
    $this->db->where('id', $this->getId());
    $this->db->update($this->getTablename(), $data);
    $aux = new multi18n();
    $aux->deleteById($this->getId());
    foreach($this->getLangList() as $value)
    {
      $value->setId($this->getId());
      $value->save();
    }
    return $this->getId();
  }
  
  private function saveNew()
  {
    $data = array();
    $data["color"] = $this->getColor();
    $data["fecha"] = $this->getFecha();
    $this->db->insert($this->getTablename(), $data);
    $id = $this->db->insert_id(); 
    $aux = new multi18n();
    $aux->deleteById($id);
    foreach($this->getLangList() as $value)
    {
      $value->setId($id);
      $value->save();
    }
    return $id;
  }
}
