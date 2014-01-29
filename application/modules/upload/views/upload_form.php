<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
<title>Administrador - Subir archivo</title>

<script type="text/javascript" src="<?php echo base_url() . "assets/admin/js/jquery-1.7.1.min.js";?>"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/upload/js/plupload/jquery.plupload.queue/css/jquery.plupload.queue.css" />
<script type="text/javascript" src="<?php echo base_url(); ?>assets/upload/js/plupload/plupload.full.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/upload/js/plupload/jquery.plupload.queue/jquery.plupload.queue.js"></script>


<script type="text/javascript">

$(function() {
           
    function log() {
        return false;
		var str = "";
        
		plupload.each(arguments, function(arg) {
			var row = "";

			if (typeof(arg) != "string") {
				plupload.each(arg, function(value, key) {
					// Convert items in File objects to human readable form
					if (arg instanceof plupload.File) {
						// Convert status to human readable
						switch (value) {
							case plupload.QUEUED:
								value = 'QUEUED';
								break;

							case plupload.UPLOADING:
								value = 'UPLOADING';
								break;

							case plupload.FAILED:
								value = 'FAILED';
								break;

							case plupload.DONE:
								value = 'DONE';
								break;
						}
					}

					if (typeof(value) != "function") {
						row += (row ? ', ' : '') + key + '=' + value;
					}
				});

				str += row + " ";
			} else { 
				str += arg + " ";
			}
		});

		$('#log').append(str + "\n");
	}
    
	$("#uploader").pluploadQueue({
		// General settings
		runtimes : 'html5, flash, html4',
		url : "<?php echo site_url("upload/do_pupload"); ?>",
		max_file_size : '20mb',
		//unique_names : true,
        multipart_params: {'data-session-id': '<?php echo $datasessionid;?>', '_myUploader': true, 'album_id' : '<?php echo $album_id; ?>', 'ckeditor': "<?php echo $ckeditor;?>", "ckeditorFuncNum" : "<?php echo $ckeditorFuncNum;?>"},
		// Flash settings
		flash_swf_url : '<?php echo base_url(); ?>assets/upload/js/plupload/plupload.flash.swf',
        // PreInit events, bound before any internal events
		preinit : {
			Init: function(up, info) {
				log('[Init]', 'Info:', info, 'Features:', up.features);
			},

			UploadFile: function(up, file) {
				log('[UploadFile]', file);

				// You can override settings before the file is uploaded
				// up.settings.url = 'upload.php?id=' + file.id;
				// up.settings.multipart_params = {param1 : 'value1', param2 : 'value2'};
			}
		},

		// Post init events, bound after the internal events
		init : {
			Refresh: function(up) {
				// Called when upload shim is moved
				log('[Refresh]');
			},

			StateChanged: function(up) {
				// Called when the state of the queue is changed
				log('[StateChanged]', up.state == plupload.STARTED ? "STARTED" : "STOPPED");
                $(".plupload_start").removeClass("plupload_disabled");
			},

			QueueChanged: function(up) {
				// Called when the files in queue are changed by adding/removing files
				log('[QueueChanged]');
			},

			UploadProgress: function(up, file) {
				// Called while a file is being uploaded
				log('[UploadProgress]', 'File:', file, "Total:", up.total);
                if (up.total.uploaded == up.files.length) {
                    $(".plupload_buttons").css("display", "inline");
                    $(".plupload_upload_status").css("display", "inline");
                    $(".plupload_start").addClass("plupload_disabled");
                }
			},

			FilesAdded: function(up, files) {
				// Callced when files are added to queue
				log('[FilesAdded]');

				plupload.each(files, function(file) {
					log('  File:', file);
				});
			},

			FilesRemoved: function(up, files) {
				// Called when files where removed from queue
				log('[FilesRemoved]');

				plupload.each(files, function(file) {
					log('  File:', file);
				});
			},

			FileUploaded: function(up, file, info) {
				// Called when a file has finished uploading
				log('[FileUploaded] File:', file, "Info:", info);
				if(typeof window.refreshAlbum == 'function') 
				{
				  console.info('refresh album of the window');
				  refreshAlbum(<?php echo $album_id; ?>);
				}
				else
				{
				  if(typeof parent.refreshAlbum == 'function')
				  {
					console.info('refresh album of the parent window');
					parent.refreshAlbum(<?php echo $album_id; ?>);
				  }
				}
                /*
                console.info(up);
                if(up.total.queued == 0) {
                    console.info('estoy aca');
                    up.splice();
                    up.refresh();
                }
                */
			},

			ChunkUploaded: function(up, file, info) {
				// Called when a file chunk has finished uploading
				log('[ChunkUploaded] File:', file, "Info:", info);
			},

			Error: function(up, args) {
				// Called when a error has occured
				log('[error] ', args);
			}
		}
	}); 

	// Client side form validation
	$('#uploader form').submit(function(e) {
        var uploader = $('#uploader').pluploadQueue();

        // Files in queue upload them first
        if (uploader.files.length > 0) {
            // When all files are uploaded submit form
            uploader.bind('StateChanged', function() {
                if (uploader.files.length === (uploader.total.uploaded + uploader.total.failed)) {
                    $('form')[0].submit();
                }
            });
                
            uploader.start();
        } else {
            alert('You must queue at least one file.');
        }

        return false;
    });
});


         function sendYoutubeUrl(form)
         {
            //parent.$.fancybox.showActivity();
            $.ajax({
                url: $(form).attr('action'),
                data: $(form).serialize(),
                type: 'post',
                dataType: 'json',
                success: function(json){
                    if(json.response == "OK")
                    {
                      if(typeof window.refreshAlbum == 'function') 
                      {
                        console.info('refresh album of the window');
                        refreshAlbum(json.albumId);
                      }
                      else
                      {
                        if(typeof parent.refreshAlbum == 'function')
                        {
                          console.info('refresh album of the parent window');
                          parent.refreshAlbum(json.albumId);
                        }
                      }
                      $("#youtubeformerrorcontainer").html(json.message);
                    }
                    else
                    {
                        $("#youtubeformerrorcontainer").html(json.message);
                    }

                }
                , 
                complete: function()
                {
                  //$.fancybox.hideActivity();
                  //$.fancybox.resize();
                }
            });
            return false;    
          }
         
	</script>
