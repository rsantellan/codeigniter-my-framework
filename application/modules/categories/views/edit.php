<div class="grid_16">
  <h2>Editar Categoria[<?php echo ($lang == 'es')? "Español" : "Ingles";?>]</h2>
  <?php echo form_error('name'); ?>
  <?php
   if($this->session->flashdata('salvado') == "ok"):
  ?>
  	<p id="salvado_ok" class="success">Categoria salvado</p>
  	
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

<hr/>
<?php endif; ?>
<hr/>
<a href="<?php echo site_url('categories/index/'.$lang); ?>"> Volver al listado </a>