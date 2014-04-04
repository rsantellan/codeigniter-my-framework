<!-- Page Title -->
<section id="page-title">

    <div class="grid-bg">
        <div class="container"> <!-- 1080 pixels Container -->
            <div class="full-width columns">
                <h1><?php echo lang("clubes_titulo"); ?></h1>
            </div>
        </div>
    </div>

</section>

<!-- Page Content -->
<section id="page-content">

    <div class="container"> <!-- 1080 pixels Container -->

        <div class="full-width columns">
            <div class="gap mb-40px"></div>
				
            <h4 class="mb-20px"><?php echo lang("clubes_sub_titulo"); ?></h4>				

            <!-- Standard Table -->
            <table class="standard mb-50px">
                <thead>
                    <tr>
                        <th><?php echo lang("clubes_numero"); ?></th>
                        <th><?php echo lang("clubes_nombre"); ?></th>
                        <th><?php echo lang("clubes_localidad"); ?></th>
                        <th><?php echo lang("clubes_camiseta"); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($listado as $objeto): ?>
                    <tr>
                        <td><?php echo $objeto->number; ?></td>
                        <td><?php echo $objeto->name; ?></td>
                        <td><?php echo $objeto->location; ?></td>
                        <td>
                            <?php 
                                $imgType = 1;
                                $width = 100;
                                $height = 100;
                                $imgTypeBig = 2;
                                $widthBig = 600;
                                $heightBig = 600;
                                ?>
                              <?php if(!is_null($objeto->avatarCamiseta)): ?>
                                <a href="<?php echo thumbnail_image(base_url(), $objeto->avatarCamiseta->getPath() , $widthBig, $heightBig, $imgTypeBig); ?>" data-rel="prettyPhoto" title="<?php echo $objeto->name;?>">
                                  <img alt="<?php echo $objeto->name;?>" src="<?php echo thumbnail_image(base_url(), $objeto->avatarCamiseta->getPath() , $width, $height, $imgType); ?>" />
                                </a>
                                <?php else: ?>
                                <img src="<?php echo base_url();?>assets/feu/images/icons/big/icon-user.png" />
                            <?php endif; ?>
                        </td>
                        
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
            <!-- end Standard Table -->
        </div>
    </div>
</section>
    

