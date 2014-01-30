<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Description of roche
 *
 * @author rodrigo
 */
class feu extends MY_Controller{

  private $DEFAULT_LAYOUT = "feu_layout";
  
  function __construct() {
      parent::__construct();
      $this->load->helper('upload/mimage');
      $this->load->library('upload/mupload');
	  $this->data['rscarousel'] = false;
      $this->loadI18n("menu", "", FALSE, TRUE, "", "feu");
      $this->data['menu'] = 'inicio';
//      $this->output->enable_profiler(TRUE);
  }

  // http://www.catchmyfame.com/2009/12/30/huge-updates-to-jquery-infinite-carousel-version-2-released/
  // http://www.catchmyfame.com/jquery/infinitecarousel2/demo/d3.html
  // https://github.com/richardscarrott/jquery-ui-carousel
  // http://ellislab.com/codeigniter/user-guide/libraries/caching.html
  public function index()
  {
	//$this->output->enable_profiler(TRUE);
    $this->loadI18n("home", "", FALSE, TRUE, "", "feu");
    $this->loadI18n("noticia", "", FALSE, TRUE, "", "feu");
	$this->load->model('noticias/noticia');
	$this->load->model('banners/banner');
    $this->load->helper('text');
    $this->load->helper('htmlpurifier');
	$this->data['noticias'] = $this->noticia->retrieveAll(false, false, 3);
	$this->data['banners'] = $this->banner->retrieveAll(false, true);
	$this->data['content'] = 'home';
	
    $this->load->view($this->DEFAULT_LAYOUT, $this->data);
    
  }
  
  public function historiaraid()
  {
      $this->data['menu'] = 'historia';
      $this->loadI18n("historia", "", FALSE, TRUE, "", "feu");
	  $this->data['content'] = 'historiaraid';
      $this->load->view($this->DEFAULT_LAYOUT, $this->data);
  }
  
  public function historiafeu()
  {
      $this->data['menu'] = 'historia';
      $this->loadI18n("historia", "", FALSE, TRUE, "", "feu");
      $this->data['content'] = 'historiafeu';
      $this->load->view($this->DEFAULT_LAYOUT, $this->data);
  }
  
  public function historiacampeones()
  {
      $this->data['menu'] = 'historia';
      $this->loadI18n("historia", "", FALSE, TRUE, "", "feu");
      $this->load->model('historicosadmin/campeon');
      $this->data['campeones'] = $this->campeon->retrieveAll(false, true);
      $this->data['content'] = 'historiacampeones';
      $this->load->view($this->DEFAULT_LAYOUT, $this->data);
  }
  
  public function historiadeportistas()
  {
      $this->data['menu'] = 'historia';
      $this->loadI18n("historia", "", FALSE, TRUE, "", "feu");
      $this->load->model('historicosadmin/deportista');
      $this->data['listado'] = $this->deportista->retrieveAll(false, true);
      $this->data['content'] = 'historiadeportistas';
      $this->load->view($this->DEFAULT_LAYOUT, $this->data);
  }
  
  public function historiapresidentes()
  {
      $this->data['menu'] = 'historia';
      $this->loadI18n("historia", "", FALSE, TRUE, "", "feu");
      $this->load->model('historicosadmin/presidente');
      $this->data['listado'] = $this->presidente->retrieveAll(false, true);
      $this->data['content'] = 'historiapresidentes';
      $this->load->view($this->DEFAULT_LAYOUT, $this->data);
  }
  
  public function documentacion()
  {
      $this->data['menu'] = 'documentos';
      $this->load->model('documents/document');
      $this->data['documents_list'] = $this->document->retrieveAll('doc', false, true);
      $this->loadI18n("documentacion", "", FALSE, TRUE, "", "feu");
      $this->data['content'] = 'documentacion';
      $this->load->view($this->DEFAULT_LAYOUT, $this->data);
  }
  
  public function downloadFile($fileId)
  {
    $this->load->model('upload/albumcontent');
    $file = $this->albumcontent->getFile($fileId);
    $aux = $file;//[0];
    $this->load->helper('download');
    $data = file_get_contents($aux->path); // Read the file's contents
    $name = $aux->name;
    force_download($name, $data);
  }
  
  public function jornadas($page = 1)
  {
      if($page < 0 || (int) $page == 0)
          $page = 1;
      $rows = 10;
      $this->data['menu'] = 'documentos';
      $this->loadI18n("documentacion", "", FALSE, TRUE, "", "feu");
      $this->load->model('jornadas/jornada');
      $this->data['jornadaslist'] = $this->jornada->retrieveAllData($rows, $rows * ($page - 1));
      $records = $this->jornada->countAllRecords();
      $this->data['cantidad'] = $records;
      $this->data['pages'] = ceil($records / $rows);
      $this->data['page'] = $page;
      $this->data['content'] = 'jornadas';
      $this->load->view($this->DEFAULT_LAYOUT, $this->data);
  }
  
  public function formularios()
  {
	 // https://coderwall.com/p/uer3ow
	// Agregar captcha
      $this->data['menu'] = 'documentos';
      $this->load->model('documents/document');
      $this->data['documents_list'] = $this->document->retrieveAll('form', false, true);
      $this->loadI18n("documentacion", "", FALSE, TRUE, "", "feu");
      $this->data['content'] = 'formularios';
      $this->load->view($this->DEFAULT_LAYOUT, $this->data);
  }
  
  public function directiva()
  {
	$this->data['menu'] = 'directiva';
	$this->loadI18n("directiva", "", FALSE, TRUE, "", "feu");
    $this->data['content'] = 'directiva';
	$this->load->view($this->DEFAULT_LAYOUT, $this->data);
  }
  
