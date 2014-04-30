<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/*
 */

/**
 * Description of integrante
 *
 * @author Rodrigo Santellan
 */
class integrante extends MY_Model{
  
  
    private $id;
    private $nombre;
    private $title;
    private $location;
    private $contact;
    private $area;
    private $description;
    private $tipo;
    
    function __construct()
	{
		parent::__construct();
        $this->setTablename('integrante');
    }

    public function getId() {
      return $this->id;
    }

    public function setId($id) {
      $this->id = $id;
    }

    public function getNombre() {
      return $this->nombre;
    }

    public function setNombre($nombre) {
      $this->nombre = $nombre;
    }    
    
    public function getTitle() {
	  return $this->title;
	}

	public function setTitle($title) {
	  $this->title = $title;
	}

	public function getLocation() {
	  return $this->location;
	}

	public function setLocation($location) {
	  $this->location = $location;
	}

	public function getContact() {
	  return $this->contact;
	}

	public function setContact($contact) {
	  $this->contact = $contact;
	}

	public function getArea() {
	  return $this->area;
	}

	public function setArea($area) {
	  $this->area = $area;
	}

	public function getDescription($decode = true) {
	  if(!$decode) return $this->description;
	  return html_entity_decode($this->description, ENT_COMPAT | 0, 'UTF-8');
	}

	public function setDescription($description) {
	  $this->description = $description;
	}

	public function getTipo() {
	  return $this->tipo;
	}

	public function setTipo($tipo) {
	  $this->tipo = $tipo;
	}

	public function getArrTipo()
	{
	  return array(
		  1 => 'Docente',
		  2 => 'Estudiantes',
		  3 => 'Investigadores invitados',
	  );
	}
	
	
	function retrieveAll($number = NULL, $offset = NULL, $returnObjects = FALSE, $retrieveAvatar = FALSE, $type = NULL)
    {
      $this->db->order_by("ordinal", "desc");
	  if($type !== NULL)
	  {
		$this->db->where('tipo', $type);
	  }
      $query = null;
      if(is_null($number))
      {
        $query = $this->db->get($this->getTablename());
      }
      else
      {
        $query = $this->db->get($this->getTablename(), $number, $offset);
      }
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
          $salida[] = $this->createObjectFromStd($obj);
        }
        return $salida;
      }
    }

	private function createObjectFromStd($obj)
	{
	  $aux = new integrante();
	  $aux->setId($obj->id);
	  $aux->setNombre($obj->name);
	  $aux->setTitle($obj->title);
	  $aux->setLocation($obj->location);
	  $aux->setContact($obj->contact);
	  $aux->setArea($obj->area);
	  $aux->setDescription($obj->description);
	  $aux->setTipo($obj->tipo);
	  return $aux;
	}
    
    
    function retrieveLastOrder()
    {
      $this->db->select_max('ordinal');
      $query = $this->db->get($this->getTablename());
      $result = $query->result('array');
      return ((int)$result[0]['ordinal'] + 1);
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
          'name' => $this->getNombre(),
          'title' => $this->getTitle(),
          'location' => $this->getLocation(),
          'contact' => $this->getContact(),
          'area' => $this->getArea(),
          'description' => $this->getDescription(),
          'ordinal' => $this->retrieveLastOrder(),
          "tipo" => $this->getTipo(),
       );
	  
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
          'name' => $this->getNombre(),
          'title' => $this->getTitle(),
          'location' => $this->getLocation(),
          'contact' => $this->getContact(),
          'area' => $this->getArea(),
          'description' => $this->getDescription(),
          'tipo' => $this->getTipo(),
       );
      $this->db->where('id', $this->getId());
      $this->db->update($this->getTablename(), $data);
      
      return $this->getId();
    }
    
    public function getById($id, $return_obj = true, $avatar = false)
    {
      $this->db->where('id', $id);
      $this->db->limit('1');
      $query = $this->db->get($this->getTablename());
      if( $query->num_rows() == 1 ){
        // One row, match!
        $obj = $query->row();        
        if($return_obj)
        {
		  return $this->createObjectFromStd($obj);
        }
		else
		{
		  if($avatar)
		  {
			$obj->avatar = $this->retrieveAvatar("default", $obj->id);
		  }
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
