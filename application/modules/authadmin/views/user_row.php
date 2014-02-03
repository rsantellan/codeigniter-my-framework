<tr id="user_row_<?php echo $user->id;?>">
  <td>
    <?php echo ($user->username); ?>
  </td>
  <td>
    <?php echo ($user->email); ?>
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
    <?php if($user->activated == "0"): ?>
    <a href="<?php echo site_url('authadmin/activate/'.$user->id); ?>">
      Activar
    </a>
    <?php else: ?>
    <a href="<?php echo site_url('authadmin/deactivate/'.$user->id); ?>">
      Des Activar
    </a>
    <?php endif; ?>
    <?php if($user->banned == "0"): ?>
    <a href="<?php echo site_url('authadmin/banUser/'.$user->id); ?>">
      Bannear
    </a>
    <?php else: ?>
    <a href="<?php echo site_url('authadmin/unbanUser/'.$user->id); ?>">
      Des Bannear
    </a>
    <?php endif; ?>
    <a href="<?php echo site_url('authadmin/change_email/'.$user->id); ?>">
      Cambiar mail
    </a>
    <a href="<?php echo site_url('authadmin/resetPassword/'.$user->id); ?>">
      Resetear pass
    </a>
    <?php if($delete):?>
    <a href="<?php echo site_url('authadmin/deleteUser/'.$user->id); ?>">
      Eliminar
    </a>
    <?php endif; ?>
    <?php //var_dump($user); ?>
  </td>
</tr>