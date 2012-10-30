<div class="content_ext">
    <div class="content">
        <h1>Servicios</h1>
        <div class="subtitle">
          <?php $counter = 0; ?>
          <?php foreach($category_list as $servicio): ?>
          <?php $url_help = $servicio->id."/".url_title($servicio->name, '-', TRUE);?>
            <a class="<?php echo ($categoria->id == $servicio->id) ? "current" : "";?>" href="<?php echo site_url('servicios/'.$url_help); ?>">
              <?php echo ($servicio->name); ?>
            </a>
            <?php if($counter <= count($servicio)): ?>
              |
            <?php endif; ?>
            <?php $counter ++; ?>
          <?php endforeach; ?>
         <!--
          <a href="#" class="current">Tratamiento de superficies y aplicaci&oacute;n de pinturas</a> | 
          <a href="edilicia.html">Construcci&oacute;n y recuperaci&oacute;n edilicia</a> | 
          <a href="revestimientos.html">Revestimientos especiales</a>
         -->
        </div>
    </div><!--CONTENT-->
    <hr />
    <div class="content">
        <h2><?php echo html_purify(html_entity_decode($categoria->name));?></h2>
        <p><?php echo html_purify(html_entity_decode($categoria->description));?></p>
        <div class="bloque">
            <a href="servicio_detalle.html"><img src="/assets/images/servicio1.jpg" class="img_servicios" /></a>
            <h3><a href="servicio_detalle.html">Esfera Planta La Teja</a></h3>
        </div><!--BLOQUE-->
        <div class="bloque bloque_center">
            <a href="#"><img src="/assets/images/servicio2.jpg" class="img_servicios" /></a>
            <h3><a href="#">Boyas Armada Nacional</a></h3>
        </div><!--BLOQUE-->
        <div class="bloque">
            <a href="#"><img src="/assets/images/servicio3.jpg" class="img_servicios" /></a>
            <h3><a href="#">Buque Sirius</a></h3>
        </div><!--BLOQUE-->
        <div class="bloque">
            <a href="#"><img src="/assets/images/servicio4.jpg" class="img_servicios" /></a>
            <h3><a href="#">Faro Jos&eacute; Ignacio</a></h3>
        </div><!--BLOQUE-->
        <div class="bloque bloque_center">
            <a href="#"><img src="/assets/images/servicio5.jpg" class="img_servicios" /></a>
            <h3><a href="#">Gr&uacute;a ANP</a></h3>
        </div><!--BLOQUE-->
        <div class="bloque">
            <img src="/assets/images/servicio6.jpg" class="img_servicios" />
            <h3><a href="#">Puente de las Am&eacute;ricas</a></h3>
        </div><!--BLOQUE-->
   </div><!--CONTENT-->
</div><!--CONTENT-EXT-->