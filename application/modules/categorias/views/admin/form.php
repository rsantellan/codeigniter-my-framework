<?php // Change the css classes to suit your needs    

$attributes = array('class' => '', 'id' => '');
echo form_open('categorias/categoriasadmin/save', $attributes); ?>

<input id="id" type="hidden" name="id"  value="<?php echo $object->getId() ?>"  />



<div class="grid_8">
  <p>
    <label for="nombre">Nombre <span class="required">*</span></label>
    <br /><input id="nombre" type="text" name="nombre" maxlength="255" value="<?php echo $object->getName() ?>"  />
  </p>
</div>
<div class="grid_16">
  <p>
    <label for="description">Descripción</label>
    <?php echo form_textarea( array( 'name' => 'descripcion', 'class' => 'myTinyMce', 'rows' => '5', 'cols' => '80', 'value' => $object->getDescription(true) ) )?>
  </p>
</div>

<div class="clear"></div>
<div class="grid_16">
  <p class="submit">
    <?php echo form_submit( 'submit', 'Guardar'); ?>
  </p>
</div>
<?php echo form_close(); ?>

<script type="text/javascript">

var options = {

          // General options

          mode : "textareas",

          theme : "advanced",
          
          editor_selector : "myTinyMce",
            
          plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist, spellchecker, jfilebrowser",
          
          // Theme options
          theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,formatselect,fontselect,fontsizeselect,|",
          theme_advanced_buttons2 : "bullist,numlist,|,link,unlink,code,|,insertdate,inserttime,preview,|,forecolor,backcolor,|fullscreen,|,cut,copy,paste,pastetext,pasteword,|",
          theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid",
          theme_advanced_buttons3 : "jfilebrowser",

          theme_advanced_toolbar_location : "top",

          theme_advanced_toolbar_align : "left",

          theme_advanced_statusbar_location : "bottom",

          theme_advanced_resizing : true,
          
          forced_root_block : "",
          
          force_br_newlines : true,
          force_p_newlines : false

      };
      
$(document).ready(function() {
    //$('.jquery_ckeditor').ckeditor(config);
    tinyMCE.init( options );
 });
 
</script>