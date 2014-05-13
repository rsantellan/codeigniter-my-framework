<?php // Change the css classes to suit your needs    
$attributes = array('class' => '', 'id' => '');
echo form_open('integrantes/save', $attributes); ?>

<input id="id" type="hidden" name="id"  value="<?php echo $object->getId() ?>"  />
<?php 
 $errorNombre = form_error('nombre');
 $errorTitle = form_error('title');
 $errorLocation = form_error('location');
 $errorContact = form_error('contact');
 $errorArea = form_error('area');
 $errortipo = form_error('tipo');
 $errorDescripcion = form_error('description');
?>
<div class="form-group <?php echo ($errorNombre)? 'has-error' : '';?>">
    <label for="nombre">Nombre</label>
    <input class="form-control" type="text" name="nombre" maxlength="255" value="<?php echo $object->getNombre() ?>" />
    <p class="help-block"><?php echo ($errorNombre)? $errorNombre : 'Requerido';?></p>
</div>
<div class="form-group <?php echo ($errorTitle)? 'has-error' : '';?>">
    <label for="title">Titulo</label>
	<input class="form-control" type="text" name="title" maxlength="255" value="<?php echo $object->getTitle() ?>" />
    <p class="help-block"><?php echo ($errorTitle)? $errorTitle : ' ';?></p>
</div>
<div class="form-group <?php echo ($errorLocation)? 'has-error' : '';?>">
    <label for="location">Locacion</label>
	<input class="form-control" type="text" name="location" maxlength="255" value="<?php echo $object->getLocation() ?>" />
    <p class="help-block"><?php echo ($errorLocation)? $errorLocation : 'Requerido';?></p>
</div>
<div class="form-group <?php echo ($errorContact)? 'has-error' : '';?>">
    <label for="contact">Contacto</label>
	<input class="form-control" type="text" name="contact" maxlength="255" value="<?php echo $object->getContact() ?>" />
    <p class="help-block"><?php echo ($errorContact)? $errorContact : '';?></p>
</div>
<div class="form-group <?php echo ($errorArea)? 'has-error' : '';?>">
    <label for="area">Area</label>
	<input class="form-control" type="text" name="area" maxlength="255" value="<?php echo $object->getArea() ?>" />
    <p class="help-block"><?php echo ($errorArea)? $errorArea : '';?></p>
</div>
<div class="form-group <?php echo ($errortipo)? 'has-error' : '';?>">
    <label for="tipo">Tipo</label>
    <?php echo form_dropdown('tipo', $object->getArrTipo(), $object->getTipo(), 'class="form-control"'); ?>
    <p class="help-block"><?php echo ($errortipo)? $errortipo : 'Requerido';?></p>
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
