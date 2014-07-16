<?php // Change the css classes to suit your needs    

$attributes = array('class' => '', 'id' => '');
echo form_open('exteriorproducts/save', $attributes); ?>
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
    <label for="genericname">Nombre generico</label>
    <input type="text" name="genericname" maxlength="255" value="<?php echo $object->getGenericname() ?>" />
  </p>
</div>
<div class="clear"></div>
<div class="grid_5">
  <p>
    <label for="presentation">Presentación</label>
    <input type="text" name="presentation" maxlength="255" value="<?php echo $object->getPresentation() ?>" />
  </p>
</div>
<div class="grid_5">
  <p>
	<label for="categoryid">Categoria <small>Requerido</small></label>
    <select name="categoryid" id="categoryid">
      <?php foreach($categories_list as $category): ?>
        <option value="<?php echo $category->id;?>" <?php echo ($object->getCategoryId() == $category->id)? "selected='selected'" : "";?>><?php echo $category->name;?></option>
      <?php endforeach; ?>
    </select>
  </p>
</div>
<div class="clear"></div>
<div class="grid_5">
  <p>
    <label for="compuesto">Compuesto</label>
    <input type="text" name="compuesto" maxlength="255" value="<?php echo $object->getCompuesto() ?>" />
  </p>
</div>
<div class="clear"></div>
<div class="grid_16">
  <p class="submit">
    <?php echo form_submit( 'submit', 'Guardar'); ?>
  </p>
</div>
<?php echo form_close(); ?>
