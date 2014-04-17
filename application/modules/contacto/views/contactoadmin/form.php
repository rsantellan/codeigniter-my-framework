<?php // Change the css classes to suit your needs    
$attributes = array('class' => '', 'id' => '');
echo form_open('contacto/contactoadmin/saveContacto', $attributes); ?>

<input id="id" type="hidden" name="id"  value="<?php echo $object->getId() ?>"  />
<?php 
 $errordireccion = form_error('direccion');
 $errortipo = form_error('tipo');
 $errornombre = form_error('nombre');
 $errorfuncion = form_error('funcion');
?>

<div class="form-group <?php echo ($errordireccion)? 'has-error' : '';?>">
    <label for="direccion">Direcci&oacute;n</label>
    <input class="form-control" type="text" name="direccion" maxlength="255" value="<?php echo $object->getDireccion() ?>" />
    <p class="help-block"><?php echo ($errordireccion)? $errordireccion : 'Requerido';?></p>
</div>
<div class="form-group <?php echo ($errortipo)? 'has-error' : '';?>">
    <label for="tipo">Tipo</label>
    <?php echo form_dropdown('tipo', $object->getArrTipo(), $object->getTipo(), 'class="form-control"'); ?>
    <p class="help-block"><?php echo ($errortipo)? $errortipo : 'Requerido';?></p>
</div>
<div class="form-group <?php echo ($errornombre)? 'has-error' : '';?>">
    <label for="nombre">Nombre</label>
    <input class="form-control" type="text" name="nombre" maxlength="255" value="<?php echo $object->getNombre() ?>" />
    <p class="help-block"><?php echo ($errornombre)? $errornombre : 'Requerido';?></p>
</div>
<div class="form-group <?php echo ($errorfuncion)? 'has-error' : '';?>">
    <label for="funcion">Funci&oacute;n</label>
    <?php echo form_dropdown('funcion', $object->getArrFuncion(), $object->getFuncion(), 'class="form-control"'); ?>
    <p class="help-block"><?php echo ($errorfuncion)? $errorfuncion : 'Requerido';?></p>
</div>
<div class="form-group">

    <input type="submit" class="btn btn-default" value="Guardar"/>

</div>
<?php echo form_close(); ?>



