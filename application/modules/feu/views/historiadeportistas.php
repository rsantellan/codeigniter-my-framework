<!-- Page Title -->
<section id="page-title">

    <div class="grid-bg">
        <div class="container"> <!-- 1080 pixels Container -->
            <div class="full-width columns">
                <h1><?php echo lang("historia_deportistas_titulo"); ?></h1>
            </div>
        </div>
    </div>

</section>

<!-- Page Content -->
<section id="page-content">

    <div class="container"> <!-- 1080 pixels Container -->

        <div class="full-width columns">
            <div class="gap mb-40px"></div>
				
            <h4 class="mb-20px"><?php echo lang("historia_deportistas_sub_titulo"); ?></h4>				

            <!-- Standard Table -->
            <table class="standard mb-50px">
                <thead>
                    <tr>
                        <th><?php echo lang("historia_deportistas_imagen"); ?></th>
                        <th><?php echo lang("historia_deportistas_nombre"); ?></th>
                        <th><?php echo lang("historia_deportistas_periodo"); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($listado as $objeto): ?>
                    <tr>
                        <td>
                            <?php 
                                $imgType = 3;
                                $width = 100;
                                $height = 100;
                                ?>
                              <?php if(!is_null($objeto->avatar)): ?>
                                <img alt="<?php echo $objeto->name;?>" src="<?php echo thumbnail_image(base_url(), $objeto->avatar->getPath() , $width, $height, $imgType); ?>" class="img_servicios" />
                                <?php else: ?>
                                <img src="<?php echo base_url();?>assets/feu/images/icons/big/icon-user.png" />
                            <?php endif; ?>
                        </td>
                        <td><?php echo ($objeto->name); ?></td>
                        <td><?php echo ($objeto->periodo); ?></td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
            <!-- end Standard Table -->
        </div>
    </div>
</section>
    

