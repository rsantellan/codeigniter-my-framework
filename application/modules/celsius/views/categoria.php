<div class="menu_productos">
  <span><?php echo $category->name;?> |</span>
        <dl class="dropdown">
            <dt id="three-ddheader" onmouseover="ddMenu('three',1)" onmouseout="ddMenu('three',-1)" >Seleccione el producto</dt>
                <dd id="three-ddcontent" onmouseover="cancelHide('three')" onmouseout="ddMenu('three',-1)">
                    <ul>
                      <?php foreach($products as $product): ?>
                      <li>
                        <a href="#" <?php if($product->name == $usedProduct->name):?> class="current"<?php endif;?>>
                          <?php echo $product->name;?>
                        </a>
                      </li>  
                      <?php endforeach;?>
                    </ul>
                </dd>
        </dl>       
</div><!--menu productos-->
<div class="clear"></div> 
<div id="product_content" class="content_site content_internas">
  <h2 class="productos"><?php echo $usedProduct->name?></h2>
    <hr>
    <div class="receta">
      <?php if($usedProduct->receta == 1): ?>
        <span><?php echo lang('producto_receta');?></span>
        <img src="<?php echo base_url(); ?>assets/celsius/images/receta_blanca.jpg">
      <?php endif; ?>
      
    </div>
    <div class="envase_prodcuto">
      <?php 
            $imgType = 1;
            $width = 477;
            $height = 271;
            ?>
          <?php if(!is_null($usedProduct->avatar)): ?>
            <img alt="<?php echo $usedProduct->name;?>" src="<?php echo thumbnail_image(base_url(), $usedProduct->avatar->getPath() , $width, $height, $imgType); ?>" />
            <?php else: ?>
            <img src="<?php echo base_url();?>assets/images/noimage.png" width="<?php echo $width;?>" height="<?php echo $height;?>"/>
        <?php endif; ?>
    </div>
    <table class="productos">
      <tr>
        <th></th>
        <th><?php echo lang('producto_presentacion');?></th>
        <th><?php echo lang('producto_principio_activo');?></th>
        <th><?php echo lang('producto_accion');?></th>
        <th><?php echo lang('producto_especialidad');?></th>
        <th></th>
      </tr>
      <?php 
      $first = true;
      foreach($presentations as $presentation): 
        //var_dump($presentation);
      ?>
      <tr>
        <td class="producto_nombre"><?php echo ($first)?$usedProduct->name: '';?></td>
        <td><?php echo $presentation->name;?></td>
        <td><?php echo $presentation->activecomponent;?></td>
        <td><?php echo $presentation->action;?></td>
        <td><?php echo $category->name;?></td>
        <td>
          <?php if(!is_null($presentation->avatar)): ?>
            <?php //var_dump($presentation->avatar);?>
          <img src="<?php echo base_url(); ?>assets/celsius/images/pdf_icon.jpg">
          <a href="#">
            <?php echo lang('producto_prospecto');?>
          </a>
          <?php endif;?>
        </td>
      </tr>  
      <?php 
      $first = false;
      endforeach; 
      ?>
    </table>
    <h5><?php echo lang('producto_literatura');?></h5>
    <?php foreach($medicdata as $lit): ?>
    <?php //var_dump($lit);?>
      <div class="literatura">
        <img src="<?php echo base_url(); ?>assets/celsius/images/pdf_icon.jpg">
        <a href="#"><?php echo $lit->ac_name;?></a>
      </div>
    <?php endforeach; ?>
</div><!-- content -->
<div class="images_bottom">
  <img src="<?php echo base_url(); ?>assets/celsius/images/img_productos.jpg">
</div>