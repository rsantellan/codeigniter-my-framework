<div class="content_site content_internas">
  <h2>Resultados de b&uacute;squeda<span> / <?php echo $query;?> </span></h2>
  <hr class="titulos">
  <?php //var_dump($products); ?>
  <?php //var_dump($menuCategoryList);?>
  <?php foreach($products as $product): 
    $category = NULL;
    $prodCat = array_pop($product->categories);
    
    foreach($menuCategoryList as $mCat)
    {
      if($mCat->id == $prodCat)
      {
        $category = $mCat;
      }
    }
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
  <?php if(count($products) == 0): ?>
	<?php echo lang('producto_no_hay_resultados');?>
  <?php endif;?>

</div><!-- content -->