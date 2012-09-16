<div class="grid_16">
  <h2>Editar</h2>
  <?php echo form_error('title'); ?>
  <?php echo form_error('body'); ?>
  
  <?php
   if($this->session->flashdata('salvado') == "ok"):
  ?>
  	<p id="salvado_ok" class="success">Blog salvado</p>
  	
  	<script type="text/javascript">
 		$(document).ready(function() {
 			$("#salvado_ok").fadeOut(3000);
 		});
 	</script>
  <?php endif; ?>  
</div>
<?php
  $this->load->view('blog/admin/form');
?>

<h4>Imagenes</h4>

<?php echo modules::run('upload/view', array('id' => $object->getId(), 'classname'=> $object->getObjectClass()));?>


<hr/>

<a href="<?php echo site_url('blog/blogadmin/index'); ?>"> Volver al indice </a>
