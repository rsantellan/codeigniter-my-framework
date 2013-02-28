<?php echo doctype(); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="shortcut icon" href="<?php echo base_url() . "assets/images/favicon.ico"; ?>" />
    <title>
      <?php echo (isset($title)) ? $title : 'Titulo'; ?>
    </title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . "assets/css/styles.css"; ?>" />
    <!--[if IE 7]>
      <link rel="stylesheet" type="text/css" href="css/ie7.css" />
    <![endif]-->
    <?php if ($jquery_on): ?>
      <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
    <?php endif; ?>

    <?php foreach ($javascript as $js): ?>
      <script type="text/javascript" src="<?php echo base_url() . "assets/js/" . $js; ?>"></script>
    <?php endforeach; ?>

    <?php foreach ($stylesheet as $sheet): ?>
      <link rel="stylesheet" type="text/css" href="<?php echo base_url() . "assets/css/" . $sheet; ?>" />
    <?php endforeach; ?>
  </head>
  <body>

    <div id="wrapper">
      <div class="logo">
        <a href="index.html"><h1>Emprendimiento Inmobiliarios</h1></a>
      </div>
      <div class="img-head">

        <img src="<?php echo base_url() . "assets/images/"; ?>head-tel.jpg" alt="Por Alquileres y Ventas 094 536721 o  094 536559" />
      </div>

    </div>
    <div class="menu">
      <img class="float_left" src="<?php echo base_url() . "assets/images/"; ?>menu-esq-left.jpg" />
      <div class="menu-div">
        <ul class="menu">
          <li>
            <?php if ($menu_id == "home"): ?>
              <img  alt="Pag de Inicio" src="<?php echo base_url() . "assets/images/"; ?>home-index.png">
              <?php else: ?>
                <a class="home_img" href="<?php echo site_url(''); ?>" >
                  <img  alt="Pag de Inicio" src="<?php echo base_url() . "assets/images/"; ?>home.png">
                </a>
              <?php endif; ?>                            
          </li>
          <li>
            <a class="<?php echo ($menu_id == "quienessomos") ? "current" : "";?>" href="<?php echo site_url('quienes-somos.html'); ?>">Quienes Somos</a>
          </li>
          <li>
            <a class="<?php echo ($menu_id == "obras") ? "current" : "";?>" href="<?php echo site_url('obras.html'); ?>">Obras</a>
          </li>

          <li>
            <a class="<?php echo ($menu_id == "alquileres") ? "current" : "";?>" href="<?php echo site_url('alquileres'); ?>">Alquileres</a>
          </li>
          <li>
            
            <a class="<?php echo ($menu_id == "ventas") ? "current" : "";?>" href="<?php echo site_url('ventas'); ?>">Ventas</a>
          </li>
          <li>
            <a  href="contacto.html">Contactenos</a>
          </li>
        </ul>
      </div>
      <img class="float_right" src="<?php echo base_url() . "assets/images/"; ?>menu-esq-right.jpg" />
    </div>
    <div class="contenido">
      <?php if (isset($content)): ?>
        <?php echo $this->load->view($content) ?>
      <?php endif; ?> 
    </div>
    <div class="bottom">
      <div class="float_left">
        <span>
          Gabriel A. Pereira 3126, Montevideo Uruguay - Tels: 27070652, 094 231809
        </span>
      </div>
      <div class="float_right">
        <span> &copy; 2011  C5.com.uy Todos los Derechos Reservados - Diseño By </span>
        <a target="_blank" href="http://www.muskf.com">
          <img src="<?php echo base_url() . "assets/images/"; ?>muskf.gif" title="Diseño web Montevideo">    </a>
      </div>
    </div>
  </body>
</html>
