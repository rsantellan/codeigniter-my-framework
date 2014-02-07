<div class="grid_16">
  <h2>Agregar Congreso[<?php echo ($lang == 'es')? "Español" : "Ingles";?>]</h2>
  <?php echo form_error('name'); ?>
  <?php echo form_error('description'); ?>
  <?php echo form_error('members'); ?>
</div>
<?php
  $this->load->view('form');
?>

<hr/>

<a href="<?php echo site_url('congress/index/'.$lang); ?>"> Volver al listado </a>