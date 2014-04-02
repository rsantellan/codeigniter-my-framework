<?php // Change the css classes to suit your needs    

$attributes = array('class' => '', 'id' => '');
echo form_open('clubes/save', $attributes); ?>

<input id="id" type="hidden" name="id"  value="<?php echo $object->getId() ?>"  />



<div class="grid_5">
  <p>
    <label for="nombre">Nombre <small>Requerido</small></label>
    <input type="text" name="name" maxlength="255" value="<?php echo $object->getName() ?>" />
  </p>
</div>
<div class="grid_5">
  <p>
    <label for="link">Link</label>
    <input type="text" name="link" maxlength="255" value="<?php echo $object->getLink() ?>" />
  </p>
</div>
<div class="grid_16">
  <p>
    <label for="description">Descripción</label>
    <?php echo form_textarea( array( 'name' => 'description', 'rows' => '5', 'cols' => '80', 'value' => html_entity_decode($object->getDescription(), ENT_COMPAT | 0, 'UTF-8')) )?>
  </p>
</div>
<div class="grid_5">
  <p>
    <label for="location">Locación</label>
    <input type="text" name="location" maxlength="255" value="<?php echo $object->getLocation() ?>" />
  </p>
</div>
<div class="grid_5">
  <p>
    <label for="departmentid">Departamento</label>
    <?php echo form_dropdown('departmentid', $departments_list, $object->getDepartmentid()); ?>
  </p>
</div>
<div class="grid_5">
  <p>
    <label for="numero">Número</label>
    <input type="text" name="numero" maxlength="255" value="<?php echo $object->getNumero() ?>" />
  </p>
</div>
<div class="grid_5">
  <p>
    <label for="latitud">Latitud (Google Maps)<small>Requerido</small></label>
    <input type="text" name="latitud" maxlength="255" value="<?php echo $object->getLatitud() ?>" />
  </p>
</div>
<div class="grid_5">
  <p>
    <label for="longitud">Longitud (Google Maps)<small>Requerido</small></label>
    <input type="text" name="longitud" maxlength="255" value="<?php echo $object->getLongitud() ?>" />
  </p>
</div>
<div class="grid_16">
  <p class="submit">
    <?php echo form_submit( 'submit', 'Guardar'); ?>
  </p>
</div>
<?php echo form_close(); ?>
