<h1>tesis</h1>
<div class="content">
  <div class="content_left content_left_border">
    <?php foreach($listado as $tesis): ?>
      <div class="tesis">
        <h4><?php echo $tesis->titulo;?></h4>
        <p>
          <strong><?php echo $tesis->subtitulo;?></strong></br>
          <strong>Orientadores:</strong> <?php echo $tesis->orientadores;?></br>
          <?php if(!empty($tesis->academica)): ?>
            <strong>Director/a Académico/a:</strong> <?php echo $tesis->academica;?></br>
          <?php endif;?>
          <strong>Tribunal:</strong> <?php echo $tesis->tribunal;?></br>
          <strong>Fecha de defensa:</strong> <?php echo $tesis->defensa;?></p>
      </div><!--TESIS-->
    <?php endforeach;?>
    <a href="#" class="recomendar">recomendar</a>
    
    <?php if($pages > 1): ?>
    <div class="paginado">
      <?php for ($i = 1; $i <= $pages; $i++): ?>
          <?php if($i == $page): ?>
              <a class="current" href="javascript:void(0)"><?php echo $i;?></a>
          <?php else: ?>
              <a href="<?php echo site_url("tesis-".$i.".html");?>" title="Pagina <?php echo $i;?>"><?php echo $i;?></a>
          <?php endif; ?>
      <?php endfor; ?>
    </div>                  
    <?php endif; ?>
    <!--<div class="paginado paginado_tesis">
      <a href="#" class="current">1</a> - <a href="/tesis_page2.php">2</a>
    </div> -->                                               
  </div><!--LEFT HOME-->
  <div class="content_right">
    <img src="<?php echo base_url(); ?>assets/sumuy/images/tesis_1.jpg" class="img_doble">
    <img src="<?php echo base_url(); ?>assets/sumuy/images/tesis_2.jpg">
  </div><!--RIGHT HOME-->
</div><!--CONTENT-->