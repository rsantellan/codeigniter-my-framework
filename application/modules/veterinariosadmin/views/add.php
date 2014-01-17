<div class="grid_16">
  <h2>Agregar Veterinario</h2>
  <?php echo form_error('name'); ?>
  <?php echo form_error('contacto'); ?>
</div>
<?php
  $this->load->view('form');
?>

<hr/>

<a href="<?php echo site_url('veterinariosadmin/index'); ?>"> Volver al listado </a>
