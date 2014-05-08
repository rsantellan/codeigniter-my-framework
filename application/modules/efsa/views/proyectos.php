<div class="banner_header">
  <img src="<?php echo base_url(); ?>assets/efsa/images/logo.png" class="logo">
  <img src="<?php echo base_url(); ?>assets/efsa/images/image_investigaciones.jpg">
</div><!--slider content-->
<div class="clear"></div>
<div class="content">
  <div class="content_int">
	<div class="bg_titles bg_titles_investigaciones">
		<h1 class="float_left"><?php echo lang('investigacion_titulo');?> | <?php echo lang('investigacion_proyectos_titulo');?></h1>
		<div class="sub_links"><a href="/facilidades.php" ><?php echo lang('investigacion_facilidades_titulo');?></a><span>|</span><a href="<?php echo site_url('tesis-posgrado.html');?>"><?php echo lang('investigacion_tesis_titulo');?></a></div>
	</div>
	
	<?php foreach($list as $project): ?>
	<article class="listados">
	  <div class="investigaciones_info">
		<?php 
		  $imgType = 3;
		  $width = 100;
		  $height = 100;
		  ?>
		<?php if(!is_null($project->avatar)): ?>
		  <img alt="<?php echo $project->name;?>" src="<?php echo thumbnail_image(base_url(), $project->avatar->getPath() , $width, $height, $imgType); ?>" />
		<?php endif; ?>	
			<ul>
				<li class="investigaciones_name"><?php echo $project->name;?></li>
				<li><?php echo html_purify(html_entity_decode(($project->responsables)));?></li>
			</ul>		
		</div><!-- integrantes info -->
			  <?php
	  $url_help = "proyecto/".$project->id . "/" . url_title($project->name, '-', TRUE) . ".html";
	  ?>
	  <a href="<?php echo site_url($url_help);?>" class="vermas fancybox fancybox.iframe"><?php echo lang('proyecto_ver_mas');?></a>	
	</article><!-- integrantes -->	
	<?php endforeach;?>
	  
				
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