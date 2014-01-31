<?php echo doctype(); ?>
<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie ie8 no-js" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="ie ie9 no-js" lang="en"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html class="no-js" lang="en"> <!--<![endif]-->
    <head>

        <!-- Basic Page Needs -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>
            <?php echo (isset($title)) ? $title : 'Federación ecuestre del uruguay'; ?>
        </title>
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- Mobile Specific Metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

        <!-- CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/feu/css/base.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/feu/css/grid.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/feu/css/layout.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/feu/css/main_color1/blue.css" id="main-color1">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/feu/css/main_color2/red.css" id="main-color2">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/feu/css/main_bg/blue.css" id="main-bg-scheme">
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto+Condensed:300|Open+Sans:400,700,300,600,400italic,600italic|Ubuntu:400italic">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/feu/css/font-awesome.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/feu/css/prettyPhoto.default.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/feu/css/carousel.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/feu/css/switcher.css"> <!-- Style Switcher -->

		<?php if($rscarousel): ?>
		  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/jquery-ui-carousel/css/min/rs-carousel-min.css">
		<?php endif; ?>
		
        <!-- Java Script -->
        <script>document.documentElement.className = document.documentElement.className.replace(/\bno-js\b/g, 'js');</script>
        <!--[if lt IE 9]><script src="js/html5shiv.js"></script><![endif]-->

    </head>

    <body>
        <!-- START HEADER -->

        <header id="header">

            <div class="container"> <!-- 1080 pixels Container -->
                <div class="full-width columns">

                    <!-- Logo -->
                    <div id="logo">
                        <a href="<?php echo site_url(''); ?>"><img src="<?php echo base_url(); ?>assets/feu/images/feu.png" alt="logo"></a>
                    </div>

                    <!-- Navigation -->
                    <nav id="navigation">
                        <div id="primary-nav">
                            <ul id="main-menu">
                                <li><a href="<?php echo site_url(''); ?>" class="<?php echo ($menu == 'inicio')? 'current' : '';?>"><?php echo lang("menu_home"); ?></a>
                                <li><a href="javascript:void(0)" class="<?php echo ($menu == 'historia')? 'current' : '';?>"><?php echo lang("menu_historia"); ?></a>
                                    <ul>
                                        <li><a href="<?php echo site_url('historia-que-es-el-raid.html');?>"><?php echo lang("menu_historia_definicion"); ?></a></li>
                                        <li><a href="<?php echo site_url('historia-feu.html');?>"><?php echo lang("menu_historia_feu"); ?></a></li>
                                        <li><a href="<?php echo site_url('historia-campeones.html');?>"><?php echo lang("menu_historia_campeones"); ?></a></li>
                                        <li><a href="<?php echo site_url('historia-deportistas.html');?>"><?php echo lang("menu_historia_deportistas"); ?></a></li>
                                        <li><a href="<?php echo site_url('historia-presidentes.html');?>"><?php echo lang("menu_historia_presidentes"); ?></a></li>
                                    </ul>
                                </li>
