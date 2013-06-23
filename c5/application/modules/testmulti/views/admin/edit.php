<div class="grid_16">
  <h2>Editar</h2>
  <?php echo form_error('fecha'); ?>
  <?php echo form_error('color'); ?>
  
  <?php foreach($object->getLangList() as $key => $i18n):?>
    <?php echo form_error('nombre['.$key.']'); ?>
  <?php endforeach;?>
  <?php
   if($this->session->flashdata('salvado') == "ok"):
  ?>
  	<p id="salvado_ok" class="success">Contacto salvado</p>
  	
  	<script type="text/javascript">
 		$(document).ready(function() {
 			$("#salvado_ok").fadeOut(3000);
 		});
 	</script>
  <?php endif; ?>  
</div>
<?php
  $this->load->view('testmulti/admin/form');
?>

<hr/>

<a href="<?php echo site_url('testmulti/multiadmin/index'); ?>"> Volver al indice </a>
