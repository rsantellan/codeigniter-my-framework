<div class="grid_16">
  <h2>Agregar Categoria[<?php echo ($lang == 'es')? "Español" : "Ingles";?>]</h2>
  <?php echo form_error('name'); ?>
</div>
<?php
  $this->load->view('form');
?>

<hr/>

<a href="<?php echo site_url('categories/index/'.$lang); ?>"> Volver al listado </a>
