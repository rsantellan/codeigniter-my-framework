function callNoty(message, status)
{
  var noty_id = noty({
    text: message,
    layout: 'center',
    timeout: 1000,
    type: status
  });
}

function deleteFicha(url, id)
{
  if(confirm("Esta seguro de querer eliminar la ficha?")){
    $.ajax({
      url: url,
      type: 'get',
      dataType: 'json',
      success: function(json){
        if(json.response == "OK")
        {
          callNoty("La ficha a sido eliminada correctamente", 'success');
          $("#certificado_"+id).remove();
        }
        else
        {
          callNoty("La ficha no a podido eliminarse", 'alert');
        }
      }
    });
  }
  return false;
}

function deleteUser(url, goingUrl){
  if(confirm("Esta seguro de querer eliminar el usuario?")){
    $.ajax({
      url: url,
      type: 'get',
      dataType: 'json',
      success: function(json){
        if(json.response == "OK")
        {
          callNoty("El usuario a sido eliminado correctamente", 'success');
          window.location = goingUrl;
        }
        else
        {
          callNoty("El usuario no a podido eliminarse", 'alert');
        }
      }
    });
  }
  return false;
}