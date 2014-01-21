<div class="content_ext">
  <?php //var_dump($proyecto);?>
    <div class="content">
        <h1><?php echo lang('servicios_titulo');?></h1>
        <div class="subtitle">
          <?php $counter = 0; ?>
          <?php foreach($category_list as $servicio): ?>
          <?php $url_help = $servicio->id."/".url_title($servicio->name, '-', TRUE);?>
            <a class="<?php echo ($proyecto->categoria_id == $servicio->id) ? "current" : "";?>" href="<?php echo site_url('servicios/'.$url_help); ?>">
              <?php echo ($servicio->name); ?>
            </a>
            <?php if($counter <= count($servicio)): ?>
              |
            <?php endif; ?>
            <?php $counter ++; ?>
          <?php endforeach; ?>
        </div>
    </div><!--CONTENT-->
    <hr />
    <div class="content">
        <h2><?php echo $proyecto->nombre;?></h2>
        <p><strong>Cliente</strong>: <?php echo $proyecto->cliente;?><br />
        <strong><?php echo html_purify(html_entity_decode($proyecto->tipo_de_trabajo));?></strong></p>
        <p><?php echo html_purify(html_entity_decode($proyecto->descripcion));?></p>
        <ul class="obras">
            <?php 
            $counter = 1;
            $width = 800;
            $height = 600;
            $width_listado = 300;
            $height_listado = 165;
            ?>
            <?php foreach($images as $image): ?>
              <li class="<?php echo ($counter % 2 == 0)? "obras_center" : ""; ?>">
                <a class="fancy_image_list" href="<?php echo thumbnail_image(base_url(), $image->path , $width, $height, 1); ?>" title="<?php echo $proyecto->nombre;?>" rel="detalles">
                  <img src="<?php echo thumbnail_image(base_url(), $image->path , $width_listado, $height_listado, 3); ?>" />
                </a>
              </li>
            <?php 
              $counter ++;
              if($counter > 3) $counter = 1;
            ?>
            <?php endforeach;?>
        </ul>
   </div><!--CONTENT-->
</div><!--CONTENT-EXT-->

