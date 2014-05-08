<?php // Change the css classes to suit your needs    
$attributes = array('class' => '', 'id' => '');
echo form_open('efsatesises/save', $attributes); ?>

<input id="id" type="hidden" name="id"  value="<?php echo $object->getId() ?>"  />
<?php 
 $errorNombre = form_error('name');
 $errorDescripcion = form_error('description');
 
?>
<?php //echo validation_errors(); ?>
<div class="form-group <?php echo ($errorNombre)? 'has-error' : '';?>">
    <label for="nombre">Nombre</label>
    <input class="form-control" type="text" name="name" maxlength="255" value="<?php echo $object->getName() ?>" />
    <p class="help-block"><?php echo ($errorNombre)? $errorNombre : 'Requerido';?></p>
</div>
<div class="form-group <?php echo ($errorDescripcion)? 'has-error' : '';?>">
      <label for="description">Descripcion</label>
      <?php echo form_textarea( array('class' => 'form-control', 'name' => 'description', 'rows' => '5', 'cols' => '80', 'value' => html_entity_decode($object->getDescription(), ENT_COMPAT | 0, 'UTF-8')) )?>
      <p class="help-block"><?php echo ($errorDescripcion)? $errorDescripcion : 'Requerido';?></p>
</div>
<div class="form-group">

    <input type="submit" class="btn btn-default" value="Guardar"/>

</div>
<?php echo form_close(); ?>
