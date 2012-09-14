$(document).ready(function() { 
  
  $("#sortable").sortable(
  {
    update : function () { 
      var order = $('#sortable').sortable('serialize'); 
      var album_id = $('#album_id').val();
      var post_data = 'album_id='+album_id+'&'+order;

      parent.$.fancybox.showActivity();
      $.ajax({
        url: $('#sort_ajax').val(),
        data: post_data,
        type: 'post',
        dataType: 'json',
        complete: function()
        {
            parent.refreshAlbum(album_id);
            parent.$.fancybox.hideActivity();
            parent.$.fancybox.resize();
        }        
      });
      
    }
  });
});

