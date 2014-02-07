<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/*
 */

/**
 * Description of ocongress
 *
 * @author Rodrigo Santellan
 */
class ocongress extends MY_Model {

  private $id;
  private $slug;
  private $name;
  private $description;
  private $members;
  private $lang;
  private $exists = false;

  function __construct() {
    parent::__construct();
    $this->setTablename('ocongress');
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

  public function getMembers() {
    return $this->members;
  }

  public function setMembers($members) {
    $this->members = $members;
  }

  public function getTranslation($id, $lang, $returnObject = true) {
    $this->db->where('id', $id);
    $this->db->where('lang', $lang);
    $this->db->limit('1');
    $query = $this->db->get('ocongress_translation');
    if ($query->num_rows() == 1) {
      $obj = $query->row();
      if ($returnObject) {
        return $this->createObjectFromRow($obj);
      }
      $obj->exists = true;
      return $obj;
    } else {
      if ($returnObject) {
        $aux = new ocongress();
        $aux->setId($id);
        $aux->setName("");
        $aux->setDescription("");
        $aux->setExists(false);
        $aux->setMembers("");
        return $aux;
      }
      $aux = new stdClass();
      $aux->id = $id;
      $aux->name = "";
      $aux->exists = false;
      $aux->description = "";
      $aux->slug = "";
      $aux->members = "";
      
      return $aux;
    }
  }

  public function retrieveAll($returnObjects = FALSE, $lang = 'es', $retrieveAvatar = false, $limit = null, $offset = null) {
    $this->db->order_by("ordinal", "desc");
    if ($limit !== null && $offset !== null) {
      $this->db->limit($limit, $offset);
    }

    $query = $this->db->get($this->getTablename());
    $salida = array();
    foreach ($query->result() as $obj) {
      $aux = $this->getTranslation($obj->id, $lang, $returnObjects);
      if (!$returnObjects && $retrieveAvatar) {
        $aux->avatar = $this->retrieveAvatar("default", $obj->id);
      } 
      $salida[$obj->id] = $aux;
    }
    return $salida;
  }

  private function createObjectFromRow($obj) {
    $aux = new ocongress();
    $aux->setId($obj->id);
    $aux->setName($obj->name);
    $aux->setLang($obj->lang);
    $aux->setSlug($obj->slug);
    $aux->setDescription($obj->description);
    $aux->setMembers($obj->members);
    $aux->setExists(true);
    return $aux;
  }

  public function isNew() {
    if ($this->getId() == "" || is_null($this->getId())) {
      return true;
    }
  }

  public function save() {
    if ($this->isNew()) {
      return $this->saveNew();
    } else {
      $obj = $this->getTranslation($this->getId(), $this->getLang(), false);
      if (!$obj->exists) {
        return $this->saveNew($this->getId());
      } else {
        return $this->edit();
      }
    }
  }

  private function saveNew($id = null) {
    if ($id === null) {
      $data = array();
      $data["ordinal"] = $this->retrieveLastOrder();
      $this->db->insert($this->getTablename(), $data);
      $id = $this->db->insert_id();
    } 


    $dataTranslation = array(
        'id' => $id,
        'lang' => $this->getLang(),
        'name' => $this->getName(),
        'description' => $this->getDescription(),
        'members' => $this->getMembers(),
        'slug' => $this->createSlug('slug', $this->getName(), 'ocongress_translation', $id, 'lang', $this->getLang()),
    );
    $this->db->insert($this->getTablename() . "_translation", $dataTranslation);
    if (!is_null($id) && $id != 0) {
      $ci = & get_instance();
      $ci->load->model('upload/album');
      $ci->album->createAlbum($id, $this->getObjectClass());
    }
    return $id;
  }

  private function edit() {
    $data = array(
        'name' => $this->getName(),
        'slug' => $this->createSlug('slug', $this->getName(), 'ocongress_translation', $this->getId(), 'lang', $this->getLang()),
        'description' => $this->getDescription(),
        'members' => $this->getMembers(),
    );
    $this->db->where('id', $this->getId());
    $this->db->where('lang', $this->getLang());
    $this->db->update('ocongress_translation', $data);

    return $this->getId();
  }

  public function getById($id, $lang = 'es', $return_obj = true, $retrieveAvatar = false) {
    $aux = $this->getTranslation($id, $lang, $return_obj);
    $this->db->where('id', $id);
    $this->db->limit('1');
    $query = $this->db->get($this->getTablename());
    if ($query->num_rows() == 1) {
      $obj = $query->row();
      if (!$return_obj && $retrieveAvatar) {
        $aux->avatar = $this->retrieveAvatar("default", $obj->id);
      } 
    }
    return $aux;
  }

  public function getObjectClass() {
    return get_class($this);
  }

  public function retrieveForSortLang($showField, $lang) {
    $this->db->select(array('id', 'ordinal'));
    $this->db->order_by("ordinal", "desc");
    $query = $this->db->get($this->getTablename());
    $data = array();
    foreach ($query->result() as $obj) {
      $aux = $this->getTranslation($obj->id, $lang);
      $auxStdClass = new stdClass();
      $auxStdClass->id = $obj->id;
      $auxStdClass->name = $aux->name;
      $data[] = $auxStdClass;
    }
    return $data;
  }

}
