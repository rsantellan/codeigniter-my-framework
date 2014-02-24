<?php
if ($use_username) {
	$username = array(
		'name'	=> 'username',
		'id'	=> 'username',
		'value' => $user->username,
		'maxlength'	=> $this->config->item('username_max_length', 'tank_auth'),
		'size'	=> 30,
	);
}
$email = array(
	'name'	=> 'email',
	'id'	=> 'email',
	'value'	=> $user->email,
	'maxlength'	=> 80,
	'size'	=> 30,
);

$especialidad = array(
	'name'	=> 'especialidad',
	'id'	=> 'especialidad',
	'value'	=> $user->especialidad,
	'maxlength'	=> 255,
	'size'	=> 255,
);

$cjp = array(
	'name'	=> 'cjp',
	'id'	=> 'cjp',
	'value'	=> $user->cjp,
	'maxlength'	=> 255,
	'size'	=> 255,
);

$direccion = array(
	'name'	=> 'direccion',
	'id'	=> 'direccion',
	'value'	=> $user->direccion,
	'maxlength'	=> 255,
	'size'	=> 255,
);

$telefono = array(
	'name'	=> 'telefono',
	'id'	=> 'telefono',
	'value'	=> $user->telefono,
	'maxlength'	=> 255,
	'size'	=> 255,
);

$permisos = array(
	'name'	=> 'permisos',
	'id'	=> 'permisos',
	'value'	=> $user->profile,
	'maxlength'	=> 255,
	'size'	=> 255,
);
?>

<div class="grid_16">
  <h2>Editar Usuario</h2>
  <?php
   if($this->session->flashdata('salvado') == "ok"):
  ?>
  	<p id="salvado_ok" class="success">Usuario salvado</p>
  	
  	<script type="text/javascript">
 		$(document).ready(function() {
 			$("#salvado_ok").fadeOut(3000);
 		});
 	</script>
  <?php endif; ?>
  <?php echo form_error($username['name']); ?><?php echo isset($errors[$username['name']])?$errors[$username['name']]:''; ?>
  <?php echo form_error($email['name']); ?><?php echo isset($errors[$email['name']])?$errors[$email['name']]:''; ?>
  <?php echo form_error($especialidad['name']); ?><?php echo isset($errors[$especialidad['name']])?$errors[$especialidad['name']]:''; ?>
  <?php echo form_error($cjp['name']); ?><?php echo isset($errors[$cjp['name']])?$errors[$cjp['name']]:''; ?>
  <?php echo form_error($direccion['name']); ?><?php echo isset($errors[$direccion['name']])?$errors[$direccion['name']]:''; ?>
  <?php echo form_error($telefono['name']); ?><?php echo isset($errors[$telefono['name']])?$errors[$telefono['name']]:''; ?>
  <?php echo form_error($permisos['name']); ?><?php echo isset($errors[$permisos['name']])?$errors[$permisos['name']]:''; ?>
  <?php foreach($errors as $err):
    echo $err;
  endforeach;
  ?>
  
</div>

<?php echo form_open($this->uri->uri_string()); ?>
<div class="grid_5">
  <p>
    <?php echo form_label('Usuario *', $username['id']); ?>
    <?php echo form_input($username); ?>
  </p>
</div>
<div class="grid_5">
  <p>
    <?php echo form_label('Correo electronico *', $email['id']); ?>
    <?php echo form_input($email); ?>
  </p>
</div>
<div class="clear"></div>
<div class="grid_5">
  <p>
    <?php echo form_label('Especialidad *', $especialidad['id']); ?>
    <?php echo form_input($especialidad); ?>
  </p>
</div>
<div class="grid_5">
  <p>
    <?php echo form_label('Número de Caja Profesional *', $cjp['id']); ?>
    <?php echo form_input($cjp); ?>
  </p>
</div>
<div class="clear"></div>
<div class="grid_5">
  <p>
    <?php echo form_label('Dirección', $direccion['id']); ?>
    <?php echo form_input($direccion); ?>
  </p>
</div>
<div class="grid_5">
  <p>
    <?php echo form_label('Teléfono', $telefono['id']); ?>
    <?php echo form_input($telefono); ?>
  </p>
</div>
<div class="clear"></div>
<div class="grid_5">
  <p>
    <?php echo form_label('Permisos *', $permisos['id']); ?>
    <?php $options = array(
            'admin'    => 'Administrador',
            'medico'    => 'medico',
            'empleado'    => 'empleado',
        ); ?>  
    <?php echo form_dropdown($permisos['name'], $options, set_value($permisos['name']));?>
  </p>
</div>
<div class="clear"></div>
<div class="grid_16">
  <p class="submit">
    <?php echo form_submit('register', 'Guardar'); ?>
  </p>
</div>

<?php echo form_close(); ?>

<a href="<?php echo site_url('authadmin/index'); ?>"> Volver al listado </a>