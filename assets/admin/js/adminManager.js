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
      $("."+fancy_class).fancybox({});
    },
    
    startSortable: function(sortable_id, sortable_url)
    {
      $("#"+sortable_id).sortable(
      {
        axis: 'y', 
        update : function () { 
          var order = $('#'+sortable_id).sortable('serialize'); 
          parent.$.fancybox.showActivity();
          $.ajax({
            url: sortable_url,
            data: order,
            type: 'post',
            dataType: 'json',
            complete: function()
            {
                parent.$.fancybox.hideActivity();
                parent.$.fancybox.resize();
            }        
          });

        }
      });
    }
}