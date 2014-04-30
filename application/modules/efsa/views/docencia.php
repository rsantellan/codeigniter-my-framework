<div class="banner_header">
  <img src="<?php echo base_url(); ?>assets/efsa/images/logo.png" class="logo">
  <img src="<?php echo base_url(); ?>assets/efsa/images/image_docencia_1.jpg">
</div><!--slider content-->
<div class="clear"></div>
<div class="content">
  <div class="content_int">
	<div class="bg_docencia">
	  <h1 class="home"><?php echo lang('docencia_titulo');?></h1>
	</div>									
	<div class="texts">
	  <?php echo lang('docencia_texto');?>
	</div><!-- texts -->	
	<a href="<?php echo site_url('docencia-postgrado.html');?>" class="botones bt_docencia"><?php echo lang('docencia_ver_cursos');?></a>													
  </div><!-- content_int -->	
  <div class="clear"></div>
  <?php echo $this->load->view('efsa/footer') ?>
</div><!-- content -->	
