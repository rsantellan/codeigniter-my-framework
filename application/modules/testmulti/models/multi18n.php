<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

/* 
 */

/**
 * Description of multi18n
 *
 * @author Rodrigo Santellan <rsantellan at gmail.com>
 */
class multi18n extends MY_Model
{
  private $id;
  private $lang;
  private $name;
  private $slug;
  
  
  public function getId() {
    return $this->id;
  }

  public function setId($id) {
    $this->id = $id;
  }

  public function getLang() {
    return $this->lang;
  }

  public function setLang($lang) {
    $this->lang = $lang;
  }

  public function getName() {
    return $this->name;
  }

  public function setName($name) {
    $this->name = $name;
  }

  public function getSlug() {
    return $this->slug;
  }

  public function setSlug($slug) {
    $this->slug = $slug;
  }

    function __construct()
  {
      parent::__construct();
      $this->setTablename('multi_i18n');
  }
  
  public function getById($id, $object = true)
  {
    $this->db->where('id', $id);
    $query = $this->db->get($this->getTablename());
    $return = array();
    if( $query->num_rows() > 0 )
    {
      foreach($query->result() as $row)
      {
        if($object)
        {
          $aux = new multi18n();
          $aux->setId($id);
          $aux->setLang($row->lang);
          $aux->setName($row->name);
          $aux->setSlug($row->slug);
          $return[$row->lang] = $aux;
        }
        else
        {
          $return[$row->lang] = $row;
        }
        
      }
    }
    return $return;
  }
  
  public function retrieveNewLang($lang)
  {
    $aux = new multi18n();
    $aux->setLang($lang);
    return $aux;
  }
  
  public function getByIdAndLang($id, $lang, $object = true)
  {
    $this->db->where('id', $id);
    $this->db->where('lang', $lang);
    $this->db->limit('1');
    $query = $this->db->get($this->getTablename());
    if( $query->num_rows() == 1 )
    {
      $obj = $query->row();
      if($object)
      {
        $aux = new multi18n();
        $aux->setId($id);
        $aux->setLang($lang);
        $aux->setName($obj->name);
        $aux->setSlug($obj->slug);
        return $aux;        
      }
      else
      {
        return $obj;
      }
    }
    return NULL;
  }
  
  
  public function save()
  {
    $data = array();
    $data["id"] = $this->getId();
    $data["lang"] = $this->getLang();
    $data["name"] = $this->getName();
    $data["slug"] = $this->getSlug();
    $this->db->insert($this->getTablename(), $data);
    return true;
  }
  
}
