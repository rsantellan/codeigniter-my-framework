<div class="grid_16">
  <h2>Agregar Presidente</h2>
  <?php echo form_error('name'); ?>
  <?php echo form_error('periodo'); ?>
</div>
<?php
  $this->load->view('presidenteadmin/form');
?>

<hr/>

<a href="<?php echo site_url('historicosadmin/presidenteadmin/index'); ?>"> Volver al listado </a>
