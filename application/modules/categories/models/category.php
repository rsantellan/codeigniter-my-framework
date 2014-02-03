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
  private $slugEs;
  private $slugEn;
  private $name;
  private $lang;
  
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

  public function getSlugEs() {
	return $this->slugEs;
  }

  public function setSlugEs($slugEs) {
	$this->slugEs = $slugEs;
  }

  public function getSlugEn() {
	return $this->slugEn;
  }

  public function setSlugEn($slugEn) {
	$this->slugEn = $slugEn;
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
	  return $query->result();
      $salida = array();
      foreach($query->result() as $obj)
      {
        $aux = new banner();
        $aux->setId($obj->id);
        $aux->setName($obj->name);
        $aux->setLink($obj->link);
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
    //$data["name"] = $this->getName();
	if($this->getLang() == 'es')
	{
	  $data['slug-es'] = $this->createSlug('slug-es', $this->getName());
	}
	else
	{
	  $data['slug-en'] = $this->createSlug('slug-en', $this->getName());
	}
    $data["ordinal"] = $this->retrieveLastOrder();
    $this->db->insert($this->getTablename(), $data);
    $id = $this->db->insert_id(); 
    $dataTranslation = array(
		'id' => $id,
		'lang' => $this->getLang(),
		'name' => $this->getName()
 	);
	$this->db->insert($this->getTablename()."_translation", $dataTranslation);
    return $id;
  }

  private function edit()
  {
    $data = array(
        'name' => $this->getName(),
        'link' => $this->getLink(),
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
          $aux = new banner();
          $aux->setId($obj->id);
          $aux->setName($obj->name);
          $aux->setLink($obj->link);
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
