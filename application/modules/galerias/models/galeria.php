<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/*
 */

/**
 * Description of galeria
 *
 * @author Rodrigo Santellan
 */
class galeria extends MY_Model{
  
  private $id;
  private $name;
  
  function __construct()
  {
    parent::__construct();
    $this->setTablename('galeria');
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
  
  public function retrieveGaleriaAlbumContents($galeria_ids)
  {
	$sql = "select
			albums.obj_id as a_obj_id,
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
            albums
		left outer join albumcontent ON (albums.id = albumcontent.album_id)
        where albums.obj_id in (". implode(",", $galeria_ids) .") and albums.name = 'default' and albums.obj_class = 'galeria'
        order by albumcontent.ordinal desc";
	  $return = $this->db->query($sql);
	  return $return->result();
	  
  }
  
  public function retrieveAllData($rows, $offset)
  {
	  $sql_galeria = "select 
		galeria.id as g_id,
		galeria.name as g_name,
		galeria.ordinal as g_ordinal
		from
		galeria
		order by galeria.ordinal desc
		limit ".$offset." , ".$rows;
	  $returngaleria = $this->db->query($sql_galeria);
      $resultsgaleria = $returngaleria->result();
      $data = array();
      $in_data = array();
      foreach($resultsgaleria as $galeria)
      {
          $aux = new stdClass();
          $aux->g_id = $galeria->g_id;
          $aux->g_name = $galeria->g_name;
          $aux->g_ordinal = $galeria->g_ordinal;
          $aux->contents = array();
          $in_data[] = $galeria->g_id;
          $data[$galeria->g_id] = $aux;
          
      }
	  
	  $results = $this->retrieveGaleriaAlbumContents($in_data);
	  foreach($results as $object)
		{
		  if($object->ac_id !== null)
		  {
			  $aux = $data[$object->a_obj_id];
			  $content = new stdClass();
			  if(!isset($aux->contents[$object->ac_id]))
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
				  $content = $aux->contents[$object->ac_id];
			  }
			  $aux->contents[$object->ac_id] = $content;
			  $data[$object->a_obj_id] = $aux;
		  }
		}
		
		return $data;
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
      $salida = array();
      foreach($query->result() as $obj)
      {
        $aux = new galeria();
        $aux->setId($obj->id);
        $aux->setName($obj->name);
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
    $data["ordinal"] = $this->retrieveLastOrder();
    $this->db->insert($this->getTablename(), $data);
    $id = $this->db->insert_id();
    if(!is_null($id) && $id != 0)
    {
      $ci =& get_instance();
      $ci->load->model('upload/album');
      $ci->album->createAlbum($id, $this->getObjectClass(), "default", album::MIXEDALBUM); 
    }
    return $id;
  }

  private function edit()
  {
    $data = array(
        'name' => $this->getName(),
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
          $aux = new galeria();
          $aux->setId($obj->id);
          $aux->setName($obj->name);
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
