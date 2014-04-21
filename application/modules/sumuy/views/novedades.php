<h1><?php echo lang('novedades_titulo');?></h1>
<div class="content">
  <div class="novedades_left">
    <img src="<?php echo base_url(); ?>assets/sumuy/images/novedades.png" class="titl_novedades">
    <?php 
    $url_help = $destacada->id . "/" . url_title($destacada->nombre, '-', TRUE) . ".html";
    $imgType = 1;
    $width = 346;
    $height = 241;
    ?>
    <div class="novedades_left_destacado">
      <h3><?php echo $destacada->nombre;?></h3>
      <?php if(!is_null($destacada->avatar)): ?>
          <img alt="<?php echo $destacada->nombre;?>" src="<?php echo thumbnail_image(base_url(), $destacada->avatar->getPath() , $width, $height, $imgType); ?>" />
          <?php else: ?>
          <img src="<?php echo base_url(); ?>assets/sumuy/images/destacado_novedades.jpg">
      <?php endif; ?>
      
      <p><?php echo word_limiter(html_purify(html_entity_decode($destacada->descripcion)), 60); ?></p>
      <a href="<?php echo site_url('novedad/'.$url_help);?>" class="ver_mas"><?php echo lang('novedades_vermas');?></a><div class="clear"></div>
    </div><!--NOVEDADES LEFT DESTACADO-->
  </div><!--NOVEDADES LEFT-->
  <div class="novedades_right">
    <?php foreach($listado as $novedad): 
        $url_help = $novedad->id . "/" . url_title($novedad->nombre, '-', TRUE) . ".html";
      ?>
      <div class="listado_novedades">
        <h3><?php echo $novedad->nombre;?></h3>
        <p><?php echo word_limiter(html_purify(html_entity_decode($novedad->copete)), 60); ?></p>
        <a href="<?php echo site_url('novedad/'.$url_help);?>" class="ver_mas"><?php echo lang('novedades_vermas');?></a><div class="clear"></div>
      </div><!--LISTADO NOVEDAD-->  
    <?php endforeach; ?>
    
    <?php if($pages > 1): ?>
    <div class="paginado">
      <?php for ($i = 1; $i <= $pages; $i++): ?>
          <?php if($i == $page): ?>
              <a class="current" href="javascript:void(0)"><?php echo $i;?></a>
          <?php else: ?>
              <a href="<?php echo site_url("novedades-".$i.".html");?>" title="Pagina <?php echo $i;?>"><?php echo $i;?></a>
          <?php endif; ?>
      <?php endfor; ?>
    </div>                  
    <?php endif; ?>
  </div><!--NOVEDADES RIGHT-->
</div><!--CONTENT-->