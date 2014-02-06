<div class="grid_16">
  <h2>Editar Caso de estudio[<?php echo ($lang == 'es')? "Español" : "Ingles";?>]</h2>
  <?php echo form_error('name'); ?>
  <?php
   if($this->session->flashdata('salvado') == "ok"):
  ?>
  	<p id="salvado_ok" class="success">Caso de estudio salvado</p>
  	
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
<a href="<?php echo site_url('studycases/index/'.$lang); ?>"> Volver al listado </a>
<script type="text/javascript">
    $(document).ready(function() {
        startFancyLinks();
        $('#studyDate').datepicker({ dateFormat: 'yy-mm-dd' });
        adminManager.getInstance().startBasicTextAreasTinyMCE();
    });
</script>