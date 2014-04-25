<a href="<?php echo site_url('authadmin/edit/'.$user->id); ?>">
  Editar
</a>  
<?php if($user->activated == "0"): ?>
<a onclick="userManager.getInstance().sendDataViaAjax('<?php echo site_url('authadmin/activate/'.$user->id); ?>');" href="javascript:void(0)">
  Activar
</a>
<?php else: ?>
<a onclick="userManager.getInstance().sendDataViaAjax('<?php echo site_url('authadmin/deactivate/'.$user->id); ?>');" href="javascript:void(0)">
  Desactivar
</a>
<?php endif; ?>
<?php if($user->banned == "0"): ?>
<a onclick="userManager.getInstance().sendDataViaAjax('<?php echo site_url('authadmin/banUser/'.$user->id); ?>');" href="javascript:void(0)">
  Bannear
</a>
<?php else: ?>
<a onclick="userManager.getInstance().sendDataViaAjax('<?php echo site_url('authadmin/unbanUser/'.$user->id); ?>');" href="javascript:void(0)">
  Des Bannear
</a>
<?php endif; ?>
<a class="colorbox_link_modal" href="<?php echo site_url('authadmin/change_email/'.$user->id); ?>">
  Cambiar mail
</a>
<a href="javascript:void(0)" onclick="userManager.getInstance().sendDataViaAjax('<?php echo site_url('authadmin/resetPassword/'.$user->id); ?>');">
  Resetear pass
</a>
<?php if($delete):?>
<a href="javascript:void(0)" onclick="userManager.getInstance().sendDataViaAjax('<?php echo site_url('authadmin/deleteUser/'.$user->id); ?>');">
  Eliminar
</a>
<?php endif; ?>