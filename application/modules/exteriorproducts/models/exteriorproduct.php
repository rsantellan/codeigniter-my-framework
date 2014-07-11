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

  public function hasCountry($countryId)
  {
	if(isset($this->countries[$countryId]))
	{
	  return true;
	}
	return false;
  }
  
  public function addCountry($countryId)
  {
	$this->countries[$countryId] = $countryId;
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
  
  
  public function retrieveAll($returnObjects = FALSE, $orderBy = NULL, $loadCountries = false)
  {
	if($orderBy !== NULL)
	{
	  $this->db->order_by($orderBy, "asc");
	}
	else
	{
	  $this->db->order_by("name", "desc");
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
        $aux = $this->createObject($obj);
		if($loadCountries)
		{
		  $this->db->where('product_id', $obj->id);
		  $queryCountries = $this->db->get('product_country');
		  foreach($queryCountries->result() as $countryProduct)
		  {
			$aux->addCountry($countryProduct->country_id);
		  }  
		}
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
    $data = array(
		'name' => $this->getName(),
		'genericname' => $this->getGenericname(),
		'category_id' => $this->getCategoryid(),
		'presencetype' => $this->getPresencetype(),
		'presentation' => $this->getPresentation(),
		'compuesto' => $this->getCompuesto(),
	);
    $this->db->insert($this->getTablename(), $data);
    $id = $this->db->insert_id();
    
    return $id;
  }

  private function edit()
  {
    $data = array(
		'name' => $this->getName(),
		'genericname' => $this->getGenericname(),
		'category_id' => $this->getCategoryid(),
		'presencetype' => $this->getPresencetype(),
		'presentation' => $this->getPresentation(),
		'compuesto' => $this->getCompuesto(),
	);
    $this->db->where('id', $this->getId());
    $this->db->update($this->getTablename(), $data);

    return $this->getId();
  }
  
  public function getById($id, $return_obj = true, $loadCountries = true)
    {
      $this->db->where('id', $id);
      $this->db->limit('1');
      $query = $this->db->get($this->getTablename());
      if( $query->num_rows() == 1 ){
        // One row, match!
        $obj = $query->row();        
        if($return_obj)
        {
		  $aux = $this->createObject($obj);
		  if($loadCountries)
		  {
			$this->db->where('product_id', $id);
			$queryCountries = $this->db->get('product_country');
			foreach($queryCountries->result() as $countryProduct)
			{
			  $aux->addCountry($countryProduct->country_id);
			}  
		  }
          return $aux;
        }
        return $obj;
      } else {
        // None
        return NULL;
      }
    }  
    
	protected function createObject($row){
	  $aux = new exteriorproduct();
	  $aux->setId($row->id);
	  $aux->setName($row->name);
      $aux->setCategoryid($row->category_id);
	  $aux->setCompuesto($row->compuesto);
	  $aux->setGenericname($row->genericname);
	  $aux->setPresencetype($row->presencetype);
	  $aux->setPresentation($row->presentation);
	  return $aux;
	}
	
    public function getObjectClass()
    {
      return get_class($this);
    }
}
