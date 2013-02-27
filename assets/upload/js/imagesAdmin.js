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
        hoversImages();
        startUploadFancyLinks(albumId);
      }
    }        
  }); 
}

function startUploadFancyLinks()
{
  //var album_id = null;
  $(".img_edit .fancy_link").fancybox();
  $(".fancy_link_upload").fancybox({
    onClosed: function(){
      if ( $.browser.msie ) {
        $('.single_album_container').each(function(indice, elemento){
          //console.log(indice);
          //console.log(elemento);
          var element_id = $(elemento).attr('id').replace('album_', '');
          //console.info(element_id);
          refreshAlbum(element_id);
        });
      }
    }
  });
}