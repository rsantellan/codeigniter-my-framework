<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

/* 
 */

/**
 * Description of blog
 *
 * @author Rodrigo Santellan <rodrigo.santellan at inswitch.us>
 */
class blog_model extends MY_Model
{
  private $id;
  private $title;
  private $body;
  private $visible = 0;
  private $created_at;
  private $updated_at;
  
  function __construct()
  {
      parent::__construct();
      $this->setTablename('blog');
  }    
  
  //Metodo para utilizar para la media.
  public function getObjectClass()
  {
	return get_class($this);
  }
  
  public function getId() {
    return $this->id;
  }

  public function setId($id) {
    $this->id = $id;
  }

  public function getTitle() {
    return $this->title;
  }

  public function setTitle($title) {
    $this->title = $title;
  }

  public function getBody($raw_html = false) {
    if($raw_html)
    {
      return html_entity_decode($this->body);
    }
    return $this->body;
  }

  public function setBody($body) {
    $this->body = $body;
  }

  public function getVisible() {
    return $this->visible;
  }

  public function setVisible($visible) {
    $this->visible = $visible;
  }

  public function getCreatedAt() {
    return $this->created_at;
  }

  public function setCreatedAt($created_at) {
    $this->created_at = $created_at;
  }

  public function getUpdatedAt() {
    return $this->updated_at;
  }

  public function setUpdatedAt($updated_at) {
    $this->updated_at = $updated_at;
  }

  public function isVisible()
  {
    if($this->getVisible() == 1)
      return true;
    return false;
  }

  public function retrieveAll($onlyVisible = false, $order_by = null, $order_type = "desc")
  {
    if($onlyVisible)
    {
      $this->db->where('visible', true);
    }
    if(is_null($order_by))
    {
      $this->db->order_by("id", "desc"); 
    }
    else
    {
      $this->db->order_by($order_by, $order_type);
    }
    $query = $this->db->get($this->getTablename());
    $data = array();
    if($query->num_rows() > 0)
    {
      foreach($query->result() as $row)
      {
        $data[] = $row;
      }
    }
    return $data;
  }
  
  public function retrieveLast($return_obj = true)
  {
    $this->db->where('visible', true);
    $this->db->order_by("updated_at", "desc"); 
    $this->db->limit('1');
    $query = $this->db->get($this->getTablename());
    if( $query->num_rows() == 1 ){
      // One row, match!
      $obj = $query->row();        
      if($return_obj)
      {
        $aux = new blog_model();
        $aux->setId($obj->id);
        $aux->setTitle($obj->title);
        $aux->setBody($obj->body);
        $aux->setVisible($obj->visible);
        $aux->setCreatedAt($obj->created_at);
        $aux->setUpdatedAt($obj->updated_at);
        return $aux;
      }
      return $obj;
    } else {
      // None
      return NULL;
    }
  }
  
  public function isNew()
  {
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
    $data["title"] = $this->getTitle();
    $data["body"] = $this->getBody();
    $data["visible"] = $this->getVisible();
    $data["created_at"] =  date('Y-m-d H:i:s');
    $data["updated_at"] =  date('Y-m-d H:i:s');
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
    $data = array();
    $data["title"] = $this->getTitle();
    $data["body"] = $this->getBody();
    $data["visible"] = $this->getVisible();
    $data["updated_at"] =  date('Y-m-d H:i:s');
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
        $aux = new blog_model();
        $aux->setId($obj->id);
        $aux->setTitle($obj->title);
        $aux->setBody($obj->body);
        $aux->setVisible($obj->visible);
        $aux->setCreatedAt($obj->created_at);
        $aux->setUpdatedAt($obj->updated_at);
        return $aux;
      }
      return $obj;
    } else {
      // None
      return NULL;
    }
  }  
  
  
}
