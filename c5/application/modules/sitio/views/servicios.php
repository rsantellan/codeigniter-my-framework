<div class="content_ext">
    <div class="content">
        <h1><?php echo lang('servicios_titulo');?></h1>
        <div class="subtitle">
          <?php $counter = 0; ?>
          <?php foreach($category_list as $servicio): ?>
          <?php $url_help = $servicio->id."/".url_title($servicio->name, '-', TRUE);?>
            <a class="<?php echo ($categoria->id == $servicio->id) ? "current" : "";?>" href="<?php echo site_url('servicios/'.$url_help); ?>">
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
        <h2><?php echo html_purify(html_entity_decode($categoria->name));?></h2>
        <p><?php echo html_purify(html_entity_decode($categoria->description));?></p>
        <?php 
            $counter = 1;
            $width = 300;
            $height = 165;
        ?>
        <?php foreach($proyectos as $proyecto): ?>
          <?php $url_help = $proyecto->id."/".url_title($proyecto->nombre, '-', TRUE).".html";?>
          <div class="bloque <?php echo ($counter % 2 == 0)? "bloque_center" : ""; ?>">
            <a href="<?php echo site_url('proyecto/'.$url_help); ?>">
              <?php if(!is_null($proyecto->avatar)): ?>
                <img alt="<?php echo $proyecto->nombre;?>" src="<?php echo base_url().thumbnail_image($proyecto->avatar->getPath() , $width, $height, 3); ?>" class="img_servicios" />
              <?php else: ?>
                <img src="<?php echo base_url();?>assets/images/default_servicios.jpg" class="img_servicios" />
              <?php endif; ?>
              
            </a>
            <h3>
            <a href="<?php echo site_url('proyecto/'.$url_help); ?>"><?php echo character_limiter($proyecto->nombre, 45)?></a></h3>
          </div><!--BLOQUE-->
          <?php 
            $counter ++;
            if($counter > 3) $counter = 1;
          ?>
        <?php endforeach; ?>
   </div><!--CONTENT-->
</div><!--CONTENT-EXT-->
