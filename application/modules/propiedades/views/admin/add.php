<div class="grid_16">
  <h2>Agregar</h2>
  <?php echo form_error('titulo'); ?>
  <?php echo form_error('detalle'); ?>
  <?php echo form_error('ubicacion'); ?>
  <?php echo form_error('garantia'); ?>
  <?php echo form_error('metros'); ?>
  <?php echo form_error('dormitorios'); ?>
  <?php echo form_error('banos'); ?>
  <?php echo form_error('calefaccion'); ?>
  <?php echo form_error('garage'); ?>
  <?php echo form_error('precio'); ?>
  <?php echo form_error('moneda'); ?>
  
</div>
<?php
  $this->load->view('propiedades/admin/form');
?>

<hr/>

<a href="<?php echo site_url('propiedades/propiedadesadmin/index'); ?>"> Volver al indice </a>
