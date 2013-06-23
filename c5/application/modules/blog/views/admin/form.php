<?php // Change the css classes to suit your needs    

$attributes = array('class' => '', 'id' => '');
echo form_open('blog/blogadmin/save', $attributes); ?>

<input id="id" type="hidden" name="id"  value="<?php echo $object->getId() ?>"  />



<div class="grid_8">
  <p>
    <label for="title">title <span class="required">*</span></label>
    <br /><input id="title" type="text" name="title" maxlength="255" value="<?php echo $object->getTitle() ?>"  />
  </p>
</div>
<div class="grid_16">
  <p>
    <label for="body">body</label>
	<?php echo form_textarea( array( 'name' => 'body', 'class' => 'myTinyMce', 'rows' => '5', 'cols' => '80', 'value' => $object->getBody(true) ) )?>  
  </p>
</div>
<div class="grid_5">
  <p>
    <label for="visible">visible</label>
    <input type="checkbox" id="visible" name="visible" value="1" class="" <?php echo ($object->isVisible())? 'checked="checked"' : '';; ?>> 
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

var config = {
/*
  filebrowserBrowseUrl : '/browser/browse/type/all',
  filebrowserUploadUrl : '/browser/upload/type/all',
  filebrowserImageBrowseUrl : '<?php echo site_url('upload/index/1');?>',
  filebrowserImageUploadUrl : '/browser/upload/type/image',
  filebrowserWindowWidth  : 800,
  filebrowserWindowHeight : 500,
*/  
  extraPlugins : 'timestamp,abbr',
  toolbar:
    [
        { name: 'clipboard', items : [ 'Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo' ] },
        { name: 'editing', items : [ 'Find','Replace','-','SelectAll','-','SpellChecker', 'Scayt' ] },
        { name: 'basicstyles', items : [ 'Bold','Italic','Underline','Strike','Subscript','Superscript','-','RemoveFormat' ] },
        '/',
        { name: 'paragraph', items : [ 'NumberedList','BulletedList','-','Outdent','Indent','-','Blockquote','CreateDiv',
        '-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','-','BidiLtr','BidiRtl' ] },
        { name: 'links', items : [ 'Link','Unlink','Anchor' ] },
        { name: 'insert', items : [ 'Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak','Iframe' ] },
        '/',
        { name: 'styles', items : [ 'Styles','Format','Font','FontSize' ] },
        { name: 'colors', items : [ 'TextColor','BGColor' ] },
        { name: 'document', items : [ 'Source' ] },
        { name: 'tools', items : [ 'About', '-', 'Timestamp', 'Abbr' ] }
    ],
  coreStyles_bold: { element : 'b' },
  coreStyles_italic : { element : 'i' },
  fontSize_style :
  {
    element		: 'font',
    attributes	: { 'size' : '#(size)' }
  }
};


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