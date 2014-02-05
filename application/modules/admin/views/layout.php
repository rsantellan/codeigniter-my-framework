<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<title>Administrador</title>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() . "assets/admin/css/960.css";?>" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() . "assets/admin/css/template.css";?>" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() . "assets/admin/css/colour.css";?>" />

      
        <script type="text/javascript" src="<?php echo base_url() . "assets/admin/js/jquery-1.7.1.min.js";?>"></script>
        <script type="text/javascript" src="<?php echo base_url() . "assets/admin/js/adminManager.js";?>"></script>
        
	  <?php if($jquery_ui_on): ?>
        <script type="text/javascript" src="<?php echo base_url() . "assets/admin/js/jquery-ui-1.8.16.custom.min.js";?>"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() . "assets/admin/css/eggplant/jquery-ui-1.8.18.custom.css";?>" />
      <?php endif; ?>
      <?php if($fancybox_on): ?>
        <script type="text/javascript" src="<?php echo base_url() . "assets/admin/js/fancybox/jquery.fancybox-1.3.4.pack.js";?>"></script>
        <script type="text/javascript" src="<?php echo base_url() . "assets/admin/js/fancybox/jquery.mousewheel-3.0.4.pack.js";?>"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() . "assets/admin/js/fancybox/jquery.fancybox-1.3.4.css";?>" />
      <?php endif; ?>
      
      <?php if($colorbox_on): ?>
        <script type="text/javascript" src="<?php echo base_url() . "assets/admin/js/jquery.colorbox-min.js";?>"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() . "assets/admin/css/colorbox.css";?>" />
      <?php endif; ?>  
      <?php foreach($javascript as $js): ?>
        <script type="text/javascript" src="<?php echo base_url() ."assets/js/".$js; ?>"></script>
      <?php endforeach; ?>
		
      <?php foreach($stylesheet as $sheet): ?>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ."assets/css/".$sheet;?>" />
      <?php endforeach; ?>
        
      <?php if($ckeditor_on): ?>
        <script type="text/javascript" src="<?php echo base_url() . "assets/ckeditor/ckeditor.js";?>"></script>
        <script type="text/javascript" src="<?php echo base_url() . "assets/ckeditor/adapters/jquery.js";?>"></script>
      <?php endif; ?>
      
      <?php if($tinymce_on): ?>
        <script type="text/javascript" src="<?php echo base_url();?>assets/admin/js/tiny_mce/tiny_mce_src.js"></script>
      <?php endif; ?>
        
      <!-- Menu drop down-->
	  <script type="text/javascript" src="<?php echo base_url() ."assets/admin/superfish/js/hoverIntent.js"; ?>"></script>
      <script type="text/javascript" src="<?php echo base_url() ."assets/admin/superfish/js/superfish.js"; ?>"></script>
      <link rel="stylesheet" type="text/css" href="<?php echo base_url() ."assets/admin/superfish/css/superfish.css";?>" />    

	</head>
	<body>
      <div class="header_div">
        <label>Administrador</label>
