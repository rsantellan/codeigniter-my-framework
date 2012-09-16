<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js ie6 ie9-and-less ie8-and-less ie7-and-less" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 ie9-and-less ie8-and-less ie7-and-less" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 ie9-and-less ie8-and-less" lang="en"> <![endif]-->
<!--[if IE 9]>    <html class="no-js ie9 ie9-and-less" lang="en"> <![endif]-->
<!--[if gt IE 9]><!-->
<html class=" js flexbox multiplebgs boxshadow textshadow opacity cssanimations cssgradients csstransitions firefox unix" lang="en"><!--<![endif]-->
  <head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="UTF-8">
    <meta name="author" content="Rodrigo Santellan">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <title>Administrador</title>
	<script type="text/javascript" src="<?php echo base_url();?>assets/admin/js/jquery-1.7.1.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/admin/js/jquery.infieldlabel.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . "assets/auth/css/style_guide_plus_base.css";?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . "assets/auth/css/login-v3.css";?>" />
<!--    <script type="text/javascript" src="login_files/style_guide_plus_base_head.js"></script>-->
    <style type="text/css">#hsnav .primary li:hover a + div.sub, #hsnav .primary li.hover a + div.sub {display: block;}</style>
	<script type="text/javascript">
	  $(document).ready(function(){
		  $("p.label_infield label").inFieldLabels();
	  });
	</script>
  </head>
<body class="hubspot">  

<?php
$login = array(
	'name'	=> 'login',
	'id'	=> 'login',
	'value' => set_value('login'),
	'maxlength'	=> 80,
	'size'	=> 30,
);

if ($this->config->item('use_username', 'tank_auth')) {
	$login_label = 'Email or login';
} else {
	$login_label = 'Email';
}
?>
    <div class="page">

    <div id="login-wrapper">
      <div id="inner-wrapper">
        <div class="form-container">
        
        <?php echo form_open($this->uri->uri_string(), array('class' => 'auth-box', 'id' => 'hs-login')); ?>
		  <p class="label_infield">
		  <label for="login"><?php echo form_label($login_label, $login['id']); ?></label>
			<?php echo form_input($login); ?>
          </p>
		  

          <div class="hs-error <?php echo (strlen(validation_errors())> 0 ? 'visible' : '');?>">
            <?php echo form_error($login['name']); ?><?php echo isset($errors[$login['name']])?$errors[$login['name']]:''; ?>
          </div>

          <div id="submit">
			  <button type="submit" name="reset" tabindex="0" id="loginBtn" class="hs-button primary">Get a new password</button>
          </div>
        <?php echo form_close(); ?>
        </div>
      </div>
    </div>
    </div>
      <footer>
        <div>
            <span class="customer-app-info">
                
                

                    <!-- PRODUCTION -->
            </span>


        </div>
    </footer>
</body>
</html>

<?php


?>
