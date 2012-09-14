<h3 class="titulo2"><?php echo lang('jfilebrowser_subir archivo'); ?></h3>

<form action="index.php?uploadFile=1" method="post" enctype="multipart/form-data" name="form1">
  <div class="centrar"><?php echo lang('jfilebrowser_archivos permitidos'); ?> <strong><?php echo lang('jfilebrowser_archivos permitidos extensiones'); ?></strong></div>
  <table border="0" cellspacing="0" cellpadding="0" class="princip">
    <tr>
        <td valign="top" class="log_in_label"><?php echo lang('jfilebrowser_archivo'); ?><span class="form_requerido">*</span></td>
        <td class="log_in_field"><input name="upload[]" type="file" class="multi" maxlength="5" id="subir_imagen_fl"/></td>
    </tr>
    <tr>
        <td valign="top" class="log_in_label"><?php echo lang('jfilebrowser_directorio'); ?>*</td>
        <td class="log_in_field">
            <select name="directorio" id="categoria">
              <option value="-1"><?php echo lang('jfilebrowser_seleccione un directorio'); ?></option>
              <?php foreach($directorios as $directorio):?>
              <option value="<?php echo $directorio->name; ?>" <?php if($id == $directorio->name) echo 'selected="selected"';?>><?php echo $directorio->name; ?></option>
              <?php endforeach; ?>
            </select>
        </td>
    </tr>
    <tr>
        <td colspan="2" class="enviar_td">
            <input name="enviar" type="submit" id="enviar" value="<?php echo lang('jfilebrowser_upload file');?>" onclick="this.value = '<?php echo lang('jfilebrowser_esperar');?>'; this.disable = true; this.style.color = '#9d9b93';"/>
            <span id="loading_imag_sp"></span>
        </td>
    </tr>
  </table>
</form>
