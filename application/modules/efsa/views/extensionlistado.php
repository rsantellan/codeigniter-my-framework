<div class="banner_header">
  <img src="<?php echo base_url(); ?>assets/efsa/images/logo.png" class="logo">
  <img src="<?php echo base_url(); ?>assets/efsa/images/image_divulgacion.jpg">
</div><!--slider content-->
<div class="clear"></div>
<div class="content">
  <div class="content_int">
	<div class="bg_titles bg_titles_divulgacion">
		<h1 class="float_left"><?php echo lang('extension_titulo');?></h1>
	</div>
	
	<?php foreach($list as $extension): ?>
	<article class="listados">
	  <div class="cursos_info">
		<div class="cursos_name"><?php echo $extension->name;?></div>	
		<div class="cursos_text"><?php echo html_purify(html_entity_decode(($extension->description)));?></div>
		<div class="cursos_name_link">
		  <?php if(!empty($extension->link)): ?>
			<a href="<?php echo prep_url($extension->link);?>" target="_blank"><?php echo lang('extension_descargar');?></a>
		  <?php else: ?>
			<?php if(!is_null($extension->avatar)): ?>
			<a href="<?php echo site_url(sprintf('extension/descarga/%s.html', $extension->avatar->getId()));?>"><?php echo lang('extension_descargar');?></a>
			<?php endif;?>
		  <?php endif;?>
		</div>
	  </div>	
	</article><!-- article -->
	<?php endforeach;?>
	  
				
  </div><!-- content_int -->	
  <div class="clear"></div>
  <?php echo $this->load->view('efsa/footer') ?>
</div><!-- content -->	
