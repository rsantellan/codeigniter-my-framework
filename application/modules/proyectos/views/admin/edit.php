<div class="grid_16">
  <h2>Editar</h2>
  <?php echo form_error('nombre'); ?>
  <?php echo form_error('cliente'); ?>
  <?php echo form_error('tipo_de_trabajo'); ?>
  <?php echo form_error('descripcion'); ?>
  <?php echo form_error('categoria_id'); ?>
  
  <?php
   if($this->session->flashdata('salvado') == "ok"):
  ?>
  	<p id="salvado_ok" class="success">Proyecto salvado</p>
  	
  	<script type="text/javascript">
 		$(document).ready(function() {
 			$("#salvado_ok").fadeOut(3000);
 		});
 	</script>
  <?php endif; ?>  
</div>
<?php
  $this->load->view('proyectos/admin/form');
?>

<h4>Imagenes</h4>

<?php echo modules::run('upload/view', array('id' => $object->getId(), 'classname'=> $object->getObjectClass()));?>


<hr/>

<a href="<?php echo site_url('proyectos/proyectoadmin/index'); ?>"> Volver al indice </a>

<script type="text/javascript">
  $(document).ready(function() {
    //adminManager.getInstance().startBasicTextAreasTinyMCE();
    adminManager.getInstance().startFancyInPage('colorbox_link');
  });
  
</script>