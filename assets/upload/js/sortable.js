$(document).ready(function() { 
  
  $("#sortable").sortable(
  {
    update : function () { 
      var order = $('#sortable').sortable('serialize'); 
      var album_id = $('#album_id').val();
      var post_data = 'album_id='+album_id+'&'+order;

      parent.$('#cboxLoadingGraphic').show();
      $.ajax({
        url: $('#sort_ajax').val(),
        data: post_data,
        type: 'post',
        dataType: 'json',
        complete: function()
        {
            parent.refreshAlbum(album_id);
            parent.$('#cboxLoadingGraphic').hide();
            parent.$.colorbox.resize();
        }        
      });
      
    }
  });
});

