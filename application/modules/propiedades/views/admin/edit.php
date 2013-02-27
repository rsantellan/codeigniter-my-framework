<div class="grid_16">
  <h2>Editar</h2>
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
  
  <?php
   if($this->session->flashdata('salvado') == "ok"):
  ?>
  	<p id="salvado_ok" class="success">Propiedad salvada</p>
  	
  	<script type="text/javascript">
 		$(document).ready(function() {
 			$("#salvado_ok").fadeOut(3000);
 		});
 	</script>
  <?php endif; ?>  
</div>
<?php
  $this->load->view('propiedades/admin/form');
?>

<h4>Imagenes</h4>

<?php echo modules::run('upload/view', array('id' => $object->getId(), 'classname'=> $object->getObjectClass()));?>


<hr/>

<a href="<?php echo site_url('propiedades/propiedadesadmin/index'); ?>"> Volver al indice </a>

