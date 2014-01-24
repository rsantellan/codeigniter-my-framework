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
        <?php echo (isset($title))? $title: 'Federación ecuestre del uruguay';?>
    </title>
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- CSS -->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/feu/css/base.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/feu/css/grid.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/feu/css/layout.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/feu/css/main_color1/olive.css" id="main-color1">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/feu/css/main_color2/red.css" id="main-color2">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/feu/css/main_bg/green.css" id="main-bg-scheme">
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto+Condensed:300|Open+Sans:400,700,300,600,400italic,600italic|Ubuntu:400italic">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/feu/css/font-awesome.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/feu/css/prettyPhoto.default.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/feu/css/carousel.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/feu/css/switcher.css"> <!-- Style Switcher -->
	
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
                    <a href="index.html"><img src="<?php echo base_url();?>assets/feu/images/logo.png" alt="logo"></a>
                </div>

                <!-- Navigation -->
                <nav id="navigation">
                    <div id="primary-nav">
                        <ul id="main-menu">
                            <li><a href="index.html" class="current">Home</a>
                        </ul>
                    </div>
                </nav>

            </div>
        </div>

    </header>

    <!-- END HEADER -->


    <!-- START CONTENT -->

    <section id="main">
        {MAIN_CONTENT}
    </section>

    <!-- END CONTENT -->


    <!-- START FOOTER -->

    <footer id="footer">
        {FOOTER_CONTENT}
    </footer>

    <footer id="footer-bottom">
        {COPYRIGHT AND BOTTOM_LINKS}
    </footer>

    <!-- END FOOTER -->
</body>