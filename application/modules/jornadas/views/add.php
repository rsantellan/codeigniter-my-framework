<div class="grid_16">
  <h2>Agregar jornada</h2>
  <?php echo form_error('name'); ?>
</div>
<?php
  $this->load->view('form');
?>

<hr/>

<a href="<?php echo site_url('jornadas/index'); ?>"> Volver al listado </a>
