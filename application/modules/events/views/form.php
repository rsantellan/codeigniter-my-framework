<?php // Change the css classes to suit your needs    

$attributes = array('class' => '', 'id' => '');
echo form_open('events/save', $attributes); ?>

<input id="id" type="hidden" name="id"  value="<?php echo $object->getId() ?>"  />
<input id="id" type="hidden" name="lang"  value="<?php echo $lang ?>"  />



<div class="grid_5">
  <p>
    <label for="nombre">Nombre del evento <small>Requerido</small></label>
    <input type="text" name="name" maxlength="255" value="<?php echo $object->getName() ?>" />
  </p>
</div>
<div class="grid_5">
  <p>
    <label for="description">Descripción de la foto</label>
     <input type="text" name="description" maxlength="255" value="<?php echo $object->getDescription() ?>" />
  </p>
</div>
<div class="grid_5">
  <p>
    <label for="members">Nombre de los integrantes</label>
     <input type="text" name="members" maxlength="255" value="<?php echo $object->getMembers() ?>" />
  </p>
</div>
<div class="grid_16">
  <p class="submit">
    <?php echo form_submit( 'submit', 'Guardar'); ?>
  </p>
</div>
<?php echo form_close(); ?>
