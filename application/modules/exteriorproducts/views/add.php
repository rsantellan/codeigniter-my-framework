<div class="grid_16">
  <h2>Agregar Producto exterior</h2>
  <?php echo form_error('name'); ?>
  <?php echo form_error('genericname'); ?>
  <?php echo form_error('presentation'); ?>
  <?php echo form_error('country_id'); ?>
  <?php echo form_error('category_id'); ?>
  <?php echo form_error('presencetype'); ?>
  <?php echo form_error('compuesto'); ?>
</div>
<?php
  $this->load->view('form');
?>

<hr/>

<a href="<?php echo site_url('exteriorproducts/index'); ?>"> Volver al listado </a>
