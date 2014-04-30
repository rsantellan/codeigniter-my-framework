<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of sumuy
 *
 * @author rodrigo
 */
class sumuy extends MY_Controller{
  
  private $DEFAULT_LAYOUT = "sumuy_layout";

  function __construct() {
    parent::__construct();
    $this->loadI18n("menu", $this->getLanguageFile(), FALSE, TRUE, "", "sumuy");
    //$this->output->enable_profiler(TRUE);
  }
  
  public function index()
  {
    $this->loadI18n("home", $this->getLanguageFile(), FALSE, TRUE, "", "sumuy");
	$this->data['content'] = 'home';
	$this->load->view($this->DEFAULT_LAYOUT, $this->data);
  }
  
  public function sum()
  {
    $this->data['menu'] = "sum";
    $this->loadI18n("sum", $this->getLanguageFile(), FALSE, TRUE, "", "sumuy");
	$this->data['content'] = 'sum';
    $this->load->view($this->DEFAULT_LAYOUT, $this->data);
  }
  
  public function sociedad()
  {
    $this->data['menu'] = "sociedad";
    $this->loadI18n("sociedad", $this->getLanguageFile(), FALSE, TRUE, "", "sumuy");
    $this->data['content'] = 'sociedad';
    $this->load->view($this->DEFAULT_LAYOUT, $this->data);
  }
  
  public function socios()
  {
    $this->data['menu'] = "socios";
    $this->loadI18n("socios", $this->getLanguageFile(), FALSE, TRUE, "", "sumuy");
    $this->data['content'] = 'socios';
    $this->load->view($this->DEFAULT_LAYOUT, $this->data);
  }
  
  public function novedades($page = 1)
  {
    if($page < 0 || (int) $page == 0)
          $page = 1;
    $rows = 3;
    $this->data['menu'] = "novedades";
    $this->loadI18n("novedades", $this->getLanguageFile(), FALSE, TRUE, "", "sumuy");
    $this->load->model('novedades/novedad');
    $this->load->helper('text');
    $this->load->helper('htmlpurifier');
    $this->load->helper('upload/mimage');
    $this->load->library('upload/mupload');
    $records = $this->novedad->countAllRecords();
    $firstList = $this->novedad->retrieveNovedades(1, 0, false, true);
    $this->data['destacada'] = array_pop($firstList);
    $this->data['listado'] = $this->novedad->retrieveNovedades($rows, $rows * ($page - 1));
    $this->data['cantidad'] = $records;
    $this->data['pages'] = ceil($records / $rows);
    $this->data['page'] = $page;
    $this->data['content'] = 'novedades';
    $this->load->view($this->DEFAULT_LAYOUT, $this->data);
  }
  
  public function novedad($id, $name)
  {
    $this->data['menu'] = "novedades";
    $this->loadI18n("novedades", $this->getLanguageFile(), FALSE, TRUE, "", "sumuy");
    $this->load->model('novedades/novedad');
    $this->load->helper('text');
    $this->load->helper('htmlpurifier');
    $this->load->helper('upload/mimage');
    $this->load->library('upload/mupload');
    $novedad = $this->novedad->getById($id, true);
    $this->data['novedad'] = $novedad;
    $this->data['media'] = $novedad->retrieveAlbumsContents(array($novedad->getId()), 'default', $novedad->getObjectClass());
    $this->data['content'] = 'novedad';
    $this->load->view($this->DEFAULT_LAYOUT, $this->data);
  }
  
  public function tesis($page = 1)
  {
    if($page < 0 || (int) $page == 0)
          $page = 1;
    $rows = 8;
    $this->data['menu'] = "tesis";
    $this->loadI18n("tesis", $this->getLanguageFile(), FALSE, TRUE, "", "sumuy");
    
    $this->load->model('tesises/tesis');
    
    $records = $this->tesis->countAllRecords();
    $this->data['listado'] = $this->tesis->retrieveAll($rows, $rows * ($page - 1));
    $this->data['cantidad'] = $records;
    $this->data['pages'] = ceil($records / $rows);
    $this->data['page'] = $page;
    
    $this->data['content'] = 'tesis';
    $this->load->view($this->DEFAULT_LAYOUT, $this->data);
  }
  
  
  public function descargar($id, $nombre){
    $this->load->model('upload/albumcontent');
    $file = $this->albumcontent->getFile($id);
    $aux = $file; //[0];
    $this->load->helper('download');
    $data = file_get_contents($aux->basepath.$aux->path); // Read the file's contents
    $name = $aux->name;
    force_download($name, $data);
  }
  
