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

?>

<div class="grid_16">
  <h2>Agregar Usuario</h2>
  <?php echo form_error($username['name']); ?><?php echo isset($errors[$username['name']])?$errors[$username['name']]:''; ?>
  <?php echo form_error($email['name']); ?><?php echo isset($errors[$email['name']])?$errors[$email['name']]:''; ?>
  <?php echo form_error($password['name']); ?><?php echo isset($errors[$password['name']])?$errors[$password['name']]:''; ?>
  <?php echo form_error($confirm_password['name']); ?><?php echo isset($errors[$confirm_password['name']])?$errors[$confirm_password['name']]:''; ?>
  <?php foreach($errors as $err):
    echo $err;
  endforeach;
  ?>
  
</div>

<?php echo form_open($this->uri->uri_string()); ?>
<div class="grid_5">
  <p>
    <?php echo form_label('Usuario', $username['id']); ?>
    <?php echo form_input($username); ?>
  </p>
</div>
<div class="clear"></div>
<div class="grid_5">
  <p>
    <?php echo form_label('Correo electronico', $email['id']); ?>
    <?php echo form_input($email); ?>
  </p>
</div>
<div class="clear"></div>
<div class="grid_5">
  <p>
    <?php echo form_label('Contraseña', $password['id']); ?>
    <?php echo form_password($password); ?>
  </p>
</div>
<div class="clear"></div>
<div class="grid_5">
  <p>
    <?php echo form_label('Repetir contraseña', $confirm_password['id']); ?>
    <?php echo form_password($confirm_password); ?>
  </p>
</div>
<div class="clear"></div>
<div class="grid_16">
  <p class="submit">
    <?php echo form_submit('register', 'Guardar'); ?>
  </p>
</div>

<?php echo form_close(); ?>