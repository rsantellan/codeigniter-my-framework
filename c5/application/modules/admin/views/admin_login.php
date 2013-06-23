<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Bienvenido</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() .APPPATH."modules/admin/css/login_admin.css";?>" />

</head>
<body>
  
<div class="header"></div>  
<div id="container">
	<div class="content_login">
      <?php echo modules::run("mauth/login_form");?>
	</div>
</div>

</body>
</html>