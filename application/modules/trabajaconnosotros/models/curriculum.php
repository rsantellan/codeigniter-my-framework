<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/*
 */

/**
 * Description of curriculum
 *
 * @author Rodrigo Santellan
 */
class curriculum extends MY_Model{
  
  private $id;
  private $nombre;
  private $apellido;
  private $cedula;
  private $email;
  private $direccion;
  private $ciudad;
  private $pais;
  private $phone;
  private $fax;
  private $cv;
  private $quimicofarmaceuticorecibido;
  private $quimicofarmaceuticoestudiante;
  private $quimicotecnologorecibido;
  private $quimicotecnologoestudiante;
  private $mantenimientomecanico;
  private $operariopreparador;
  private $depositologisticaexpedicion;
  private $limpieza;
  private $comprascomercionexterios;
  private $ventascomercialpromocion;
  private $administrativosfinancieroscontable;
  private $sistemainformatica;
  private $recepcionistasecretaria;
  private $cientificoinvestigadores;
  private $estudiantessinexperiencia;
  
  function __construct()
  {
    parent::__construct();
    $this->setTablename('trabajaconnosotros');
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

  public function getApellido() {
    return $this->apellido;
  }

  public function setApellido($apellido) {
    $this->apellido = $apellido;
  }

  public function getCedula() {
    return $this->cedula;
  }

  public function setCedula($cedula) {
    $this->cedula = $cedula;
  }

  public function getEmail() {
    return $this->email;
  }

  public function setEmail($email) {
    $this->email = $email;
  }

  public function getDireccion() {
    return $this->direccion;
  }

  public function setDireccion($direccion) {
    $this->direccion = $direccion;
  }

  public function getCiudad() {
    return $this->ciudad;
  }

  public function setCiudad($ciudad) {
    $this->ciudad = $ciudad;
  }

  public function getPais() {
    return $this->pais;
  }

  public function setPais($pais) {
    $this->pais = $pais;
  }

  public function getPhone() {
    return $this->phone;
  }

  public function setPhone($phone) {
    $this->phone = $phone;
  }

  public function getFax() {
    return $this->fax;
  }

  public function setFax($fax) {
    $this->fax = $fax;
  }

  public function getCv() {
    return $this->cv;
  }

  public function setCv($cv) {
    $this->cv = $cv;
  }

  public function getQuimicofarmaceuticorecibido() {
    return $this->quimicofarmaceuticorecibido;
  }

  public function setQuimicofarmaceuticorecibido($quimicofarmaceuticorecibido) {
    $this->quimicofarmaceuticorecibido = $quimicofarmaceuticorecibido;
  }

  public function getQuimicofarmaceuticoestudiante() {
    return $this->quimicofarmaceuticoestudiante;
  }

  public function setQuimicofarmaceuticoestudiante($quimicofarmaceuticoestudiante) {
    $this->quimicofarmaceuticoestudiante = $quimicofarmaceuticoestudiante;
  }

  public function getQuimicotecnologorecibido() {
    return $this->quimicotecnologorecibido;
  }

  public function setQuimicotecnologorecibido($quimicotecnologorecibido) {
    $this->quimicotecnologorecibido = $quimicotecnologorecibido;
  }

  public function getQuimicotecnologoestudiante() {
    return $this->quimicotecnologoestudiante;
  }

  public function setQuimicotecnologoestudiante($quimicotecnologoestudiante) {
    $this->quimicotecnologoestudiante = $quimicotecnologoestudiante;
  }

  public function getMantenimientomecanico() {
    return $this->mantenimientomecanico;
  }

  public function setMantenimientomecanico($mantenimientomecanico) {
    $this->mantenimientomecanico = $mantenimientomecanico;
  }

  public function getOperariopreparador() {
    return $this->operariopreparador;
  }

  public function setOperariopreparador($operariopreparador) {
    $this->operariopreparador = $operariopreparador;
  }

  public function getDepositologisticaexpedicion() {
    return $this->depositologisticaexpedicion;
  }

  public function setDepositologisticaexpedicion($depositologisticaexpedicion) {
    $this->depositologisticaexpedicion = $depositologisticaexpedicion;
  }

  public function getLimpieza() {
    return $this->limpieza;
  }

  public function setLimpieza($limpieza) {
    $this->limpieza = $limpieza;
  }

  public function getComprascomercionexterios() {
    return $this->comprascomercionexterios;
  }

  public function setComprascomercionexterios($comprascomercionexterios) {
    $this->comprascomercionexterios = $comprascomercionexterios;
  }

  public function getVentascomercialpromocion() {
    return $this->ventascomercialpromocion;
  }

  public function setVentascomercialpromocion($ventascomercialpromocion) {
    $this->ventascomercialpromocion = $ventascomercialpromocion;
  }

  public function getAdministrativosfinancieroscontable() {
    return $this->administrativosfinancieroscontable;
  }

  public function setAdministrativosfinancieroscontable($administrativosfinancieroscontable) {
    $this->administrativosfinancieroscontable = $administrativosfinancieroscontable;
  }

  public function getSistemainformatica() {
    return $this->sistemainformatica;
  }

  public function setSistemainformatica($sistemainformatica) {
    $this->sistemainformatica = $sistemainformatica;
  }

  public function getRecepcionistasecretaria() {
    return $this->recepcionistasecretaria;
  }

  public function setRecepcionistasecretaria($recepcionistasecretaria) {
    $this->recepcionistasecretaria = $recepcionistasecretaria;
  }

  public function getCientificoinvestigadores() {
    return $this->cientificoinvestigadores;
  }

  public function setCientificoinvestigadores($cientificoinvestigadores) {
    $this->cientificoinvestigadores = $cientificoinvestigadores;
  }

  public function getEstudiantessinexperiencia() {
    return $this->estudiantessinexperiencia;
  }

  public function setEstudiantessinexperiencia($estudiantessinexperiencia) {
    $this->estudiantessinexperiencia = $estudiantessinexperiencia;
  }

  

  
  public function retrieveAll($returnObjects = FALSE, $retrieveAvatar = FALSE, $limit = null)
  {
    $this->db->order_by("created_at", "desc");
	if($limit !== null)
	{
	  $this->db->limit((int)$limit);
	}
    $query = $this->db->get($this->getTablename());
    return $query->result();
  }
  
  public function save($formData)
  {
    $formData["created_at"] = date('Y-m-d H:i:s');
    $this->db->insert($this->getTablename(), $formData);
    $id = $this->db->insert_id();
    return $id;
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
    
    public function getObjectClass()
    {
      return get_class($this);
    }
}
