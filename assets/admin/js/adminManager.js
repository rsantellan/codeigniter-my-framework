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
            if(obj.response == "OK")
            {
              $('#table_row_' + itemId).fadeOut(500, function() { $(this).remove(); });
            }
          }        
        });
      }
      return false;
    }
}