</head>
<body>
<div id="content">
    
    <?php //var_dump($album);?>
    
    
    <?php
        if($album->atype == "mixed" || $album->atype == "youtube"):
    ?>
    <h2><a href="javascript:void(0)" onclick="$('#youtubeformcontainer').toggle();">Subir video Youtube</a></h2>
    <div id="youtubeformcontainer" style="display:none;">
        <form action="<?php echo site_url("upload/do_video_upload"); ?>" method="POST" onsubmit="return sendYoutubeUrl(this)">
            <label for="url">Ingrese la url de youtube</label>
            <input type="input" value="" name="url" />

            <input type="hidden" value="<?php echo $album_id; ?>" name="albumId" />

            <input type="submit" value="enviar" />
        </form>
        <div id="youtubeformerrorcontainer">
            
        </div>
    </div>
    <?php
        endif;
    ?>
    
    <?php
        $style = "";
        if($album->atype == "mixed" || $album->atype == "youtube"):
        $style = "display:none";
    ?>
        <h2><a href="javascript:void(0)" onclick="$('#fileuploadcontainer').toggle();">Subir archivos</a></h2>
    <?php
        endif;
    ?>
    <div id="fileuploadcontainer" style="<?php echo $style;?>">
	  <form>
		  <div id="uploader">
			<p>You browser doesn't have Flash or HTML5 support.</p>
		  </div>
		</form>
	   <div id="log">

	   </div>
    </div>
</div>
</body>
</html>
