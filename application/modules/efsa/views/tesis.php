<div class="banner_header">
  <img src="<?php echo base_url(); ?>assets/efsa/images/logo.png" class="logo">
  <img src="<?php echo base_url(); ?>assets/efsa/images/image_investigaciones.jpg">
</div><!--slider content-->
<div class="clear"></div>
<div class="content">
  <div class="content_int">
	<div class="bg_titles bg_titles_investigaciones">
		<h1 class="float_left"><?php echo lang('investigacion_titulo');?> | <?php echo lang('investigacion_tesis_titulo');?></h1>
		<div class="sub_links"><a href="<?php echo site_url('facilidades.html');?>" ><?php echo lang('investigacion_facilidades_titulo');?></a><span>|</span><a href="<?php echo site_url('proyectos-en-marcha.html');?>"><?php echo lang('investigacion_proyectos_titulo');?></a></div>
	</div>
	
	<?php foreach($list as $tesis): ?>
	<article class="listados">
	  <div class="cursos_info">
		<div class="cursos_text"><?php echo html_purify(html_entity_decode(($tesis->description)));?></div>
		<div class="cursos_name_link">
		  <?php if(!is_null($tesis->avatar)): ?>
		  <a href="<?php echo site_url(sprintf('tesis/descarga/%s.html', $tesis->avatar->getId()));?>"><?php echo lang('tesis_descargar');?></a>
		  <?php endif;?>
		</div>
	  </div>	
	</article><!-- article -->
	<?php endforeach;?>
	  
				
  </div><!-- content_int -->	
  <div class="clear"></div>
  <?php echo $this->load->view('efsa/footer') ?>
</div><!-- content -->	
