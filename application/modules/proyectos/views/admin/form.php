<?php // Change the css classes to suit your needs    

$attributes = array('class' => '', 'id' => '');
echo form_open('proyectos/proyectoadmin/save', $attributes); ?>

<input id="id" type="hidden" name="id"  value="<?php echo $object->getId() ?>"  />



<div class="grid_8">
  <p>
    <label for="nombre">Nombre <span class="required">*</span></label>
    <br /><input id="nombre" type="text" name="nombre" maxlength="255" value="<?php echo $object->getNombre() ?>"  />
  </p>
</div>
<div class="grid_8">
  <p>
    <label for="cliente">Cliente <span class="required">*</span></label>
    <br /><input id="cliente" type="text" name="cliente" maxlength="255" value="<?php echo $object->getCliente() ?>"  />
  </p>
</div>
<div class="grid_8">
  <p>
    <label for="category_id">Categoria<span class="required">*</span></label>
    <select id="categoria_id" name="categoria_id">
      <?php foreach($category_list as $category): ?>
        <option value="<?php echo $category->id;?>" <?php echo ($object->getCategoryId() == $category->id)? "selected" : ""; ?> ><?php echo $category->name;?></option>
      <?php endforeach; ?>
    </select>
  </p>
</div>


<div class="grid_16">
  <p>
    <label for="tipo_de_trabajo">Tipo de Trabajo</label>
	<?php echo form_textarea( array( 'name' => 'tipo_de_trabajo', 'class' => 'myTinyMce', 'rows' => '5', 'cols' => '80', 'value' => $object->getTipo_trabajo() ) )?>  
  </p>
</div>
<div class="grid_16">
  <p>
    <label for="descripcion">Descripción</label>
	<?php echo form_textarea( array( 'name' => 'descripcion', 'class' => 'myTinyMce', 'rows' => '5', 'cols' => '80', 'value' => $object->getDescripcion() ) )?>  
  </p>
</div>

<div class="clear"></div>
<div class="grid_16">
  <p class="submit">
    <?php echo form_submit( 'submit', 'Guardar'); ?>
  </p>
</div>
<?php echo form_close(); ?>

