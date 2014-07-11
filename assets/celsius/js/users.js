function sendUserEditForm(form)
{
    $('#guardarEdit').hide();
    $("#formeditusuarioserrores").html(' ');
    $.ajax({
        url: $(form).attr('action'),
        data: $(form).serialize(),
        type: 'post',
        dataType: 'json',
        success: function(json){
            if(json.response == "OK")
            {
              if($('#my_hidden_link').length > 0)
              {
                  $.fancybox.close();
              }
              else
              {
                window.location.reload();
              }
              
            }
            else
            {
              //console.log(json.errores)
              if(json.errores.form !== 'false')
              {
                console.log(json.errores.form);
                jQuery.each(json.errores.form, function(i, val) {
                  $("#formeditusuarioserrores").append(document.createTextNode(" - " + val));
                });
              }
            }


        }
        , 
        complete: function()
        {
          $('#guardarEdit').show();
        }
    });
    return false;
}