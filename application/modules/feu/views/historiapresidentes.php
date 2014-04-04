<!-- Page Title -->
<section id="page-title">

    <div class="grid-bg">
        <div class="container"> <!-- 1080 pixels Container -->
            <div class="full-width columns">
                <h1><?php echo lang("historia_presidentes_titulo"); ?></h1>
            </div>
        </div>
    </div>

</section>

<!-- Page Content -->
<section id="page-content">

    <div class="container"> <!-- 1080 pixels Container -->

        <div class="full-width columns">
            <div class="gap mb-40px"></div>
				
            <h4 class="mb-20px"><?php echo lang("historia_presidentes_sub_titulo"); ?></h4>				

            <!-- Standard Table -->
            <table class="standard mb-50px">
                <thead>
                    <tr>
                        <th><?php echo lang("historia_presidentes_imagen"); ?></th>
                        <th><?php echo lang("historia_presidentes_nombre"); ?></th>
                        <th><?php echo lang("historia_presidentes_periodo"); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($listado as $objeto): ?>
                    <tr>
                        <td>
                            <?php 
                                $imgType = 1;
                                $width = 100;
                                $height = 100;
                                
                                $imgTypeBig = 2;
                                $widthBig = 600;
                                $heightBig = 600;
                                ?>
                              <?php if(!is_null($objeto->avatar)): ?>
                                <a href="<?php echo thumbnail_image(base_url(), $objeto->avatar->getPath() , $widthBig, $heightBig, $imgTypeBig); ?>" data-rel="prettyPhoto" title="<?php echo $objeto->name;?>">
                                  <img alt="<?php echo $objeto->name;?>" src="<?php echo thumbnail_image(base_url(), $objeto->avatar->getPath() , $width, $height, $imgType); ?>" />
                                </a>
                                <?php else: ?>
                                <img src="<?php echo base_url();?>assets/feu/images/icons/big/icon-user.png" />
                            <?php endif; ?>
                        </td>
                        <td><?php echo html_purify(html_entity_decode($objeto->name)); ?></td>
                        <td><?php echo ($objeto->periodo); ?></td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
            <!-- end Standard Table -->
        </div>
    </div>
</section>
    

