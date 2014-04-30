<footer>
  <div class="nav_footer">
	<ul>
	  <li><a href="#" <?php if ($menu == 'noticias'): ?> class="current"<?php endif; ?>><?php echo lang('footer_noticias');?></a></li>
	  <li><a href="<?php echo site_url('');?>" <?php if ($menu == 'home'): ?> class="current"<?php endif; ?>><?php echo lang('footer_quienes_somos');?></a></li>
	</ul>
	<div class="logos_footer">
	  <a href="http://www.universidad.edu.uy" target="blank"><img src="<?php echo base_url(); ?>assets/efsa/images/udelar.jpg"></a>
	  <a href="http://www.csic.edu.uy" target="blank"><img src="<?php echo base_url(); ?>assets/efsa/images/csic.jpg"></a>
	</div>
  </div><!-- nav footer-->
  <div class="links">
	<h3><?php echo lang('footer_interes');?></h3>
	<?php echo lang('footer_interes_lista');?>
	
  </div><!-- links -->
  <div class="contact_info">
	<?php echo lang('footer_contacto');?>
	
	</div><!-- contact info-->
</footer>