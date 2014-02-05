<?php echo doctype(); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
    	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="LauraNozar" content="lauranozar: http://www.lauranozar.com/">

		<title><?php echo (isset($title))? $title: 'Titulo';?></title>

		<link href='http://fonts.googleapis.com/css?family=Molengo' rel='stylesheet' type='text/css'>			
		<!-- css -->
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/celsius/css/styles.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/celsius/source/jquery.fancybox.css?v=2.1.5" media="screen" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/celsius/css/feature-carousel.css" charset="utf-8" />
		<!--[if lt IE 9]>
			<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

		<!-- favicon & fonts -->		
		<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/celsius/images/favicon.ico" />
	</head>
  <body class="iframe">
      <div class="wrapper_iframe">
          <?php if(isset($content)): ?>
            <?php echo $this->load->view($content) ?>
          <?php endif; ?>
      </div>
  </body>
</html>