<!--                                <li><a href="javascript:void(0)" class="<?php echo ($menu == 'documentos')? 'current' : '';?>"><?php echo lang("menu_documentacion"); ?></a>
                                    <ul>
                                        <li><a href="<?php echo site_url('documentacion.html');?>"><?php echo lang("menu_documentacion"); ?></a></li>
                                        <li><a href="<?php echo site_url('jornadas.html');?>"><?php echo lang("menu_jornada"); ?></a></li>
                                        <li><a href="<?php echo site_url('formularios.html');?>"><?php echo lang("menu_formularios"); ?></a></li>
                                    </ul>
                                </li>
								<li><a href="<?php echo site_url('feu-directiva.html'); ?>" class="<?php echo ($menu == 'directiva')? 'current' : '';?>"><?php echo lang("menu_directiva"); ?></a>
                                -->
                                <li class="sf-mega-parent"><a href="javascript:void(0)" class="<?php echo ($menu == 'documentos' || $menu == 'directiva' || $menu == 'veterinarios' || $menu == 'laboratorios' || $menu == 'promotoresradios')? 'current' : '';?>"><?php echo lang("menu_informacion"); ?></a>
                                    <div class="sf-mega">
                                        <div class="sf-mega-table">
                                            <div class="sf-mega-section width-100px">
                                                <h5><?php echo lang("menu_documentacion"); ?></h5>
                                                <ul>
													<li><a href="<?php echo site_url('documentacion.html');?>"><?php echo lang("menu_documentacion"); ?></a></li>
													<li><a href="<?php echo site_url('jornadas.html');?>"><?php echo lang("menu_jornada"); ?></a></li>
													<li><a href="<?php echo site_url('formularios.html');?>"><?php echo lang("menu_formularios"); ?></a></li>
												</ul>
                                            </div>
                                            <div class="sf-mega-section width-100px">
                                                <h5><?php echo lang("menu_directiva"); ?></h5>
                                                <ul>
                                                    <li><a href="<?php echo site_url('feu-directiva.html');?>"><?php echo lang("menu_directiva"); ?></a></li>
                                                </ul>
                                            </div>
                                            <div class="sf-mega-section width-100px">
                                                <h5><?php echo lang("menu_veterinarios"); ?></h5>
                                                <ul>
                                                    <li><a href="<?php echo site_url('veterinarios-jefes.html');?>"><?php echo lang("menu_veterinarios_jefes"); ?></a></li>
                                                    <li><a href="<?php echo site_url('veterinarios.html');?>"><?php echo lang("menu_veterinarios_habilitados"); ?></a></li>
                                                    
                                                </ul>
                                            </div>
                                            <div class="sf-mega-section width-100px">
                                                <h5><?php echo lang("menu_veterinarios_laboratorios"); ?></h5>
                                                <ul>
                                                    <li><a href="<?php echo site_url('laboratorios.html');?>"><?php echo lang("menu_veterinarios_laboratorios"); ?></a></li>
                                                </ul>
                                            </div>
                                            <div class="sf-mega-section width-100px">
                                                <h5><?php echo lang("menu_pruebas"); ?></h5>
                                                <ul>
                                                    <li><a href="<?php echo site_url('pruebas-cortas.html');?>"><?php echo lang("menu_pruebas_cortas"); ?></a></li>
                                                    <li><a href="<?php echo site_url('pruebas-largas.html');?>"><?php echo lang("menu_pruebas_largas"); ?></a></li>
                                                </ul>
                                            </div>
                                            <div class="sf-mega-section width-250px">
                                                <h5><?php echo lang("menu_promotores_radios"); ?></h5>
                                                <ul>
                                                    <li><a href="<?php echo site_url('promotores.html');?>"><?php echo lang("menu_promotores"); ?></a></li>
                                                    <li><a href="<?php echo site_url('radios.html');?>"><?php echo lang("menu_radios"); ?></a></li>
                                                </ul>
                                            </div>
<!--                                            
                                            <div class="sf-mega-section width-150px">
                                                <h5>Footers</h5>
                                                <ul>
                                                    <li><a href="index.html#footer">Footer version 1</a></li>
                                                    <li><a href="index2.html#footer">Footer version 2</a></li>
                                                    <li><a href="index3.html#footer">Footer version 3</a></li>
                                                    <li><a href="index4.html#footer">Footer version 4</a></li>
                                                    <li><a href="index5.html#footer">Footer version 5</a></li>
                                                    <li><a href="index6.html#footer">Footer version 6</a></li>
                                                    <li><a href="index7.html#footer">Footer version 7</a></li>
                                                </ul>
                                            </div>
