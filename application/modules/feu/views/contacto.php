<!-- Page Title -->
<section id="page-title">
    <div class="grid-bg">
        <div class="container"> <!-- 1080 pixels Container -->
            <div class="full-width columns">
                <h1><?php echo lang('contacto_titulo');?></h1>
            </div>
        </div>
    </div>
</section>
<!-- Page Content -->
<section id="page-content" class="sidebar-layout">

    <div class="container"> <!-- 1080 pixels Container -->

        <!-- Content with left-aligned Sidebar -->
        <div class="columns-wrapper sb-left">

            <!-- Sidebar (left aligned) -->
            <aside id="sidebar" class="one-fourth columns page-left-col">

                <!-- Contact Information -->
                <div class="widget-bigger" data-smallscreen="yes"> <!-- show widget on a small-screen mobile device: "yes" or "no" -->

                    <section class="contact-info mb-30px">

                        <div class="ci-title colored-text-2"><?php echo lang('contacto_label_telefono');?></div>
                        <p class="phone-number"><?php echo lang('contacto_telefono');?></p>

                        <div class="ci-title colored-text-2"><?php echo lang('contacto_label_email');?></div>
                        <p><a href="mailto:<?php echo lang('contacto_email');?>"><?php echo lang('contacto_email');?></a></p>

                        <div class="ci-title colored-text-2"><?php echo lang('contacto_label_direccion');?></div>
                        <p class="bold remove-bottom"><?php echo lang('contacto_direccion_nombre');?></p>
                        <p><?php echo lang('contacto_direccion');?></p>

                    </section>
                    <!-- Social Icons -->
                    <ul class="social-icons small-size round clearfix">
                        <li class="facebook"><a href="#" title="Facebook">Facebook</a></li>
                        <li class="twitter"><a href="#" title="Twitter">Twitter</a></li>
                    </ul>
                </div>
            </aside>
            <!-- end Sidebar -->
            <!-- Page Right Column -->
            <section id="main-content" class="three-fourths columns page-right-col adaptive-map"> <!-- inner grid 840 pixels wide -->
                <div class="full-width columns">
					<?php if(!$messageSend): ?>
					
					<div class="contact-form-wrapper">

                        <h4><?php echo lang('contacto_subtitulo_titulo');?></h4>

                        <p class="mb-25px"><?php echo lang('contacto_subtitulo_mensaje');?></p>
                        <div class="small-bar colored"></div>
						<?php echo form_error('name'); ?>
						<?php echo form_error('email'); ?>
						<?php echo form_error('message'); ?>
                        <!-- Contact Form -->
                        <form action="<?php echo site_url('contacto.html')?>" method="post" id="contact-form" class="form">

                            <div>
                                <label for="sender-name"><strong><?php echo lang('contacto_nombre');?></strong> <span>*</span></label>
                                <input name="name" type="text" value="" id="sender-name" required>
                            </div>

                            <div>
                                <label for="sender-email"><strong><?php echo lang('contacto_label_email');?></strong> <span>*</span></label>
                                <input name="email" type="email" value="" id="sender-email" required>
                            </div>

                            <div>
                                <label><strong><?php echo lang('contacto_consulta');?></strong> <span>*</span></label>
                                <textarea name="message" rows="10" cols="75" required></textarea>
                            </div>

                            <div id="submit-button">
                                <input name="submit" type="submit" value="Enviar mensaje" class="button">
                            </div>

                        </form>
                        <!-- end Contact Form -->

                    </div> <!-- end contact-form-wrapper -->
					<?php else: ?>
					<div class="contact-form-wrapper">
					  <h3><?php echo lang('contacto_titulo_mensaje_enviado_con_exito');?></h3>
					  <p><?php echo lang('contacto_mensaje_enviado_con_exito');?></p>
					</div>
					<?php endif;?>
                    <!-- Google Map -->
                    <div id="map" class="google-map"><span>loading map...</span></div>
                    <script>
                        // Custom parameters for Google Maps
                        //var gm_params = {infoTitle: 'Some another title goes here...', infoString: '<h5 class="gm-title">DNS Ipsum Studios</h5><p>Integer at enim cursus massa malesuada tempus fringilla.</p>'};
                    </script>
                </div>

            </section>
            <!-- end Page Right Column -->

        </div> <!-- end columns-wrapper sb-left -->

    </div>

</section>
<!-- end Page Content -->
