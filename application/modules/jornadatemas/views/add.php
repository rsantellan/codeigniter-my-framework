<div class="grid_16">
  <h2>Agregar Tema de jornada</h2>
  <?php echo form_error('name'); ?>
  <?php echo form_error('link'); ?>
  <?php echo form_error('description'); ?>
  <?php echo form_error('location'); ?>
  <?php echo form_error('departmentid'); ?>
</div>
<?php
  $this->load->view('form');
?>

<hr/>

<a href="<?php echo site_url('jornadatema/index'); ?>"> Volver al listado </a>
