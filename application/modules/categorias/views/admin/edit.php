<div class="grid_16">
  <h2>Editar</h2>
  <?php echo form_error('nombre'); ?>
  
  <?php
   if($this->session->flashdata('salvado') == "ok"):
  ?>
  	<p id="salvado_ok" class="success">Categoria salvada</p>
  	
  	<script type="text/javascript">
 		$(document).ready(function() {
 			$("#salvado_ok").fadeOut(3000);
 		});
 	</script>
  <?php endif; ?>  
</div>
<?php
  $this->load->view('categorias/admin/form');
?>

<hr/>

<a href="<?php echo site_url('categorias/categoriasadmin/index'); ?>"> Volver al indice </a>
