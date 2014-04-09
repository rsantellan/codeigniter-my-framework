<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/*
 */

/**
 * Description of presentation
 *
 * @author Rodrigo Santellan
 */
class presentation extends MY_Model{
  
  private $id;
  private $productId;
  private $slug;
  private $name;
  private $genericname;
  private $activeComponent;
  private $action;
  //private $receta = 0;
  private $lang;
  private $exists = false;
  private $countries = array();
  private $exteriorName = '';
  private $exteriorPresentation = '';
  
  function __construct()
  {
    parent::__construct();
    $this->setTablename('presentation');
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
  
  public function getProductId() {
    return $this->productId;
  }

  public function setProductId($productId) {
    $this->productId = $productId;
  }

  public function getGenericname() {
    return $this->genericname;
  }

  public function setGenericname($genericname) {
    $this->genericname = $genericname;
  }

  public function getActiveComponent() {
    return $this->activeComponent;
  }

  public function setActiveComponent($activeComponent) {
    $this->activeComponent = $activeComponent;
  }

  public function hasCountry($countryId)
  {
	if(isset($this->countries[$countryId]))
	{
	  return true;
	}
	return false;
  }
  
  public function addCountry($country)
  {
	$this->countries[$country->country_id] = $country;
  }
  
  public function getCountries()
  {
    return $this->countries;
  }
  
  public function getAction() {
    return $this->action;
  }

  public function setAction($action) {
    $this->action = $action;
  }

  public function getExists() {
      return $this->exists;
  }

  public function setExists($exists) {
      $this->exists = $exists;
  }
  
  public function getExteriorName() {
	return $this->exteriorName;
  }

  public function setExteriorName($exteriorName) {
	$this->exteriorName = $exteriorName;
  }

  public function getExteriorPresentation() {
	return $this->exteriorPresentation;
  }

  public function setExteriorPresentation($exteriorPresentation) {
	$this->exteriorPresentation = $exteriorPresentation;
  }

  public function getTranslation($id, $lang, $returnObject = true)
  {
      $this->db->where('id', $id);
      $this->db->where('lang', $lang);
      $this->db->limit('1');
      $query = $this->db->get('presentation_translation');
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
          $aux = new presentation();
          $aux->setId($id);
          $aux->setName("");
		  $aux->setGenericname("");
          $aux->setAction('');
          $aux->setActiveComponent('');
          $aux->setProductId(0);
          $aux->setExists(false);
          return $aux;
        }
        $aux = new stdClass();
        $aux->id = $id;
        $aux->name = "";
        $aux->slug = '';
        $aux->genericname = '';
        $aux->activecomponent = '';
        $aux->action = '';
        $aux->nombre_exterior = '';
        $aux->presentacion_exterior = '';
        $aux->exists = false;
        return $aux;
      }
  }
  public function retrieveAll($returnObjects = FALSE, $lang = 'es', $productId = null, $retrieveAvatar = false, $limit = null, $offset = null)
  {
    $this->db->order_by("ordinal", "desc");
    if($productId !== null)
    {
      $this->db->where('product_id', $productId);
    }
    $query = $this->db->get($this->getTablename());
    $salida = array();
    foreach($query->result() as $obj)
    {
		$aux = $this->getTranslation($obj->id, $lang, $returnObjects);
		if (!$returnObjects) {
        $aux->product_id = $obj->product_id;
		if ($retrieveAvatar) {
			$aux->avatar = $this->retrieveAvatar('folleto-'.$lang, $obj->id);
		  }
		} else {
		  $aux->setReceta($obj->receta);
		}
        $salida[$obj->id] = $aux;
    }
    return $salida;
  }
  
  private function createObjectFromRow($obj)
  {
    $aux = new presentation();
    $aux->setId($obj->id);
    $aux->setName($obj->name);
    $aux->setLang($obj->lang);
    $aux->setSlug($obj->slug);
    $aux->setGenericname($obj->genericname);
    $aux->setActiveComponent($obj->activecomponent);
    $aux->setAction($obj->action);
	$aux->setExteriorName($obj->nombre_exterior);
	$aux->setExteriorPresentation($obj->presentacion_exterior);
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
  
//  public function saveCountrie($country, $representation)
//  {
//	
////	$this->db->where('presentation_id', $this->getId());
////	$this->db->delete('presentation_category');
////	foreach($categoriesList as $category)
////	{
////	  $this->db->insert('presentation_category', array('presentation_id' => $this->getId(), 'category_id' => $category));
////	}
////    
//  }
  
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
        $data["product_id"] = $this->getProductId();
        $this->db->insert($this->getTablename(), $data);
        $id = $this->db->insert_id(); 
    }else {
      $this->editObject();
    }
    
    
    $dataTranslation = array(
		'id' => $id,
		'lang' => $this->getLang(),
		'name' => $this->getName(),
		'genericname' => $this->getGenericname(),
		'activecomponent' => $this->getActiveComponent(),
		'action' => $this->getAction(),
		'nombre_exterior' => $this->getExteriorName(),
		'presentacion_exterior' => $this->getExteriorPresentation(),
		'slug' => $this->createSlug('slug', $this->getName(), 'presentation_translation', $id, 'lang', $this->getLang()),
 	);
	$this->db->insert($this->getTablename()."_translation", $dataTranslation);
	if (!is_null($id) && $id != 0) {
      $ci = & get_instance();
      $ci->load->model('upload/album');
      $ci->album->createAlbum($id, $this->getObjectClass(), 'folleto-es');
      $ci->album->createAlbum($id, $this->getObjectClass(), 'folleto-en');
    }
	$this->setId($id);
    return $id;
  }

  private function editObject() {
    $data = array();
    $data["product_id"] = $this->getProductId();
    $this->db->where('id', $this->getId());
    $this->db->update($this->getTablename(), $data);
  }
  
  private function edit()
  {
	$this->editObject();
    $data = array(
		'name' => $this->getName(),
		'genericname' => $this->getGenericname(),
		'activecomponent' => $this->getActiveComponent(),
		'action' => $this->getAction(),
		'nombre_exterior' => $this->getExteriorName(),
		'presentacion_exterior' => $this->getExteriorPresentation(),
		'slug' => $this->createSlug('slug', $this->getName(), 'presentation_translation', $this->getId(), 'lang', $this->getLang()),
 	);

    $this->db->where('id', $this->getId());
    $this->db->where('lang', $this->getLang());
    $this->db->update('presentation_translation', $data);

    return $this->getId();
  }
  
  public function retrieveRawPresentationCountryData($presentationId)
  {
    $this->db->where('presentation_id', $presentationId);
    return $this->db->get('presentation_country')->result();
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
		$aux->setProductId($obj->product_id);
		if($loadCategories)
        {
          $this->db->where('presentation_id', $id);
          $queryCountries = $this->db->get('presentation_country');
          foreach($queryCountries->result() as $presentationCountry)
          {
            $aux->addCountry($presentationCountry);
          }  
        }
      } else {
        if ($retrieveAvatar) {
          $aux->avatar = $this->retrieveAvatar('imagen', $obj->id);
        }
		$aux->product_id = $obj->product_id;
      }
    }
	return $aux;
  }  
    
    public function getObjectClass()
    {
      return get_class($this);
    }
    
    public function search($lang, $query){
      $sql = "select presentation.id, presentation.product_id, presentation_translation.name, presentation_translation.genericname, presentation_translation.slug, presentation_translation.activecomponent, presentation_translation.action from presentation, presentation_translation where presentation.id = presentation_translation.id and presentation_translation.lang = ? and (presentation_translation.name like ? or presentation_translation.genericname like ? or presentation_translation.activecomponent like ? or presentation_translation.action like ?)";
      $query = '%'.$query.'%';
      $return = $this->db->query($sql, array($lang, $query, $query, $query, $query));
      return $return->result();
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
    
    public function saveCountry($presentationId, $countryId, $type, $compuesto)
    {
      $data = array();
      $data["presentation_id"] = $presentationId;
      $data["country_id"] = $countryId;
      $data["presencia"] = $type;
      $data["compuesto"] = $compuesto;
      $this->db->insert('presentation_country', $data);
      $rows = $this->db->affected_rows();
      
      if($rows > 0){
        return true;
      }
      return false;
    }
    
    public function removeCountry($presentationId, $countryId)
    {
      $this->db->where('presentation_id', $presentationId);
      $this->db->where('country_id', $countryId);
      $this->db->delete('presentation_country');
    }
    
    public function retrieveCompuestos()
    {
      $this->db->select('compuesto');
      $data = $this->db->get('presentation_country')->result();
      $return = array();
      foreach($data as $compuesto)
      {
        $return[] = $compuesto->compuesto;
      }
      return $return;
    }
    
    public function retrieveByProduct($lang, $productId)
    {
      return $this->retrieveAll(false, $lang, $productId);
    }
}
