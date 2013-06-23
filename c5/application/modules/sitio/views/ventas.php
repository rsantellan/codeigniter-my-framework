<div class="banner_home">
  <img  src="<?php echo base_url() . "assets/images/"; ?>img_banner_top.jpg" alt="Alquileres, Venta y Contruccion de Propiedades" />
</div>
<div class="clear"></div>
<div  class="filtro-div">
  <form action="<?php echo site_url('vbusqueda'); ?>" method="GET">
    <label>
      Operacion
    </label>
    <select id="search_sort_by" name="operacion">
      <option value="0" >Venta</option>
    </select>
    <!--
    <label>
      Tipo de Inmueble
    </label>
    <select id="search_sort_by"  name="type">
      <option value="0" selected="selected"></option>
      <option value="apartamento">Apartamento</option>
      <option value="casa">Casa</option>
      <option value="apartamento.amue">Apartamento Amueblado</option>
      <option value="casa-amue">Casa Amueblada</option>
    </select>
    -->
    <label>
      Zona
    </label>
      <select id="search_sort_by" name="zone">
      <option value="0" <?php echo !isset($searchZone)? 'selected="selected"' : '';?>></option>
      <?php foreach($zonas as $zona): ?>
        <option value="<?php echo $zona->ubicacion; ?>" <?php echo (isset($searchZone) && $searchZone == $zona->ubicacion)? 'selected="selected"' : '';?>><?php echo $zona->ubicacion; ?></option>
      <?php endforeach; ?>
    </select> </br>
    <label>
      Ordenar Precio
    </label>
    <select id="search_sort_by" name="price">
      <option value="1" <?php echo (!isset($searchPrice) || (isset($searchPrice) && $searchPrice == '1'))? 'selected="selected"' : '';?>>de mayor a menor</option>
      <option value="2" <?php echo (isset($searchPrice) && $searchPrice == '2')? 'selected="selected"' : '';?>>de menor a mayor</option>
    </select>
    <label>
      Dormitorios
    </label>
    <select id="search_sort_by" name="bedroom">
      <option value="0" <?php echo !isset($searchBedroom)? 'selected="selected"' : '';?>></option>
      <?php foreach($dormitorios as $dormitorio): ?>
      <option value="<?php echo $dormitorio->dormitorios;?>" <?php echo (isset($searchBedroom) && $searchBedroom == $dormitorio->dormitorios)? 'selected="selected"' : '';?>><?php echo $dormitorio->dormitorios;?></option>
      <?php endforeach;?>
    </select>
    <label>
      Baños
    </label>
    <select id="search_sort_by" name="bathroom">
      <option value="-1" <?php echo !isset($searchBathroom)? 'selected="selected"' : '';?>></option>
      <?php foreach($banos as $bano): ?>
      <option value="<?php echo $bano->banos;?>" <?php echo (isset($searchBathroom) && $searchBathroom == $bano->banos)? 'selected="selected"' : '';?>><?php echo $bano->banos;?></option>
      <?php endforeach;?>
    </select>
    <label>
      Garage
    </label>
    <select id="search_sort_by" name="garage">
      <option value="0" <?php echo !isset($searchGarage)? 'selected="selected"' : '';?>></option>
      <?php foreach($garage as $gar): ?>
        <option value="<?php echo $gar->garage;?>" <?php echo (isset($searchGarage) && $searchGarage == $gar->garage)? 'selected="selected"' : '';?>><?php echo $gar->garage;?></option>
      <?php endforeach; ?>
    </select>
    <div class="clear"></div>
    <input type="submit" value="buscar"/>
  </form>
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
