<h1>Ingreso de certificado</h1>
<p>Completar los siguientes campos para ingresar un certificado. Los marcos marcados(*) son obligatorios para la creación del mismo.</p>
<?php echo form_error('date'); ?>
<?php
 if(count($errores) > 0):
   echo $errores['cursos_upload'];
 endif;
?>
<?php echo form_open_multipart("agregar/certificado/".$id.".html", array('class' => 'registro'));?>
  <label>Fecha de Adquirido:</label>
      <div class="datepiker">
          <div class="datepiker_input">
            <input type="text" id="datepicker" name="date" value="<?php echo $ficha->getFechaIngreso();?>"/>
          </div><!--DATEPIKER INPUT-->
      </div><!--DATEPIKER-->
  <div class="clear"></div>
  <label>Certificado*:</label><input type="file" name="certificado" class="file" value="<?php echo $ficha->getRocheUsuarioFicha();?>"><div class="clear"></div>
  <input type="submit" class="submit" value="guardar"><div class="clear"></div>
<?php echo form_close(); ?>
<script>
$(function() {
$.datepicker.setDefaults( $.datepicker.regional[ "es" ] );
$( "#datepicker" ).datepicker({
    dateFormat: 'yy-mm-dd'
  });
});
</script>
