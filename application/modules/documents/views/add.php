<div class="grid_16">
  <h2>Agregar <?php echo ($object->getTipo() == "doc") ? "Documento" : "Formulario";?></h2>
  <?php echo form_error('name'); ?>
</div>
<?php
  $this->load->view('form');
?>

<hr/>

<a href="<?php echo site_url('documents/index'); ?>"> Volver al listado </a>
