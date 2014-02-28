<?php // Change the css classes to suit your needs    

$attributes = array('class' => '', 'id' => '');
echo form_open('presentations/save', $attributes); ?>

<input id="id" type="hidden" name="productId"  value="<?php echo $object->getProductId() ?>"  />
<input id="id" type="hidden" name="id"  value="<?php echo $object->getId() ?>"  />
<input id="id" type="hidden" name="lang"  value="<?php echo $lang ?>"  />



<div class="grid_5">
  <p>
    <label for="name">Presentación <small>Requerido</small></label>
    <input type="text" name="name" maxlength="255" value="<?php echo $object->getName() ?>" />
  </p>
</div>
<div class="grid_5">
  <p>
    <label for="genericname">Nombre Generico<small>Requerido</small></label>
    <input type="text" name="genericname" maxlength="255" value="<?php echo $object->getGenericname() ?>" />
  </p>
</div>
<div class="clear"></div>
<div class="grid_5">
  <p>
    <label for="activecomponent">Componente Activo<small>Requerido</small></label>
    <input type="text" name="activecomponent" maxlength="255" value="<?php echo $object->getActiveComponent() ?>" />
  </p>
</div>
<div class="grid_5">
  <p>
    <label for="action">Acción<small>Requerido</small></label>
    <input type="text" name="action" maxlength="255" value="<?php echo $object->getAction() ?>" />
  </p>
</div>
<div class="clear"></div>
<div class="grid_16">
  <p class="submit">
    <?php echo form_submit( 'submit', 'Guardar'); ?>
  </p>
</div>
<?php echo form_close(); ?>
