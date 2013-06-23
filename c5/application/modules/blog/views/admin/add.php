<div class="grid_16">
  <h2>Agregar</h2>
  <?php echo form_error('title'); ?>
  <?php echo form_error('body'); ?>
  
</div>
<?php
  $this->load->view('blog/admin/form');
?>

<hr/>

<a href="<?php echo site_url('blog/blogadmin/index'); ?>"> Volver al indice </a>
