<?php if(isset($errores)) echo $errores;?>
<?php echo form_open_multipart('authadmin/proccesExcel');?>

<input type="file" name="datafile" size="20" />

<br /><br />

<input type="submit" value="upload" />
<?php echo form_close();?>