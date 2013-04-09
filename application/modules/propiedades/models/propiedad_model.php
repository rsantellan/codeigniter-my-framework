<?php
if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/**
 * Description of proyectos_model
 *
 * @author rodrigo santellan
 */
class propiedad_model extends MY_Model{
  

  private $id;
  private $titulo;
  private $detalle;
  private $ubicacion;
  private $garantia;
  private $financia;
  private $metros;
  private $dormitorios;
  private $banios;
  private $calefaccion;
  private $garage;
  private $precio_alquiler;
  private $moneda_alquiler;
  private $precio_venta;
  private $moneda_venta;
  private $visible;
  private $venta;
  private $alquiler;
  private $alquiler_temporal = 0;
  private $esta_vendida;
  private $esta_alquilada;
  private $orden;
  
  function __construct()
  {
      parent::__construct();
      $this->setTablename('propiedad');
  }
  
  public function getId() {
    return $this->id;
  }

  public function setId($id) {
    $this->id = $id;
  }

  public function getTitulo() {
    return $this->titulo;
  }

  public function setTitulo($titulo) {
    $this->titulo = $titulo;
  }

  public function getDetalle() {
    return $this->detalle;
  }

  public function setDetalle($detalle) {
    $this->detalle = $detalle;
  }

  public function getUbicacion() {
    return $this->ubicacion;
  }

  public function setUbicacion($ubicacion) {
    $this->ubicacion = $ubicacion;
  }

  public function getGarantia() {
    return $this->garantia;
  }

  public function setGarantia($garantia) {
    $this->garantia = $garantia;
  }

  public function getFinancia() {
	return $this->financia;
  }

  public function setFinancia($financia) {
	$this->financia = $financia;
  }

  public function getMetros() {
    return $this->metros;
  }

  public function setMetros($metros) {
    $this->metros = $metros;
  }

  public function getDormitorios() {
    return $this->dormitorios;
  }

  public function setDormitorios($dormitorios) {
    $this->dormitorios = $dormitorios;
  }

  public function getBanios() {
    return $this->banios;
  }

  public function setBanios($banios) {
    $this->banios = $banios;
  }

  public function getCalefaccion() {
    return $this->calefaccion;
  }

  public function setCalefaccion($calefaccion) {
    $this->calefaccion = $calefaccion;
  }

  public function getGarage() {
    return $this->garage;
  }

  public function setGarage($garage) {
    $this->garage = $garage;
  }

  public function getPrecioAlquiler() {
	return $this->precio_alquiler;
  }

  public function setPrecioAlquiler($precio_alquiler) {
	$this->precio_alquiler = $precio_alquiler;
  }

  public function getMonedaAlquiler() {
	return $this->moneda_alquiler;
  }

  public function setMonedaAlquiler($moneda_alquiler) {
	$this->moneda_alquiler = $moneda_alquiler;
  }

  public function getPrecioVenta() {
	return $this->precio_venta;
  }

  public function setPrecioVenta($precio_venta) {
	$this->precio_venta = $precio_venta;
  }

  public function getMonedaVenta() {
	return $this->moneda_venta;
  }

  public function setMonedaVenta($moneda_venta) {
	$this->moneda_venta = $moneda_venta;
  }

  public function getVenta() {
	return $this->venta;
  }

  public function setVenta($venta) {
	$this->venta = $venta;
  }

  public function getAlquiler() {
	return $this->alquiler;
  }

  public function setAlquiler($alquiler) {
	$this->alquiler = $alquiler;
  }
  
  public function getAlquilerTemporal() {
    return $this->alquiler_temporal;
  }

  public function setAlquilerTemporal($alquiler_temporal) {
    $this->alquiler_temporal = $alquiler_temporal;
  }

  public function getEstaVendida() {
	return $this->esta_vendida;
  }

  public function setEstaVendida($esta_vendida) {
	$this->esta_vendida = $esta_vendida;
  }

  public function getEstaAlquilada() {
	return $this->esta_alquilada;
  }

  public function setEstaAlquilada($esta_alquilada) {
	$this->esta_alquilada = $esta_alquilada;
  }

  
  public function getVisible() {
	return $this->visible;
  }

