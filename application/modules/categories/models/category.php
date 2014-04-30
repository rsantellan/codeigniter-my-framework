<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/*
 */

/**
 * Description of banner
 *
 * @author Rodrigo Santellan
 */
class category extends MY_Model{
  
  private $id;
  private $slug;
  private $name;
  private $lang;
  private $exists = false;
  
  function __construct()
  {
    parent::__construct();
    $this->setTablename('category');
  }
    
  public function getId() {
    return $this->id;
  }

  public function setId($id) {
    $this->id = $id;
  }

  public function getSlug() {
      return $this->slug;
  }

  public function setSlug($slug) {
      $this->slug = $slug;
  }

  public function getName() {
	return $this->name;
  }

  public function setName($name) {
	$this->name = $name;
  }

  public function getLang() {
	return $this->lang;
  }

  public function setLang($lang) {
	$this->lang = $lang;
  }
  
  public function getExists() {
      return $this->exists;
  }

  public function setExists($exists) {
      $this->exists = $exists;
  }

  public function getTranslation($id, $lang, $returnObject = true)
  {
      $this->db->where('id', $id);
      $this->db->where('lang', $lang);
      $this->db->limit('1');
      $query = $this->db->get('category_translation');
      if( $query->num_rows() == 1 ){
        $obj = $query->row();        
        if($returnObject)
        {
          return $this->createObjectFromRow($obj);
        }
        $obj->exists = true;
        return $obj;
      } else {
        if($returnObject)
        {
          $aux = new category();
          $aux->setId($id);
          $aux->setName("");
          $aux->setExists(false);
          return $aux;
        }
        $aux = new stdClass();
        $aux->id = $id;
        $aux->name = "";
        $aux->exists = false;
        return $aux;
      }
  }
  public function retrieveAll($returnObjects = FALSE, $lang = 'es', $order = 'ordinal')
  {

    $this->db->order_by($order, "desc");
    $query = $this->db->get($this->getTablename());
    $salida = array();
    foreach($query->result() as $obj)
    {
        $salida[$obj->id] = $this->getTranslation($obj->id, $lang, $returnObjects);
    }
    if($returnObjects)
    {
      uasort($salida, 'category::compareObjects');
    }
    else
    {
      uasort($salida, 'category::compareStd');
    }
    return $salida;
  }
  
  public static function compareStd($a, $b){
    return strcmp($a->name, $b->name);
  }
  
  public static function compareObjects($a, $b){
    return strcmp($a->getName(), $b->getName());
  }
  
  private function createObjectFromRow($obj)
  {
    $aux = new category();
    $aux->setId($obj->id);
    $aux->setName($obj->name);
    $aux->setLang($obj->lang);
    $aux->setSlug($obj->slug);
    $aux->setExists(true);
    return $aux;
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
      $obj = $this->getTranslation($this->getId(), $this->getLang(), false);
      if(!$obj->exists)
      {
          return $this->saveNew($this->getId());
      }
      else
      {
          return $this->edit();
      }
      
    }
  }
  
  private function saveNew($id = null)
  {
	if($id === null)
    {
        $data = array();
        $data["ordinal"] = $this->retrieveLastOrder();
        $this->db->insert($this->getTablename(), $data);
        $id = $this->db->insert_id(); 
    }
    
    
    $dataTranslation = array(
		'id' => $id,
		'lang' => $this->getLang(),
		'name' => $this->getName(),
		'slug' => $this->createSlug('slug', $this->getName(), 'category_translation', $id, 'lang', $this->getLang()),
 	);
	$this->db->insert($this->getTablename()."_translation", $dataTranslation);
    return $id;
  }

  private function edit()
  {
    $data = array(
		'name' => $this->getName(),
		'slug' => $this->createSlug('slug', $this->getName(), 'category_translation', $this->getId(), 'lang', $this->getLang()),
 	);  
    $this->db->where('id', $this->getId());
    $this->db->where('lang', $this->getLang());
    $this->db->update('category_translation', $data);

    return $this->getId();
  }
  
  public function getById($id, $lang = 'es', $return_obj = true)
    {
      return $this->getTranslation($id, $lang, $return_obj);
    }  
    
    public function getObjectClass()
    {
      return get_class($this);
    }
    
    
    public function retrieveForSortLang($showField, $lang) {
        $this->db->select(array('id', 'ordinal'));
        $this->db->order_by("ordinal", "desc");
        $query = $this->db->get($this->getTablename());
        $data = array();
        foreach($query->result() as $obj)
        {
            $aux = $this->getTranslation($obj->id, $lang);
            $auxStdClass = new stdClass();
            $auxStdClass->id = $obj->id;
            $auxStdClass->name = $aux->name;
            $data[] = $auxStdClass;
        }
        return $data;
    }

    public function retrieveAllForSelectLang($lang)
    {
      $categories = $this->retrieveAll(false, $lang);
      $data = array();
      foreach($categories as $category)
      {
        $data[$category->id] = $category->name;
      }
      return $data;
    }
}