  public function enlaces()
  {
    $this->data['menu'] = "enlaces";
    $this->loadI18n("enlaces", $this->getLanguageFile(), FALSE, TRUE, "", "sumuy");
    $this->data['content'] = 'enlaces';
    $this->load->view($this->DEFAULT_LAYOUT, $this->data);
  }
  
  public function recomendar()
  {
    $this->load->library('form_validation');
    $this->load->helper('form');
    $this->load->helper('url');
    $this->form_validation->set_rules('site_url', 'site_url', 'required');
    $this->form_validation->set_rules('senderName', 'Quien lo envia', 'required');
    $this->form_validation->set_rules('senderEmail', 'Mail de quien lo envia', 'required|valid_email|max_length[255]');
    $this->form_validation->set_rules('recieverName', 'Nombre de quien lo recibe', 'required');
    $this->form_validation->set_rules('recieverEmail', 'Mail de quien lo recibe', 'required|valid_email|max_length[255]');
    $this->form_validation->set_rules('message', 'Mensaje', 'required');
    $this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
    if ($this->form_validation->run() !== FALSE) 
    {
      $this->load->model('contacto/mail_db');
      $return = $this->mail_db->retrieveContactMailInfo();
      $this->load->library('email');

      $this->email->from($return['from']['direccion'], $return['from']['nombre']);
      //$this->email->to(set_value('recieverEmail'), set_value('recieverName'));
      $this->email->to('rsantellan@gmail.com', set_value('recieverName'));
      if(isset($return['cc']))
      {
        //$this->email->cc(set_value('senderEmail'), set_value('senderName'));
      }
      

      $this->email->reply_to(set_value('senderEmail'), set_value('senderName'));

      $this->email->subject(sprintf('%s quiere que veas esta pagina de SUM', set_value('senderName')));
      $message = set_value('message').set_value('site_url');//$this->load->view('mail_contacto', $form_data, true);
      $this->email->message($message); 
      $this->email->send();
      echo "Mail enviado con exito";
    }
    else
    {
      echo validation_errors();
    }
    
  }
  
  public function contacto()
  {
    $this->data['mail'] = false;
    $this->data['menu'] = "contacto";
    $this->loadI18n("contacto", $this->getLanguageFile(), FALSE, TRUE, "", "sumuy");
    $this->data['content'] = 'contacto';
    $this->load->library('form_validation');
    $this->load->helper('form');
    $this->load->helper('url');

    $this->form_validation->set_rules('nombre_apellido', 'nombre_apellido', 'required|max_length[255]');
    $this->form_validation->set_rules('mail', 'mail', 'required|valid_email|max_length[255]');
    $this->form_validation->set_rules('tel', 'tel', 'max_length[255]');
    $this->form_validation->set_rules('comment', 'comment', 'required');
    $this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
    if ($this->form_validation->run() !== FALSE) {
      // build array for the model

      $form_data = array(
          'nombre_apellido' => set_value('nombre_apellido'),
          'mail' => set_value('mail'),
          'tel' => set_value('tel'),
          'comment' => set_value('comment'),          
      );
      $this->load->model('contacto/mail_db');
      $return = $this->mail_db->retrieveContactMailInfo();
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

      $this->email->reply_to($form_data['mail'], $form_data['nombre_apellido']);

      $this->email->subject('[SUMUY WEB]Contacto desde el sitio web');
      $message = $this->load->view('mail_contacto', $form_data, true);
      $this->email->message($message); 

      $this->email->send();
      $this->data['mail'] = true;
      //Debug
      //echo $this->email->print_debugger();die;
    }
    $this->load->view($this->DEFAULT_LAYOUT, $this->data);
  }
  
