<?php echo doctype(); ?>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta charset="UTF-8">
    <meta name="author" content="Rodrigo Santellan">
    <title>ROCHE - ACCU-CHEK URUGUAY</title>
    <meta name="Title" content="Accu-Check Roche Uruguay" />
    <link rel="shortcut icon" href="<?php echo base_url();?>assets/images/roche/favicon.ico" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/roche/styles.css" media="screen"/>
    <!--[if IE 6]>
    <script type="text/javascript" src="js/unitpngfix.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/roche/styles_ie6.css" media="screen"/>
    <![endif]-->
    <!--[if IE 7]><link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/roche/styles_ie7.css" media="screen"/><![endif]-->
    <!--[if IE 8]><link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/roche/styles_ie8.css" media="screen"/><![endif]-->
  </head>
<body>  
  <div id="wrapper">
<?php
$login = array(
	'name'	=> 'login',
	'id'	=> 'login',
	'value' => set_value('login'),
	'maxlength'	=> 80,
	'size'	=> 30,
    'class' => 'hs-input has-fake-placeholder',
    'spellcheck' => 'false'
);
if ($login_by_username AND $login_by_email) {
	$login_label = 'Email or login';
} else if ($login_by_username) {
	$login_label = 'Login';
} else {
	$login_label = 'Email';
}
$password = array(
	'name'	=> 'password',
	'id'	=> 'password',
	'size'	=> 30,
    'class' => 'hs-input has-fake-placeholder',
);
$remember = array(
	'name'	=> 'remember',
	'id'	=> 'remember',
	'value'	=> 1,
	'checked'	=> set_value('remember'),
	'style' => 'margin:0;padding:0',
);
$captcha = array(
	'name'	=> 'captcha',
	'id'	=> 'captcha',
	'maxlength'	=> 8,
);
?>
      <div id="header_top">
      <div id="logo_accu">
         <img src="<?php echo base_url();?>assets/images/roche/logo.jpg" />
      </div>
      <div id="logo_roche">
        <img src="<?php echo base_url();?>assets/images/roche/logo_roche.jpg" />
      </div>
      </div><!--HEADER TOP-->
      <div id="header_bottom">
      <div id="menu">
          <ul class="menu">
         </ul>
      </div>
      </div><!--HEADER BOTTOM-->
      <div class="clear"></div>
         <div id="content">
          <h1>Registro</h1>
          <p>Bienvendidos al listado de usuarios de los productos Accu-Chek. Por favor ingrese su usuario para poder acceder al sistema.</p>
          <?php echo form_open($this->uri->uri_string(), array('class' => 'login', 'id' => 'hs-login')); ?>
            <label for="login">Usuario</label>
            <?php echo form_input($login); ?>
            <?php echo form_error($login['name']); ?><?php echo isset($errors[$login['name']])?$errors[$login['name']]:''; ?>
            <div class="clear"></div>
            <label for="password">Contrase&ntilde;a</label>
            <?php echo form_password($password); ?>
            <?php echo form_error($password['name']); ?><?php echo isset($errors[$password['name']])?$errors[$password['name']]:''; ?>
            <div class="clear"></div>
            <input type="submit" class="submit" value="ingresar">
            <div class="clear"></div>
          <?php echo form_close(); ?>
         </div><!--CONTENT-->
    </div>
</body>
</html>