<h1>Ingreso de usuario</h1>
<p>Completar los siguientes campos para ingresar al usuario. Los marcos marcados(*) son obligatorios para la creación del mismo.</p>
<div class="form_error">
  <?php echo form_error('name'); ?>
<?php echo form_error('lastname'); ?>
<?php echo form_error('ci'); ?>
<?php echo form_error('phone'); ?>
<?php echo form_error('center'); ?>
<?php echo form_error('date'); ?>
<?php
 if(count($errores) > 0):
   echo $errores['cursos_upload'];
 endif;
?>  
</div>

<?php echo form_open_multipart('roche/salvarIngreso', array('class' => 'registro'));?>
  <label>Nombre*:</label><input type="text" name="name" maxlength="255" value="<?php echo $usuario->getName();?>"><div class="clear"></div>
  <label>Apellido*:</label><input type="text" name="lastname" maxlength="255" value="<?php echo $usuario->getLastname();?>"><div class="clear"></div>
  <label>Cédula de Identidad*:</label><input type="text" name="ci" maxlength="255" value="<?php echo $usuario->getCi();?>"><div class="clear"></div>
  <label>Télefono:</label><input type="text" name="phone" maxlength="255" value="<?php echo $usuario->getPhone();?>"><div class="clear"></div>
  <label>Mutualista:</label><input type="text" name="center" id="center" maxlength="255" value="<?php echo $usuario->getCenter();?>"><div class="clear"></div>            
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
//$( "#datepicker" ).datepicker( "option", "dateFormat", 'yy-mm-dd');

$( "#center" ).autocomplete({
  source: '<?php echo site_url('roche/searchCenter'); ?>',
  minLength: 2,
  select: function( event, ui ) {
    //console.info(ui);
    //console.info(this.value);
  }
});
});
</script>
