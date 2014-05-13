<div class="banner_header">
  <img src="<?php echo base_url(); ?>assets/efsa/images/logo.png" class="logo">
  <img src="<?php echo base_url(); ?>assets/efsa/images/image_integrantes.jpg">
</div><!--slider content-->
<div class="clear"></div>
<div class="content">
  <div class="content_int">
	<div class="bg_titles bg_titles_integrantes">
	  <?php if($type == 1): ?>
		<h1 class="float_left">
		  <?php echo lang('integrantes_docentes_titulo');?>
		</h1>
		<div class="sub_links"><a href="<?php echo site_url('investigadores-invitados.html');?>"><?php echo lang('integrantes_ver_investigadores');?></a><span>|</span><a href="<?php echo site_url('estudiantes.html');?>" ><?php echo lang('integrantes_ver_estudiantes');?></a></div>
	  <?php endif; ?>
	  <?php if($type == 2): ?>
		<h1 class="float_left">
		  <?php echo lang('integrantes_estudiantes_titulo');?>
		</h1>
		<div class="sub_links"><a href="<?php echo site_url('investigadores-invitados.html');?>"><?php echo lang('integrantes_ver_investigadores');?></a><span>|</span><a href="<?php echo site_url('integrantes.html');?>" ><?php echo lang('integrantes_ver_docentes');?></a></div>
	  <?php endif; ?>
	  <?php if($type == 3): ?>
		<h1 class="float_left">
		  <?php echo lang('integrantes_invitados_titulo');?>
		</h1>
		<div class="sub_links"><a href="<?php echo site_url('estudiantes.html');?>" ><?php echo lang('integrantes_ver_estudiantes');?></a><span>|</span><a href="<?php echo site_url('integrantes.html');?>" ><?php echo lang('integrantes_ver_docentes');?></a></div>
	  <?php endif; ?>
		
	</div>
	<?php foreach($list as $object): ?>
	  <article class="listados">
		  <div class="integrantes_info">
			  <?php 
				  $imgType = 3;
				  $width = 100;
				  $height = 100;
				  ?>
				<?php if(!is_null($object->avatar)): ?>
				  <img alt="<?php echo $object->name;?>" src="<?php echo thumbnail_image(base_url(), $object->avatar->getBasepath().$object->avatar->getPath() , $width, $height, $imgType); ?>" />
				  <?php else: ?>
				  <img src="<?php echo base_url();?>assets/images/noimage.png" class="img_servicios" width="<?php echo $width;?>" height="<?php echo $height;?>"/>
			  <?php endif; ?>
			  <ul>
				  <li class="integrantes_name"><?php echo $object->name;?></li>
				  <?php if(!empty($object->title)): ?>
				  <li><?php echo $object->title;?></li>
				  <?php endif;?>
				  <li><?php echo $object->location;?></li>
				  <li><?php echo lang('integrantes_contacto');?><a href="mailto:<?php echo $object->contact;?>?subject=Contacto desde el sitio web"><?php echo $object->contact;?></a></li>
				  <li class="integrantes_campo"><?php echo $object->area;?></li>
			  </ul>		
		  </div><!-- integrantes info -->
		  <?php
		  $url_help = "integrante/".$object->id . "/" . url_title($object->name, '-', TRUE) . ".html";
		  ?>
		  <a href="<?php echo site_url($url_help);?>" class="vermas fancybox fancybox.iframe"><?php echo lang('integrantes_ver_mas');?></a>	
	  </article><!-- integrantes -->
	<?php endforeach; ?>
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
