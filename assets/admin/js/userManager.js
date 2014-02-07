userManager = function(options){
	this._initialize();

}

userManager.instance = null;

userManager.getInstance = function (){
	if(userManager.instance == null)
		userManager.instance = new userManager();
	return userManager.instance;
}

userManager.prototype = {
    _initialize: function(){
        
    },
    
    sendDataViaAjax: function(url)
    {
      $.ajax({
          url: url,
          type: 'post',
          dataType: 'json',
          success: function(json){
              if(json.response == "OK")
              {
                alert(json.message);
                location.reload();
              }
              else 
              {
                alert(json.message);
              }
          }, 
          complete: function()
          {
            
          }
      });

      return false;
    }
    
}