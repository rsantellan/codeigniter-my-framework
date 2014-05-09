<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of efsa
 *
 * @author Rodrigo Santellan
 */
class efsa extends MY_Controller{
  
  private $DEFAULT_LAYOUT = "efsa_layout";

  function __construct() {
    parent::__construct();
    $this->loadI18n("menu", $this->getLanguageFile(), FALSE, TRUE, "", "efsa");
    //$this->output->enable_profiler(TRUE);
  }
  
  public function index()
  {
    $this->loadI18n("home", $this->getLanguageFile(), FALSE, TRUE, "", "efsa");
	$this->data['content'] = 'home';
	$this->load->view($this->DEFAULT_LAYOUT, $this->data);
  }
  
  public function integrantes($type)
  {
	//var_dump($type);
	$this->data['menu'] = 'integrantes';
	$this->loadI18n("integrantes", $this->getLanguageFile(), FALSE, TRUE, "", "efsa");
	$this->data['content'] = 'integrantes';
	$this->load->model('integrantes/integrante');
	$this->load->helper('upload/mimage');
	$this->load->library('upload/mupload');
	$this->data['list'] = $this->integrante->retrieveAll(null, null, false, true, $type);
	$this->data['type'] = $type;
	$this->load->view($this->DEFAULT_LAYOUT, $this->data);
  }
  
  public function integrante($id, $slug)
  {
	$this->loadI18n("integrantes", $this->getLanguageFile(), FALSE, TRUE, "", "efsa");
	$this->load->model('integrantes/integrante');
	$this->load->helper('upload/mimage');
	$this->load->library('upload/mupload');
	$this->load->helper('text');
	$this->load->helper('htmlpurifier');
	$this->data['object'] = $this->integrante->getById($id, false, true);
	$this->load->view('efsa/integrante', $this->data);
  }
  
  public function publicaciones($type)
  {
	$this->data['menu'] = 'publicaciones';
	$this->data['content'] = 'publicaciones';
	$this->loadI18n("publicaciones", $this->getLanguageFile(), FALSE, TRUE, "", "efsa");
	$this->load->model('publicaciones/publicacion');
	$this->data['list'] = $this->publicacion->retrieveAccordeon($type);
	$this->data['type'] = $type;
	$this->load->view($this->DEFAULT_LAYOUT, $this->data);
  }
  
  public function docencia()
  {
	$this->data['menu'] = 'docencia';
	$this->data['content'] = 'docencia';
	$this->loadI18n("docencia", $this->getLanguageFile(), FALSE, TRUE, "", "efsa");
	$this->load->view($this->DEFAULT_LAYOUT, $this->data);
  }
  
  public function docenciagrado($type)
  {
	$this->data['menu'] = 'docencia';
	$this->data['content'] = 'docenciagrado';
	$this->loadI18n("docencia", $this->getLanguageFile(), FALSE, TRUE, "", "efsa");
	$this->load->model('integrantes/integrante');
	$this->load->helper('upload/mimage');
	$this->load->library('upload/mupload');
	$this->load->helper('text');
    $this->load->helper('htmlpurifier');
	$this->load->model('efsadocencias/efsadocencia');
	$this->data['list'] = $this->efsadocencia->retrieveAll(null, null, false, true, $type);
	$this->data['type'] = $type;
	$this->load->view($this->DEFAULT_LAYOUT, $this->data);
  }
  
  public function descargar($fileId)
  {
	
	$this->load->model('upload/albumcontent');
    $file = $this->albumcontent->getFile($fileId);
	$aux = $file;//[0];
    $this->load->helper('download');
    $data = file_get_contents($aux->basepath.$aux->path); // Read the file's contents
    $name = $aux->name;
    force_download($name, $data);
	die(0);
  }
  
  public function extension()
  {
	$this->data['menu'] = 'extension';
	$this->data['content'] = 'extension';
	$this->loadI18n("extension", $this->getLanguageFile(), FALSE, TRUE, "", "efsa");
	$this->load->view($this->DEFAULT_LAYOUT, $this->data);
  }
  
  public function extensionlistado()
  {
	$this->data['menu'] = 'extension';
	$this->data['content'] = 'extensionlistado';
	$this->loadI18n("extension", $this->getLanguageFile(), FALSE, TRUE, "", "efsa");
	$this->load->helper('text');
    $this->load->helper('htmlpurifier');
	$this->load->model('efsaextensiones/efsaextension');
	$this->data['list'] = $this->efsaextension->retrieveAll(null, null, false, true);
	$this->load->view($this->DEFAULT_LAYOUT, $this->data);
  }
  
