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
<!--      <script type="text/javascript" src="<?php //echo base_url() . "assets/admin/js/dropdown_menu.js";?>"></script>-->
	</head>
	<body>
      <div class="header_div">
        <label>Administrador</label>
<!--        <h1 id="head">Administrador</h1>-->
        <img src="<?php echo base_url();?>assets/images/logo.png" width="70" height="70"/>
      </div>
      
      <ul id="navigation">
      <?php if($menu_id == 'dashboard'): ?>
        <li><span class="active">Dashboard</span></li>
      <?php else: ?>
        <li><a href="<?php echo site_url('admin/index');?>">Dashboard</a></li>
      <?php endif; ?>
      
        <li><a href="<?php echo site_url('language/index');?>">Textos</a></li>
      
      <?php if($menu_id == 'users'): ?>
        <li><span class="active">Usuarios</span></li>
      <?php else: ?>
        <li><a href="<?php echo site_url('authadmin/index');?>">Usuarios</a></li>
      <?php endif; ?>
      
      <?php if($menu_id == 'contacto'): ?>
        <li><span class="active">Contacto</span></li>
      <?php else: ?>
        <li><a href="<?php echo site_url('contacto/contactoadmin');?>">Contacto</a></li>
      <?php endif; ?>        
        <li style="float: right;"><a href="<?php echo site_url('auth/logout');?>">Salir</a></li>	
		</ul>
		
			<div id="content" class="container_16 clearfix">
<?php echo language_menu(); ?>
<!-- Filtro -->     
<!-- 
				<div class="grid_4">
					<p>
						<label>Username<small>Alpha-numeric values</small></label>
						<input type="text" />
					</p>
				</div>
        <div class="grid_5">
					<p>
						<label>Email Address</label>
						<input type="text" />
					</p>
				</div>
				<div class="grid_5">
					<p>
						<label>Department</label>
						<select>
							<option>Development</option>
							<option>Marketing</option>
							<option>Design</option>
							<option>IT</option>
						</select>
					</p>
				</div>
				<div class="grid_2">
					<p>
						<label>&nbsp;</label>
						<input type="submit" value="Search" />
					</p>
				</div>
-->
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
