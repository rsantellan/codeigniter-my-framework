<div class="grid_16">
  <h2>Agregar</h2>
  <?php echo form_error('nombre'); ?>
  <?php echo form_error('cliente'); ?>
  <?php echo form_error('tipo_de_trabajo'); ?>
  <?php echo form_error('descripcion'); ?>
  <?php echo form_error('categoria_id'); ?>
  
</div>
<?php
  $this->load->view('proyectos/admin/form');
?>

<hr/>

<a href="<?php echo site_url('proyectos/proyectoadmin/index'); ?>"> Volver al indice </a>
