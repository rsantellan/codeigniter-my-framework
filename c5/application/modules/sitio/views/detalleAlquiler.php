<div class="banner_home">
  <img  src="<?php echo base_url() . "assets/images/"; ?>img_banner_top.jpg" alt="Alquileres, Venta y Contruccion de Propiedades" />
</div>
<div class="clear"></div>
<div class="obras">
  <h3>Alquiler</h3>
  <div class="obras-div">
    <div class="fotos float_left">
      <?php 
            $width = 800;
            $height = 600;
            $width_listado = 323;
            $height_listado = 227;
            $first = true;
            ?>
            <?php foreach($images as $image): ?>
                <?php if($first): ?>
                <a class="fancy_image_list" href="<?php echo base_url().thumbnail_image($image->path , $width, $height, 1); ?>" title="<?php echo $propiedad->titulo;?>" rel="detalles">
                  <img src="<?php echo base_url().thumbnail_image($image->path , $width_listado, $height_listado, 3); ?>" />
                </a>
                <div class="clear"></div>
                <?php 
                $first = false;
                else: ?>
                <?php
                $width_listado = 53;
                $height_listado = 36;
                ?>
                <a class="fancy_image_list" href="<?php echo base_url().thumbnail_image($image->path , $width, $height, 1); ?>" title="<?php echo $propiedad->titulo;?>" rel="detalles">
                  <img src="<?php echo base_url().thumbnail_image($image->path , $width_listado, $height_listado, 3); ?>" />
                </a>
                <?php endif; ?>
                
            <?php endforeach;?>
      <div class="contacto-propiedades">
        <span class="rojo">Contactar :</span><span>Tels: 27070652, 094 231809</span><div class="clear"></div>
        <span class="mail"> Email: propiedades@c5.com.uy </span>
      </div>

    </div>
    <div class="propiedades-detalle float_left">
      <?php //var_dump($propiedad);?>
      <h3><?php echo $propiedad->titulo;?></h3>
      <span class="rojo">Detalle:</span><span><?php echo $propiedad->detalle;?></span>
      <div class="clear"></div>
      <span class="rojo">Caracteristicas:</span>
      <ul class="ul-detalle">
        <li class="">Ubicacion: <?php echo $propiedad->ubicacion;?></li>
        <li class="gris">Metros: <?php echo $propiedad->metros;?> mts</li>
        <li>Dormitorios: <?php echo $propiedad->dormitorios;?></li>
        <li class="gris">Baños: <?php echo $propiedad->banos;?></li>
        <li>Calefacción: <?php echo $propiedad->calefaccion;?></li>
        <li class="gris">Garage: <?php echo $propiedad->garage;?> </li>
        <?php
		$precio = "Consultar";
		if ($propiedad->precio_alquiler > 0) {
		  $precio = ($propiedad->moneda_alquiler == 0) ? "U\$S" : "\$";
		  $precio .= number_format($propiedad->precio_alquiler, 0, ",", ".");
		}
		?>
        <li class="rojo">Precio: <?php echo $precio; ?></li>
      </ul>
      <a class="boton-back" href="<?php echo site_url('alquileres'); ?>">< Volver a las propiedades</a>
    </div>
  </div> 

</div>