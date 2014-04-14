<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/*
 */

/**
 * Description of new
 *
 * @author Rodrigo Santellan
 */
class mnew extends MY_Model{
  
  private $id;
  private $slug;
  private $name;
  private $description;
  private $lang;
  private $exists = false;
  private $isSlider = 0;
  
  function __construct()
  {
    parent::__construct();
    $this->setTablename('mnew');
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
  
  public function getDescription() {
	return $this->description;
  }

  public function setDescription($description) {
	$this->description = $description;
  }
  
  public function getIsSlider() {
	return $this->isSlider;
  }

  public function setIsSlider($isSlider) {
	$this->isSlider = $isSlider;
  }

  public function getTranslation($id, $lang, $returnObject = true)
  {
      $this->db->where('id', $id);
      $this->db->where('lang', $lang);
      $this->db->limit('1');
      $query = $this->db->get('mnew_translation');
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
          $aux = new mnew();
          $aux->setId($id);
          $aux->setName("");
		  $aux->setDescription("");
          $aux->setExists(false);
          return $aux;
        }
        $aux = new stdClass();
        $aux->id = $id;
        $aux->name = "";
        $aux->exists = false;
		$aux->description = "";
		$aux->slug = "";
        return $aux;
      }
  }
  
  public function retrieveAllSlider($lang = 'es')
  {
    $this->db->where('slider', 1);
    $this->db->order_by("ordinal", "desc");
    $query = $this->db->get($this->getTablename());
    $salida = array();
    foreach($query->result() as $obj)
    {
      $aux = $this->getTranslation($obj->id, $lang, false);
      $aux->avatar = $this->retrieveAvatar("default", $obj->id);
      $aux->slider = $obj->slider;
      $salida[$obj->id] = $aux;
    }
    return $salida;
  }
  
  public function retrieveAll($returnObjects = FALSE, $lang = 'es', $retrieveAvatar = false, $limit = null, $offset = null)
  {
    $this->db->order_by("ordinal", "desc");
	if($limit !== null && $offset !== null)
	{
	  $this->db->limit($limit, $offset);
	}
	
    $query = $this->db->get($this->getTablename());
    $salida = array();
    foreach($query->result() as $obj)
    {
		$aux = $this->getTranslation($obj->id, $lang, $returnObjects);
		if(!$returnObjects && $retrieveAvatar)
		{
		  $aux->avatar = $this->retrieveAvatar("default", $obj->id);
		  $aux->slider = $obj->slider;
		}
		else
		{
		  $aux->setIsSlider($obj->slider);
		}
        $salida[$obj->id] = $aux;
    }
    return $salida;
  }
  
  private function createObjectFromRow($obj)
  {
    $aux = new mnew();
    $aux->setId($obj->id);
    $aux->setName($obj->name);
    $aux->setLang($obj->lang);
    $aux->setSlug($obj->slug);
	$aux->setDescription($obj->description);
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
    $is_new = false;
	if($id === null)
    {
        $is_new = true;
        $data = array();
		$data["slider"] = $this->getIsSlider();
		$data["ordinal"] = $this->retrieveLastOrder();
        $this->db->insert($this->getTablename(), $data);
        $id = $this->db->insert_id(); 
    }
	else
	{
	  $this->editObject();
	}
    
    
    $dataTranslation = array(
		'id' => $id,
		'lang' => $this->getLang(),
		'name' => $this->getName(),
		'description' => $this->getDescription(),
		'slug' => $this->createSlug('slug', $this->getName(), 'mnew_translation', $id, 'lang', $this->getLang()),
 	);
	$this->db->insert($this->getTablename()."_translation", $dataTranslation);
	if($is_new && !is_null($id) && $id != 0)
    {
      $ci =& get_instance();
      $ci->load->model('upload/album');
      $ci->album->createAlbum($id, $this->getObjectClass()); 
    }
    return $id;
  }

  private function editObject()
  {
	$data = array();
	$data["slider"] = $this->getIsSlider();
	$this->db->where('id', $this->getId());
	$this->db->update($this->getTablename(), $data);
  }
  
  private function edit()
  {
	$this->editObject();
    $data = array(
		'name' => $this->getName(),
		'slug' => $this->createSlug('slug', $this->getName(), 'mnew_translation', $this->getId(), 'lang', $this->getLang()),
		'description' => $this->getDescription(),
 	);  
    $this->db->where('id', $this->getId());
    $this->db->where('lang', $this->getLang());
    $this->db->update('mnew_translation', $data);

    return $this->getId();
  }
  
  public function getById($id, $lang = 'es', $return_obj = true, $retrieveAvatar = false)
    {
      $aux =  $this->getTranslation($id, $lang, $return_obj);
	  $this->db->where('id', $id);
      $this->db->limit('1');
      $query = $this->db->get($this->getTablename());
      if( $query->num_rows() == 1 ){
		$obj = $query->row();
		if($return_obj)
		{
		  $aux->setIsSlider($obj->slider);
		}
		else
		{
          if($retrieveAvatar)
          {
              $aux->avatar = $this->retrieveAvatar("default", $obj->id);
          }
		  $aux->slider = $obj->slider;
		}
	  }
	  return $aux;
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

}
