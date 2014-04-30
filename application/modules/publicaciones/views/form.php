<?php // Change the css classes to suit your needs    
$attributes = array('class' => '', 'id' => '');
echo form_open('publicaciones/save', $attributes); ?>

<input id="id" type="hidden" name="id"  value="<?php echo $object->getId() ?>"  />
<?php 
 $errortipo = form_error('tipo');
 $errorDescripcion = form_error('description');
?>
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
