<?php if(count($archivos) > 0){ ?>
    <ul class="imag_list_ul">
    <?php $i = 1; ?>
    <?php foreach($archivos as $archivo):
        //swith para las clases de los tipo de archivos
        switch($archivo['extension']){
            case 'jpg':
            case 'jpeg':
            case 'gif':
            case 'png':
                $mime_t = 'imagen';
            break;
            case 'pdf':
                $mime_t = 'pdf2';
            break;
            case 'doc':
            case 'docx':
                $mime_t = 'doc2';
            break;
            case 'xls':
            case 'xlsx':
                $mime_t = 'xls2';
            break;
            case 'ppt':
            case 'pptx':
                $mime_t = 'ppt2';
            break;
            default: $mime_t = 'gen2';
       } ?>

        <li>
            <?php if($mime_t == 'imagen') {?>
            <a href="javascript:void(0)" onclick="view('<?php echo $directorio; ?>', '<?php echo $archivo['original_name']; ?>'); return false;" title="<?php echo $archivo['original_name']; ?>"><img src="<?php echo base_url().thumbnail_image($archivo['original'] , 75, 75, 3);?>" width="75" height="75" alt="" /></a>
            <?php } else {?>
                <div class="archivos_list_dv">
                   <a href="javascript:void(0)" onclick="alert('TO DO'); return false;" title="<?php echo $archivo->getName() ?>"><img src="img/<?php echo $mime_t ?>.png" alt=""  width="75" height="75" /></a>
                </div>
            <?php } ?>

            <form id="form_<?php echo $i; ?>" method="post" action="/index.php/jfilebrowser/borrarArchivo" class="centrar_2" onsubmit="jFileBrowserDialog.confirmar('<?php echo lang('jfilebrowser_confirmar borrado'); ?>', '<?php echo $i; ?>'); return false">
                <input type="hidden" name="directorio" value="<?php echo $directorio; ?>" />
                <input type="hidden" name="name" value="<?php echo $archivo['original_name']; ?>" />
                <input type="hidden" name="view" value="thumbnails" />
                <input type="image" name="borrar_cat_bt" id="borrar_cat_bt" src="img/delete.png" />
            </form>
        </li>
    <?php $i++; ?>
    <?php endforeach; ?>

    </ul>
<?php } else echo lang('jfilebrowser_no hay archivos');?>
