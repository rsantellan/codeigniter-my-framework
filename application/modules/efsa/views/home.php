<div class="slider_content">
  <img src="<?php echo base_url(); ?>assets/efsa/images/logo.png" class="logo">
  <section id="slideshow">
	<div class="container">
	  <div class="c_slider"></div>
	  <div class="slider">
		<figure>
		  <img src="<?php echo base_url(); ?>assets/efsa/images/image_home.jpg" alt="" width="980" height="210" />						
		</figure><!--
		--><figure>
		  <img src="<?php echo base_url(); ?>assets/efsa/images/image_integrantes.jpg" alt="" width="980" height="210" />						
		</figure><!--
		--><figure>
		  <img src="<?php echo base_url(); ?>assets/efsa/images/image_investigaciones.jpg" alt="" width="980" height="210" />					
		</figure><!--
		--><figure>
		  <img src="<?php echo base_url(); ?>assets/efsa/images/image_publicaciones.jpg" alt="" width="980" height="210" />
		</figure><!--
		--><figure>
		  <img src="<?php echo base_url(); ?>assets/efsa/images/image_docencia.jpg" alt="" width="980" height="210" />
		</figure><!--										
		--><figure>
		  <img src="<?php echo base_url(); ?>assets/efsa/images/image_divulgacion.jpg" alt="" width="980" height="210" />					
		</figure>
	  </div><!-- slider -->
	</div><!-- container -->	
  </section>
</div><!--slider content-->
<div class="clear"></div>
<div class="content">
  <div class="content_int">
	<div class="novedades_home">
	  <div class="bg_novedades">
		<h1 class="home">noticias</h1>
	  </div>
	  <div class="novedad">
		<p>Se aprueba proyecto de Extensión CIANOBACTERIAS: ANTIGUAS, PROBLEMÁTICAS Y SORPRENDENTES.</p>	
		<!--<a href="noticias.php">ver ></a>-->
	  </div><!-- novedad -->	
	  <div class="novedad">
		<p>Día del Patrimonio en Jaureguiberry: Conociendo a los pequeños organismos que habitan en el estuario...</p>	
		<!--<a href="noticias.php">ver ></a>-->
	  </div><!-- novedad -->	
	  <div class="novedad">
		<p>Iniciamos el CICLO DE SEMINARIOS EN ECOLOGÍA FUNCIONAL ACUÁTICA.</p>	
		<!--<a href="noticias.php">ver ></a>-->
	  </div><!-- novedad -->							
	  <!--<a href="/novedades.php" class="botones bt_novedades">ver mas</a>-->
	</div><!-- novedades home -->
	<div class="quieness_home">
	  <div class="bg_quieness">
		<h1 class="home"><?php echo lang('home_quien_somos');?></h1>
	  </div>
	  <?php echo lang('home_quien_somos_texto');?>
	</div><!-- quienes somos -->
  </div><!-- content_int -->	
  <div class="clear"></div>
  <?php echo $this->load->view('efsa/footer') ?>
</div><!-- content -->	