<?php // Change the css classes to suit your needs    

$attributes = array('class' => '', 'id' => '');
echo form_open('historicosadmin/presidenteadmin/save', $attributes); ?>

<input id="id" type="hidden" name="id"  value="<?php echo $object->getId() ?>"  />



<div class="grid_16">
  <p>
    <label for="nombre">Nombre <small>Requerido</small></label>
    <?php echo form_textarea( array( 'name' => 'name', 'rows' => '5', 'cols' => '80', 'value' => html_entity_decode($object->getName(), ENT_COMPAT | 0, 'UTF-8')) )?>
  </p>
</div>
<div class="grid_5">
  <p>
    <label for="periodo">Periodo <small>Requerido</small></label>
    <input type="text" name="periodo" maxlength="255" value="<?php echo $object->getPeriodo() ?>" />
  </p>
</div>
<div class="grid_16">
  <p class="submit">
    <?php echo form_submit( 'submit', 'Guardar'); ?>
  </p>
</div>
<?php echo form_close(); ?>
