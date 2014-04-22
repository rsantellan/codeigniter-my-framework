<h1><?php echo lang('novedades_titulo');?></h1>
<div class="content">
  <div class="novedades_desarrollo">
    <h3><?php echo $novedad->getNombre();?></h3>
    <?php echo html_purify(html_entity_decode($novedad->getDescripcion())); ?>
    <?php if(count($media) > 0): ?>
    <ul>
      <?php foreach($media as $mediacontent): ?>
      <li>
        <a href="<?php echo site_url('descargar/'.$mediacontent->ac_id.'/'.url_title($mediacontent->ac_name, '-', TRUE) . ".html");?>"><?php echo $mediacontent->ac_name;?></a>
          <?php //var_dump($mediacontent);?>
      </li>
      <?php endforeach;?>
    </ul>
    <?php endif; ?>
    <a href="javascript:void(0);" class="recomendar inline" id="recomendar" title="Recomendar">recomendar</a>
  </div><!--NOVEDADES DESARROLLO-->
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