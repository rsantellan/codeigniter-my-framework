<?php // Change the css classes to suit your needs    

$attributes = array('class' => '', 'id' => '');
echo form_open('novedades/save', $attributes); ?>

<input id="id" type="hidden" name="id"  value="<?php echo $object->getId() ?>"  />
<?php 
 $errorNombre = form_error('nombre');
 $errorDescripcion = form_error('descripcion');
?>
<div class="form-group <?php echo ($errorNombre)? 'has-error' : '';?>">
    <label for="nombre">Nombre</label>
    <input class="form-control" type="text" name="nombre" maxlength="255" value="<?php echo $object->getNombre() ?>" />
    <p class="help-block"><?php echo ($errorNombre)? $errorNombre : 'Requerido';?></p>
</div>
<div class="form-group <?php echo ($errorDescripcion)? 'has-error' : '';?>">
      <label for="descripcion">Descripcion</label>
      <?php echo form_textarea( array('class' => 'form-control', 'name' => 'descripcion', 'rows' => '5', 'cols' => '80', 'value' => html_entity_decode($object->getDescripcion(), ENT_COMPAT | 0, 'UTF-8')) )?>
      <p class="help-block"><?php echo ($errorDescripcion)? $errorDescripcion : 'Requerido';?></p>
</div>
<div class="form-group">

    <input type="submit" class="btn btn-default" value="Guardar"/>

</div>
<?php echo form_close(); ?>
