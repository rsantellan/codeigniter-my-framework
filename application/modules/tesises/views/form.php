<?php // Change the css classes to suit your needs    
$attributes = array('class' => '', 'id' => '');
echo form_open('tesises/save', $attributes); ?>

<input id="id" type="hidden" name="id"  value="<?php echo $object->getId() ?>"  />
<?php 
 $errorTitulo = form_error('titulo');
 $errorSubtitulo = form_error('subtitulo');
 $errorOrientadores = form_error('orientadores');
 $errorTribunal = form_error('tribunal');
 $errorDefensa = form_error('defensa');
 $errorAcademica = form_error('academica');
?>
<div class="form-group <?php echo ($errorTitulo)? 'has-error' : '';?>">
    <label for="titulo">Titulo</label>
    <input class="form-control" type="text" name="titulo" maxlength="255" value="<?php echo $object->getTitulo() ?>" />
    <p class="help-block"><?php echo ($errorTitulo)? $errorTitulo : 'Requerido';?></p>
</div>
<div class="form-group <?php echo ($errorSubtitulo)? 'has-error' : '';?>">
    <label for="subtitulo">Autor</label>
    <input class="form-control" type="text" name="subtitulo" maxlength="255" value="<?php echo $object->getSubtitulo() ?>" />
    <p class="help-block"><?php echo ($errorSubtitulo)? $errorSubtitulo : 'Requerido';?></p>
</div>
<div class="form-group <?php echo ($errorOrientadores)? 'has-error' : '';?>">
    <label for="orientadores">Orientadores</label>
    <input class="form-control" type="text" name="orientadores" maxlength="255" value="<?php echo $object->getOrientadores() ?>" />
    <p class="help-block"><?php echo ($errorOrientadores)? $errorOrientadores : 'Requerido';?></p>
</div>
<div class="form-group <?php echo ($errorAcademica)? 'has-error' : '';?>">
    <label for="academica">Director/a Academico/a</label>
    <input class="form-control" type="text" name="academica" maxlength="255" value="<?php echo $object->getAcademica() ?>" />
    <p class="help-block"><?php echo ($errorAcademica)? $errorAcademica : '';?></p>
</div>
<div class="form-group <?php echo ($errorTribunal)? 'has-error' : '';?>">
    <label for="tribunal">Tribunal</label>
    <input class="form-control" type="text" name="tribunal" maxlength="255" value="<?php echo $object->getTribunal() ?>" />
    <p class="help-block"><?php echo ($errorTribunal)? $errorTribunal : 'Requerido';?></p>
</div>
<div class="form-group <?php echo ($errorDefensa)? 'has-error' : '';?>">
    <label for="defensa">Defensa</label>
    <input class="form-control" type="text" name="defensa" maxlength="255" value="<?php echo $object->getDefensa() ?>" />
    <p class="help-block"><?php echo ($errorDefensa)? $errorDefensa : 'Requerido';?></p>
</div>
<div class="form-group">

    <input type="submit" class="btn btn-default" value="Guardar"/>

</div>
<?php echo form_close(); ?>
