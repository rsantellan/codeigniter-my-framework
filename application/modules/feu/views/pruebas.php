<!-- Page Title -->
<section id="page-title">

    <div class="grid-bg">
        <div class="container"> <!-- 1080 pixels Container -->
            <div class="full-width columns">
                <h1>
                    <?php
                        if($pruebaCorta):
                            echo lang("prueba_titulo_corta");
                        else:
                            echo lang("prueba_titulo_larga");
                        endif;
                    ?>
                    <?php  ?>
                </h1>
            </div>
        </div>
    </div>

</section>

<!-- Page Content -->
<section id="page-content">

    <div class="container"> <!-- 1080 pixels Container -->

        <div class="full-width columns">
            <div class="gap mb-40px"></div>
				
            <h4 class="mb-20px">
                <?php
                if($pruebaCorta):
                    echo lang("prueba_sub_titulo_corta");
                else:
                    echo lang("prueba_sub_titulo_larga");
                endif;
                ?>
            </h4>				

            <!-- Standard Table -->
            <table class="standard mb-50px">
                <thead>
                    <tr>
                        <th><?php echo lang("prueba_nombre"); ?></th>
                        <th><?php echo lang("prueba_clasificados"); ?></th>
                        <th><?php echo lang("prueba_puntaje"); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($listado as $objeto): ?>
                    <tr>
                        <td><?php echo ($objeto->name); ?></td>
                        <td>
                            <?php if($objeto->clasificado !== null): ?>
                                <a class="fa fa-download" href="<?php echo site_url("prueba-descarga/".$objeto->clasificado->getId().".html");?>"><?php echo lang("prueba_clasificados"); ?></a>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if($objeto->puntaje !== null): ?>
                                <a class="fa fa-download" href="<?php echo site_url("prueba-descarga/".$objeto->puntaje->getId().".html");?>"><?php echo lang("prueba_puntaje"); ?></a>
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
    

