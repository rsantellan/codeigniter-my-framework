<div class="grid_16">
  <h2>Agregar Link</h2>
  <?php echo form_error('name'); ?>
  <?php echo form_error('url'); ?>
</div>
<?php
  $this->load->view('form');
?>

<hr/>

<a href="<?php echo site_url('basiclink/index'); ?>"> Volver al listado </a>
