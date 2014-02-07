<nav class="nav_seccion_iniciada">
  <ul>
	<li><a href="<?php echo site_url($lang."/".(($lang =='es')?'casos-estudio' : 'study-case').".html");?>" <?php if($submenu == 'casoestudio'):?> class="current"<?php endif;?>><?php echo lang('menu_casoestudio');?></a></li>
	<li>|</li>
	<li><a href="<?php echo site_url($lang."/".(($lang =='es')?'congresos' : 'congress').".html");?>" <?php if($submenu == 'congresos'):?> class="current"<?php endif;?>><?php echo lang('menu_congresos');?></a></li>
	<li>|</li>
	<li><a href="<?php echo site_url($lang."/".(($lang =='es')?'eventos' : 'events').".html");?>" <?php if($submenu == 'eventos'):?> class="current"<?php endif;?>><?php echo lang('menu_eventos');?></a></li>
  </ul>
</nav>