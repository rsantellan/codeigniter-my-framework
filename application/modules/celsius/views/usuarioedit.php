<?php
$username = array(
    'name'	=> 'username',
    'id'	=> 'username',
    'value' => $user->username,
    'maxlength'	=> $this->config->item('username_max_length', 'tank_auth'),
    'size'	=> 30,
);
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
	'maxlength'	=> 80,
	'size'	=> 80,
);

$cjp = array(
	'name'	=> 'cjp',
	'id'	=> 'cjp',
	'value'	=> $user->cjp,
	'maxlength'	=> 80,
	'size'	=> 80,
);

$direccion = array(
	'name'	=> 'direccion',
	'id'	=> 'direccion',
	'value'	=> $user->direccion,
	'maxlength'	=> 80,
	'size'	=> 80,
);

$telefono = array(
	'name'	=> 'telefono',
	'id'	=> 'telefono',
	'value'	=> $user->telefono,
	'maxlength'	=> 80,
	'size'	=> 80,
);

$mutualista = array(
	'name'	=> 'mutualista',
	'id'	=> 'mutualista',
	'value'	=> $user->mutualista,
	'maxlength'	=> 255,
	'size'	=> 80,
);

$medicamentos = array(
	'name'	=> 'medicamentos',
	'id'	=> 'medicamentos',
	'value'	=> $user->mutualista,
	'maxlength'	=> 255,
	'size'	=> 80,
);
$attributes= array('class' => 'editUserform', 'style' => 'background-color: #FFFFFF;', 'onsubmit' => 'return sendUserEditForm(this);');
?>
<?php echo form_open('celsius/saveEditUser', $attributes); ?>
    <label for="<?php echo $username['id']?>"><?php echo lang('usuario_nombre');?>*</label>
    <?php echo form_input($username); ?>
    <div class="clear"></div>
    <label for="<?php echo $email['id']?>"><?php echo lang('usuario_email');?>*</label>
    <?php echo form_input($email); ?>
    <div class="clear"></div>
    <label for="<?php echo $especialidad['id']?>"><?php echo lang('usuario_especialidad');?>*</label>
    <?php echo form_input($especialidad); ?>
    <div class="clear"></div>
    <label for="<?php echo $cjp['id']?>"><?php echo lang('usuario_cpj');?></label>
    <?php echo form_input($cjp); ?>
    <div class="clear"></div>
    <label for="<?php echo $direccion['id']?>"><?php echo lang('usuario_direccion');?></label>
    <?php echo form_input($direccion); ?>
    <div class="clear"></div>
    <label for="<?php echo $telefono['id']?>"><?php echo lang('usuario_phone');?></label>
    <?php echo form_input($telefono); ?>
	<div class="clear"></div>
	<label for="<?php echo $mutualista['id']?>"><?php echo lang('usuario_mutualista');?></label>
    <?php echo form_input($mutualista); ?>
	<div class="clear"></div>
	<label for="<?php echo $medicamentos['id']?>"><?php echo lang('usuario_medicamento');?></label>
    <?php echo form_input($medicamentos); ?>
<div class="clear"></div>
<?php echo form_submit(array('id' => 'guardarEdit', 'name' => 'guardar', 'class' => 'editSubmit'), lang('usuario_guardar')); ?>
<?php echo form_close(); ?>
<div class="errores" id="formeditusuarioserrores" style="height: 70px; background-color: white; color: red">
  
</div>