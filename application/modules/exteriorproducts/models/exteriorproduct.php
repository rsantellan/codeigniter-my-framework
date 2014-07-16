<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/*
 */

/**
 * Description of exteriorproduct
 *
 * @author Rodrigo Santellan
 */
class exteriorproduct extends MY_Model{
  
  private $id;
  private $name;
  private $genericname;
  private $presentation;
  private $countryid;
  private $categoryid;
  private $presencetype;
  private $compuesto;
  private $countries = array();
  private $exists = false;
  private $lang;
  
  function __construct()
  {
    parent::__construct();
    $this->setTablename('product_exterior');
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

  public function getGenericname() {
	return $this->genericname;
  }

  public function setGenericname($genericname) {
	$this->genericname = $genericname;
  }

  public function getPresentation() {
	return $this->presentation;
  }

  public function setPresentation($presentation) {
	$this->presentation = $presentation;
  }

  public function getCountryid() {
	return $this->countryid;
  }

  public function setCountryid($countryid) {
	$this->countryid = $countryid;
  }

  public function getCategoryid() {
	return $this->categoryid;
  }

  public function setCategoryid($categoryid) {
	$this->categoryid = $categoryid;
  }

  public function getPresencetype() {
	return $this->presencetype;
  }

  public function setPresencetype($presencetype) {
	$this->presencetype = $presencetype;
  }

  public function getCompuesto() {
	return $this->compuesto;
  }

  public function setCompuesto($compuesto) {
	$this->compuesto = $compuesto;
  }

  public function getExists() {
      return $this->exists;
  }

  public function setExists($exists) {
      $this->exists = $exists;
  }
  
  public function getLang() {
	return $this->lang;
  }

  public function setLang($lang) {
	$this->lang = $lang;
  }  
  
  public function hasCountry($countryId)
  {
	if(isset($this->countries[$countryId]))
	{
	  return true;
	}
	return false;
  }
  
  public function retrieveCountry($countryId)
  {
    if(isset($this->countries[$countryId]))
	{
	  return $this->countries[$countryId];
	}
	return NULL;
  }
  
  public function addCountry($countryId, $countryObject)
  {
	$this->countries[$countryId] = $countryObject;
  }
  
  public function getCountries(){
    return $this->countries;
  }
  
  public function saveCountries($id, $countriesList)
  {
	$this->db->where('product_id', $id);
	$this->db->delete('product_country');
	foreach($countriesList as $country)
	{
	  $this->db->insert('product_country', array('product_id' => $id, 'country_id' => $country));
	}
  }
  
  public function retrieveAllCountries()
  {

	$salida = array();
	foreach($this->db->get('country')->result() as $country)
	{
	  $salida[$country->id] = $country;
	}
	return $salida;
  }

  public function retrieveCountryType()
  {
	return array(
		"C" => 'Presencia directa de Celsius',
		"R" => 'Presencia a través de representantes',
	);
  }
  
  
  public function retrieveAll($returnObjects = FALSE, $lang = 'es', $orderBy = NULL, $loadCountries = false)
  {
	if($orderBy !== NULL)
	{
	  $this->db->order_by($orderBy, "asc");
	}
	else
	{
	  $this->db->order_by("id", "desc");
	}
    
    $query = $this->db->get($this->getTablename());
	$salida = array();
    foreach($query->result() as $obj)
	{
	  $aux = $this->getTranslation($obj->id, $lang, $returnObjects);
	  if($returnObjects)
	  {
		$aux->setCategoryid($obj->category_id);
		if($loadCountries)
		{
		  $this->db->where('product_id', $obj->id);
		  $queryCountries = $this->db->get('product_country');
		  foreach($queryCountries->result() as $countryProduct)
		  {
			$aux->addCountry($countryProduct->country_id, $countryProduct);
		  }  
		}
	  }
	  else
	  {
		$aux->category_id = $obj->category_id;
	  }
	  $salida[$obj->id] = $aux;
	}
	return $salida;
  }
  
  public function getTranslation($id, $lang, $returnObject = true)
  {
      $this->db->where('id', $id);
      $this->db->where('lang', $lang);
      $this->db->limit('1');
      $query = $this->db->get('product_exterior_translation');
      if( $query->num_rows() == 1 ){
        $obj = $query->row();        
        if($returnObject)
        {
          return $this->createObject($obj);
        }
        $obj->exists = true;
        return $obj;
      } else {
        if($returnObject)
        {
          $aux = new exteriorproduct();
          $aux->setId($id);
		  $aux->setName('');
		  $aux->setLang('');
		  $aux->setCompuesto('');
		  $aux->setGenericname('');
		  $aux->setPresentation('');
		  $aux->setCategoryid(0);
		  $aux->setExists(false);
          return $aux;
        }
        $aux = new stdClass();
        $aux->id = $id;
        $aux->name = "";
        $aux->genericname = '';
        $aux->compuesto = '';
        $aux->presentation = '';
        $aux->exists = false;
        return $aux;
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
  
  private function saveNew($id = NULL)
  {
	if($id === null)
	{
	  $data = array(
		'category_id' => $this->getCategoryid(),
	  );
	  $this->db->insert($this->getTablename(), $data);
	  $id = $this->db->insert_id();
	}
	else
	{
	  $this->editObject();
	}
    $dataTranslation = array(
		'name' => $this->getName(),
		'genericname' => $this->getGenericname(),
		'lang' => $this->getLang(),
		'id' =>$id,
		'presentation' => $this->getPresentation(),
		'compuesto' => $this->getCompuesto(),
	);
    $this->db->insert($this->getTablename()."_translation", $dataTranslation);
    return $id;
  }

  private function editObject() {
    $data = array(
		'category_id' => $this->getCategoryid(),
	  );
    $this->db->where('id', $this->getId());
    $this->db->update($this->getTablename(), $data);
  }
  
  private function edit()
  {
	$this->editObject();
    $data = array(
		'name' => $this->getName(),
		'genericname' => $this->getGenericname(),
		'presentation' => $this->getPresentation(),
		'compuesto' => $this->getCompuesto(),
	);
    $this->db->where('id', $this->getId());
    $this->db->where('lang', $this->getLang());
    $this->db->update($this->getTablename()."_translation", $data);

    return $this->getId();
  }
  
  public function getById($id, $lang = 'es', $return_obj = true, $loadCountries = true)
  {
	  $aux =  $this->getTranslation($id, $lang, $return_obj);
      $this->db->where('id', $id);
      $this->db->limit('1');
      $query = $this->db->get($this->getTablename());
      if( $query->num_rows() == 1 ){
        // One row, match!
        $obj = $query->row();        
        if($return_obj)
        {
		  $aux->setCategoryid($obj->category_id);
		  if($loadCountries)
		  {
			$this->db->where('product_id', $id);
			$queryCountries = $this->db->get('product_country');
			foreach($queryCountries->result() as $countryProduct)
			{
              $aux->addCountry($countryProduct->country_id, $countryProduct);
			}  
		  }
          return $aux;
        }
		$aux->category_id = $obj->category_id;
        return $aux;
      } else {
        // None
        return NULL;
      }
    }  
    
	protected function createObject($row){
	  $aux = new exteriorproduct();
	  $aux->setId($row->id);
	  $aux->setName($row->name);
	  $aux->setLang($row->lang);
	  $aux->setCompuesto($row->compuesto);
	  $aux->setGenericname($row->genericname);
	  $aux->setPresentation($row->presentation);
	  return $aux;
	}
	
    public function getObjectClass()
    {
      return get_class($this);
    }
    
    public function saveCountry($productId, $countryId, $presencetype)
    {
      $data = array();
      $data["product_id"] = $productId;
      $data["country_id"] = $countryId;
      $data["presencetype"] = $presencetype;
      $this->db->insert('product_country', $data);
      $rows = $this->db->affected_rows();
      
      if($rows > 0){
        return true;
      }
      return false;
    }
    
    public function removeCountry($productId, $countryId)
    {
      $this->db->where('product_id', $productId);
      $this->db->where('country_id', $countryId);
      $this->db->delete('product_country');
    }
}
