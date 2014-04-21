<?php echo doctype(); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
    	<head>
        <meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  
		<meta name="LauraNozar" content="lauranozar: http://www.lauranozar.com/">
        
        <meta name="Author" content="Laura Nozar: http://www.lauranozar.com/">
		<meta name="Copyright" content="@lauranozar">
		<meta name="keywords" content="">
		<meta name="description" content="">
		<meta name="robots" content="all | index | follow">
		<meta name="Revisit" content="15 days">
		
        <title><?php echo (isset($title))? $title: 'Titulo';?></title>

        <!-- css -->
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/sumuy/css/styles.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/sumuy/css/slider.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/sumuy/css/parsley.css">
		<!--[if lt IE 9]>
			<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

		<!-- favicon & fonts -->		
		<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/sumuy/images/favicon.ico" />
        
        
        <!--[if lt IE 9]>
			<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
        
        <!-- js -->
		<script src="<?php echo base_url(); ?>assets/sumuy/js/jquery-1.11.0.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/sumuy/js/slides.min.jquery.js"></script>
		<script>
			$(function(){
                if(('#slides').length > 0)
                {
                  $('#slides').slides({
                      preload: true,
                      preloadImage: '<?php echo base_url(); ?>assets/sumuy/images/loading.gif',
                      play: 5000,
                      pause: 2000,
                      hoverPause: true,
                      animationStart: function(current){
                          $('.caption').animate({
                              bottom:-35
                          },100);
                          if (window.console && console.log) {
                              // example return of current slide number
                              //console.log('animationStart on slide: ', current);
                          };
                      },
                      animationComplete: function(current){
                          $('.caption').animate({
                              bottom:0
                          },200);
                          if (window.console && console.log) {
                              // example return of current slide number
                              //console.log('animationComplete on slide: ', current);
                          };
                      },
                      slidesLoaded: function() {
                          $('.caption').animate({
                              bottom:0
                          },200);
                      }
                  });
                }
				
			});
		</script>
        
	</head>
  <body>
    <div class="wrapper">
      <header>
        <a href="<?php echo site_url(''); ?>"><img src="<?php echo base_url(); ?>assets/sumuy/images/logo.jpg"></a>
        <nav>
          <ul>
            <li><a href="<?php echo site_url('sum.html'); ?>" class="<?php echo ($menu == 'sum')? 'current' : '';?>" ><?php echo lang('menu_sum');?></a></li>
            <li><a href="<?php echo site_url('sociedad.html');?>" class="<?php echo ($menu == 'sociedad')? 'current' : '';?>"><?php echo lang('menu_sociedad');?></a></li>
            <li><a href="<?php echo site_url('socios.html');?>" class="<?php echo ($menu == 'socios')? 'current' : '';?>" ><?php echo lang('menu_socios');?></a></li>
            <li><a href="<?php echo site_url('novedades.html');?>" class="<?php echo ($menu == 'novedades')? 'current' : '';?>" ><?php echo lang('menu_novedades');?></a></li>
            <li><a href="<?php echo site_url('tesis.html');?>" class="<?php echo ($menu == 'tesis')? 'current' : '';?>" ><?php echo lang('menu_tesis');?></a></li>
            <li><a href="<?php echo site_url('llamados.html');?>" class="<?php echo ($menu == 'llamados')? 'current' : '';?>" ><?php echo lang('menu_llamados');?></a></li>
            <li><a href="<?php echo site_url('inscripcion.html');?>" class="<?php echo ($menu == 'inscripcion')? 'current' : '';?>" ><?php echo lang('menu_inscripcion');?></a></li>
            <li><a href="<?php echo site_url('enlaces.html');?>" class="<?php echo ($menu == 'enlaces')? 'current' : '';?>" ><?php echo lang('menu_enlaces');?></a></li>
            <li style="margin-right:0;"><a href="<?php echo site_url('contacto.html');?>" class="<?php echo ($menu == 'contacto')? 'current' : '';?>" ><?php echo lang('menu_contacto');?></a></li>
          </ul>                                   
        </nav>
      </header>
      <?php if(isset($content)): ?>
        <?php echo $this->load->view($content) ?>
      <?php endif; ?>
    </div>
    
    <footer>
      <div class="img_footer">
        <img src="<?php echo base_url(); ?>assets/sumuy/images/img_footer.png">
      </div>  
      <div class="datos_footer">
        <p><?php echo lang('menu_footer');?></p>
      </div>  
    </footer>
  </body>
</html>
