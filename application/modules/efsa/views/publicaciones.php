<div class="banner_header">
  <img src="<?php echo base_url(); ?>assets/efsa/images/logo.png" class="logo">
  <img src="<?php echo base_url(); ?>assets/efsa/images/image_publicaciones.jpg">
</div><!--slider content-->
<div class="clear"></div>
<div class="content">
  <div class="content_int">
	<?php if ($type == 1): ?>
  	<div class="bg_titles bg_titles_publicaciones">
  	  <h1 class="float_left"><?php echo lang('publicacion_cientifica_titulo'); ?></h1>
  	  <div class="sub_links"><a href="<?php echo site_url('publicaciones-libros.html');?>"><?php echo lang('publicacion_libros_link');?></a></div>			
  	</div>
	<?php else: ?>
  	<div class="bg_titles bg_titles_publicaciones">
  	  <h1 class="float_left"><?php echo lang('publicacion_libros_titulo'); ?></h1>
  	  <div class="sub_links"><a href="<?php echo site_url('publicaciones.html');?>"><?php echo lang('publicacion_cientifica_link');?></a></div>			
  	</div>
	<?php endif; ?>
	<div id="accordion">
	  <?php foreach ($list as $letter => $data): ?>
  	  <div class="publicaciones_accordion">
  		<h3><a href="#"><img src="<?php echo base_url(); ?>assets/efsa/images/bullet_<?php echo $letter; ?>.png" class="float_left" /><img src="<?php echo base_url(); ?>assets/efsa/images/dropdown.png" class="float_right" /></a></h3>
  		<div>
  		  <ul>
			  <?php foreach ($data as $obj): ?>
				<li><?php echo html_purify(html_entity_decode($obj->description, ENT_COMPAT | 0, 'UTF-8')); ?></li>
			  <?php endforeach; ?>
  		  </ul>
  		</div>
  	  </div><!-- PUBLICACION -->   

	  <?php endforeach; ?>
	</div><!--ACCORDION-->		
  </div><!-- content_int -->	
  <div class="clear"></div>
  <?php echo $this->load->view('efsa/footer') ?>
  <script>
	$(function() {
	  $( "#accordion" ).accordion({
		header: "h3",
		heightStyle: "content"
	  });
	});
  </script>