  public function llamados()
  {
    $this->data['mail'] = false;
    $this->data['menu'] = "llamados";
    $this->loadI18n("llamados", $this->getLanguageFile(), FALSE, TRUE, "", "sumuy");
    $this->data['content'] = 'llamados';
    $this->load->library('form_validation');
    $this->load->helper('form');
    $this->form_validation->set_rules('name', 'name', 'required|max_length[255]');			
    $this->form_validation->set_rules('document', 'document', 'required|max_length[255]');			
    $this->form_validation->set_rules('birthdate', 'birthdate', 'max_length[255]');			
    $this->form_validation->set_rules('country', 'country', 'max_length[255]');			
    $this->form_validation->set_rules('nacionality', 'nacionality', 'max_length[255]');			
    $this->form_validation->set_rules('title', 'title', 'max_length[255]');			
    $this->form_validation->set_rules('mail', 'mail', 'required|valid_email|max_length[255]');			
    $this->form_validation->set_rules('institution', 'institution', 'max_length[255]');			
    $this->form_validation->set_rules('address', 'address', 'max_length[255]');			
    $this->form_validation->set_rules('phone', 'phone', 'max_length[255]');			
    $this->form_validation->set_rules('emailinstitucion', 'emailinstitucion', 'valid_email|max_length[255]');			
    $this->form_validation->set_rules('postnumber', 'postnumber', 'max_length[255]');			
    $this->form_validation->set_rules('countryinstitution', 'countryinstitution', 'max_length[255]');			
    $this->form_validation->set_rules('website', 'website', 'max_length[255]');			
    $this->form_validation->set_rules('position', 'position', 'max_length[255]');			
    $this->form_validation->set_rules('investigation', 'investigation', 'max_length[255]');			
    $this->form_validation->set_rules('tutor', 'tutor', 'max_length[255]');			
    $this->form_validation->set_rules('cvuy', 'cvuy', 'max_length[255]');			
    $this->form_validation->set_rules('comments', 'comments', '');

    $this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
    $errores = array();
    
    if ($this->form_validation->run() == FALSE) 
    {
      //No pasas las validaciones
    }
    else
    {
      // build array for the model
			
			$form_data = array(
                'name' => set_value('name'),
                'document' => set_value('document'),
                'birthdate' => set_value('birthdate'),
                'country' => set_value('country'),
                'nacionality' => set_value('nacionality'),
                'title' => set_value('title'),
                'mail' => set_value('mail'),
                'institution' => set_value('institution'),
                'address' => set_value('address'),
                'phone' => set_value('phone'),
                'emailinstitucion' => set_value('emailinstitucion'),
                'postnumber' => set_value('postnumber'),
                'countryinstitution' => set_value('countryinstitution'),
                'website' => set_value('website'),
                'position' => set_value('position'),
                'investigation' => set_value('investigation'),
                'tutor' => set_value('tutor'),
                'cvuy' => set_value('cvuy'),
                'comments' => set_value('comments')
            );
            
            $config['upload_path'] = FCPATH."assets".DIRECTORY_SEPARATOR."protectedfiles";
            $config['allowed_types'] = 'pdf|doc|docx';
            $this -> load -> library('upload', $config);
            
            $upload_data = array();
            
            for($i=1; $i < 6; $i++)
            {
              $name = 'sendfile'.$i;
              //var_dump($name);
              if(isset($_FILES[$name]) && !empty($_FILES[$name]['name']))
              {
                if (!$this->upload->do_upload($name)) {
                  $errores[$name] = $this->upload->display_errors();
                  $this->upload->clean_errors();
                } else {
                  $upload_data[$name] = $this->upload->data();
                }
              }
            }
            if(count($errores) == 0)
            {
              // run insert model to write data to db
              $this->load->model('llamados/llamado');
              $this->load->model('llamados/llamadoarchivo');
              $saved = $this->llamado->save($form_data);
              if($saved)
              {
                $sendEmailAttachs = array();
                foreach($upload_data as $uData)
                {
                  $archivo = new $this->llamadoarchivo;
                  $archivo->setLlamadoId($saved);
                  $archivo->setFilename($uData['file_name']);
                  $archivo->setFilepath($uData['file_path']);
                  $archivo->save();
                  $sendEmailAttachs[] = $archivo;
                }
                
                $this->data['mail'] = true;
                $this->load->model('contacto/mail_db');
                $this->load->library('email');
                $return = $this->mail_db->retrieveContactMailInfo();
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

                $this->email->reply_to($form_data['mail'], $form_data['name']);

                $this->email->subject('[SUMUY WEB] Formulario de llamado');
                $mail = $this->load->view('mail_llamados', $form_data, true);
                $this->email->message($mail); 
                foreach($sendEmailAttachs as $attach)
                {
                  $this->email->attach($attach->getFilepath().$attach->getFilename());
                }
                $this->email->send();
              }
            }
			
    }
    $this->data['errores'] = $errores;
    $this->load->view($this->DEFAULT_LAYOUT, $this->data);
  }
  
