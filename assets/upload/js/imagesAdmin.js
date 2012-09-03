$(document).ready(function() { 
  hoversImages();
  
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
 //console.log('refreshAlbum ' + albumId);
 var mUrl = $('#refresh_album_' + albumId).val();
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
        startFancyLinks();
      }
    }        
  }); 
}