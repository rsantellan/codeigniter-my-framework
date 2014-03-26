<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Description of roche
 *
 * @author rodrigo
 */
class feu extends MY_Controller{

  private $DEFAULT_LAYOUT = "feu_layout";
  private $newsperpage = 4;
  
  function __construct() {
      parent::__construct();
      $this->load->helper('upload/mimage');
      $this->load->library('upload/mupload');
	  $this->data['rscarousel'] = false;
	  $this->data['jsGoogleMap'] = false;
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
      $this->data['campeones'] = $this->campeon->retrieveAll(false, true, 0);
      $this->data['content'] = 'historiacampeones';
      $this->data['iscorta'] = false;
      $this->load->view($this->DEFAULT_LAYOUT, $this->data);
  }
  
  public function historiacampeonescortas()
  {
      $this->data['menu'] = 'historia';
      $this->loadI18n("historia", "", FALSE, TRUE, "", "feu");
      $this->load->model('historicosadmin/campeon');
      $this->data['campeones'] = $this->campeon->retrieveAll(false, true, 1);
      $this->data['content'] = 'historiacampeones';
      $this->data['iscorta'] = true;
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
      $this->load->helper('htmlpurifier');
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
	  $this->load->helper('form');
	  $this->load->library('form_validation');
	  $this -> form_validation -> set_rules('name', 'name', 'required|max_length[255]');
	  $this -> form_validation -> set_error_delimiters('<br /><label style="color: #E62E00; font-weight: bold;">', '</label>');
	  $errores = array();
	  $word = $this->input->post('word');
	  $captcha = false;
	  $mensajeEnviado = false;
	  if ($this->input->post() && ($word == $this->session->userdata('word'))) 
	  {
		$captcha = true;
	  }
	  else
	  {
		if(!empty($word) || $this->input->post() )
		{
		  $errores["captcha"] = "Captcha invalido"; 
		}

	  }

	  if ($captcha && $this->form_validation->run() !== FALSE) {
		$config['upload_path'] = sys_get_temp_dir();
		$config['allowed_types'] = 'pdf|doc|docx';
		$this -> load -> library('upload', $config);
		$upload_data = array();
		$name = set_value('name');
		$send = true;
		//var_dump($_FILES);
		if (!$this->upload->do_upload('fileform')) {
		  $errores['fileform'] = $this->upload->display_errors();
		  $this->upload->clean_errors();
		  $send = false;
		} else {	
		  $upload_data = $this->upload->data();
		}
		//var_dump($send);
		if($send)
		{
		  $this->load->model('contacto/mail_db');
		  $return = $this->mail_db->retrieveContactMailInfo();
		  //Con estos datos preparo un email para enviar.
		  $this->load->library('email');
		  $this->email->from($return['from']['direccion'], $return['from']['nombre']);
		  $this->email->to($return['to']); 
		  if(isset($return['cc']))
		  {
			$this->email->cc($return['cc']); 
		  }
		  if(isset($return['bcc']))
		  {
			$this->email->bcc($return['bcc']);
		  }

		  $this->email->subject('[FEU]Formulario enviado desde la web');
		  $message = "El siguien formulario a sido enviado por: ".$name;
		  $this->email->message($message); 
		  
		  $this->email->attach($upload_data["full_path"]);
				
		  $this->email->send();
		  //Debug
		  //echo $this->email->print_debugger();die;
		  $mensajeEnviado = true;
		}
		
	  }
	  $this->load->helper('captcha');
	  $vals = array(
		  'img_path'     => './captcha/',
		  'img_url'     => $this->config->base_url()."captcha/",
		  'img_width'     => '200',
		  'img_height' => 30,
		  'border' => 0,
		  'expiration' => 7200,
		  'usecaps' => false
		  );

		// create captcha image
	   $cap = create_captcha($vals);
	   // store image html code in a variable
	   $this->data['captchaImage'] = $cap['image'];
	  // store the captcha word in a session
	  $this->session->set_userdata('word', $cap['word']);
	  $this->data['messageSent'] = $mensajeEnviado;
      $this->data['content'] = 'formularios';
      $this->data['errores'] = $errores;
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
    $this->data['menu'] = 'radios';
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
      $rows = $this->newsperpage;
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
      $this->data['busqueda'] = null;
      $this->load->view($this->DEFAULT_LAYOUT, $this->data);
  }
  
