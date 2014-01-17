<div class="grid_16">
  <h2>Editar Club</h2>
  <?php echo form_error('name'); ?>
  <?php echo form_error('link'); ?>
  <?php echo form_error('description'); ?>
  <?php echo form_error('location'); ?>
  <?php echo form_error('departmentid'); ?>
  <?php
   if($this->session->flashdata('salvado') == "ok"):
  ?>
  	<p id="salvado_ok" class="success">Club salvado</p>
  	
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

<h4>Archivos</h4>

<?php echo modules::run('upload/view', array('id' => $object->getId(), 'classname'=> $object->getObjectClass()));?>
<?php endif; ?>
<hr/>
<a href="<?php echo site_url('clubes/index'); ?>"> Volver al listado </a>

<script type="text/javascript">
    $(document).ready(function() {
        startFancyLinks();
        adminManager.getInstance().startBasicTextAreasTinyMCE();
    });
</script>