-->
                                        </div> <!-- end sf-mega-table -->
                                    </div>
                                    <!-- end sf-mega -->
                                </li>
                                <li><a href="<?php echo site_url('instituciones.html'); ?>" class="<?php echo ($menu == 'instituciones')? 'current' : '';?>"><?php echo lang("menu_instituciones"); ?></a>
                                    <!-- 
                                    <li><a href="<?php echo site_url('veterinarios-jefes.html');?>"><?php echo lang("menu_veterinarios_jefes"); ?></a></li>
                                    <li><a href="<?php echo site_url('veterinarios.html');?>"><?php echo lang("menu_veterinarios_habilitados"); ?></a></li>
                                    <li><a href="<?php echo site_url('laboratorios.html');?>"><?php echo lang("menu_veterinarios_laboratorios"); ?></a></li>
                                    -->
                                <li><a href="<?php echo site_url('galerias.html'); ?>" class="<?php echo ($menu == 'galerias')? 'current' : '';?>"><?php echo lang("menu_galerias"); ?></a>
                                <li><a href="<?php echo site_url('noticias.html'); ?>" class="<?php echo ($menu == 'noticias')? 'current' : '';?>"><?php echo lang("menu_noticias"); ?></a>
                                <li><a href="<?php echo site_url('contacto.html'); ?>" class="<?php echo ($menu == 'contacto')? 'current' : '';?>"><?php echo lang("menu_contacto"); ?></a>
                            </ul>
                        </div>
                    </nav>

                </div>
            </div>

        </header>

        <!-- END HEADER -->


        <!-- START CONTENT -->

        <section id="main">
            <?php if(isset($content)): ?>
                <?php echo $this->load->view($content) ?>
            <?php endif; ?>
        </section>

        <!-- END CONTENT -->


        <!-- START FOOTER -->

		<footer id="footer" class="blank"></footer>

		<footer id="footer-bottom">

			<div class="container"> <!-- 1080 pixels Container -->

				<div class="seven columns">

					<!-- Footer Navigation -->
					<ul class="footer-nav clearfix">
						<li><a href="<?php echo site_url(''); ?>">Home</a></li>
						<li><a href="typography.html">Features</a></li>
						<li><a href="about-us.html">Pages</a></li>
						<li><a href="portfolio-3-columns.html">Portfolio</a></li>
						<li><a href="blog.html">Blog</a></li>
						<li><a href="contact.html">Contact</a></li>
					</ul>

				</div>

				<div class="five columns">

					<ul class="links clearfix">
						<li><a href="http://www.rodrigosantellan.com" target="_blank">© 2014 Rodrigo Santellan</a></li>
						
					</ul>

				</div>

			</div> <!-- end 1080 pixels Container -->

		</footer>
        <!-- END FOOTER -->
        
        <!-- Java Script -->
        <script src="<?php echo base_url(); ?>assets/feu/js/respond.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/feu/js/selectnav.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/feu/js/html5media.min.js"></script> <!-- Cross-browser solution for embedding HTML5 video -->
        <script src="<?php echo base_url(); ?>assets/feu/js/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/feu/js/detectmobilebrowser.js"></script>
        <script src="<?php echo base_url(); ?>assets/feu/js/jquery.easing.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/feu/js/jquery.fitvids.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/feu/js/jquery.prettyPhoto.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/feu/js/jquery.flexslider.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/feu/js/jquery.carousel.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/feu/js/jquery.tweet.min.js"></script>
        <?php if($jsGoogleMap): ?>
        <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false"></script> <!-- Google Maps API -->
        <?php endif; ?>
        <script src="<?php echo base_url(); ?>assets/feu/js/custom.js"></script>

      <?php foreach($javascript as $js): ?>
        <script type="text/javascript" src="<?php echo base_url() ."assets/js/".$js; ?>"></script>
      <?php endforeach; ?>
		
      <?php foreach($stylesheet as $sheet): ?>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ."assets/css/".$sheet;?>" />
      <?php endforeach; ?>
    </body>
</html>
