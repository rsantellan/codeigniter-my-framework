<div class="content_site content_internas">
  <h2>Resultados de b&uacute;squeda<span> / <?php echo $query;?> </span></h2>
  <hr class="titulos">
  <?php //var_dump($products); ?>
  <?php foreach($products as $product): 
  
    $category = $menuCategoryList[array_pop($product->categories)];
  $urlCategoriaProduct = $lang.'/categoria-producto/';
    if($lang == 'en')
      $urlCategoriaProduct = $lang.'/category-product/';
    $urlCategoriaProduct .= $category->id.'/'.$category->slug.'/'.$product->id.'/'.$product->slug.'.html';  
    
  ?>
  
  <a class="listado_links" href="<?php echo site_url($urlCategoriaProduct);?>">
    <?php echo $product->name;?>
  </a>
  <p>
    <?php 
    foreach($product->presentations as $presentation):
    ?>
    <strong><?php echo lang('producto_presentacion');?></strong> <?php echo $presentation->name;?><br/>
    <?php echo lang('producto_principio_activo');?> <?php echo $presentation->activecomponent;?><br/>
    <?php echo lang('producto_accion');?> <?php echo $presentation->action;?><br/>
    
    <?php
    endforeach;
    ?>
  </p>
  
  <?php endforeach; ?>
<!--  <a class="listado_links">
    link
  </a>
  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras et nibh nunc. Etiam feugiat purus sit amet odio eleifend, ornare rutrum lacus lacinia. Ut interdum felis a aliquam hendrerit. Quisque rhoncus metus nunc, ut porta leo dictum eget. Nunc aliquet mauris nisi, ut dignissim turpis iaculis sed.</p>-->


</div><!-- content -->