<div class="grid_16">
  <h2>Agregar</h2>
  <?php echo form_error('fecha'); ?>
  <?php echo form_error('color'); ?>
  
  <?php foreach($object->getLangList() as $key => $i18n):?>
    <?php echo form_error('nombre['.$key.']'); ?>
  <?php endforeach;?>
</div>
<?php
  $this->load->view('testmulti/admin/form');
?>

<hr/>

<a href="<?php echo site_url('testmulti/multiadmin/index'); ?>"> Volver al indice </a>
