<div class="content_site content_internas_seccion_iniciada">
  <?php echo $this->load->view('navegacionprivada') ?>
  <?php //include('_nav_seccion_iniciada.php');?>
  <div class="titl_info_personal">
    <?php echo lang('usuario_informacion_personal');?>    
  </div>
  <div class="clear"></div>
    <ul class="informacion_personal">
      <li><?php echo lang('usuario_nombre');?> <?php echo $user->username?></li>
      <li><?php echo lang('usuario_especialidad');?> <?php echo $user->especialidad?></li>
      <li><?php echo lang('usuario_email');?> <?php echo $user->email?></li>
      <li><?php echo lang('usuario_phone');?> <?php echo $user->telefono?></li> 
      <li class="edit">
        <a id="editFancy" href="#usercontainer">
          <?php echo lang('usuario_edit');?>
        </a>
      </li>
    </ul>    
    <a href="#passcontainer" class="pass" id="changePass"><?php echo lang('usuario_cambiar_pass');?></a>
</div><!-- content -->
<div class="images_bottom">
  <img src="<?php echo base_url(); ?>assets/celsius/images/login_home.jpg">
</div>

<script type="text/javascript">
  $(document).ready(function() {
    $("a#editFancy").fancybox({
      height: 550
    });
    $("a#changePass").fancybox({
      height: 550
    });
    
  });
  
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
                window.location.reload();
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
  
  function changePassForm(form)
  {
      $('#guardarEdit').hide();
      $("#formchangepasserrores").html(' ');
      $.ajax({
          url: $(form).attr('action'),
          data: $(form).serialize(),
          type: 'post',
          dataType: 'json',
          success: function(json){
              if(json.response == "OK")
              {
                $("#formchangepasserrores").append(document.createTextNode('Contraseña cambiada con exito'));
              }
              else
              {
                //console.log(json.errores)
                if(json.errores.form !== 'false')
                {
                  //console.log(json.errores.form);
                  jQuery.each(json.errores.form, function(i, val) {
                    $("#formchangepasserrores").append(document.createTextNode(" - " + val));
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
</script>

<div style="display:none">
  <div id="usercontainer">
    <?php $this->load->view('usuarioedit');?>
  </div>
</div>
  
<div style="display:none">
  <div id="passcontainer" style="background-color: white">
    <?php $this->load->view('cambiarPass');?>
  </div>
</div>