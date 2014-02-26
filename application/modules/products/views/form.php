<?php // Change the css classes to suit your needs    

$attributes = array('class' => '', 'id' => '');
echo form_open('products/save', $attributes); ?>

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
    <label for="receta">Medicamento controlado</label>
    <input type="checkbox" name="receta" value="1" <?php echo ($object->getReceta() == 1)? 'checked="checked"': '';?> />
  </p>
</div>
<div class="grid_5">
  <p>
    <label for="categorias">Categorias</label>
	<?php //var_dump($categories);?>
	<?php foreach($categories as $category): ?>
	  <?php var_dump($object->hasCategory($category->id))?>
	  <?php endforeach; ?>
	<select name="categorias[]" multiple="true">
	  <?php foreach($categories as $category): ?>
	  <option value="<?php echo $category->id?>" <?php echo ($object->hasCategory($category->id))? 'selected="selected"': '';?>><?php echo $category->name?></option>
	  <?php endforeach; ?>
	</select>
  </p>
</div>
<div class="grid_16">
  <p class="submit">
    <?php echo form_submit( 'submit', 'Guardar'); ?>
  </p>
</div>
<?php echo form_close(); ?>
