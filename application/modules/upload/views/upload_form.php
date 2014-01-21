<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
<title>Administrador - Subir archivo</title>
<link href="<?php echo base_url(); ?>assets/upload/css/default.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo base_url(); ?>assets/upload/swfupload/swfupload.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/upload/js/swfupload.queue.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/upload/js/fileprogress.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/upload/js/handlers.js"></script>
<script type="text/javascript" src="<?php echo base_url() . "assets/admin/js/jquery-1.7.1.min.js";?>"></script>
<script type="text/javascript">
		var swfu;

		window.onload = function() {
			var settings = {
				flash_url : "<?php echo base_url(); ?>assets/upload/swfupload/swfupload.swf",
				upload_url: "<?php echo site_url("upload/do_upload"); ?>",
				post_params: {
            "album_id" : "<?php echo $album_id; ?>", 
            "ckeditor" : "<?php echo $ckeditor;?>", 
            "ckeditorFuncNum" : "<?php echo $ckeditorFuncNum;?>"
            },
				file_size_limit : "100 MB",
				file_types : "*.*",
				file_types_description : "All Files",
				file_upload_limit : 100,
				file_queue_limit : 0,
				custom_settings : {
					progressTarget : "fsUploadProgress",
					cancelButtonId : "btnCancel"
				},
				debug: false,

				// Button settings
				button_image_url: "<?php echo base_url(); ?>assets/upload/images/TestImageNoText_65x29.png",
				button_width: "65",
				button_height: "29",
				button_placeholder_id: "spanButtonPlaceHolder",
				button_text: '<span class="theFont">Subir</span>',
				button_text_style: ".theFont { font-size: 16; }",
				button_text_left_padding: 12,
				button_text_top_padding: 3,
				
				// The event handler functions are defined in handlers.js
				file_queued_handler : fileQueued,
				file_queue_error_handler : fileQueueError,
				file_dialog_complete_handler : fileDialogComplete,
				upload_start_handler : uploadStart,
				upload_progress_handler : uploadProgress,
				upload_error_handler : uploadError,
				upload_success_handler : uploadSuccess,
				upload_complete_handler : uploadComplete,
				queue_complete_handler : queueComplete	// Queue plugin event
			};

			swfu = new SWFUpload(settings);
		 };
         
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
    
    <div id="youtubeformcontainer">
    <?php
        if($album->atype == "mixed" || $album->atype == "youtube"):
    ?>
     
    <form action="<?php echo site_url("upload/do_video_upload"); ?>" method="POST" onsubmit="return sendYoutubeUrl(this)">
        <label for="url">Ingrese la url de youtube</label>
        <input type="input" value="" name="url" />
        
        <input type="hidden" value="<?php echo $album_id; ?>" name="albumId" />
        
        <input type="submit" value="enviar" />
    </form>
        <div id="youtubeformerrorcontainer">
            
        </div>
    <?php
        endif;
    ?>
    </div>
    <div id="fileuploadcontainer">
        <h2>Subir archivos</h2>
        <?php echo form_open_multipart('upload/do_upload');?>
                <div class="fieldset flash" id="fsUploadProgress">
                <span class="legend">Cola de archivos</span>
                </div>
            <div id="divStatus">0 Archivos subidos</div>
                <div>
                    <span id="spanButtonPlaceHolder"></span>
                    <input id="btnCancel" type="button" value="Cancelar" onclick="swfu.cancelQueue();" disabled="disabled" style="margin-left: 2px; font-size: 8pt; height: 29px;" />
                </div>

        </form>
    </div>
</div>
</body>
</html>
