<?php
if ($use_username) {
	$username = array(
		'name'	=> 'username',
		'id'	=> 'username',
		'value' => set_value('username'),
		'maxlength'	=> $this->config->item('username_max_length', 'tank_auth'),
		'size'	=> 30,
	);
}
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

$permisos = array(
	'name'	=> 'permisos',
	'id'	=> 'permisos',
	'value'	=> set_value('permisos'),
	'maxlength'	=> 255,
	'size'	=> 255,
);

$mutualista = array(
	'name'	=> 'mutualista',
	'id'	=> 'mutualista',
	'value'	=> set_value('mutualista'),
	'maxlength'	=> 255,
	'size'	=> 255,
);

$medicamentos = array(
	'name'	=> 'medicamentos',
	'id'	=> 'medicamentos',
	'value'	=> set_value('medicamentos'),
	'maxlength'	=> 255,
	'size'	=> 255,
);
?>

<div class="grid_16">
  <h2>Agregar Usuario</h2>
  <?php echo form_error($username['name']); ?><?php echo isset($errors[$username['name']])?$errors[$username['name']]:''; ?>
  <?php echo form_error($email['name']); ?><?php echo isset($errors[$email['name']])?$errors[$email['name']]:''; ?>
  <?php echo form_error($password['name']); ?><?php echo isset($errors[$password['name']])?$errors[$password['name']]:''; ?>
  <?php echo form_error($confirm_password['name']); ?><?php echo isset($errors[$confirm_password['name']])?$errors[$confirm_password['name']]:''; ?>
  <?php echo form_error($especialidad['name']); ?><?php echo isset($errors[$especialidad['name']])?$errors[$especialidad['name']]:''; ?>
  <?php echo form_error($cjp['name']); ?><?php echo isset($errors[$cjp['name']])?$errors[$cjp['name']]:''; ?>
  <?php echo form_error($direccion['name']); ?><?php echo isset($errors[$direccion['name']])?$errors[$direccion['name']]:''; ?>
  <?php echo form_error($telefono['name']); ?><?php echo isset($errors[$telefono['name']])?$errors[$telefono['name']]:''; ?>
  <?php echo form_error($permisos['name']); ?><?php echo isset($errors[$permisos['name']])?$errors[$permisos['name']]:''; ?>
  <?php echo form_error($mutualista['name']); ?><?php echo isset($errors[$mutualista['name']])?$errors[$mutualista['name']]:''; ?>
  <?php echo form_error($medicamentos['name']); ?><?php echo isset($errors[$medicamentos['name']])?$errors[$medicamentos['name']]:''; ?>
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
    <?php echo form_label('Contraseña *', $password['id']); ?>
    <?php echo form_password($password); ?>
  </p>
</div>
<div class="grid_5">
  <p>
    <?php echo form_label('Repetir contraseña *', $confirm_password['id']); ?>
    <?php echo form_password($confirm_password); ?>
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
    <?php echo form_label('Mutualista', $mutualista['id']); ?>
    <?php echo form_input($mutualista); ?>
  </p>
</div>
<div class="grid_5">
  <p>
    <?php echo form_label('Medicamentos', $medicamentos['id']); ?>
    <?php echo form_input($medicamentos); ?>
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