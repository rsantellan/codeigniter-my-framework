<div class="grid_16">
  <h2>Editar Campeon</h2>
  <?php echo form_error('name'); ?>
  <?php echo form_error('periodo'); ?>
  <?php
   if($this->session->flashdata('salvado') == "ok"):
  ?>
  	<p id="salvado_ok" class="success">Campeon salvado</p>
  	
  	<script type="text/javascript">
 		$(document).ready(function() {
 			$("#salvado_ok").fadeOut(3000);
 		});
 	</script>
  <?php endif; ?>
</div>
<?php if(!is_null($object)): ?>
<?php
  $this->load->view('campeonesadmin/form');
?>

<hr/>

<h4>Archivos</h4>

<?php echo modules::run('upload/view', array('id' => $object->getId(), 'classname'=> $object->getObjectClass()));?>
<?php endif; ?>
<hr/>
<a href="<?php echo site_url('historicosadmin/campeonesadmin/index'); ?>"> Volver al listado </a>

<script type="text/javascript">
    $(document).ready(function() {
        startFancyLinks()
    });
</script>