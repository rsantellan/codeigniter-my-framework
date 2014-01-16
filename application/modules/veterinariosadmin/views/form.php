<?php // Change the css classes to suit your needs    

$attributes = array('class' => '', 'id' => '');
echo form_open('banners/save', $attributes); ?>

<input id="id" type="hidden" name="id"  value="<?php echo $object->getId() ?>"  />



<div class="grid_5">
  <p>
    <label for="nombre">Nombre <small>Requerido</small></label>
    <input type="text" name="name" maxlength="255" value="<?php echo $object->getName() ?>" />
  </p>
</div>
<div class="grid_5">
  <p>
    <label for="contacto">Contacto <small>Requerido</small></label>
    <input type="text" name="contacto" maxlength="255" value="<?php echo $object->getContacto() ?>" />
  </p>
</div>
<div class="grid_5">
  <p>
    <input type="checkbox" id="boss" name="boss" value="1" class="" <?php echo set_checkbox('boss', '1'); ?>> 
    <label for="boss">Es jefe?</label>
  </p>
</div>

<div class="grid_16">
  <p class="submit">
    <?php echo form_submit( 'submit', 'Guardar'); ?>
  </p>
</div>
<?php echo form_close(); ?>