  public function instituciones()
  {
      $this->data['menu'] = 'instituciones';
      $this->loadI18n("instituciones", "", FALSE, TRUE, "", "feu");  
      $this->load->model('departamentos/departamento');
      $this->addModuleJavascript("feu", "instituciones.js");
      $this->data['departamento_list'] = $this->departamento->retrieveAllData();
      $this->load->helper('htmlpurifier');
      $this->data['content'] = 'institucion';
      $this->load->view($this->DEFAULT_LAYOUT, $this->data);
  }
  
  public function veterinariosjefes()
  {
      $this->data['menu'] = 'veterinarios';
      $this->loadI18n("veterinario", "", FALSE, TRUE, "", "feu");
      $this->load->model('veterinariosadmin/veterinario');
      $this->data['listado'] = $this->veterinario->retrieveAll(false, 1);
      $this->data['content'] = 'veterinariosjefes';
      $this->load->view($this->DEFAULT_LAYOUT, $this->data);
  }
  
  public function veterinarios()
  {
      $this->data['menu'] = 'veterinarios';
      $this->loadI18n("veterinario", "", FALSE, TRUE, "", "feu");
      $this->load->model('veterinariosadmin/veterinario');
      $this->data['listado'] = $this->veterinario->retrieveAll(false);
      $this->data['content'] = 'veterinarios';
      $this->load->view($this->DEFAULT_LAYOUT, $this->data);
  }
  
  public function laboratorios()
  {
      $this->data['menu'] = 'laboratorios';
      $this->loadI18n("veterinario", "", FALSE, TRUE, "", "feu");
      $this->load->model('laboratorios/laboratorio');
      $this->data['listado'] = $this->laboratorio->retrieveAll(false);
      $this->data['content'] = 'laboratorios';
      $this->load->view($this->DEFAULT_LAYOUT, $this->data);
  }
  
  public function galerias($page = 1)
  {
      if($page < 0 || (int) $page == 0)
          $page = 1;
      $rows = 12;
      $this->data['menu'] = 'galerias';
      $this->loadI18n("galerias", "", FALSE, TRUE, "", "feu");
      $this->load->model('galerias/galeria');
      $this->data['galerialist'] = $this->galeria->retrieveAllData($rows, $rows * ($page - 1));
      $records = $this->galeria->countAllRecords();
      $this->data['cantidad'] = $records;
      $this->data['pages'] = ceil($records / $rows);
      $this->data['page'] = $page;
      $this->data['content'] = 'galeria';
      $this->load->view($this->DEFAULT_LAYOUT, $this->data);
  }
  
  public function galeria($id, $name)
  {
	//var_dump($id);
	//var_dump($name);
	$this->data['menu'] = 'galerias';
    $this->loadI18n("galerias", "", FALSE, TRUE, "", "feu");
    $this->load->model('galerias/galeria');
	$object = $this->galeria->getById($id);
    if($object === null)
    {
        show_error('No existe el objeto', 404);
    }
    $this->data['object'] = $object;
	$this->data['medialist'] = $this->galeria->retrieveGaleriaAlbumContents(array($id));
	$this->data['content'] = 'galeriashow';
	$this->load->view($this->DEFAULT_LAYOUT, $this->data);
  }
  
  public function promotores()
  {
    $this->data['menu'] = 'promotoresradios';
    $this->loadI18n("promotoresradios", "", FALSE, TRUE, "", "feu");
    $this->load->model('banners/banner');
    $this->data['listado'] = $this->banner->retrieveAll(false, true);
    $this->data['content'] = 'promotores';
    $this->load->view($this->DEFAULT_LAYOUT, $this->data);  
  }
  
  public function radios()
  {
    $this->data['menu'] = 'promotoresradios';
    $this->loadI18n("promotoresradios", "", FALSE, TRUE, "", "feu");
    $this->load->model('radios/radio');
    $this->data['listado'] = $this->radio->retrieveAll(false, true);
    $this->data['content'] = 'radios';
    $this->load->view($this->DEFAULT_LAYOUT, $this->data);  
  }
  
  public function noticias($page = 1)
  {
	  if($page < 0 || (int) $page == 0)
          $page = 1;
      $rows = 2;
      $this->data['menu'] = 'noticias';
      $this->loadI18n("noticia", "", FALSE, TRUE, "", "feu");
      $this->load->model('noticias/noticia');
      $this->data['noticialist'] = $this->noticia->retrieveAllData($rows, $rows * ($page - 1));
      $records = $this->noticia->countAllRecords();
	  $this->load->helper('text');
      $this->load->helper('htmlpurifier');
      $this->data['cantidad'] = $records;
      $this->data['pages'] = ceil($records / $rows);
      $this->data['page'] = $page;
      $this->data['content'] = 'noticias';
      $this->load->view($this->DEFAULT_LAYOUT, $this->data);
  }
  
  public function noticia($id, $name)
  {
	//var_dump($id);
	//var_dump($name);
	$this->data['menu'] = 'noticias';
      $this->loadI18n("noticia", "", FALSE, TRUE, "", "feu");
      $this->load->model('noticias/noticia');
	$object = $this->noticia->getById($id);
    if($object === null)
    {
        show_error('No existe el objeto', 404);
    }
    $this->data['object'] = $object;
	$this->data['medialist'] = $this->noticia->retrieveNoticiaAlbumContents(array($id));
	//$this->data['content'] = 'galeriashow';
	$this->load->view($this->DEFAULT_LAYOUT, $this->data);
  }
}