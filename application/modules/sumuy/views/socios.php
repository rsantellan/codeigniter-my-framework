<h1><?php echo lang('socios_titulo');?></h1>
<div class="content">
  <div class="content_left content_left_border">
    <h2 class="large"><?php echo lang('socios_cuota_titulo');?></h2>
    <?php echo lang('socios_texto');?>
    <p><?php echo lang('socios_texto_afiliacion');?><a href="/inscripcion.php"><?php echo lang('socios_texto_link');?></a></p>
    <a href="javascript:void(0);" class="recomendar inline" id="recomendar" title="Recomendar">recomendar</a>
  </div><!--LEFT HOME-->
  <div class="content_right">
    <img src="<?php echo base_url(); ?>assets/sumuy/images/socios.jpg">
  </div><!--RIGHT HOME-->
</div><!--CONTENT-->
<?php echo $this->load->view('sumuy/recomendar', array('site_url' =>site_url($this->uri->uri_string())));?>

<script src="<?php echo base_url(); ?>assets/sumuy/js/parsley.min.js"></script>
<script src="<?php echo base_url(); ?>assets/sumuy/js/es.js"></script>
<script src="<?php echo base_url(); ?>assets/sumuy/js/jquery.colorbox-min.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/sumuy/css/colorbox.css">
<script>
  $(function(){
    $("#recomendar").colorbox({inline:true, href:"#recomendar_container"});
  });
</script>