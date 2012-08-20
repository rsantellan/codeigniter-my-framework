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
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-1.7.1.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.infieldlabel.min.js"></script>
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
    <div class="page">

    <div id="login-wrapper">
      <div id="inner-wrapper">
        <div class="form-container">
        
        <?php echo form_open($this->uri->uri_string(), array('class' => 'auth-box', 'id' => 'hs-login')); ?>
		  <p class="label_infield">
		  <label for="login">Usuario</label>
<!--          <span style="font-family: Helvetica,Arial,sans-serif; font-size: 16px; padding-left: 12px;" class="fake-placeholder faded-placeholder">Email Address</span>-->
<!--          <input id="username" name="username" class="hs-input has-fake-placeholder" spellcheck="false" type="text"/>-->
          <?php echo form_input($login); ?>
<!--          <span style="font-family: Helvetica,Arial,sans-serif; font-size: 16px; padding-left: 12px;" class="fake-placeholder">Password</span>-->
<!--          <input id="password" name="password" class="hs-input has-fake-placeholder" type="password"/>-->
          </p>
		  <p class="label_infield">
		  <label for="password">Password</label>
		  <?php echo form_password($password); ?>
		  
<!--          <a id="forgot-password" href="https://login.hubspot.com/login/newforgotPassword">Forgot?</a>-->
		  </p>
<?php echo anchor('/auth/forgot_password/', 'Forgot?', array('class' => 'forgot-password')); ?>
          <div>
            <?php if ($show_captcha): 
                    if ($use_recaptcha):
              ?>
            <div>
                <a href="javascript:Recaptcha.reload()">Get another CAPTCHA</a>
                <div class="recaptcha_only_if_image"><a href="javascript:Recaptcha.switch_type('audio')">Get an audio CAPTCHA</a></div>
                <div class="recaptcha_only_if_audio"><a href="javascript:Recaptcha.switch_type('image')">Get an image CAPTCHA</a></div>
            </div>
            <div>
                <div class="recaptcha_only_if_image">Enter the words above</div>
                <div class="recaptcha_only_if_audio">Enter the numbers you hear</div>
            </div>
            <div>
                <input type="text" id="recaptcha_response_field" name="recaptcha_response_field" />
                <?php echo form_error('recaptcha_response_field'); ?>
                <?php echo $recaptcha_html; ?>
            </div>
            <?php else: ?>
            <div>
                <p>Enter the code exactly as it appears:</p>
                <?php echo $captcha_html; ?>
                <?php echo form_label('Confirmation Code', $captcha['id']); ?>
                <?php echo form_input($captcha); ?>
                <?php echo form_error($captcha['name']); ?>
            </div>
            <?php 
                    endif;
                  endif; ?>
          </div>

          <div class="hs-error <?php echo (strlen(validation_errors())> 0 ? 'visible' : '');?>">
            <?php echo form_error($login['name']); ?><?php echo isset($errors[$login['name']])?$errors[$login['name']]:''; ?>
            <?php echo form_error($password['name']); ?><?php echo isset($errors[$password['name']])?$errors[$password['name']]:''; ?>
          </div>

          <div id="submit">
              <span>
                  <?php echo form_checkbox($remember); ?>
                  <?php echo form_label('Remember', $remember['id']); ?>
              </span>
              <button type="submit" tabindex="0" id="loginBtn" class="hs-button primary">Log In</button>
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