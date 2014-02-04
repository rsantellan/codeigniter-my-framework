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
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/celsius/css/styles.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/celsius/source/jquery.fancybox.css?v=2.1.5" media="screen" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/celsius/css/feature-carousel.css" charset="utf-8" />
		<!--[if lt IE 9]>
			<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

		<!-- favicon & fonts -->		
		<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/celsius/images/favicon.ico" />

		<!-- js -->
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/celsius/js/dropdown.js"></script>
		<!-- lightbox -->
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/celsius/lib/jquery-1.10.1.min.js"></script>
		<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/celsius/source/jquery.fancybox.js?v=2.1.5"></script>
		<!-- slide -->
    	<script src="<?php echo base_url(); ?>assets/celsius/js/jquery.featureCarousel.min.js" type="text/javascript" charset="utf-8"></script>		

	</head>
  <body>
    <div class="wrapper">
	  <?php if($topHome): ?>
	  <div class="top_home">
	  <?php endif; ?>
	  <header>
		<div class="logo">
		  <a href="<?php echo site_url($lang);?>"><img src="<?php echo base_url(); ?>assets/celsius/images/logo.jpg"></a>
		</div>
		<div class="header_right">
		  <div class="idiomas">
			<a href="#"><?php echo lang('menu_spanish');?></a> / <a href="#"><?php echo lang('menu_english');?></a>
		  </div>
			<span><?php echo lang('menu_register_text');?></span>
			<form>  
			  <label><?php echo lang('menu_login_name');?></label><input type="text" name="name_login"><div class="clear"></div>
			  <label><?php echo lang('menu_login_password');?></label><input type="text" name="pass_login"><div class="clear"></div>
			  <input type="submit" class="submit" value="<?php echo lang('menu_login_enter');?>">  
			</form>   
		</div><!-- header right -->
		<div class="clear"></div>
		<nav>                     
			  <dl class="dropdown">
				  <dt id="one-ddheader" onmouseover="ddMenu('one',1)" onmouseout="ddMenu('one',-1)" <?php if($menu == 'empresa'):?> class="submenu current"<?php endif;?>><?php echo lang('menu_empresa');?></dt>
					  <dd id="one-ddcontent" onmouseover="cancelHide('one')" onmouseout="ddMenu('one',-1)">
						  <ul>
							<li><a href="<?php echo site_url($lang."/".(($lang =='es')?'presentacion' : 'presentation').".html");?>" <?php if($submenu == 'presentacion'):?> class="current"<?php endif;?>><?php echo lang('menu_presentation');?></a></li>
							<li><a href="<?php echo site_url($lang."/".(($lang =='es')?'infraestructura' : 'infrastructure').".html");?>" <?php if($submenu == 'infraestructura'):?> class="current"<?php endif;?>><?php echo lang('menu_infraestructura');?></a></li>
							<li><a href="<?php echo site_url($lang."/".(($lang =='es')?'mercados' : 'markets').".html");?>" <?php if($submenu == 'mercados'):?> class="current"<?php endif;?>><?php echo lang('menu_mercados');?></a></li>
							<li><a href="<?php echo site_url($lang."/".(($lang =='es')?'recursos-humanos' : 'human-resources').".html");?>" <?php if($submenu == 'recursoshumanos'):?> class="current"<?php endif;?>><?php echo lang('menu_recursos_humanos');?></a></li>
						  </ul>
					  </dd>
			  </dl> 
			  <dl class="dropdown">
				  <dt>|</dt>
			  </dl>             
			  <dl class="dropdown">
				  <dt id="two-ddheader" onmouseover="ddMenu('two',1)" onmouseout="ddMenu('two',-1)" <?php if($menu == 'productos'):?> class="submenu current"<?php endif;?>>Productos</dt>
					  <dd id="two-ddcontent" onmouseover="cancelHide('two')" onmouseout="ddMenu('two',-1)">
						  <ul>
							<?php
							$urlHelperMenuCategory = $lang.'/categoria/';
							if($lang == 'en')
							  $urlHelperMenuCategory = $lang.'/category/';
							?>
							<?php foreach($menuCategoryList as $category): ?>
							  <li><a href="<?php echo site_url($urlHelperMenuCategory.$category->id."/".$category->slug.'.html');?>" <?php if($submenu == $category->slug):?> class="current"<?php endif;?>><?php echo $category->name;?></a></li>
							<?php endforeach; ?>							
						 </ul>
					  </dd>
			  </dl>
			  <dl class="dropdown">
				  <dt>|</dt>
			  </dl>            
			  <dl class="dropdown">
				  <dt><a href="/consulta_medicos.php" <?php if($menu == 'consulta_medicos'):?> class="current"<?php endif;?>>consulta a m&eacute;dicos</a></dt>
			  </dl>  
			  <dl class="dropdown">
				  <dt>|</dt>
			  </dl>                  
			  <dl class="dropdown">
				  <dt><a href="/exterior.php" <?php if($menu == 'exterior'):?> class="current"<?php endif;?>>presencia en el exterior</a></dt>
			  </dl>   
			  <dl class="dropdown">
				  <dt>|</dt>
			  </dl>              
			  <dl class="dropdown">
				  <dt><a href="/salon_conferencias.php" <?php if($menu == 'salon_conferencias'):?> class="current"<?php endif;?>>sal&oacute;n de conferencias</a></dt>
			  </dl>  
			  <dl class="dropdown">
				  <dt>|</dt>
			  </dl>              
			  <dl class="dropdown">
				  <dt><a href="/trabajar_lab.php" <?php if($menu == 'trabajar_lab'):?> class="current"<?php endif;?>>trabaj&aacute; con nosotros</a></dt>
			  </dl> 
			  <dl class="dropdown">
				  <dt>|</dt>
			  </dl>            
			  <dl class="dropdown">
				  <dt><a href="/novedades.php" <?php if($menu == 'novedades'):?> class="current"<?php endif;?>>novedades</a></dt>
			  </dl>                                                           
		</nav>
	  </header>
	  <div class="buscador">
		<input type="text" value="Buscar">
		<input type="submit" value="" class="submit_search">
	  </div><!-- buscador -->		
		
		<?php if(isset($contentTopHome)): ?>
          <?php echo $this->load->view($contentTopHome) ?>
        <?php endif; ?>
	  
	  <?php if($topHome): ?>
	  </div>
	  <?php endif; ?>
	     <?php if(isset($content)): ?>
          <?php echo $this->load->view($content) ?>
      <?php endif; ?>
	    <footer>
		  <div class="footer">
			<span>Nuestras marcas</span>
			<hr>
			<div class="logos_footer">
			  <img src="<?php echo base_url(); ?>assets/celsius/images/akros_pharma.jpg">
			  <img src="<?php echo base_url(); ?>assets/celsius/images/celsius.png">
			  <img src="<?php echo base_url(); ?>assets/celsius/images/dermur.jpg">
			  <img src="<?php echo base_url(); ?>assets/celsius/images/dermur_pharma.jpg">
			</div>
		  </div><!-- .footer -->
		  <div class="clear"></div>
		  <div class="datos_footer">
			<p>Av. Joaquín Suárez 3593 - Montevideo Uruguay | (598) 2336 5446 | contacto@celsiuis.com.uy</p>
			<a href="https://www.facebook.com/LaboratoriosCelsius?fref=ts" target="blank">
			  <img src="<?php echo base_url(); ?>assets/celsius/images/facebook.jpg">
			</a>
		  </div><!-- datos_footer -->
		  <div class="mail_footer">
			<a href="/contacto.php">
			  <img src="<?php echo base_url(); ?>assets/celsius/images/mail.jpg">
			</a>
		  </div><!-- mail_footer -->
		</footer>
      </div>
  </body>
</html>
