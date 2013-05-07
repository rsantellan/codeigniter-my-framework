$(document).ready(function() {
  
  $( "#center" ).autocomplete({
    source: $("#searchCenterLocation").val(),
    minLength: 2,
    select: function( event, ui ) {
      //console.info(ui);
      //console.info(this.value);
    }
  });

  $.datepicker.setDefaults( $.datepicker.regional[ "es" ] );
  $( ".fecha_input" ).datepicker({
    dateFormat: 'yy-mm-dd'
  });
  //$( ".fecha_input" ).datepicker( "option", "dateFormat", 'yy-mm-dd');
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
            callNoty("Cambios guardados correctamente", 'success');
          }
          else
          {
            callNoty(json.errores, 'alert');
          }
      }, 
      complete: function(){
        
      }
  });
  return false;
}

function sendDateForm(form)
{
  $.ajax({
      url: $(form).attr('action'),
      data: $(form).serialize(),
      type: 'post',
      dataType: 'json',
      success: function(json){
          if(json.response == "OK")
          {
            callNoty("Cambios guardados correctamente", 'success');
          }
          else
          {
            callNoty(json.errores, 'alert');
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