<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/*
 */

/**
 * Description of departamento
 *
 * @author Rodrigo Santellan
 */
class departamento extends MY_Model{
  
  private $id;
  private $description;
  private $name;
  
  function __construct()
  {
    parent::__construct();
    $this->setTablename('departamento');
  }
    
  public function getId() {
    return $this->id;
  }

  public function setId($id) {
    $this->id = $id;
  }

  public function getDescription() {
    return $this->description;
  }

  public function setDescription($description) {
    $this->description = $description;
  }

  public function getName() {
    return $this->name;
  }

  public function setName($name) {
    $this->name = $name;
  }

  public function retrieveAllForSelect()
  {
    $this->db->order_by("ordinal", "desc");
    $query = $this->db->get($this->getTablename());
    $salida = array();
    foreach($query->result() as $obj)
    {
        $salida[$obj->id] = $obj->name;
    }
    return $salida;
  }
  
  public function retrieveAllData()
  {
      $sql = "
select
    departamento.id as d_id,
    departamento.name as d_name,
    departamento.description as d_description,
    departamento.ordinal as d_ordinal,
    club.id as c_id,
    club.name as c_name,
    club.description as c_description,
    club.link as c_link,
    club.location as c_location,
    club.departmentid as c_departmentid,
    club.ordinal as c_ordinal,
    albumcontent.id as ac_id,
    albumcontent.path as ac_path,
    albumcontent.name as ac_name,
    albumcontent.type as ac_type,
    albumcontent.contenttype as ac_contenttype,
    albumcontent.url as ac_url,
    albumcontent.code as ac_code,
    albumcontent.description as ac_description,
    albumcontent.extradata as ac_extradata,
    albumcontent.ordinal as ac_ordinal
from
    departamento
left outer join club on departamento.id = club.departmentid
left outer join albums ON (albums.obj_id = club.id and albums.obj_class = 'club' and albums.name = 'default')
left outer join albumcontent ON (albums.id = albumcontent.album_id)
order by departamento.ordinal desc , club.ordinal desc , albumcontent.ordinal asc 
";
      
      $return = $this->db->query($sql);
      $results = $return->result();
      //var_dump($results);
      $data = array();
      foreach($results as $object)
      {
          $aux = null;
          if(!isset($data[$object->d_id]))
          {
              $aux = new stdClass();
              $aux->d_id = $object->d_id;
              $aux->d_name = $object->d_name;
              $aux->d_description = $object->d_description;
              $aux->d_ordinal = $object->d_ordinal;
              $aux->clubes = array();
          }
          else
          {
              $aux = $data[$object->d_id];
          }
          if($object->c_id !== null)
          {
            $club = null;
            if(!isset($aux->clubes[$object->c_id]))
            {
                $club = new stdClass();
                $club->c_id = $object->c_id;
                $club->c_name = $object->c_name;
                $club->c_description = $object->c_description;
                $club->c_link = $object->c_link;
                $club->c_location = $object->c_location;
                $club->c_departmentid = $object->c_departmentid;
                $club->c_ordinal = $object->c_ordinal;
                $club->contents = array();
            }
            else
            {
                $club = $aux->clubes[$object->c_id];
            }
            if($object->ac_id !== null)
            {
                $content = new stdClass();
                if(!isset($club->contents[$object->ac_id]))
                {
                    $content->ac_id = $object->ac_id;
                    $content->ac_path = $object->ac_path;
                    $content->ac_name = $object->ac_name;
                    $content->ac_type = $object->ac_type;
                    $content->ac_contenttype = $object->ac_contenttype;
                    $content->ac_url = $object->ac_url;
                    $content->ac_code = $object->ac_code;
                    $content->ac_description = $object->ac_description;
                    $content->ac_extradata = $object->ac_extradata;
                    $content->ac_ordinal = $object->ac_ordinal;
                }
                else
                {
                    $content = $club->contents[$object->ac_id];
                }
                $club->contents[$object->ac_id] = $content;
            }
            $aux->clubes[$object->c_id] = $club;
          }
          
          
          
          
          
          $data[$object->d_id] = $aux;
      }
      return $data;
      echo '<hr/>';
      var_dump($data);
  }
  
  public function retrieveAll($returnObjects = FALSE)
  {
    $this->db->order_by("ordinal", "desc");
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
        $aux = new departamento();
        $aux->setId($obj->id);
        $aux->setName($obj->name);
        $aux->setDescription($obj->description);
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
    $data["name"] = $this->getName();
    $data["description"] = $this->getDescription();
    $data["ordinal"] = $this->retrieveLastOrder();
    $this->db->insert($this->getTablename(), $data);
    $id = $this->db->insert_id(); 
    return $id;
  }

  private function edit()
  {
    $data = array(
        'name' => $this->getName(),
        'description' => $this->getDescription(),
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
          $aux = new departamento();
          $aux->setId($obj->id);
          $aux->setName($obj->name);
          $aux->setDescription($obj->description);
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
