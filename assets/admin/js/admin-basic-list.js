$(document).ready(function() { 
  
    $("a.fancy_link").fancybox({
		'onClosed': function(){window.location.reload();}
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
