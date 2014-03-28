<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/*
 */

/**
 * Description of product
 *
 * @author Rodrigo Santellan
 */
class product extends MY_Model{
  
  private $id;
  private $slug;
  private $name;
  private $receta = 0;
  private $lang;
  private $exists = false;
  private $categories = array();
  
  function __construct()
  {
    parent::__construct();
    $this->setTablename('product');
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
  
  public function getReceta() {
	return $this->receta;
  }

  public function setReceta($receta) {
	$this->receta = $receta;
  }

  public function hasCategory($categoryId)
  {
	if(isset($this->categories[$categoryId]))
	{
	  return true;
	}
	return false;
  }
  
  public function addCategory($categoryId)
  {
	$this->categories[$categoryId] = $categoryId;
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
      $query = $this->db->get('product_translation');
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
          $aux = new product();
          $aux->setId($id);
          $aux->setName("");
		  $aux->setReceta(0);
          $aux->setExists(false);
          return $aux;
        }
        $aux = new stdClass();
        $aux->id = $id;
        $aux->name = "";
		$aux->receta = 0;
        $aux->exists = false;
        return $aux;
      }
  }
  public function retrieveAll($returnObjects = FALSE, $lang = 'es', $retrieveAvatar = false, $categoryId = null, $limit = null, $offset = null)
  {
    if($categoryId !== null)
    {
      $this->db->join('product_category', 'product_category.product_id = product.id');
      $this->db->where('product_category.category_id', $categoryId);
    }
    $this->db->order_by("ordinal", "desc");
    $query = $this->db->get($this->getTablename());
    $salida = array();
    foreach($query->result() as $obj)
    {
		$aux = $this->getTranslation($obj->id, $lang, $returnObjects);
		if (!$returnObjects) {
        $aux->receta = $obj->receta;
		if ($retrieveAvatar) {
			$aux->avatar = $this->retrieveAvatar('imagen', $obj->id);
		  }
		} else {
		  $aux->setReceta($obj->receta);
		}
        $salida[$obj->id] = $aux;
    }
    if($returnObjects)
    {
      usort($salida, 'product::compareObjects');
    }
    else
    {
      usort($salida, 'product::compareStd');
    }
    return $salida;
  }
  
  public static function compareStd($a, $b){
    return strcmp($a->name, $b->name);
  }
  
  public static function compareObjects($a, $b){
    return strcmp($a->getName(), $b->getName());
  }
  
  public function retrieveByCategory($lang, $categoryId)
  {
    return $this->retrieveAll(false, $lang, false, $categoryId);
  }
  
  public function search($lang, $query)
  {
    $this->db->where('lang', $lang);
    $this->db->like('name', $query);
    $data = $this->db->get('product_translation')->result();
    $return = array();
    foreach($data as $obj)
    {
      $obj->presentations = array();
      $this->db->where('product_id', $obj->id);
      $queryCategories = $this->db->get('product_category');
      $obj->categories = array();
      foreach($queryCategories->result() as $categoryProduct)
      {
        $obj->categories[$categoryProduct->category_id] = $categoryProduct->category_id;
      }
      $return[$obj->id] = $obj;
    }
    return $return;
  }
  
  private function createObjectFromRow($obj)
  {
    $aux = new product();
    $aux->setId($obj->id);
    $aux->setName($obj->name);
    $aux->setLang($obj->lang);
    $aux->setSlug($obj->slug);
	//$aux->setReceta($obj->receta);
    $aux->setExists(true);
    return $aux;
  }
  
  public function isNew(){
    if($this->getId() == "" || is_null($this->getId()))
    {
      return true;
    }
  }
  
  public function saveCategories($categoriesList)
  {
	
	$this->db->where('product_id', $this->getId());
	$this->db->delete('product_category');
	foreach($categoriesList as $category)
	{
	  $this->db->insert('product_category', array('product_id' => $this->getId(), 'category_id' => $category));
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
        $data["receta"] = $this->getReceta();
        $this->db->insert($this->getTablename(), $data);
        $id = $this->db->insert_id(); 
    }else {
      $this->editObject();
    }
    
    
    $dataTranslation = array(
		'id' => $id,
		'lang' => $this->getLang(),
		'name' => $this->getName(),
		'slug' => $this->createSlug('slug', $this->getName(), 'product_translation', $id, 'lang', $this->getLang()),
 	);
	$this->db->insert($this->getTablename()."_translation", $dataTranslation);
	if (!is_null($id) && $id != 0) {
      $ci = & get_instance();
      $ci->load->model('upload/album');
      $ci->album->createAlbum($id, $this->getObjectClass(), 'imagen');
      $ci->album->createAlbum($id, $this->getObjectClass(), 'medico-es');
      $ci->album->createAlbum($id, $this->getObjectClass(), 'medico-en');
    }
	$this->setId($id);
    return $id;
  }

  public function retrieveMedicAlbumData($lang, $id)
  {
    return $this->retrieveAlbumsContents(array($id), 'medico-'.$lang, $this->getObjectClass());
  }
  
  private function editObject() {
    $data = array();
    $data["receta"] = $this->getReceta();
    $this->db->where('id', $this->getId());
    $this->db->update($this->getTablename(), $data);
  }
  
  private function edit()
  {
	$this->editObject();
    $data = array(
		'name' => $this->getName(),
		'slug' => $this->createSlug('slug', $this->getName(), 'product_translation', $this->getId(), 'lang', $this->getLang()),
 	);  
    $this->db->where('id', $this->getId());
    $this->db->where('lang', $this->getLang());
    $this->db->update('product_translation', $data);

    return $this->getId();
  }
  
  public function getById($id, $lang = 'es', $return_obj = true, $retrieveAvatar = false, $loadCategories = false)
  {
	$aux =  $this->getTranslation($id, $lang, $return_obj);
	$this->db->where('id', $id);
    $this->db->limit('1');
    $query = $this->db->get($this->getTablename());
    if ($query->num_rows() == 1) {
      $obj = $query->row();
      if ($return_obj) {
		$aux->setReceta($obj->receta);
		if($loadCategories)
        {
          $this->db->where('product_id', $id);
          $queryCategories = $this->db->get('product_category');
          foreach($queryCategories->result() as $categoryProduct)
          {
            $aux->addCategory($categoryProduct->category_id);
          }  
        }
      } else {
        if ($retrieveAvatar) {
          $aux->avatar = $this->retrieveAvatar('imagen', $obj->id);
        }
        if($loadCategories)
        {
          $this->db->where('product_id', $id);
          $queryCategories = $this->db->get('product_category');
          $aux->categories = array();
          foreach($queryCategories->result() as $categoryProduct)
          {
            $aux->categories[$categoryProduct->category_id] = $categoryProduct->category_id;
          }
        }
		$aux->receta = $obj->receta;
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
    
    public function retrieveAllForSelectLang($lang) {
      $products = $this->retrieveAll(false, $lang);
      $data = array();
      foreach($products as $product)
      {
        $data[$product->id] = $product->name;
      }
      return $data;
      
    }
}
