<div class="grid_16">
  <h2>Editar Producto exterior</h2>
    <?php echo form_error('name'); ?>
	<?php echo form_error('genericname'); ?>
	<?php echo form_error('presentation'); ?>
	<?php echo form_error('country_id'); ?>
	<?php echo form_error('category_id'); ?>
	<?php echo form_error('presencetype'); ?>
	<?php echo form_error('compuesto'); ?>
  <?php
   if($this->session->flashdata('salvado') == "ok"):
  ?>
  	<p id="salvado_ok" class="success">Producto exterior salvado</p>
  	
  	<script type="text/javascript">
 		$(document).ready(function() {
 			$("#salvado_ok").fadeOut(3000);
 		});
 	</script>
  <?php endif; ?>
</div>
<?php
  $this->load->view('form');
?>

<hr/>

<a href="<?php echo site_url('exteriorproducts/index'); ?>"> Volver al listado </a>