<div class="grid_16">
  <h2>Agregar Radio</h2>
  <?php echo form_error('name'); ?>
  <?php echo form_error('link'); ?>
</div>
<?php
  $this->load->view('form');
?>

<hr/>

<a href="<?php echo site_url('actaadmin/index'); ?>"> Volver al indice </a>
