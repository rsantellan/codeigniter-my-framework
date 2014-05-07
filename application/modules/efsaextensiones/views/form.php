<?php // Change the css classes to suit your needs    
$attributes = array('class' => '', 'id' => '');
echo form_open('efsaextensiones/save', $attributes); ?>

<input id="id" type="hidden" name="id"  value="<?php echo $object->getId() ?>"  />
<?php 
 $errorNombre = form_error('nombre');
 $errorLink = form_error('link');
 $errorDescripcion = form_error('description');
?>
<div class="form-group <?php echo ($errorNombre)? 'has-error' : '';?>">
    <label for="nombre">Nombre</label>
    <input class="form-control" type="text" name="nombre" maxlength="255" value="<?php echo $object->getNombre() ?>" />
    <p class="help-block"><?php echo ($errorNombre)? $errorNombre : 'Requerido';?></p>
</div>
<div class="form-group <?php echo ($errorLink)? 'has-error' : '';?>">
    <label for="link">Enlance</label>
	<input class="form-control" type="text" name="link" maxlength="255" value="<?php echo $object->getLink() ?>" />
    <p class="help-block">Deje este campo vacio para utilizar el archivos subido<?php echo ($errorLink)? $errorLink : '';?></p>
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
