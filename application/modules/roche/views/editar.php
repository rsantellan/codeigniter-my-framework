<h1>Editar usuario</h1>
<p>Los campos marcados(*) son obligatorios.</p>

<?php echo form_error('name'); ?>
<?php echo form_error('lastname'); ?>
<?php echo form_error('ci'); ?>
<?php echo form_error('phone'); ?>
<?php echo form_error('center'); ?>
<?php echo form_error('date'); ?>
<?php
/*
 if(count($errores) > 0):
   echo $errores['cursos_upload'];
 endif;
*/
 ?>
<?php echo form_open('roche/salvarUsuarioSimple', array('class' => 'registro', 'onsubmit' => 'return sendUserForm(this)'));?>
  <input type="hidden" name="id" id="id" value="<?php echo $usuario->getId();?>" />
  <label>Nombre*:</label><input type="text" name="name" maxlength="255" value="<?php echo $usuario->getName();?>"><div class="clear"></div>
  <label>Apellido*:</label><input type="text" name="lastname" maxlength="255" value="<?php echo $usuario->getLastname();?>"><div class="clear"></div>
  <label>Cédula de Identidad*:</label><input type="text" name="ci" maxlength="255" value="<?php echo $usuario->getCi();?>"><div class="clear"></div>
  <label>Télefono:</label><input type="text" name="phone" maxlength="255" value="<?php echo $usuario->getPhone();?>"><div class="clear"></div>
  <label>Mutualista:</label><input type="text" name="center" id="center" maxlength="255" value="<?php echo $usuario->getCenter();?>"><div class="clear"></div>            
  <input type="submit" class="submit" value="guardar"><div class="clear"></div>
<?php echo form_close(); ?>

<h1>Editar fichas</h1>
<?php foreach($fichas as $ficha): ?>
<?php echo form_open('roche/salvarIngreso', array('class' => 'registro'));?>
  <div class="datos_usuario">
    <span class="tipo_dato">Fecha de Adquirido:</span>
    <input type="text" id="datepicker" name="date" value="<?php echo $ficha->fecha_ingreso;?>"/>
    <span class="resultado_dato"><?php echo $ficha->fecha_ingreso;?></span>
  </div>
<?php echo form_close(); ?>
<?php echo form_open_multipart('roche/salvarIngreso', array('class' => 'registro'));?>
  <div class="datos_usuario">
    <span class="tipo_dato">Certificado:</span>
    <span class="resultado_dato">
      <img src="<?php echo base_url() .$path.$ficha->filename ?>" height="276"/>
    </span>
    <div class="clear"></div>
    <span class="tipo_dato">Nuevo certificado:</span>
    <input type="file" name="certificado" class="file" value="">
    <div class="clear"></div>
  </div>  
  <?php echo form_close(); ?>
  <?php endforeach; ?>
  
<input type="hidden" id="searchCenterLocation" value="<?php echo site_url('roche/searchCenter'); ?>" />