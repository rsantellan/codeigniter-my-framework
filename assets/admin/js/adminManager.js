adminManager = function(options){
	this._initialize();

}

adminManager.instance = null;

adminManager.getInstance = function (){
	if(adminManager.instance == null)
		adminManager.instance = new adminManager();
	return adminManager.instance;
}

adminManager.prototype = {
    _initialize: function(){
        
    },
    
    deleteTableRow: function(itemId, text, mUrl)
    {
      if(confirm(text))
      {
        $.ajax({
          url: mUrl,
          data: {id: itemId},
          type: 'post',
          dataType: 'json',
          complete: function(json)
          {
            var obj = jQuery.parseJSON(json.responseText);
            //console.info(obj);
            if(obj.response == "OK")
            {
              //console.info($('#table_row_' + itemId))
              $('#table_row_' + itemId).fadeOut(500, function() { $(this).remove(); });
            }
          }        
        });
      }
      return false;
    },
    
    startFancyInPage: function(fancy_class)
    {
      $("."+fancy_class).colorbox({});
    },
    
    startFancyIframeInPage: function(fancy_class)
    {
      $("."+fancy_class).colorbox({
          'iframe' : true,
          'width' : '60%',
          'height' : '80%'
      });
    },
    
    destroySortable: function(sortable_id)
    {
      // Remove the sortable feature to prevent bad state caused by unbinding all
      $("#"+sortable_id).sortable('destroy');
      // Unbind all event handlers!
      $("#"+sortable_id).unbind();  
    },
    
    startSortable: function(sortable_id, sortable_url)
    {
      var usingArguments = arguments;
      $("#"+sortable_id).sortable(
      {
        axis: 'y', 
        update : function () { 
          var order = $('#'+sortable_id).sortable('serialize'); 
          parent.$('#cboxLoadingGraphic').show();
          for (var i=2; i < usingArguments.length; i++) {
            order = order + "&" + usingArguments[i];
          }
          $.ajax({
            url: sortable_url,
            data: order,
            type: 'post',
            dataType: 'json',
            complete: function()
            {
                parent.$('#cboxLoadingGraphic').hide();
                //parent.$.colorbox.resize();
            }        
          });

        }
      });
    },
    
    startBasicTextAreasTinyMCE: function()
    {
      tinyMCE.init({

          // General options
          mode : "textareas",
          theme: "modern",
          plugins: [
              "advlist autolink lists link image charmap print preview hr anchor pagebreak",
              "searchreplace wordcount visualblocks visualchars code fullscreen",
              "insertdatetime media nonbreaking save table contextmenu directionality",
              "emoticons template paste textcolor filemanager"
          ],
          toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
          toolbar2: "print preview media | forecolor backcolor emoticons",
		  image_advtab: true,
          forced_root_block : "",
          force_br_newlines : true,
          force_p_newlines : false

      });
    }
}

/**
 * Esta funcion es la mas basica de los fancy. Hace que todo lo que se .colorbox_link se inizialice
 */
function startFancyLinks()
{
  adminManager.getInstance().startFancyInPage('colorbox_link');
  adminManager.getInstance().startFancyIframeInPage('colorbox_link_iframe');
}



$(document).ready(function() { 
  if($("a.colorbox_link_sort").length > 0)
  {
    $("a.colorbox_link_sort").colorbox({
      'width' : '40%',
      'height' : '80%',
      'onClosed' : function(){window.location.reload();},
      'iframe' : true
    });
  }
  
});
