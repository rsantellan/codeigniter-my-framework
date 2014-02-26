<div class="grid_16">
  <h2>Agregar Presentación del producto "<?php echo $productObject->name;?>"[<?php echo ($lang == 'es')? "Español" : "Ingles";?>]</h2>
  <?php echo form_error('name'); ?>
  <?php echo form_error('genericname'); ?>
  <?php echo form_error('activecomponent'); ?>
  <?php echo form_error('action'); ?>
</div>
<?php
  $this->load->view('form');
?>

<hr/>

<a href="<?php echo site_url('presentation/index/'.$lang.'/'.$object->getProductId()); ?>"> Volver al listado </a>
