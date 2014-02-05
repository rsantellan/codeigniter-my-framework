<?php // Change the css classes to suit your needs    

$attributes = array('class' => '', 'id' => '');
echo form_open('news/save', $attributes); ?>

<input id="id" type="hidden" name="id"  value="<?php echo $object->getId() ?>"  />
<input id="id" type="hidden" name="lang"  value="<?php echo $lang ?>"  />



<div class="grid_5">
  <p>
    <label for="nombre">Nombre <small>Requerido</small></label>
    <input type="text" name="name" maxlength="255" value="<?php echo $object->getName() ?>" />
  </p>
</div>
<div class="grid_5">
  <p>
    <label for="slider">Esta en el slider?</label>
	<input type="checkbox" id="boss" name="slider" value="1" class="" <?php echo ($object->getIsSlider() == 1)? 'checked="checked"': '';?> /> 
    
  </p>
</div>
<div class="grid_16">
  <p>
    <label for="nombre">Descripción</label>
    <?php echo form_textarea( array( 'name' => 'description', 'rows' => '5', 'cols' => '80', 'value' => html_entity_decode($object->getDescription(), ENT_COMPAT | 0, 'UTF-8')) )?>
  </p>
</div>
<div class="grid_16">
  <p class="submit">
    <?php echo form_submit( 'submit', 'Guardar'); ?>
  </p>
</div>
<?php echo form_close(); ?>