  public function inscripcion()
  {
    $this->data['mail'] = false;
    $this->data['menu'] = "inscripcion";
    $this->loadI18n("inscripcion", $this->getLanguageFile(), FALSE, TRUE, "", "sumuy");
    $this->data['content'] = 'inscripcion';
    $this->load->library('form_validation');
    $this->load->helper('form');
    $this->form_validation->set_rules('name', 'name', 'required|max_length[255]');			
    $this->form_validation->set_rules('document', 'document', 'required|max_length[255]');			
    $this->form_validation->set_rules('birthdate', 'birthdate', 'max_length[255]');			
    $this->form_validation->set_rules('country', 'country', 'max_length[255]');			
    $this->form_validation->set_rules('nacionality', 'nacionality', 'max_length[255]');			
    $this->form_validation->set_rules('title', 'title', 'max_length[255]');			
    $this->form_validation->set_rules('mail', 'mail', 'required|valid_email|max_length[255]');			
    $this->form_validation->set_rules('institution', 'institution', 'max_length[255]');			
    $this->form_validation->set_rules('address', 'address', 'max_length[255]');			
    $this->form_validation->set_rules('phone', 'phone', 'max_length[255]');			
    $this->form_validation->set_rules('emailinstitucion', 'emailinstitucion', 'valid_email|max_length[255]');			
    $this->form_validation->set_rules('postnumber', 'postnumber', 'max_length[255]');			
    $this->form_validation->set_rules('countryinstitution', 'countryinstitution', 'max_length[255]');			
    $this->form_validation->set_rules('website', 'website', 'max_length[255]');			
    $this->form_validation->set_rules('position', 'position', 'max_length[255]');			
    $this->form_validation->set_rules('investigation', 'investigation', 'max_length[255]');			
    $this->form_validation->set_rules('cvuy', 'cvuy', 'max_length[255]');			
    $this->form_validation->set_rules('comments', 'comments', '');

    $this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
    $errores = array();
    if ($this->form_validation->run() == FALSE) 
    {
      //No pasas las validaciones
    }
    else
    {
      // build array for the model
			
			$form_data = array(
                'name' => set_value('name'),
                'document' => set_value('document'),
                'birthdate' => set_value('birthdate'),
                'country' => set_value('country'),
                'nacionality' => set_value('nacionality'),
                'title' => set_value('title'),
                'mail' => set_value('mail'),
                'institution' => set_value('institution'),
                'address' => set_value('address'),
                'phone' => set_value('phone'),
                'emailinstitucion' => set_value('emailinstitucion'),
                'postnumber' => set_value('postnumber'),
                'countryinstitution' => set_value('countryinstitution'),
                'website' => set_value('website'),
                'position' => set_value('position'),
                'investigation' => set_value('investigation'),
                'cvuy' => set_value('cvuy'),
                'comments' => set_value('comments')
            );
			// run insert model to write data to db
            $this->load->model('inscripciones/inscripcion');
            $this->load->model('inscripciones/inscripcionarchivo');
            
            $config['upload_path'] = FCPATH."assets".DIRECTORY_SEPARATOR."protectedfiles";
            $config['allowed_types'] = 'pdf|doc|docx';
            $this -> load -> library('upload', $config);
            
            $upload_data = array();
            $name = 'sendfile1';
            if (!$this->upload->do_upload($name)) {
              $errores[$name] = $this->upload->display_errors();
              $this->upload->clean_errors();
            } else {
              $upload_data[$name] = $this->upload->data();
            }
            if(count($errores) == 0)
            {
              $saved = $this->inscripcion->save($form_data);
              if($saved != 0)
              {
                $sendEmailAttachs = array();
                foreach($upload_data as $uData)
                {
                  $archivo = new $this->inscripcionarchivo;
                  $archivo->setInscripcionId($saved);
                  $archivo->setFilename($uData['file_name']);
                  $archivo->setFilepath($uData['file_path']);
                  $archivo->save();
                  $sendEmailAttachs[] = $archivo;
                }


                $this->data['mail'] = true;
                $this->load->model('contacto/mail_db');
                $this->load->library('email');
                $return = $this->mail_db->retrieveContactMailInfo();
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

                $this->email->reply_to($form_data['mail'], $form_data['name']);

                $this->email->subject('[SUMUY WEB] Formulario de inscripcion');
                $mail = $this->load->view('mail_inscripcion', $form_data, true);
                $this->email->message($mail); 
                foreach($sendEmailAttachs as $attach)
                {
                  $this->email->attach($attach->getFilepath().$attach->getFilename());
                }
                $this->email->send();
              }
            }
            
            
    }
    $this->data['errores'] = $errores;
    $this->load->view($this->DEFAULT_LAYOUT, $this->data);
  }
}


