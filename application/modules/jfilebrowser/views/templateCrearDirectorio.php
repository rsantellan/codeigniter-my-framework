<h3 class="titulo2"><?php echo lang('jfilebrowser_crear directorio'); ?></h3>
<form id="form12" action="<?php echo site_url("jfilebrowser/crearDirectorio"); ?>" method="post" enctype="multipart/form-data" name="form12" onsubmit="crearDirectorio(this); return false;">
  <table border="0" cellspacing="0" cellpadding="0" class="princip">
    <tr>
      <td valign="top" class="log_in_label"><?php echo lang('jfilebrowser_directorio'); ?></td>
      <td class="log_in_field"><input name="nombre" type="text" id="nombre" value="" size="35" /></td>
    </tr>
    <tr>
      <td colspan="2" class="enviar_td">
        <input name="enviar3" type="submit" id="enviar3" value="<?php echo lang('jfilebrowser_crear'); ?>" />
      </td>
    </tr>
  </table>
</form>