  public function setVisible($visible) {
	$this->visible = $visible;
  }

  public function getOrden() {
    return $this->orden;
  }

  public function setOrden($orden) {
    $this->orden = $orden;
  }

  public function getObjectClass()
  {
    return get_class($this);
  }
  
  public function retrieveAll($order_by = null, $order_type = "desc", $limit = null)
  {
    if(is_null($order_by))
    {
      $this->db->order_by("orden", "desc"); 
    }
    else
    {
      $this->db->order_by($order_by, $order_type);
    }
    if(!is_null($limit))
    {
      $limit_number = (int) $limit;
      if($limit_number > 0)
      {
        $this->db->limit($limit);
      }
      
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

  public function retrieveAllWithImage($is_alquiler = null, $is_venta = null, $limit = 3, $order_by = null, $order_type = "desc")
  {
    $this->db->where("visibilidad", true);
    if(!is_null($is_alquiler) && $is_alquiler)
    {
      $this->db->where("alquiler", true);
    }
    if(!is_null($is_venta) && $is_venta)
    {
      $this->db->where("venta", true);
    }
    if(is_null($order_by))
    {
      $this->db->order_by("orden", "desc"); 
    }
    else
    {
      $this->db->order_by($order_by, $order_type);
    }
    if(!is_null($limit))
    {
      $limit_number = (int) $limit;
      if($limit_number > 0)
      {
        $this->db->limit($limit);
      }
    }
    $query = $this->db->get($this->getTablename());
    $data = array();
    if($query->num_rows() > 0)
    {
      foreach($query->result() as $row)
      {
        $row->avatar = $this->retrieveAvatar("default", $row->id);
        $data[] = $row;
      }
    }
    return $data;
  }
  
  public function retrieveSearchWithImage($parameters = array(), $limit = 3, $order_by = null, $order_type = "desc")
  {
    $this->db->where("visibilidad", true);
    if(isset($parameters['operacion']))
    {
      switch ($parameters['operacion']) {
        case '1':
          $this->db->where("alquiler", true);
          break;
        case '2':
          $this->db->where("alquiler_temporal", true);
          break;        
        default:
          $where = "(alquiler = 1 OR alquiler_temporal = 1)";
          $this->db->where($where);
          break;
      }
      unset($parameters['operacion']);
    }
    else
    {
      $this->db->where("venta", true);
    }
    $this->db->where($parameters);
    if(is_null($order_by))
    {
      $this->db->order_by("orden", "desc"); 
    }
    else
    {
      $this->db->order_by($order_by, $order_type);
    }
    if(!is_null($limit))
    {
      $limit_number = (int) $limit;
      if($limit_number > 0)
      {
        $this->db->limit($limit);
      }
    }
    $query = $this->db->get($this->getTablename());
    $data = array();
    if($query->num_rows() > 0)
    {
      foreach($query->result() as $row)
      {
        $row->avatar = $this->retrieveAvatar("default", $row->id);
        $data[] = $row;
      }
    }
    return $data;
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
    $data["titulo"] = $this->getTitulo();
    $data["detalle"] = $this->getDetalle();
    $data["ubicacion"] = $this->getUbicacion();
    $data["garantia"] = $this->getGarantia();
	$data["financia"] = $this->getFinancia();
    $data["metros"] = $this->getMetros();
    $data["dormitorios"] = $this->getDormitorios();
    $data["banos"] = $this->getBanios();
    $data["calefaccion"] = $this->getCalefaccion();
    $data["garage"] = $this->getGarage();
    $data["precio_alquiler"] = $this->getPrecioAlquiler();
    $data["moneda_alquiler"] = $this->getMonedaAlquiler();
	$data["precio_venta"] = $this->getPrecioVenta();
    $data["moneda_venta"] = $this->getMonedaVenta();
    $data["visibilidad"] = $this->getVisible();
    $data["alquiler"] = $this->getAlquiler();
    $data["alquiler_temporal"] = $this->getAlquilerTemporal();
    $data["venta"] = $this->getVenta();
	
	$data["esta_alquilada"] = $this->getEstaAlquilada();
    $data["esta_vendida"] = $this->getEstaVendida();
	
    $data['orden'] = $this->retrieveLastOrder();
    
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
  
  private function retrieveLastOrder()
  {
    $sql = "SELECT max( `orden` ) +1 AS MAXIMUN FROM ".$this->getTablename();
    $query = $this->db->query($sql);

    $row = $query->row();
    $return = 1;
    if(!is_null($row->MAXIMUN))
    {
      $return = $row->MAXIMUN;
    }
    return $return;
  }
  
  private function edit()
  {
    $data = array();
    $data["titulo"] = $this->getTitulo();
    $data["detalle"] = $this->getDetalle();
    $data["ubicacion"] = $this->getUbicacion();
    $data["garantia"] = $this->getGarantia();
	$data["financia"] = $this->getFinancia();
    $data["metros"] = $this->getMetros();
    $data["dormitorios"] = $this->getDormitorios();
    $data["banos"] = $this->getBanios();
    $data["calefaccion"] = $this->getCalefaccion();
    $data["garage"] = $this->getGarage();
    $data["precio_alquiler"] = $this->getPrecioAlquiler();
    $data["moneda_alquiler"] = $this->getMonedaAlquiler();
	$data["precio_venta"] = $this->getPrecioVenta();
    $data["moneda_venta"] = $this->getMonedaVenta();
	$data["alquiler"] = $this->getAlquiler();
    $data["alquiler_temporal"] = $this->getAlquilerTemporal();
    $data["venta"] = $this->getVenta();
    $data["esta_alquilada"] = $this->getEstaAlquilada();
    $data["esta_vendida"] = $this->getEstaVendida();
	$data["visibilidad"] = $this->getVisible();
	
    
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
        $aux = new propiedad_model();
        $aux->setId($obj->id);
        $aux->setTitulo($obj->titulo);
        $aux->setDetalle($obj->detalle);
        $aux->setUbicacion($obj->ubicacion);
        $aux->setGarantia($obj->garantia);
		$aux->setFinancia($obj->financia);
        $aux->setMetros($obj->metros);
        $aux->setDormitorios($obj->dormitorios);
        $aux->setBanios($obj->banos);
        $aux->setCalefaccion($obj->calefaccion);
        $aux->setGarage($obj->garage);
        $aux->setPrecioAlquiler($obj->precio_alquiler);
        $aux->setMonedaAlquiler($obj->moneda_alquiler);
		$aux->setPrecioVenta($obj->precio_venta);
        $aux->setMonedaVenta($obj->moneda_venta);
		$aux->setVisible($obj->visibilidad);
		$aux->setAlquiler($obj->alquiler);
        $aux->setAlquilerTemporal($obj->alquiler_temporal);
		$aux->setVenta($obj->venta);
        $aux->setOrden($obj->orden);
		$aux->setEstaAlquilada($obj->esta_alquilada);
		$aux->setEstaVendida($obj->esta_vendida);
        return $aux;
      }
      return $obj;
    } else {
      // None
      return NULL;
    }
  }
  
  public function retrieveAvatar($albumName = "default", $id = NULL)
  {
    if(!is_null($id)) $this->setId($id);

    if(!is_null($this->getId()) && $this->getId() != "")
    {
      $ci = &get_instance();
      $ci->load->model("upload/album");
      return $ci->album->retrieveAlbumAvatar($this->getId(), $this->getObjectClass(), $albumName);
    }
    return NULL;      
  }
  
  function retrieveForSort()
  {
    $this->db->select(array('id', 'titulo', 'orden'));
    $this->db->order_by("orden", "desc");
    $query = $this->db->get($this->getTablename());

    return $query->result();
  }
  
  function retrieveDistinct($field)
  {
    $this->db->select($field);
    $this->db->distinct();
    return $this->db->get($this->getTablename())->result();
  }
  
  function updateOrder($id, $order)
  {
    $data = array(
              'orden' => $order
           );
    $this->db->where('id', $id);
    $this->db->update($this->getTablename(), $data);
  }
}


