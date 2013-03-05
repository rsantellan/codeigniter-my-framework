<div class="banner_home">
  <img  src="<?php echo base_url() . "assets/images/"; ?>img_banner_top.jpg" alt="Alquileres, Venta y Contruccion de Propiedades" />
</div>
<div class="clear"></div>
<div class="obras">
  <h3> Alquileres en Montevideo y Canelones</h3>
  <?php //var_dump($apartamentos_list); ?>
  <?php foreach($apartamentos_list as $apartamento): ?>
    <?php //var_dump($apartamento); ?>
     <div class="alquileres-div float_left">
        <div class="float_left">
          <img src="<?php echo base_url().thumbnail_image($apartamento->avatar->getPath() , 144, 101, 3); ?>"/>
        </div>
        <div class="alquileres-info float_left">
          <h3><?php echo $apartamento->titulo ?></h3>
          <span class="rojo">Detalle: </span><span><?php echo character_limiter($apartamento->detalle, 70) ?></span>
          <div class="clear"></div>
          <span class="rojo">Valor:  <?php echo ($apartamento->moneda_venta == 0) ? "U\$S" : "\$" ; ?> <?php echo number_format($apartamento->precio_venta, 0, ",", "."); ?></span>
          <div class="clear"></div>
          <a class="boton-detalle" href="alquileres/alquiler1.html">Detalles</a>
        </div>
      </div>
   <?php endforeach; ?>
  <div class="clear"></div>

</div>
