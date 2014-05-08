<div class="banner_header">
  <img src="<?php echo base_url(); ?>assets/efsa/images/logo.png" class="logo">
  <img src="<?php echo base_url(); ?>assets/efsa/images/image_investigaciones.jpg">
</div><!--slider content-->
<div class="clear"></div>
<div class="content">
  <div class="content_int">
	<div class="bg_titles bg_titles_investigaciones">
		<h1 class="float_left"><?php echo lang('investigacion_titulo');?> | <?php echo lang('investigacion_facilidades_titulo');?></h1>
		<div class="sub_links"><a href="<?php echo site_url('tesis-posgrado.html');?>"><?php echo lang('investigacion_tesis_titulo');?></a><span>|</span><a href="<?php echo site_url('tesis-posgrado.html');?>"><?php echo lang('investigacion_tesis_titulo');?></a></div>
	</div>
	<div class="textos_internos">
        <?php echo lang('investigacion_facilidades_texto');?>
        <div class="img_lab">
            <img src="<?php echo base_url(); ?>assets/efsa/images/lab_cure1.jpg">
            <img src="<?php echo base_url(); ?>assets/efsa/images/lab_cure2.jpg" style="margin-right:0;">
            <p><I><?php echo lang('investigacion_facilidades_texto_imagenes');?></I></p>
        </div><!-- img lab -->
        <p><?php echo lang('investigacion_facilidades_laboratorios_titulos');?></p>
        <ul class="facilidades">
            <?php foreach($list as $facilidad): ?>
              
            <?php endforeach; ?>
            <li><a href="lab_bio_molecular_iframe.php" class="fancybox fancybox.iframe">Laboratorio de Biología Molecular</a></li>
            <li><a href="lab_cultivos_org_iframe.php" class="fancybox fancybox.iframe">Laboratorio de Cultivos organismos acuáticos</a></li>
            <li><a href="lab_microscopia_iframe.php" class="fancybox fancybox.iframe">Laboratorio de Microscopía</a></li>
            <li><a href="eq_analitico_iframe.php" class="fancybox fancybox.iframe">Equipamiento analítico</a></li>
            <li><a href="eq_muestreo_iframe.php" class="fancybox fancybox.iframe">Equipamiento para muestreo</a></li>
        </ul>
	</div><!-- textos internos -->
	  
				
  </div><!-- content_int -->	
  <div class="clear"></div>
  <?php echo $this->load->view('efsa/footer') ?>
</div><!-- content -->	

<script type="text/javascript">
		$(document).ready(function() {
			/*
			 *  Simple image gallery. Uses default settings
			 */

			$('.fancybox').fancybox();
	});
</script>