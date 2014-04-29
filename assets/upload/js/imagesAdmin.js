$(document).ready(function() { 
  hoversImages();
  startUploadFancyLinks();
});

function hoversImages()
{
  $('.img_thumb_container').each(function(index, value) {
    $(this).hover(function(){
      $(this).find('div.img_edit').show();
      $(this).find('div.img_delete').show();
    },
    function(){
      $(this).find('div.img_edit').hide();
      $(this).find('div.img_delete').hide();
    });
  });
  
}

function deleteFile(mUrl, itemId)
{
  $.ajax({
    url: mUrl,
    type: 'post',
    dataType: 'json',
    complete: function(json)
    {
      var obj = jQuery.parseJSON(json.responseText);
      if(obj.response == "OK")
      {
        $('#file_container_' + itemId).fadeOut(500, function() {$(this).remove();});
      }
    }        
  });
}

function refreshAlbum(albumId)
{
 /*
 console.log('refreshAlbum ' + albumId);
 console.log('refresh_album_' + albumId);
 console.log($('#refresh_album_' + albumId));
 */
 var mUrl = $('#refresh_album_' + albumId).val();
 //console.info(mUrl);
 $.ajax({
    url: mUrl,
    type: 'post',
    dataType: 'json',
    complete: function(json)
    {
      var obj = jQuery.parseJSON(json.responseText);
      if(obj.response == "OK")
      {
        $('#album_' + albumId).replaceWith(obj.content.album);
        $.blockUI({ 
          message: '<h1>Procesando...</h1>' ,
          css: {backgroundColor: 'blue', color: '#fff'}
        });
        setTimeout(function(){
            hoversImages();
            startUploadFancyLinks(albumId);
            $.unblockUI();
        },4000);
        
      }
    }        
  }); 
}

function startUploadFancyLinks()
{
  //var album_id = null;
  $.colorbox.remove();
  $(".colorbox_link_upload").colorbox({
      'width' : '40%',
      'height' : '80%',
      'iframe' : true,
      'onClosed' : function(){
        if ( $.browser.msie ) {
            $('.single_album_container').each(function(indice, elemento){
                var element_id = $(elemento).attr('id').replace('album_', '');
                refreshAlbum(element_id);
            });
        }
      }
  });
  adminManager.getInstance().startFancyIframeInPage('colorbox_link_iframe');
  adminManager.getInstance().startFancyInPage('colorbox_link');
}

function saveFileDescription(form){
  $("#album_description_save").hide();
  $.ajax({
	  url: $(form).attr('action'),
	  data: $(form).serialize(),
	  type: 'post',
	  dataType: 'json',
	  success: function(json){
		
	  }
	  , 
	  complete: function()
	  {
		$("#album_description_save").show();
	  }
  });
  return false;
}