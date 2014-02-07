<div class="content_site content_internas_seccion_iniciada">
  <?php echo $this->load->view('navinterna'); ?>
  <?php
    $startUrl = "study-case";
    if($lang !== 'en')
    {
        $startUrl = 'casos-estudio';
    }
    $url_help = $lang."/".$startUrl."/%s.html";
    ?>
  <div class="casos_content">
    <?php foreach($objectlist as $object): ?>
    <div class="casos_estudio">
        <div class="casos_fecha">
          <?php echo date("j/n/Y",strtotime($object->studyDate));?>
        </div>
        <?php if(!is_null($object->avatar)): ?>
        
      <a href="<?php echo site_url(sprintf($url_help, $object->avatar->getId()));?>">
            <img src="<?php echo base_url();?>assets/celsius/images/pdf_icon.jpg"/>
        </a>
        <?php endif; ?>
        <div class="clear"></div>
        <h1><?php echo $object->name;?></h1>
        <p><?php echo html_purify(html_entity_decode($object->description));?></p>
    </div><!-- casos estudio -->
    <?php endforeach;?>  
  </div>
  <?php if($pages > 1): ?>
    <?php
    $firstDelta = 5;
    $lastDelta = 5;
    if($page < $firstDelta)
    {
      $lastDelta = $lastDelta + ($firstDelta - $page);
    }
    if($page > $pages - $lastDelta)
    {
      $aux = $pages - $page;
      if($aux == 0) $aux = $lastDelta;
      $firstDelta = $firstDelta + $aux;
    }
    $url_base = $lang."/".(($lang =='es')?'casos-estudio-' : 'study-case-')."%s.html";// "noticias-%s.html";
    ?>
    <div class="paginado">
    <?php for ($i = 1; $i <= $pages; $i++): ?>
      <?php if($i >= $page - $firstDelta && $i <= $page +$lastDelta): ?>
        <a href="<?php echo site_url(sprintf($url_base, $i));?>" title="Pagina <?php echo $i;?>" class="<?php echo ($i == $page)?'current': ''; ?>"><?php echo $i;?></a> 
        <?php if($i < $pages && $i < $page+$lastDelta):
          echo '|';
        endif;
        ?>

      <?php endif; ?>    
    <?php endfor; ?>
  <!--	<a href="#" class="current">1</a> | <a href="#">2</a> | <a href="#">3</a> | <a href="#">4</a> | <a href="#">5</a>-->
    </div><!--paginado-->	

  <?php endif;?>
</div>
