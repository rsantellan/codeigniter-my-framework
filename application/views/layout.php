<?php echo doctype(); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
      <link rel="shortcut icon" href="<?php echo base_url() . "assets/images/favicon.ico";?>" />
      <title>
        <?php echo (isset($title))? $title: 'Titulo';?>
      </title>
      <link rel="stylesheet" type="text/css" href="<?php echo base_url() . "assets/css/styles.css";?>" />
      <!--[if IE 7]>
        <link rel="stylesheet" type="text/css" href="css/ie7.css" />
      <![endif]-->
      <?php if($jquery_on): ?>
        <script type="text/javascript" src="<?php echo base_url() . "assets/js/jquery-1.7.1.min.js";?>"></script>
      <?php endif; ?>
      <?php foreach($javascript as $js): ?>
        <script type="text/javascript" src="<?php echo base_url() ."assets/js/".$js; ?>"></script>
      <?php endforeach; ?>
		
      <?php foreach($stylesheet as $sheet): ?>
	  <link rel="stylesheet" type="text/css" href="<?php echo base_url() . "assets/css/".$sheet;?>" />
      <?php endforeach; ?>
      <script type="text/javascript" src="<?php echo base_url() . "assets/js/dropdown.js";?>"></script>
    </head>
  <body>
    <div id="wrapper">
      <div id="header">
        	<?php echo lang('header');?>
        </div><!--HEADER-->
        <div id="menu">
            	<dl class="dropdown">
                	<dt><a href="<?php echo site_url(''); ?>" class="<?php echo ($menu_id == "home") ? "current" : "";?>"><?php echo lang('menu_inicio');?></a></dt>
                </dl>
            	<dl class="dropdown">
                	<dt><a href="<?php echo site_url('historia.html'); ?>"  class="<?php echo ($menu_id == "historia") ? "current" : "";?>"><?php echo lang('menu_historia');?></a></dt>
                </dl>
                
                <dl class="dropdown">
                     <dt id="one-ddheader" onmouseover="ddMenu('one',1)" onmouseout="ddMenu('one',-1)" class="servicios <?php echo ($menu_id == "servicios") ? "current" : "";?>"><?php echo lang('menu_Servicios');?></dt>
                     <dd id="one-ddcontent" onmouseover="cancelHide('one')" onmouseout="ddMenu('one',-1)">
                        <?php echo modules::run('sitio/serviciosOptions', array('servicio_id' => $servicio_id))?>
                     </dd>
                </dl>
            	<dl class="dropdown">
                	<dt><a href="<?php echo site_url('clientes.html'); ?>" class="<?php echo ($menu_id == "clientes") ? "current" : "";?>"><?php echo lang('menu_clientes');?></a></dt>
                </dl>
            	<dl class="dropdown">
                	<dt><a href="<?php echo site_url('certificacion.html'); ?>" class="<?php echo ($menu_id == "certificacion") ? "current" : "";?>"><?php echo lang('menu_certificacion');?></a></dt>
                </dl>
            	<dl class="dropdown">
                	<dt><a href="<?php echo site_url('contacto.html'); ?>"><?php echo lang('menu_contacto');?></a></dt>
                </dl>
        </div><!--MENU-->
        <div class="clear"></div>
        <?php if(isset($content)): ?>
          <?php echo $this->load->view($content) ?>
        <?php endif; ?>        
          <div class="content_ext">
            <div class="content">
                <h1><?php echo lang('destacados_titulo');?></h1>
            </div><!--CONTENT-->
            <hr />
            <div class="content">
              <?php echo modules::run('sitio/destacados')?>
            </div><!--CONTENT-->
          </div>
          <div class="clear"></div>
        <div id="footer">
            <?php echo lang('footer_informacion');?>
        </div><!--FOOTER-->
        <div id="firm">
        	Diseño | <a href="http://www.loopitadesign.com" target="_blank">LoopitaDesgin</a>
        </div>
    </div>
  </body>
</html>
