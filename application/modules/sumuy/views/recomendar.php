<div style="display: none">
  <div id="recomendar_container" class="recomendar">
    <form action="<?php echo site_url('recomendar.html');?>" method="POST" onsubmit="return sendRecomendarForm(this)" data-parsley-validate>
      <input type="hidden" value="<?php echo $site_url;?>" name="site_url"/>
      <input type="text" name="senderName" value="" placeholder="Tu nombre:*" data-parsley-required />
      <input type="text" name="senderEmail" value="" placeholder="Tu email:*" data-parsley-required data-parsley-type="email" />
      <input type="text" name="recieverName" value="" placeholder="Nombre de quien lo recibe:*" data-parsley-required />
      <input type="text" name="recieverEmail" value="" placeholder="Email de quien lo recibe:*" data-parsley-required data-parsley-type="email" />
      <textarea placeholder="Escribe un mensaje" name="message" data-parsley-required></textarea>
      <input type="submit" value="Enviar" id="enviar_recomendar"/>
    </form>
  </div>
</div>
<script>
  function sendRecomendarForm(form){
    if ( $(form).parsley().isValid() ) {
      $('#enviar_recomendar').hide();
      $.ajax({
            url: $(form).attr('action'),
            data: $(form).serialize(),
            type: 'post',
            success: function(data){
              console.info(data);
                $('#recomendar_container').html(data);
            }
            , 
            complete: function()
            {

            }
        });
    }
    
    return false;
  }
</script>