<nav class="nav_seccion_iniciada">
  <ul>
	<?php
	if($user->profile == 'medico' || $user->profile == 'admin'):  ?>
    <li><a href="<?php echo site_url($lang."/".(($lang =='es')?'casos-estudio' : 'study-case').".html");?>" <?php if($submenu == 'casos_estudio'):?> class="current"<?php endif;?>><?php echo lang('menu_casoestudio');?></a></li>
    <li>|</li>
    <li><a href="<?php echo site_url($lang."/".(($lang =='es')?'congresos' : 'congress').".html");?>" <?php if($submenu == 'congresos'):?> class="current"<?php endif;?>><?php echo lang('menu_congresos');?></a></li>
    <li>|</li>
    <li><a href="<?php echo site_url($lang."/".(($lang =='es')?'eventos' : 'events').".html");?>" <?php if($submenu == 'eventos'):?> class="current"<?php endif;?>><?php echo lang('menu_eventos');?></a></li>
	<?php endif;?>
	<?php
	if($user->profile == 'empleado' || $user->profile == 'admin'):  ?>
	  <?php if($user->profile == 'admin'): ?>
		<li>|</li>
	  <?php endif;?>
	  <li><a href="<?php echo site_url($lang."/".(($lang =='es')?'intranet' : 'intranet').".html");?>" <?php if($submenu == 'intranet'):?> class="current"<?php endif;?>><?php echo lang('menu_intranet');?></a></li>
	<?php endif;?>
  </ul>
</nav>