<!--        <h1 id="head">Administrador</h1>-->
        <img src="<?php echo base_url();?>assets/images/logo.png" height="90"/>
      </div>
	  <div class="menu_container">
        <ul id="superfish-menu" class="sf-menu">
          <li class="<?php echo ($menu_id == 'dashboard')? "current": "";?>"><a href="<?php echo site_url('admin/index');?>">Dashboard</a></li>
          <li class="<?php echo ($menu_id == 'users')? "current": "";?>"><a href="<?php echo site_url('authadmin');?>">Usuarios</a></li>
          <li class="<?php echo ($menu_id == 'category')? "current": "";?>"><a href="<?php echo site_url('categories/index/'.$lang);?>">Categorias</a></li>
          <li class="<?php echo ($menu_id == 'news')? "current": "";?>"><a href="<?php echo site_url('news/index/'.$lang);?>">Noticias</a></li>
          

          <li class="<?php echo ($menu_id == 'campeonesadmin' || $menu_id == 'deportistaadmin' || $menu_id == 'presidenteadmin' )? "current": "";?>">
            <a href="javascript:void(0)">Historia</a>
            <ul>
              <li class="<?php echo ($menu_id == 'campeonesadmin' )? "current": "";?>"><a href="<?php echo site_url('historicosadmin/campeonesadmin/index');?>">Campeones</a></li>
              <li class="<?php echo ($menu_id == 'deportistaadmin' )? "current": "";?>"><a href="<?php echo site_url('historicosadmin/deportistaadmin/index');?>">Deportista del año</a></li>
              <li class="<?php echo ($menu_id == 'presidenteadmin' )? "current": "";?>"><a href="<?php echo site_url('historicosadmin/presidenteadmin/index');?>">Presidentes</a></li>
            </ul>
          </li>
          <li class="<?php echo ($menu_id == 'documents' || $menu_id == 'veterinariosadmin' || $menu_id == 'jornadas' )? "current": "";?>">
            <a href="javascript:void(0)">Documentos</a>
            <ul>
              <li class="<?php echo ($menu_id == 'documents' )? "current": "";?>"><a href="<?php echo site_url('documents/index');?>">Documentos</a></li>
              <li class="<?php echo ($menu_id == 'documents' )? "current": "";?>"><a href="<?php echo site_url('documents/formularios');?>">Formularios</a></li>
              <li class="<?php echo ($menu_id == 'veterinariosadmin' )? "current": "";?>"><a href="<?php echo site_url('veterinariosadmin/index');?>">Veterinarios</a></li>
              <li class="<?php echo ($menu_id == 'laboratorios' )? "current": "";?>"><a href="<?php echo site_url('laboratorios/index');?>">Laboratorios</a></li>
              <li class="<?php echo ($menu_id == 'departamentos' )? "current": "";?>"><a href="<?php echo site_url('departamentos/index');?>">Departamentos</a></li>
              <li class="<?php echo ($menu_id == 'clubes' )? "current": "";?>"><a href="<?php echo site_url('clubes/index');?>">Clubes</a></li>
              <li class="<?php echo ($menu_id == 'jornadas' )? "current": "";?>"><a href="<?php echo site_url('jornadas/index');?>">Jornadas</a></li>
              <li class="<?php echo ($menu_id == 'jornadatemas' )? "current": "";?>"><a href="<?php echo site_url('jornadatemas/index');?>">Temas de Jornadas</a></li>
              <li class="<?php echo ($menu_id == 'noticias' )? "current": "";?>"><a href="<?php echo site_url('noticias/index');?>">Noticias</a></li>
              <li class="<?php echo ($menu_id == 'prueba' )? "current": "";?>"><a href="<?php echo site_url('pruebas/index');?>">Pruebas</a></li>
            </ul>
          </li>
          <li class="<?php echo ($menu_id == 'contacto')? "current": "";?>">
            <a href="javascript:void(0)">Configuraciones</a>
            <ul>
              <li class="<?php echo ($menu_id == 'contacto')? "current": "";?>"><a href="<?php echo site_url('contacto/contactoadmin');?>">Contacto</a></li>
              <li class="<?php echo ($menu_id == 'fsadfx')? "current": "";?>"><a href="<?php echo site_url('language/index');?>">Textos</a></li>
<!--              <li><a href="<?php echo site_url('admin/backup');?>" onclick="return confirm('Esta seguro de querer generar el respaldo?')">Generar Respaldo</a></li>-->
            </ul>
          </li>
          <li>
            <a href="<?php echo site_url('auth/logout');?>">Salir</a>
          </li>
        </ul>
      </div>
      <div class="clear"></div>      
			<div id="content" class="container_16 clearfix content">
<?php //echo language_menu(); ?>
<!-- Filtro -->     
<!-- Filtro -->
<!-- Contenido -->
        <!-- pongo un if para el grid 16 por los form -->
        <?php 
        $aux_use_grid_16 = true;
        if(isset($use_grid_16) && $use_grid_16 == false)
        {
          $aux_use_grid_16 = false;
        }
        ?>
        <?php if($aux_use_grid_16): ?>
          <div class="grid_16">
        <?php endif;?>
            <?php echo $this->load->view($content); ?>
        <?php if($aux_use_grid_16): ?>
          </div>
        <?php endif;?>
				
<!-- Contenido -->
			</div>
		
		<div id="foot">
<!--					<a href="#">Contact Me</a>-->
				<div class="espacio"></div>
		</div>
	</body>
</html>
