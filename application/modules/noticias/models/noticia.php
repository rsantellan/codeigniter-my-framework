<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/*
 */

/**
 * Description of noticia
 *
 * @author Rodrigo Santellan
 */
class noticia extends MY_Model{
  
  private $id;
  private $description;
  private $name;
  
  function __construct()
  {
    parent::__construct();
    $this->setTablename('noticia');
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
  
  public function retrieveNoticiaAlbumContents($noticias_ids)
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
        where albums.obj_id in (". implode(",", $noticias_ids) .") and albums.name = 'default' and albums.obj_class = 'noticia'
        order by albumcontent.ordinal asc";
	  $return = $this->db->query($sql);
	  return $return->result();
	  
  }
  
  public function retrieveAllData($rows, $offset)
  {
	  $sql_noticia = "select 
		noticia.id as n_id,
		noticia.name as n_name,
		noticia.description as n_description,
		noticia.created_at as n_created_at,
		noticia.updated_at as n_updated_at,
		noticia.ordinal as n_ordinal
		from
		noticia
		order by noticia.ordinal desc
		limit ".$offset." , ".$rows;
	  $returnnoticia = $this->db->query($sql_noticia);
      $resultsnoticia = $returnnoticia->result();
      $data = array();
      $in_data = array();
      foreach($resultsnoticia as $noticia)
      {
          $aux = new stdClass();
          $aux->n_id = $noticia->n_id;
          $aux->n_name = $noticia->n_name;
          $aux->n_description = $noticia->n_description;
          $aux->n_created_at = $noticia->n_created_at;
          $aux->n_updated_at = $noticia->n_updated_at;
          $aux->n_ordinal = $noticia->n_ordinal;
          $aux->contents = array();
          $in_data[] = $noticia->n_id;
          $data[$noticia->n_id] = $aux;
          
      }
	  
	  $results = $this->retrieveNoticiaAlbumContents($in_data);
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
  
  public function retrieveAll($returnObjects = FALSE, $retrieveAvatar = FALSE, $limit = null)
  {
    $this->db->order_by("ordinal", "desc");
	if($limit !== null)
	{
	  $this->db->limit((int)$limit);
	}
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
        $aux = new noticia();
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
    $data["created_at"] = date('Y-m-d H:i:s');
    $data["updated_at"] = date('Y-m-d H:i:s');
    $this->db->insert($this->getTablename(), $data);
    $id = $this->db->insert_id();
    if(!is_null($id) && $id != 0)
    {
      $ci =& get_instance();
      $ci->load->model('upload/album');
      $ci->album->createAlbum($id, $this->getObjectClass()); 
    }
    return $id;
  }

  private function edit()
  {
    $data = array(
        'name' => $this->getName(),
        'description' => $this->getDescription(),
        'updated_at' => date('Y-m-d H:i:s'),
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
          $aux = new noticia();
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
