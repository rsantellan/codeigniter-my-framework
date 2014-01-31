<div class="grid_16">
  <h2>Agregar Prueba</h2>
  <?php echo form_error('name'); ?>
  <?php echo form_error('type'); ?>
</div>
<?php
  $this->load->view('form');
?>

<hr/>

<a href="<?php echo site_url('pruebas/index'); ?>"> Volver al listado </a>
