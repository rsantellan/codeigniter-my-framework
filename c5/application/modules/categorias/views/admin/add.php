<div class="grid_16">
  <h2>Agregar</h2>
  <?php echo form_error('nombre'); ?>
  
</div>
<?php
  $this->load->view('categorias/admin/form');
?>

<hr/>

<a href="<?php echo site_url('categorias/categoriasadmin/index'); ?>"> Volver al indice </a>
