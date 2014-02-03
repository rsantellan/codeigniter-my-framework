<?php echo doctype(); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
    	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="LauraNozar" content="lauranozar: http://www.lauranozar.com/">

		<title><?php echo (isset($title))? $title: 'Titulo';?></title>
		<!--<meta name="title" content="Restaurants guide for Montevideo, Uruguay - Restaurantmontevideo.com" />
		<meta name="description" content="Find where have dinner at Montevideo, Uruguay. The best restaurants of the city." />
		<meta name="keywords" content="restaurants montevideo, meal, sushi, restaurants at montevideo uruguay, food, wines, steakhouse at montevideo, tourism montevideo, eat, dinner, brunch, lunch, supper" />
			-->

		<link href='http://fonts.googleapis.com/css?family=Molengo' rel='stylesheet' type='text/css'>			
		<!-- css -->
		<link rel="stylesheet" type="text/css" href="/css/styles.css" />
		<link rel="stylesheet" type="text/css" href="/source/jquery.fancybox.css?v=2.1.5" media="screen" />
		<link rel="stylesheet" href="/css/feature-carousel.css" charset="utf-8" />
		<!--[if lt IE 9]>
			<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

		<!-- favicon & fonts -->		
		<link rel="shortcut icon" href="/images/favicon.ico" />

		<!-- js -->
		<script type="text/javascript" src="/js/dropdown.js"></script>
		<!-- lightbox -->
		<script type="text/javascript" src="/lib/jquery-1.10.1.min.js"></script>
		<script src="http://code.jquery.com/jquery-migrate-1.2.1.js"></script>
		<script type="text/javascript" src="/source/jquery.fancybox.js?v=2.1.5"></script>
		<!-- slide -->
    	<script src="/js/jquery.featureCarousel.min.js" type="text/javascript" charset="utf-8"></script>		

	</head>
  <body>
    <div id="wrapper">
      <div id="header_top">
      <div id="logo_accu">
        <a href="<?php echo site_url(''); ?>">
         <img src="<?php echo base_url();?>assets/images/roche/logo.jpg" />
        </a>
      </div>
      <div id="logo_roche">
        <img src="<?php echo base_url();?>assets/images/roche/logo_roche.jpg" />
      </div>
      </div><!--HEADER TOP-->
      <div id="header_bottom">
      <div id="menu">
          <ul class="menu">
            <li>
              <a href="<?php echo site_url('ingresar.html'); ?>" class="<?php echo ($menu_id == "ingreso") ? "current" : "";?>">Ingresar usuario</a>
            </li>
            <li>
              <a href="<?php echo site_url('buscar.html'); ?>" class="<?php echo ($menu_id == "busqueda") ? "current" : "";?>">B&uacute;squeda de usuario</a>
            </li>
            <li class="logout">
              <a href="<?php echo site_url('auth/logout');?>">Cerrar sesi&oacute;n</a>
            </li>
         </ul>
      </div>
      </div><!--HEADER BOTTOM-->
      <div class="clear"></div>
      <div id="content">
         <?php if(isset($content)): ?>
          <?php echo $this->load->view($content) ?>
        <?php endif; ?>
      </div><!--CONTENT-->
    </div>
  </body>
</html>
