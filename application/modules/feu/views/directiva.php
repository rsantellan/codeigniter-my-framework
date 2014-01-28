<!-- Page Title -->
<section id="page-title">

    <div class="grid-bg">
        <div class="container"> <!-- 1080 pixels Container -->
            <div class="full-width columns">
                <h1><?php echo lang("directiva_titulo"); ?></h1>
            </div>
        </div>
    </div>

</section>

<!-- Page Content -->
<section id="page-content">

    <div class="container"> <!-- 1080 pixels Container -->

        <div class="full-width columns">
            <div class="gap mb-40px"></div>
				
            <h4 class="mb-20px"><?php echo lang("directiva_sub_titulo"); ?></h4>				

            <!-- Standard Table -->
            <table class="standard mb-50px">
                <thead>
                    <tr>
                        <th><?php echo lang("directiva_cargo"); ?></th>
                        <th><?php echo lang("directiva_nombre"); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong><?php echo lang("directiva_presidente"); ?></strong></td>
                        <td><?php echo lang("directiva_presidente_nombre"); ?></td>
                    </tr>
                    <tr>
                        <td><strong><?php echo lang("directiva_vice_presidente"); ?></strong></td>
                        <td><?php echo lang("directiva_vice_presidente_nombre"); ?></td>
                    </tr>
                    <tr>
                        <td><strong><?php echo lang("directiva_secretario"); ?></strong></td>
                        <td><?php echo lang("directiva_secretario_nombre"); ?></td>
                    </tr>
                    <tr>
                        <td><strong><?php echo lang("directiva_pro_secretario"); ?></strong></td>
                        <td><?php echo lang("directiva_pro_secretario_nombre"); ?></td>
                    </tr>
                    <tr>
                        <td><strong><?php echo lang("directiva_tesorero"); ?></strong></td>
                        <td><?php echo lang("directiva_tesorero_nombre"); ?></td>
                    </tr>
                    <tr>
                        <td><strong><?php echo lang("directiva_pro_tesorero"); ?></strong></td>
                        <td><?php echo lang("directiva_pro_tesorero_nombre"); ?></td>
                    </tr>
                </tbody>
            </table>
            <!-- end Standard Table -->
			<hr class="divider-pattern wave colored">
        </div>
		
		<div class="one-half columns mb-20px">
		  <h6><?php echo lang("directiva_comision_fiscal_titulo"); ?></h6>
		  <?php echo lang("directiva_comision_fiscal_descripcion"); ?>
		</div>
		<div class="one-half columns mb-20px">
		  <h6><?php echo lang("directiva_secretarias_titulo"); ?></h6>
		  <?php echo lang("directiva_secretarias_descripcion"); ?>
		</div>
    </div>
</section>
    

