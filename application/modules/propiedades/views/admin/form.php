<?php // Change the css classes to suit your needs    

$attributes = array('class' => '', 'id' => '');
echo form_open('propiedades/propiedadesadmin/save', $attributes); ?>

<input id="id" type="hidden" name="id"  value="<?php echo $object->getId() ?>"  />



<div class="grid_8">
  <p>
    <label for="titulo">Titulo <span class="required">*</span></label>
    <br /><input id="titulo" type="text" name="titulo" maxlength="255" value="<?php echo $object->getTitulo() ?>"  />
  </p>
</div>
<div class="grid_16">
  <p>
    <label for="detalle">Detalle <span class="required">*</span></label>
    <br />
    <?php echo form_textarea( array( 'name' => 'detalle', 'rows' => '5', 'cols' => '80', 'value' => $object->getDetalle() ) )?>
  </p>
</div>
<div class="grid_8">
  <p>
    <label for="ubicacion">Ubicación</label>
    <br /><input id="ubicacion" type="text" name="ubicacion" maxlength="255" value="<?php echo $object->getUbicacion() ?>"  />
  </p>
</div>
<div class="grid_8">
  <p>
    <label for="garantia">Garantia</label>
    <br /><input id="garantia" type="text" name="garantia" maxlength="255" value="<?php echo $object->getGarantia() ?>"  />
  </p>
</div>
<div class="grid_8">
  <p>
    <label for="metros">Metros <span class="required">*</span></label>
    <br /><input id="metros" type="text" name="metros" maxlength="255" value="<?php echo $object->getMetros() ?>"  />
  </p>
</div>
<div class="grid_8">
  <p>
    <label for="dormitorios">Dormitorios</label>
    <br /><input id="dormitorios" type="text" name="dormitorios" maxlength="255" value="<?php echo $object->getDormitorios() ?>"  />
  </p>
</div>
<div class="grid_8">
  <p>
    <label for="banos">Baños</label>
    <br /><input id="banos" type="text" name="banos" maxlength="255" value="<?php echo $object->getBanios() ?>"  />
  </p>
</div>

<div class="grid_8">
  <p>
    <label for="calefaccion">Calefacción</label>
    <br /><input id="calefaccion" type="text" name="calefaccion" maxlength="255" value="<?php echo $object->getCalefaccion() ?>"  />
  </p>
</div>

<div class="grid_8">
  <p>
    <label for="garage">Garage</label>
    <?php // Change the values in this array to populate your dropdown as required ?>
    <?php $options = array(
                                                  'SI'  => 'Si',
                                                  'NO'    => 'No'
                                                ); ?>

    <br /><?php echo form_dropdown('garage', $options, $object->getGarage())?>
  </p>
</div>
<div class="clear"></div>
<div class="grid_8">
  <p>
    <label for="precio_venta">Precio Venta</label>
    <br /><input id="precio_venta" type="text" name="precio_venta" maxlength="255" value="<?php echo $object->getPrecioVenta() ?>"  />
  </p>
</div>
<div class="grid_8">
  <p>
    <label for="moneda_venta">Moneda Venta</label>
    <?php // Change the values in this array to populate your dropdown as required ?>
    <?php $options = array(
                                                  'U$S'  => 'Dolares',
                                                  '$'    => 'Pesos'
                                                ); ?>

    <br /><?php echo form_dropdown('moneda_venta', $options, $object->getMonedaVenta())?>
  </p>
</div>
<div class="clear"></div>

<div class="grid_8">
  <p>
    <label for="precio_alquiler">Precio Alquiler</label>
    <br /><input id="precio_alquiler" type="text" name="precio_alquiler" maxlength="255" value="<?php echo $object->getPrecioAlquiler() ?>"  />
  </p>
</div>
<div class="grid_8">
  <p>
    <label for="moneda_alquiler">Moneda Alquiler</label>
    <?php // Change the values in this array to populate your dropdown as required ?>
    <?php $options = array(
                                                  'U$S'  => 'Dolares',
                                                  '$'    => 'Pesos'
                                                ); ?>

    <br /><?php echo form_dropdown('moneda_alquiler', $options, $object->getMonedaAlquiler())?>
  </p>
</div>

<div class="clear"></div>
<div class="grid_8">
  <p>
    <label for="visibilidad">Visible</label>
    <br />
	    <?php $options = array(
                                                  '1'  => 'Si',
                                                  '0'    => 'No'
                                                ); ?>
    <?php echo form_dropdown('visibilidad', $options, $object->getVisible())?>
  </p>
</div>
<div class="grid_8">
  <p>
    <label for="alquiler">Esta para alquilar</label>
    <br />
	    <?php $options = array(
                                                  '1'  => 'Si',
                                                  '0'    => 'No'
                                                ); ?>
    <?php echo form_dropdown('alquiler', $options, $object->getAlquiler())?>
  </p>
</div>
<div class="grid_8">
  <p>
    <label for="venta">Esta para vender</label>
    <br />
	    <?php $options = array(
                                                  '1'  => 'Si',
                                                  '0'    => 'No'
                                                ); ?>
    <?php echo form_dropdown('venta', $options, $object->getVenta())?>
  </p>
</div>
<div class="grid_16">
  <p class="submit">
    <?php echo form_submit( 'submit', 'Guardar'); ?>
  </p>
</div>
<?php echo form_close(); ?>

