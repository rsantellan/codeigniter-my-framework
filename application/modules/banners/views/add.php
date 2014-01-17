<div class="grid_16">
  <h2>Agregar Laboratorio</h2>
  <?php echo form_error('name'); ?>
  <?php echo form_error('link'); ?>
</div>
<?php
  $this->load->view('form');
?>

<hr/>

<a href="<?php echo site_url('laboratorios/index'); ?>"> Volver al listado </a>
