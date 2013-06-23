<div class="banner_home">
  <img  src="<?php echo base_url() . "assets/images/"; ?>img_banner_top.jpg" alt="Alquileres, Venta y Contruccion de Propiedades" />
</div>
<div class="clear"></div>
<div class="home_text">
  <div class="formulario float_left" >
    <p class="<?php echo (form_error('nombre') != "" || form_error('email') != "" || form_error('comentario') != "" ) ? "error" : ""; ?>">*Completar los campos obligatorios para enviar el formulario.</p>
  <?php
    $attributes = array('method' => 'POST', 'class' => 'contact');
    echo form_open('contacto', $attributes);
    ?>
    <label class="<?php echo (form_error('nombre') != "") ? "error" : ""; ?>">Nombre</label>
    <input type="text" name="nombre" class="<?php echo (form_error('nombre') != "") ? "error" : ""; ?>" value="<?php echo set_value('nombre'); ?>" />
    <label class="<?php echo (form_error('email') != "") ? "error" : ""; ?>">E-mail</label>
    <input type="text" class="<?php echo (form_error('email') != "") ? "error" : ""; ?>" name="email" maxlength="255" value="<?php echo set_value('email'); ?>" />
    <?php
    $t_class = "";
    if (form_error('comentario') != "") {
      $t_class = "textarea_error";
    }
    ?>
    <label class="<?php echo (form_error('comentario') != "") ? "error" : ""; ?>" for="comentario">Mensaje</label>
    <?php echo form_textarea(array('class' => $t_class, 'id' => 'comentario', 'name' => 'comentario', 'rows' => '8', 'cols' => '80', 'value' => set_value('comentario'))) ?>
    
      
      <?php echo form_submit('submit', 'Enviar', 'class="formulario"'); ?>
    <?php echo form_close(); ?>
  </div>
  <div class="contacto_datos float_left">
    <span>Ventas o Alquileres</span>
    <p>+598 2707 0652</p>
    <p>+598 (0) 94 231809</p>
    <p>ventas@c5.com.uy</p>

    <span>Direccion:</span>
    <p>Gabriel A. Pereira 3126</p>
    <p>Montevideo</p>
    <p>11300, Uruguay</p>

  </div>
</div>
<div class="float_left banners-home">
  <div class="box-shadow">
    <a href="<?php echo site_url('proyectos.html'); ?>" ><img src="<?php echo base_url() . "assets/images/"; ?>banner-proyectos.jpg" /></a>
  </div>
  <div class="clear"></div>
  <div class="box-shadow">
    <a href="alquileres.html" ><img src="<?php echo base_url() . "assets/images/"; ?>banner-alquileres.jpg" /></a>
  </div>
  <div class="clear"></div>
  <div class="box-shadow">
    <a href="ventas.html" ><img src="<?php echo base_url() . "assets/images/"; ?>banner-ventas.jpg" /></a>
  </div>
</div>
