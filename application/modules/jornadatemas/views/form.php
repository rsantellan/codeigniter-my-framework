<?php // Change the css classes to suit your needs    

$attributes = array('class' => '', 'id' => '');
echo form_open('jornadatemas/save', $attributes); ?>

<input id="id" type="hidden" name="id"  value="<?php echo $object->getId() ?>"  />



<div class="grid_5">
  <p>
    <label for="nombre">Nombre <small>Requerido</small></label>
    <input type="text" name="name" maxlength="255" value="<?php echo $object->getName() ?>" />
  </p>
</div>
<div class="grid_5">
  <p>
    <label for="orator">Orador</label>
    <input type="text" name="orator" maxlength="255" value="<?php echo $object->getOrator() ?>" />
  </p>
</div>
<div class="grid_5">
  <p>
    <label for="jornadaid">Jornada</label>
    <?php echo form_dropdown('jornadaid', $jornadas_list, $object->getJornadaid()); ?>
  </p>
</div>
<div class="grid_16">
  <p class="submit">
    <?php echo form_submit( 'submit', 'Guardar'); ?>
  </p>
</div>
<?php echo form_close(); ?>