<div class="banner_header">
  <img src="<?php echo base_url(); ?>assets/efsa/images/logo.png" class="logo">
  <img src="<?php echo base_url(); ?>assets/efsa/images/image_divulgacion.jpg">
</div><!--slider content-->
<div class="clear"></div>
<div class="content">
  <div class="content_int">
	<div class="bg_divulgacion">
	  <h1 class="home"><?php echo lang('extension_titulo');?></h1>
	</div>									
	<div class="texts">
	  <?php echo lang('extension_texto');?>
	</div><!-- texts -->	
	<a href="<?php echo site_url('extension-listado.html');?>" class="botones bt_divulgacion"><?php echo lang('extension_ver_listado');?></a>													
  </div><!-- content_int -->	
  <div class="clear"></div>
  <?php echo $this->load->view('efsa/footer') ?>
</div><!-- content -->	
