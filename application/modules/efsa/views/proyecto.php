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

  </head>
  <body style="background:none;">
	<div class="bg_titles_lbox bg_titles_integrantes">
		<h1 class="float_left"><?php echo lang('investigacion_titulo');?> | <?php echo lang('investigacion_proyectos_titulo');?></h1>
	</div>
	<div class="integrantes_box">
	<article class="listados">
		<div class="investigaciones_info">
			<ul>
				<li class="investigaciones_name"><?php echo $object->name;?></li>
				<li><?php echo html_purify(html_entity_decode(($object->responsables)));?></li>
			</ul>		
		</div><!-- integrantes info -->
	</article><!-- integrantes -->
	</div><!-- integrantes box-->
	<div class="lightbox_texts">
	  <?php echo html_purify(html_entity_decode($object->description, ENT_COMPAT | 0, 'UTF-8')); ?>
	</div>
  </body>
</html>
