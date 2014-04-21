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
    <a href="#" class="recomendar">recomendar</a>
  </div><!--NOVEDADES DESARROLLO-->
</div><!--CONTENT-->