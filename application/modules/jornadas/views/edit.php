<div class="grid_16">
  <h2>Editar Jornada</h2>
  <?php echo form_error('name'); ?>
  <?php
   if($this->session->flashdata('salvado') == "ok"):
  ?>
  	<p id="salvado_ok" class="success">Jornada salvada</p>
  	
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
<a href="<?php echo site_url('jornadas/index'); ?>"> Volver al listado </a>
