$(document).ready(function() { 
  
    $("a.colorbox_link").colorbox({
            'width' : '40%',
            'height' : '80%',
            'onClosed' : function(){window.location.reload();},
            'iframe' : true
    });
});

function deleteItem(itemId, text, mUrl)
{
  if(confirm(text))
  {
    $.ajax({
      url: mUrl,
      data: {id: itemId},
      type: 'post',
      dataType: 'json',
      complete: function(json)
      {
        var obj = jQuery.parseJSON(json.responseText);
        if(obj.response == "OK")
        {
          $('#registro_row_' + itemId).fadeOut(500, function() { $(this).remove(); });
        }
      }        
    });
  }
}
