<?php echo doctype(); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		
        
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="Author" content="loopitadesign: http://www.loopitadesign.com/">
		<title><?php echo (isset($title))? $title: 'Titulo';?></title>
		
		<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic,700italic' rel='stylesheet' type='text/css'>

		<!-- css -->
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/efsa/css/styles.css" />
		<!-- fancybox -->
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/efsa/source/jquery.fancybox.css?v=2.1.5" media="screen" />

		<!-- html5 snippet -->
		<!--[if lt IE 9]>
			<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

		<!-- favicon & fonts -->		
		<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/efsa/images/favicon.ico" />

		<!-- fancybox -->
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/efsa/lib/jquery-1.10.1.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/efsa/js/jquery-migrate-1.2.1.min.js"></script><!-- accordion -->
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/efsa/source/jquery.fancybox.js?v=2.1.5"></script>
		<!-- accordion -->
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/efsa/js/jquery-ui.js"></script>		
		<!-- contacto -->
		<script src="<?php echo base_url(); ?>assets/efsa/js/jquery_002.js"></script>

        
	</head>
  <body>
	<div class="wrapper">
	  <nav>
		<menu>
			<ul>
				<li class="short_short"><a href="<?php echo site_url('');?>" <?php if($menu == 'home'):?> class="current"<?php endif;?>><?php echo lang('menu_inicio');?></a></li>
				<li class="integrantes"><a href="<?php echo site_url('integrantes.html');?>" <?php if($menu == 'integrantes'):?> class="current"<?php endif;?>><?php echo lang('menu_integrantes');?></a></li>
				<li class="investigacion"><a href="/investigacion.php" <?php if($menu == 'investigacion'):?> class="current"<?php endif;?>><?php echo lang('menu_investigacion');?></a></li>
				<li class="publicaciones"><a href="<?php echo site_url('publicaciones.html');?>" <?php if($menu == 'publicaciones'):?> class="current"<?php endif;?>><?php echo lang('menu_publicaciones');?></a></li>
				<li class="short docencia"><a href="/docencia.php" <?php if($menu == 'docencia'):?> class="current"<?php endif;?>><?php echo lang('menu_docencia');?></a></li>
				<li class="divulgacion"><a href="/extension.php" <?php if($menu == 'extension'):?> class="current"<?php endif;?>><?php echo lang('menu_extension');?></a></li>
				<li class="short contacto"><a href="/contacto.php" <?php if($menu == 'contacto'):?> class="current"<?php endif;?>><?php echo lang('menu_contacto');?></a></li>
			</ul>
		</menu>
	  </nav>
      <?php if(isset($content)): ?>
        <?php echo $this->load->view($content) ?>
      <?php endif; ?>
	</div>
  </body>
</html>
