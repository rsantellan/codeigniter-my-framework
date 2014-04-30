<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/**
 * Description of llamadoarchivo
 *
 * @author rodrigo
 */
class llamadoarchivo extends MY_Model{
    
    private $id;
    private $llamado_id;
    private $filename;
    private $filepath;

  
    function __construct()
	{
		parent::__construct();
        $this->setTablename('llamadoarchivo');
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
	
	public function getLlamadoId() {
	  return $this->llamado_id;
	}

	public function setLlamadoId($llamado_id) {
	  $this->llamado_id = $llamado_id;
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
      $data['llamado_id'] = $this->getLlamadoId();
      $data['filename'] = $this->getFilename();
      $data['filepath'] = $this->getFilepath();
      $this->db->insert($this->getTablename(), $data);
      $id = $this->db->insert_id(); 
      return $id;
    }
    
    public function getByLlamado($id)
    {
	  $this->db->order_by('id', 'desc');
      $this->db->where('llamado_id', $id);
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