  public function investigacion()
  {
	$this->data['menu'] = 'investigacion';
	$this->data['content'] = 'investigacion';
	$this->loadI18n("investigacion", $this->getLanguageFile(), FALSE, TRUE, "", "efsa");
	$this->load->view($this->DEFAULT_LAYOUT, $this->data);
  }
  
  public function proyectos()
  {
	$this->data['menu'] = 'investigacion';
	$this->data['content'] = 'proyectos';
	$this->loadI18n("investigacion", $this->getLanguageFile(), FALSE, TRUE, "", "efsa");
	$this->load->helper('upload/mimage');
	$this->load->library('upload/mupload');
	$this->load->helper('text');
    $this->load->helper('htmlpurifier');
	$this->load->model('efsaproyectos/efsaproyecto');
	$this->data['list'] = $this->efsaproyecto->retrieveAll(null, null, false, true);
	$this->load->view($this->DEFAULT_LAYOUT, $this->data);
  }
  
  public function proyecto($id, $slug)
  {
	$this->loadI18n("investigacion", $this->getLanguageFile(), FALSE, TRUE, "", "efsa");
	$this->load->model('efsaproyectos/efsaproyecto');
	$this->load->helper('upload/mimage');
	$this->load->library('upload/mupload');
	$this->load->helper('text');
	$this->load->helper('htmlpurifier');
	$this->data['object'] = $this->efsaproyecto->getById($id, false, true);
	$this->load->view('efsa/proyecto', $this->data);
  }
  
  public function tesis()
  {
	$this->data['menu'] = 'investigacion';
	$this->data['content'] = 'tesis';
	$this->loadI18n("investigacion", $this->getLanguageFile(), FALSE, TRUE, "", "efsa");
	$this->load->model('efsatesises/efsatesis');
	$this->load->helper('text');
    $this->load->helper('htmlpurifier');
	$this->load->model('efsaproyectos/efsaproyecto');
	$this->data['list'] = $this->efsatesis->retrieveAll(null, null, false, true);
	$this->load->view($this->DEFAULT_LAYOUT, $this->data);
  }
  
  public function facilidades()
  {
	$this->data['menu'] = 'investigacion';
	$this->data['content'] = 'facilidades';
	$this->loadI18n("investigacion", $this->getLanguageFile(), FALSE, TRUE, "", "efsa");
    $this->load->model('efsalaboratorios/efsalaboratorio');
    $this->data['list'] = $this->efsalaboratorio->retrieveAll(null, null, false);
    $this->load->view($this->DEFAULT_LAYOUT, $this->data);
  }
  
  public function facilidad($id, $slug)
  {
    $this->loadI18n("investigacion", $this->getLanguageFile(), FALSE, TRUE, "", "efsa");
	$this->load->model('efsalaboratorios/efsalaboratorio');
	$this->load->helper('upload/mimage');
	$this->load->library('upload/mupload');
	$this->load->helper('text');
	$this->load->helper('htmlpurifier');
	$this->data['object'] = $this->efsalaboratorio->getById($id, false, true);
	$this->load->view('efsa/facilidad', $this->data);
  }
  
  public function contactook()
  {
    $this->data['menu'] = 'contacto';
	$this->data['content'] = 'contactook';
    $this->loadI18n("contacto", $this->getLanguageFile(), FALSE, TRUE, "", "efsa");
    $this->load->view($this->DEFAULT_LAYOUT, $this->data);
  }
  
  public function contacto()
  {
    $this->data['menu'] = 'contacto';
	$this->data['content'] = 'contacto';
    $this->loadI18n("contacto", $this->getLanguageFile(), FALSE, TRUE, "", "efsa");
    
    $this->load->library('form_validation');
    $this->load->helper('form');
    $this->load->helper('url');
    $this->data['messageSend'] = false;
    $this->form_validation->set_rules('name', 'name', 'required|max_length[255]');			
    $this->form_validation->set_rules('email', 'email', 'required|valid_email|max_length[255]');			
    $this->form_validation->set_rules('message', 'message', 'required|max_length[1000]');

    $this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
    
    if ($this->form_validation->run() !== FALSE)
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
      $this->email->subject('[EFSA]Contacto desde el sitio web');
      $message = $this->load->view('contactomail', $form_data, true);
      $this->email->message($message); 

      $this->email->send();
      //Debug
      //echo $this->email->print_debugger();die;
      redirect('contacto-enviado.html');
    }
    
    $this->load->view($this->DEFAULT_LAYOUT, $this->data);
  }
  
}


