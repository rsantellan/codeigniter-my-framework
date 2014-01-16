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
    <label for="nombre">Link <small>Requerido</small></label>
    <input type="text" name="link" maxlength="255" value="<?php echo $object->getLink() ?>" />
  </p>
</div>
<div class="grid_16">
  <p class="submit">
    <?php echo form_submit( 'submit', 'Guardar'); ?>
  </p>
</div>
<?php echo form_close(); ?>
