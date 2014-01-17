<div class="grid_16">
  <h2>Editar Veterinario</h2>
  <?php echo form_error('name'); ?>
  <?php echo form_error('contacto'); ?>
  <?php
   if($this->session->flashdata('salvado') == "ok"):
  ?>
  	<p id="salvado_ok" class="success">Veterinario salvado</p>
  	
  	<script type="text/javascript">
 		$(document).ready(function() {
 			$("#salvado_ok").fadeOut(3000);
 		});
 	</script>
  <?php endif; ?>
</div>
<?php if(!is_null($object)): ?>
<?php
  $this->load->view('form');
?>
<?php endif; ?>
<hr/>
<a href="<?php echo site_url('veterinariosadmin/index'); ?>"> Volver al listado </a>
