<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<title>Sortable</title>
        <script type="text/javascript" src="<?php echo base_url() . "assets/admin/js/jquery-1.7.1.min.js";?>"></script>
        <script type="text/javascript" src="<?php echo base_url() . "assets/admin/js/jquery-ui-1.8.16.custom.min.js";?>"></script>
        <script type="text/javascript" src="<?php echo base_url() . "assets/admin/js/adminManager.js";?>"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() . "assets/admin/css/eggplant/jquery-ui-1.8.18.custom.css";?>" />
        <style>
          #sortable { 
            list-style-type: none; 
            margin-left: auto;
            margin-right: auto;
            padding: 0; 
            width: 80%; 
          }
          #sortable li { margin: 0 3px 3px 3px; padding: 0.4em; padding-left: 1.5em; font-size: 0.8em; height: 18px; }
          #sortable li span { position: absolute; margin-left: -1.3em; }
          h1{
            margin-left: auto;
            margin-right: auto;
            width: 35%;
          }
          div.clear{
              clear: both;
          }
          form{
              text-align: center;
          }
        </style>
	</head>
  <body>
    <h1>Ordenar</h1>
    <form onsubmit="return retrieveData(this)" action="<?php echo site_url("ordenable/retrieveData");?>">
          <?php echo form_dropdown('parameterid', $parameter_list_data, ''); ?>
          <input type="hidden" name="sort_module" value="<?php echo $sort_module;?>" />
          <input type="hidden" name="sort_model" value="<?php echo $sort_model;?>"/>
          <input type="hidden" name="sort_attribute" value="<?php echo $sort_attribute;?>"/>
          <div class="clear"></div>
          <input type="submit" value="buscar" />
    </form>
    <hr/>  
    
    <ul id="sortable">
    </ul>
    
    <script type="text/javascript">
           function retrieveData(form)
           {
               parent.$('#cboxLoadingGraphic').show();
               $.ajax({
                  url: $(form).attr('action'),
                  data: $(form).serialize(),
                  type: 'post',
                  dataType: 'json',
                  success: function(json){
                    if(json.response == "OK")
                    {
                        adminManager.getInstance().destroySortable('sortable');
                        $("#sortable").empty();
                        for(var k in json.list)
                        {
                            var jsonObject = json.list[k];
                            var li_data = '<li id="listItem_'+jsonObject.id+'" class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>'+jsonObject.name+'</li>';
                            $("#sortable").append(li_data);
                            adminManager.getInstance().startSortable('sortable', '<?php echo site_url("ordenable/applySort");?>', 'module=<?php echo $sort_module;?>', 'model=<?php echo $sort_model;?>');
                        }
                    }
                    else 
                    {
                        alert('Un error ocurrio en el servidor intente mas tarde.');
                    }
                  }, 
                  complete: function()
                  {
                      parent.$('#cboxLoadingGraphic').hide();
                      parent.$.colorbox.resize();
                      
                  }
                });

                return false;
           }
    
    </script>
  </body>
</html>
