<?php
$username = array(
		'name'	=> 'username',
		'id'	=> 'username',
		'value' => set_value('username'),
		'maxlength'	=> $this->config->item('username_max_length', 'tank_auth'),
		'size'	=> 20,
	);
$email = array(
	'name'	=> 'email',
	'id'	=> 'email',
	'value'	=> set_value('email'),
	'maxlength'	=> 80,
	'size'	=> 30,
);

$password = array(
	'name'	=> 'password',
	'id'	=> 'password',
	'value' => set_value('password'),
	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
	'size'	=> 30,
);
$confirm_password = array(
	'name'	=> 'confirm_password',
	'id'	=> 'confirm_password',
	'value' => set_value('confirm_password'),
	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
	'size'	=> 30,
);


$especialidad = array(
	'name'	=> 'especialidad',
	'id'	=> 'especialidad',
	'value'	=> set_value('especialidad'),
	'maxlength'	=> 255,
	'size'	=> 255,
);

$cjp = array(
	'name'	=> 'cjp',
	'id'	=> 'cjp',
	'value'	=> set_value('cjp'),
	'maxlength'	=> 255,
	'size'	=> 255,
);

$direccion = array(
	'name'	=> 'direccion',
	'id'	=> 'direccion',
	'value'	=> set_value('direccion'),
	'maxlength'	=> 255,
	'size'	=> 255,
);

$telefono = array(
	'name'	=> 'telefono',
	'id'	=> 'telefono',
	'value'	=> set_value('telefono'),
	'maxlength'	=> 255,
	'size'	=> 255,
);

?>
<?php if(!$guardado): ?>
<div class="content_site content_internas">
    <h3>Registro de m&eacute;dicos</h3>
    <?php echo form_error($username['name']); ?><?php echo isset($errors[$username['name']])?$errors[$username['name']]:''; ?>
    <?php echo form_error($email['name']); ?><?php echo isset($errors[$email['name']])?$errors[$email['name']]:''; ?>
    <?php echo form_error($password['name']); ?><?php echo isset($errors[$password['name']])?$errors[$password['name']]:''; ?>
    <?php echo form_error($confirm_password['name']); ?><?php echo isset($errors[$confirm_password['name']])?$errors[$confirm_password['name']]:''; ?>
    <?php echo form_error($especialidad['name']); ?><?php echo isset($errors[$especialidad['name']])?$errors[$especialidad['name']]:''; ?>
    <?php echo form_error($cjp['name']); ?><?php echo isset($errors[$cjp['name']])?$errors[$cjp['name']]:''; ?>
    <?php echo form_error($direccion['name']); ?><?php echo isset($errors[$direccion['name']])?$errors[$direccion['name']]:''; ?>
    <?php echo form_error($telefono['name']); ?><?php echo isset($errors[$telefono['name']])?$errors[$telefono['name']]:''; ?>
    <?php 
    /*
    foreach($errors as $err):
      echo $err;
    endforeach;
     */
    ?>
    <?php echo form_open($this->uri->uri_string(), array('class' => 'from_trabajar_lab from_registro')); ?>
        <?php echo form_label(lang('registro_nombre'), $username['id'], array('class' =>'label_registro_large')); ?>
        <?php echo form_input($username, array('class' =>'input_registro_large')); ?>
        <div class="clear"></div>
        <?php echo form_label(lang('registro_password'), $password['id'], array('class' =>'label_registro_large')); ?>
        <?php echo form_password($password, array('class' =>'input_registro_large')); ?>
        <div class="clear"></div>
        <?php echo form_label(lang('registro_repetir_password'), $confirm_password['id'], array('class' =>'label_registro_large')); ?>
        <?php echo form_password($confirm_password, array('class' =>'input_registro_large')); ?>
        <div class="clear"></div>
        <?php echo form_label(lang('registro_especialidad'), $especialidad['id'], array('class' =>'label_registro_large')); ?>
        <?php echo form_input($especialidad, array('class' =>'input_registro_large')); ?>
        <div class="clear"></div>
        <?php echo form_label(lang('registro_caja_profesional'), $cjp['id']); ?>
        <?php echo form_input($cjp); ?><span><?php echo lang('registro_caja_profesional_texto');?></span>
        <div class="clear"></div>
        <?php echo form_label(lang('registro_email'), $email['id']); ?>
        <?php echo form_input($email); ?>
        <div class="clear"></div>
        <?php echo form_label(lang('registro_direccion'), $direccion['id']); ?>
        <?php echo form_input($direccion); ?>
        <div class="clear"></div>
        <?php echo form_label(lang('registro_telefono'), $telefono['id']); ?>
        <?php echo form_input($telefono); ?>
        <div class="clear"></div>
        
<!--        <label  class="label_registro_large">* Nombre y Apellido</label>
        <input type="text" name="nombre_apellido" class="input_registro_large"><div class="clear"></div>-->
<!--        <label class="label_registro_large">* Especialidad</label><input type="text" name="especialidad" class="input_registro_large"><div class="clear"></div>-->
<!--        <label>* #CJP</label><input type="text" name="text"><span>Número de Caja Profesional</span><div class="clear"></div>        -->
<!--        <label>* Mail</label><input type="email" name="mail"><div class="clear"></div>
        <label>Direcci&oacute;n</label><input type="text" name="direccion"><div class="clear"></div>
        <label>Tel&eacute;fono</label><input type="text" name="telefono"><div class="clear"></div>-->
        <input type="submit" class="submit" value="Enviar">    
    <?php echo form_close();?>
<!--    </form>-->
    <p class="info_contacto">Los campos marcados con (*) son obligatorios</p>
  </div><!-- content -->
<?php else: ?>
  <h3>Ingresado con exito.</h3>
<?php endif;?>  
  <div class="images_bottom">
    <img src="<?php echo base_url(); ?>assets/celsius/images/img_productos.jpg">
  </div>