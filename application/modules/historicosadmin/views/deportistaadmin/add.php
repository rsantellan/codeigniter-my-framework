<div class="grid_16">
  <h2>Agregar Deportista</h2>
  <?php echo form_error('name'); ?>
  <?php echo form_error('periodo'); ?>
</div>
<?php
  $this->load->view('deportistaadmin/form');
?>

<hr/>

<a href="<?php echo site_url('historicosadmin/deportistaadmin/index'); ?>"> Volver al listado </a>
