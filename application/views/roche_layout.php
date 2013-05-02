<?php echo doctype(); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
      <title>
        <?php echo (isset($title))? $title: 'Titulo';?>
      </title>
      
      <link rel="shortcut icon" href="<?php echo base_url();?>assets/images/roche/favicon.ico" />
      <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/roche/styles.css" media="screen"/>
      <!--[if IE 6]>
      <script type="text/javascript" src="js/unitpngfix.js"></script>
      <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/roche/styles_ie6.css" media="screen"/>
      <![endif]-->
      <!--[if IE 7]><link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/roche/styles_ie7.css" media="screen"/><![endif]-->
      <!--[if IE 8]><link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/roche/styles_ie8.css" media="screen"/><![endif]-->      
      
      <?php if($jquery_on): ?>
        <script type="text/javascript" src="<?php echo base_url() . "assets/js/roche/js/jquery-1.9.1.js";?>"></script>
      <?php endif; ?>
      <?php if($jquery_ui_on): ?>
        <script type="text/javascript" src="<?php echo base_url() . "assets/js/roche/js/jquery-ui-1.10.2.custom.min.js";?>"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() . "assets/css/roche/jquery-ui-1.10.2-overcast/jquery-ui-1.10.2.custom.min.css";?>" />
      <?php endif; ?>  
      <?php foreach($javascript as $js): ?>
        <script type="text/javascript" src="<?php echo base_url() ."assets/js/".$js; ?>"></script>
      <?php endforeach; ?>
		
      <?php foreach($stylesheet as $sheet): ?>
	  <link rel="stylesheet" type="text/css" href="<?php echo base_url() . "assets/css/".$sheet;?>" />
      <?php endforeach; ?>
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
              <a href="<?php echo site_url(''); ?>">Cerrar sesi&oacute;n</a>
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
