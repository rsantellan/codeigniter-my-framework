<div class="banner_header">
  <img src="<?php echo base_url(); ?>assets/efsa/images/logo.png" class="logo">
  <img src="<?php echo base_url(); ?>assets/efsa/images/image_docencia_1.jpg">
</div><!--slider content-->
<div class="clear"></div>
<div class="content">
  <div class="content_int">
	<div class="bg_titles bg_titles_docencia">
	  <?php if($type == 1): ?>
		<h1 class="float_left"><?php echo lang('docencia_titulo');?> | <?php echo lang('docencia_titulo_postgrado');?></h1>
		<div class="sub_links"><a href="<?php echo site_url('docencia-grado.html');?>" ><?php echo lang('docencia_ver_cursos_grado');?></a></div>
	  <?php else: ?>
		<h1 class="float_left"><?php echo lang('docencia_titulo');?> | <?php echo lang('docencia_titulo_grado');?></h1>
		<div class="sub_links"><a href="<?php echo site_url('docencia-postgrado.html');?>" ><?php echo lang('docencia_ver_cursos_posgrado');?></a></div>
	  <?php endif; ?>
	  
	  
	</div>
	
	<?php foreach($list as $docencia): ?>
	<article class="listados">
	  <div class="cursos_info">
		<div class="cursos_name"><?php echo $docencia->name;?></div>	
		<div class="cursos_text"><?php echo html_purify(html_entity_decode(($docencia->description)));?></div>
		<div class="cursos_name_link">
		  <?php if(!is_null($docencia->avatar)): ?>
		  <a href="<?php echo site_url(sprintf('docencia/descarga/%s.html', $docencia->avatar->getId()));?>"><?php echo lang('docencia_descargar');?></a>
		  <?php endif;?>
		</div>
	  </div>	
	</article><!-- article -->
	<?php endforeach;?>
	  
				
  </div><!-- content_int -->	
  <div class="clear"></div>
  <?php echo $this->load->view('efsa/footer') ?>
</div><!-- content -->	
