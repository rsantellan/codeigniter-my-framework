<div class="grid_16">
  <h2>Agregar Campeon</h2>
  <?php echo form_error('name'); ?>
  <?php echo form_error('periodo'); ?>
</div>
<?php
  $this->load->view('campeonesadmin/form');
?>

<hr/>

<a href="<?php echo site_url('historicosadmin/campeonesadmin/index'); ?>"> Volver al listado </a>
