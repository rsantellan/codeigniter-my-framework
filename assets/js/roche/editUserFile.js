$(document).ready(function() {
  
  $( "#center" ).autocomplete({
    source: $("#searchCenterLocation").val(),
    minLength: 2,
    select: function( event, ui ) {
      //console.info(ui);
      //console.info(this.value);
    }
  });

});

function sendUserForm(form)
{
  $.ajax({
      url: $(form).attr('action'),
      data: $(form).serialize(),
      type: 'post',
      dataType: 'json',
      success: function(json){
          if(json.response == "OK")
          {
            
          }
      }, 
      complete: function(){
        
      }
  });
  return false;
}

function callNoty(message, status)
{
  var noty_id = noty({
    text: message,
    layout: 'center',
    timeout: 1000,
    type: status
  });
}

/**
 * 


>>> callNoty('hola', 'alert');

undefined

>>> callNoty('hola', 'error');

undefined

>>> callNoty('hola', 'success');

undefined

 */