<?php
class fileManager
{

    public static $whiteList = array ('jpg', 'jpeg', 'gif', 'png', 'pdf', 'doc', 'docx', 'xls', 'ppt', 'xlsx', 'pptx');

    public static function upload($FILES, $path = JFILEBROWSER_PATH)
    {
        $POST_MAX_SIZE = ini_get ( 'post_max_size' );
        $unit = strtoupper ( substr ( $POST_MAX_SIZE, - 1 ) );
        $multiplier = ($unit == 'M' ? 1048576 : ($unit == 'K' ? 1024 : ($unit == 'G' ? 1073741824 : 1)));

        if (( int ) $_SERVER ['CONTENT_LENGTH'] > $multiplier * ( int ) $POST_MAX_SIZE && $POST_MAX_SIZE) {

            throw new Exception('POST exceeded maximum allowed size.');

        }

        // Settings
        $save_path = self::checkPathFormat($path); //The path were we will save the file (getcwd() may not be reliable and should be tested in your environment)
        $upload_name = "upload";
        $max_file_size_in_bytes = 2147483647; // 2GB in bytes
        $extension_whitelist = self::$whiteList; // Allowed file extensions
        $valid_chars_regex = '.A-Z0-9_ !@#$%^&()+={}\[\]\',~`-'; // Characters allowed in the file name (in a Regular Expression format)

        // Other variables
        $MAX_FILENAME_LENGTH = 260;
        $file_name = "";
        $file_extension = "";
        $uploadErrors = array (
                0 => "There is no error, the file uploaded with success",
                1 => "The uploaded file exceeds the upload_max_filesize directive in php.ini",
                2 => "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form",
                3 => "The uploaded file was only partially uploaded",
                4 => "No file was uploaded",
                6 => "Missing a temporary folder" );

        // Validate the upload
        if (! isset ( $FILES [$upload_name] )) {
            throw new Exception('No upload found in \$FILES for ' . $upload_name);
        } else if (isset ( $FILES [$upload_name] ["error"] ) && $FILES [$upload_name] ["error"][0] != 0) {
            throw new Exception($uploadErrors [$FILES[$upload_name]["error"][0]]);
        } else if (! isset ( $FILES [$upload_name] ["tmp_name"] ) || ! @is_uploaded_file ( $FILES [$upload_name] ["tmp_name"][0] )) {
            throw new Exception('Upload failed is_uploaded_file test.');
        } else if (! isset ( $FILES [$upload_name] ['name'][0] )) {
            throw new Exception('File has no name.');
        }

        // Validate the file size (Warning: the largest files supported by this code is 2GB)
        $file_size = @filesize ( $FILES [$upload_name] ["tmp_name"][0] );
        if (! $file_size || $file_size > $max_file_size_in_bytes) {
            throw new Exception('File exceeds the maximum allowed size');
        }

        if ($file_size <= 0) {
            throw new Exception('File size outside allowed lower bound');
        }

        // Validate file name (for our purposes we'll just remove invalid characters)
        $file_name = preg_replace ( '/[^' . $valid_chars_regex . ']|\.+$/i', "", basename ( $FILES [$upload_name] ['name'][0] ) );
        if (strlen ( $file_name ) == 0 || strlen ( $file_name ) > $MAX_FILENAME_LENGTH) {
            throw new Exception('Invalid file name');
        }

        // Validate that we won't over-write an existing file
        if (file_exists ( $save_path . $file_name )) {
            throw new Exception('File with this name already exists');
        }

        // Validate file extension
        $path_info = pathinfo ( $FILES [$upload_name] ['name'][0] );
        $file_extension = $path_info ["extension"];
        $name = $FILES[$upload_name]['name'][0];

        if(!in_array(strtolower($file_extension), $extension_whitelist)){

            throw new Exception('Invalid file extension');

        }
		/*
        $randName = md5(rand() * time());
        $file_name = $randName . "." . $file_extension;
        */
		//$file_name = $file_name . "." . $file_extension;

        if (! @move_uploaded_file ( $FILES [$upload_name] ["tmp_name"][0], $save_path . $file_name )) {

            throw new Exception('File could not be saved.');

        }

        return $file_name;
    }

    public static function checkPathFormat($path){
    	return self::checkDirectory($path);
    }

	public static function checkDirectory($path){
		if (is_dir($path))
        {
            $last = $path[strlen($path)-1];
            if($last == DIRECTORY_SEPARATOR)
            {
                return $path;
            }
			return $path.DIRECTORY_SEPARATOR;
		}
		$folders = $pieces = explode(DIRECTORY_SEPARATOR, $path);
        
        $list_of_paths = array();
        array_push($list_of_paths, $path);
        unset($folders[count($folders) - 1]);
        $finish = false;
        while(count($folders) > 0 && !$finish)
        {
          $auxPath = implode(DIRECTORY_SEPARATOR, $folders);
          if(is_dir($auxPath))
          {
            $finish = true;
          }
          else
          {
            array_push($list_of_paths, $auxPath);
          }
          unset($folders[count($folders) - 1]);
        }
        while(count($list_of_paths) > 0 )
        {
          $newDir = array_pop($list_of_paths);
          echo ($newDir);
          echo '<br/>';
          if(!mkdir($newDir)) {
            throw new Exception('Unable to create format directory');
          }
          chmod($newDir,0775);
        }
        return $path.DIRECTORY_SEPARATOR;
	}

}
