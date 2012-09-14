<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Upload extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}

	function index($album_id = '')
	{
		$data = array();
		$data['album_id'] = $album_id;
        $ckeditor = $this->input->get('CKEditor');
        $ckeditorFuncNum = $this->input->get('CKEditorFuncNum');
        if(!$ckeditor)
        {
          $ckeditor = false;
          $ckeditorFuncNum = 0;
        }
        else
        {
          $ckeditor = true;
        }
        $data['ckeditor'] = $ckeditor;
        $data['ckeditorFuncNum'] = $ckeditorFuncNum;
            $this->load->view('upload_form', $data);
	}

	function test()
	{
		$this->data['content'] = "upload/test";

		$this->addJquery();
		$this->addFancyBox();
		$this->addModuleJavascript("actaadmin", "list.js");
		$this->load->view("admin/layout", $this->data);
	}

	function do_upload()
	{
		// Check post_max_size (http://us3.php.net/manual/en/features.file-upload.php#73762)
		$POST_MAX_SIZE = ini_get('post_max_size');
		$unit = strtoupper(substr($POST_MAX_SIZE, -1));
		$multiplier = ($unit == 'M' ? 1048576 : ($unit == 'K' ? 1024 : ($unit == 'G' ? 1073741824 : 1)));

		if ((int)$_SERVER['CONTENT_LENGTH'] > $multiplier*(int)$POST_MAX_SIZE && $POST_MAX_SIZE) {
			header('HTTP/1.1 500 Internal Server Error'); // This will trigger an uploadError event in SWFUpload
			echo 'POST exceeded maximum allowed size.';
			exit(0);
		}

    $this->load->library('mupload');
        
		// Settings
    $ckeditor = false;
		if($_POST['ckeditor'] != 1)
    {
      $save_path = getcwd() . ''.DIRECTORY_SEPARATOR.'assets'.DIRECTORY_SEPARATOR.'uploads'.DIRECTORY_SEPARATOR.''.$_POST['album_id'].DIRECTORY_SEPARATOR; 
    }
    else
    {
      $save_path = getcwd() . ''.DIRECTORY_SEPARATOR.'assets'.DIRECTORY_SEPARATOR.'uploads'.DIRECTORY_SEPARATOR.'ckeditor'.DIRECTORY_SEPARATOR; 
      $ckeditor = true;
    }
    // The path were we will save the file (getcwd() may not be reliable and should be tested in your environment)
    $this->mupload->checkDirectory($save_path);
    $upload_name = 'Filedata'; 
		$max_file_size_in_bytes = 2147483647; // 2GB in bytes
		$extension_whitelist = array('jpg', 'jpeg', 'gif', 'png', 'pdf', 'doc', 'docx', 'xls', 'ppt', 'xlsx', 'pptx', 'flv', 'mpg', 'avi'); // Allowed file extensions
		$valid_chars_regex = '.A-Z0-9_ !@#$%^&()+={}\[\]\',~`-'; // Characters allowed in the file name (in a Regular Expression format)

		// Other variables
		$MAX_FILENAME_LENGTH = 260;
		$file_name = '';
		$file_extension = '';
		$uploadErrors = array(
			0=>'There is no error, the file uploaded with success',
			1=>'The uploaded file exceeds the upload_max_filesize directive in php.ini',
			2=>'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form',
			3=>'The uploaded file was only partially uploaded',
			4=>'No file was uploaded',
			6=>'Missing a temporary folder'
		);

		// Validate the upload
		if (!isset($_FILES[$upload_name])) {
			$this->HandleError('No upload found in \$_FILES for ' . $upload_name);
			exit(0);
		}
		else if (isset($_FILES[$upload_name]['error']) && $_FILES[$upload_name]['error'] != 0) {
			$this->HandleError($uploadErrors[$_FILES[$upload_name]['error']]);
			exit(0);
		}
		else if (!isset($_FILES[$upload_name]['tmp_name']) || !@is_uploaded_file($_FILES[$upload_name]['tmp_name'])) {
			$this->HandleError('Upload failed is_uploaded_file test.');
			exit(0);
		}
		else if (!isset($_FILES[$upload_name]['name'])) {
			$this->HandleError('File has no name.');
			exit(0);
		}

		// Validate the file size (Warning: the largest files supported by this code is 2GB)
		$file_size = @filesize($_FILES[$upload_name]['tmp_name']);
		if (!$file_size || $file_size > $max_file_size_in_bytes) {
			$this->HandleError('File exceeds the maximum allowed size');
			exit(0);
		}

		if ($file_size <= 0) {
			$this->HandleError('File size outside allowed lower bound');
			exit(0);
		}

		// Validate file name (for our purposes we'll just remove invalid characters)
		/*$file_name = preg_replace('/[^'.$valid_chars_regex.']|\.+$/i', '', basename($_FILES[$upload_name]['name']));
		if (strlen($file_name) == 0 || strlen($file_name) > $MAX_FILENAME_LENGTH) {
			$this->HandleError('Invalid file name');
			exit(0);
		}*/
        $file = $_FILES[$upload_name]['name'];
        $info = pathinfo($file);
        $type = $info['extension'];
        $randName = md5(rand() * time());
        $file_name = $randName.".".$type;
        
        //log_message("INFO", "El nombre deberia ser (1): ".$randName);
        
        log_message("INFO", "El nombre del archivo subido es: ".$file_name);
		// Validate that we won't over-write an existing file
		if (file_exists($save_path . $file_name)) {
			$this->HandleError('File with this name already exists');
			exit(0);
		}

		// Validate file extension
		$path_info = pathinfo($_FILES[$upload_name]['name']);
		$file_extension = $path_info['extension'];
		$is_valid_extension = false;
		foreach ($extension_whitelist as $extension) {
			if (strcasecmp($file_extension, $extension) == 0) {
				$is_valid_extension = true;
				break;
			}
		}
		if (!$is_valid_extension) {
			$this->HandleError('Invalid file extension');
			exit(0);
		}

		// Process the file
		if (!@move_uploaded_file($_FILES[$upload_name]['tmp_name'], $save_path.$file_name)) {
			$this->HandleError('File could not be saved.');
			exit(0);
		}
		else{
      if($ckeditor)
      {
        
        echo 'todo ok!';
      }
      else
      {
        $this->load->model('images');
        $obj = new $this->images;
        $obj->setPath($save_path.$file_name);
        $obj->setName($file);
        $obj->setType($type);
        $obj->setAlbumId($_POST['album_id']);
        $obj->save();
        echo $_POST['album_id'];
      }
            //echo json_encode(array('id' => $_POST['album_id']));
            /*$model_upload = $this->load->model('upload/upload_model');
			// album
			$model_upload->set_album_name($_POST['album_name']);
			$model_upload->set_obj_id($_POST['obj_id']);
			$model_upload->set_obj_class($_POST['obj_class']);
			// file
			$model_upload->set_file_name($_POST['file_name']);
			$model_upload->set_file_type('file_type');
			// save
			$model_upload->save();*/
		}
        sleep(1);
		exit(0);
	}

	/* Handles the error output. This error message will be sent to the uploadSuccess event handler.  The event handler
	will have to check for any error messages and react as needed. */
	function HandleError($message) {
    log_message('error', $message);
	}
	
    public function view($parameters)
    {
      //$this->output->enable_profiler(TRUE);
      $id = $parameters["id"];
      $classname = $parameters["classname"];
      $this->load->model('upload/album');
      $this->load->model('upload/images');
      $this->load->library('upload/mupload');
      $this->load->helper('upload/mimage');

      $albums = $this->album->retrieveAllObjectAlbums($id, $classname);
      $salida = array();
      foreach($albums as $album)
      {
        $aux = array();
        $aux["id"] = $album["id"];
        $aux["name"] = $album["name"];
        $aux["images"] = $this->images->retrieveAlbumImages($album["id"]);
        
        $aux['completo'] = $this->load->view('upload/single_album', $aux, true);
        $salida[] = $aux;
      }
      $data['albums'] = $salida;
      $this->load->view("upload/albums", $data);
      
    }
    
    public function viewAlbum($albumId)
    {
      $this->load->model('upload/album');
      $this->load->model('upload/images');
      $this->load->library('upload/mupload');
      $this->load->helper('upload/mimage');
      $album = $this->album->getById($albumId);
      $aux = array();
      $aux['id'] = $album->getId();
      $aux['name'] = $album->getName();
      $aux["images"] = $this->images->retrieveAlbumImages($album->getId());
      $contenido = $this->load->view('upload/single_album', $aux, true);
      $salida = array();
      $salida['response'] = "OK";
      $salida['content'] = array('album' => $contenido);
      echo json_encode($salida);
      die;
      
    }
    
    public function editFile($fileId)
    {
      $this->load->model('upload/images');
      $file = $this->images->getFile($fileId);
      
      $data['file'] = $file[0];
      //var_dump($file[0]);
      $this->load->library('upload/mupload');
      $this->load->helper('upload/mimage');
      $this->load->view("upload/file_detail", $data);
    }
    
    public function deleteFile($fileId)
    {
      $this->load->model('upload/images');
      $this->images->deleteFile($fileId);
      $salida['response'] = "OK";
      $this->output
       ->set_content_type('application/json')
       ->set_output(json_encode($salida));
    }
    
    public function downloadFile($fileId)
    {
      $this->load->model('upload/images');
      $file = $this->images->getFile($fileId);
      $aux = $file[0];
      $this->load->helper('download');
      $data = file_get_contents($aux->path); // Read the file's contents
      $name = $aux->name;
      force_download($name, $data);
    }
    
    function sort($albumId){
      //$this->output->enable_profiler(TRUE);
      $this->load->model('upload/images');
      $this->load->library('upload/mupload');
      $this->load->helper('upload/mimage');
      
      $this->data['files_list'] = $this->images->retrieveAlbumImages($albumId);
      $this->data['album_id'] = $albumId;
      $this->load->view('upload/sortable', $this->data);
    }
    
    function applySort()
    {
      /*
      $salida = array();
      $salida['response'] = "OK";
      
      echo json_encode($salida);
      die;
      */
      $lista = $this->input->post('listItem');
      $album_id = $this->input->post('listItem');
      $this->load->model('upload/images');
      
      $cantidad = count($lista) - 1;
      while($cantidad >= 0)
      {
        //echo $lista[$cantidad] . " - ".$cantidad;
        $this->images->updateOrder($lista[$cantidad], $cantidad);
        $cantidad --;
      }
      $salida = array();
      $salida['response'] = "OK";
      
      echo json_encode($salida);
      die;
    }    
}
?>
