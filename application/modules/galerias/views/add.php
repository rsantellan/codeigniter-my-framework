<div class="grid_16">
  <h2>Agregar Galeria</h2>
  <?php echo form_error('name'); ?>
</div>
<?php
  $this->load->view('form');
?>

<hr/>

<a href="<?php echo site_url('galerias/index'); ?>"> Volver al listado </a>
