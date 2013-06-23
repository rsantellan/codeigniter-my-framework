<?php // Change the css classes to suit your needs    

$attributes = array('class' => '', 'id' => '');
echo form_open('testmulti/multiadmin/save', $attributes); ?>

<input id="id" type="hidden" name="id"  value="<?php echo $object->getId() ?>"  />



<div class="grid_5">
  <p>
    <label for="direccion">Color</label>
    <input type="text" name="direccion" maxlength="125" value="<?php echo $object->getColor() ?>" />
  </p>
</div>
<div class="grid_5">
  <p>
    <label for="tipo">Fecha</label>
    <input type="text" name="tipo" maxlength="125" value="<?php echo $object->getFecha() ?>" />
    
  </p>
</div>
<?php foreach($object->getLangList() as $key => $i18n):?>

<div class="grid_8">
    <p>
      <label for="nombre"><strong class="lang_title"><?php echo $key;?></strong> Nombre <small>Requerido</small></label>
      <input type="text" name="nombre[<?php echo $key;?>]" maxlength="255" value="<?php echo $i18n->getName() ?>" />
    </p>
</div>
<?php endforeach; ?>
<div class="grid_16">
  <p class="submit">
    <?php echo form_submit( 'submit', 'Guardar'); ?>
  </p>
</div>
<?php echo form_close(); ?>
