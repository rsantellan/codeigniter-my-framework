<div class="banner_home">
  <img  src="<?php echo base_url() . "assets/images/"; ?>img_banner_top.jpg" alt="Alquileres, Venta y Contruccion de Propiedades" />
</div>
<div class="clear"></div>
<div  class="filtro-div">
  <label>
	Operacion
  </label>
  <select id="search_sort_by">
	<option value="-1" selected="selected">   Venta  </option>
  </select>
  <label>
	Tipo de Inmueble
  </label>
  <select id="search_sort_by">
	<option value="-1" selected="selected"></option>
	<option value="apartamento">Apartamento</option>
	<option value="casa">Casa</option>
	<option value="apartamento.amue">Apartamento Amueblado</option>
	<option value="casa-amue">Casa Amueblada</option>
  </select>
  <label>
	Zona
  </label>
  <select id="search_sort_by">
	<option value="-1" selected="selected"></option>
	<option value="barrio1">Pocitos</option>
	<option value="barrio2">Buceo</option>
	<option value="barrio3">Centro</option>
	<option value="barrio4">Punta Carretas</option>
  </select> </br>
  <label>
	Ordenar Precio
  </label>
  <select id="search_sort_by">
	<option value="-1" selected="selected"></option>
	<option value="barrio1">de mayor a menor</option>
	<option value="barrio2">de menor a mayor</option>
  </select>
  <label>
	Dormitorios
  </label>
  <select id="search_sort_by">
	<option value="-1" selected="selected"></option>
	<option value="barrio1">1</option>
	<option value="barrio2">2</option>
	<option value="barrio2">3</option>
	<option value="barrio2">4</option>
	<option value="barrio2">5</option>
  </select>
  <label>
	Baños
  </label>
  <select id="search_sort_by">
	<option value="-1" selected="selected"></option>
	<option value="barrio1">1</option>
	<option value="barrio2">2</option>
	<option value="barrio2">3</option>
  </select>
  <label>
	Garage
  </label>
  <select id="search_sort_by">
	<option value="-1" selected="selected"></option>
	<option value="barrio1">0</option>
	<option value="barrio2">1</option>
	<option value="barrio2">2</option>
	<option value="barrio2">Opcional</option>
  </select>
</div>
<div class="clear"></div>
<div class="obras">
  <h3> Ventas en Montevideo y Canelones</h3>
  <?php //var_dump($apartamentos_list); ?>
  <?php foreach($apartamentos_list as $apartamento): ?>
    <?php //var_dump($apartamento); ?>
     <div class="alquileres-div float_left">
        <div class="float_left">
		<?php if (!is_null($apartamento->avatar)): ?>
		  <img src="<?php echo base_url() . thumbnail_image($apartamento->avatar->getPath(), 144, 101, 3); ?>"/>
		<?php else: ?>

		<?php endif; ?>
		</div>
        <div class="alquileres-info float_left">
          <h3><?php echo $apartamento->titulo ?></h3>
          <span class="rojo">Detalle: </span><span><?php echo character_limiter($apartamento->detalle, 70) ?></span>
          <div class="clear"></div>
		  	<?php
			$precio = "Consultar";
			if ($apartamento->precio_venta > 0) {
			  $precio = ($apartamento->moneda_venta == 0) ? "U\$S" : "\$";
			  $precio .= number_format($apartamento->precio_venta, 0, ",", ".");
			}
			?>
		  <span class="rojo">Valor:  <?php echo $precio; ?></span>
          <div class="clear"></div>
          <?php $url_help = $apartamento->id."/".url_title($apartamento->titulo, '-', TRUE).".html";?>
          <a class="boton-detalle" href="<?php echo site_url('venta/'.$url_help); ?>">Detalles</a>
        </div>
      </div>
   <?php endforeach; ?>
  <div class="clear"></div>

</div>