  public function noticiasbusqueda($page = 1, $busqueda = '')
  {
	  if($page < 0 || (int) $page == 0)
          $page = 1;
      if(empty($busqueda))
      {
          $busqueda = $data = $this->input->get('s');
      }
      $rows = $this->newsperpage;
      $this->data['menu'] = 'noticias';
      $this->loadI18n("noticia", "", FALSE, TRUE, "", "feu");
      $this->load->model('noticias/noticia');
      $this->data['busqueda'] = $busqueda;
      $records = 0;
      if(empty($busqueda))
      {
          $this->data['noticialist'] = $this->noticia->retrieveAllData($rows, $rows * ($page - 1));
          $records = $this->noticia->countAllRecords();
      }
      else
      {
          $this->data['noticialist'] = $this->noticia->retrieveAllData($rows, $rows * ($page - 1), $busqueda);
          $records = $this->noticia->countAllRecordsWithSearch($busqueda);
      }
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
    $this->load->helper('text');
      $this->load->helper('htmlpurifier');
    $this->data['object'] = $object;
	$this->data['medialist'] = $this->noticia->retrieveNoticiaAlbumContents(array($id));
	$this->data['content'] = 'noticiashow';
	$this->load->view($this->DEFAULT_LAYOUT, $this->data);
  }
  
  public function contacto()
  {
      $this->data['jsGoogleMap'] = true;
      $this->data['menu'] = 'contacto';
      $this->loadI18n("contacto", "", FALSE, TRUE, "", "feu");
	  $this->load->library('form_validation');
      $this->load->helper('form');
      $this->load->helper('url');
      $this->data['messageSend'] = false;
      $this->form_validation->set_rules('name', 'name', 'required|max_length[255]');			
      $this->form_validation->set_rules('email', 'email', 'required|valid_email|max_length[255]');			
      $this->form_validation->set_rules('message', 'message', 'required|max_length[1000]');

      $this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
	  
	  if ($this->form_validation->run() == FALSE) // validation hasn't been passed
      {
		$this->data['content'] = 'contacto';
		$this->load->view($this->DEFAULT_LAYOUT, $this->data);
	  }
	  else
      {
		$form_data = array(
                        'nombre' => set_value('name'),
                        'email' => set_value('email'),
                        'comentario' => set_value('message')
                    );
        $data['form_data'] = $form_data;
		$this->load->model('contacto/mail_db');
        $return = $this->mail_db->retrieveContactMailInfo();
		//Con estos datos preparo un email para enviar.
		$this->load->library('email');
		$this->email->from($return['from']['direccion'], $return['from']['nombre']);
        $this->email->to($return['to']); 
		if(isset($return['cc']))
		{
		  $this->email->cc($return['cc']); 
		}
        if(isset($return['bcc']))
		{
		  $this->email->bcc($return['bcc']);
		}
        
        $this->email->reply_to($form_data['email'], $form_data['nombre']);
		$this->email->subject('[FEU]Contacto desde el sitio web');
        $message = $this->load->view('memail', $form_data, true);
        $this->email->message($message); 

        $this->email->send();
		//Debug
		//echo $this->email->print_debugger();die;
		redirect('contacto-enviado.html');   // or whatever logic needs to occur
		//redirect('feu/contactosuccess');   // or whatever logic needs to occur
	  }
      
  }
  
  public function contactosuccess()
  {
	$this->data['jsGoogleMap'] = true;
	$this->data['menu'] = 'contacto';
	$this->loadI18n("contacto", "", FALSE, TRUE, "", "feu");
	$this->data['messageSend'] = true;
	$this->data['content'] = 'contacto';
	$this->load->view($this->DEFAULT_LAYOUT, $this->data);
  }
  
  public function pruebascortas()
  {
      $this->data['menu'] = 'pruebas';
      $this->loadI18n("pruebas", "", FALSE, TRUE, "", "feu");  
      $this->load->model('pruebas/prueba');
      $this->data['listado'] = $this->prueba->retrieveAll(false, true, 2);
      $this->data['pruebaCorta'] = true;
      $this->data['content'] = 'pruebas';
      $this->load->view($this->DEFAULT_LAYOUT, $this->data);
  }
  
  public function pruebaslargas()
  {
      $this->data['menu'] = 'pruebas';
      $this->loadI18n("pruebas", "", FALSE, TRUE, "", "feu");  
      $this->load->model('pruebas/prueba');
      $this->data['listado'] = $this->prueba->retrieveAll(false, true, 1);
      $this->data['pruebaCorta'] = false;
      $this->data['content'] = 'pruebas';
      $this->load->view($this->DEFAULT_LAYOUT, $this->data);
  }
  
  public function showerror()
  {
      $this->data['menu'] = 'error';
      $this->loadI18n("error404", "", FALSE, TRUE, "", "feu");  
      $this->data['content'] = 'error404';
      $this->load->view($this->DEFAULT_LAYOUT, $this->data);
  }
}
