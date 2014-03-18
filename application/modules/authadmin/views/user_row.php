<tr id="user_row_<?php echo $user->id;?>">
  <td>
    <?php echo ($user->username); ?>
  </td>
  <td>
    <?php echo ($user->email); ?>
  </td>
  <td>
    <?php echo ($user->profile); ?>
  </td>
  <td>
    <?php echo ($user->activated == 1)? "Si" : "No"; ?>
  </td>
  <td>
	<?php echo ($user->banned == 1)? "Si" : "No"; ?>
  </td>
  <td>
    <?php echo ($user->created); ?>
  </td>
  <td>
    <a href="<?php echo site_url('authadmin/edit/'.$user->id); ?>">
      Editar
    </a>  
    <?php if($user->activated == "0"): ?>
    <a onclick="userManager.getInstance().sendDataViaAjax('<?php echo site_url('authadmin/activate/'.$user->id); ?>');" href="javascript:void(0)">
      Activar
    </a>
    <?php else: ?>
    <a onclick="userManager.getInstance().sendDataViaAjax('<?php echo site_url('authadmin/deactivate/'.$user->id); ?>');" href="javascript:void(0)">
      Des Activar
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
    <?php //var_dump($user); ?>
  </td>
</tr>