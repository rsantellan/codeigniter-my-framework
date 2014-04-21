<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/**
 * Description of inscripcionarchivo
 *
 * @author rodrigo
 */
class inscripcionarchivo extends MY_Model{
    
    private $id;
    private $inscripcion_id;
    private $filename;
    private $filepath;

  
    function __construct()
	{
		parent::__construct();
        $this->setTablename('inscripcionarchivo');
    }
    
    public function getId() {
      return $this->id;
    }

    public function setId($id) {
      $this->id = $id;
    }

    public function getFilename() {
      return $this->filename;
    }

    public function setFilename($filename) {
      $this->filename = $filename;
    }

    public function getFilepath() {
      return $this->filepath;
    }

    public function setFilepath($filepath) {
      $this->filepath = $filepath;
    }
	
	public function getInscripcionId() {
	  return $this->inscripcion_id;
	}

	public function setInscripcionId($inscripcion_id) {
	  $this->inscripcion_id = $inscripcion_id;
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
      $data['inscripcion_id'] = $this->getInscripcionId();
      $data['filename'] = $this->getFilename();
      $data['filepath'] = $this->getFilepath();
      $this->db->insert($this->getTablename(), $data);
      $id = $this->db->insert_id(); 
      return $id;
    }
    
    public function getByInscripcion($id)
    {
	  $this->db->order_by('id', 'desc');
      $this->db->where('inscripcion_id', $id);
      $query = $this->db->get($this->getTablename());
      return $query->result();
    }

    public function deleteAllById($id)
    {
      $archivo = $this->getSimpleId($id);
      @unlink($archivo->filepath.$archivo->filename);
      $this->db->where('id', $id);
      return $this->db->delete($this->getTablename());
    }
    

}


