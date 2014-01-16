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
        </style>
	</head>
  <body>
    
    <h1>Ordenar</h1>
    <ul id="sortable">
      
      <?php foreach($sort_list as $object): ?>
        <li id="listItem_<?php echo $object->id;?>" class="ui-state-default">
          <span class="ui-icon ui-icon-arrowthick-2-n-s"></span><?php echo $object->name;?> <?php //echo $acta->ordinal; ?>
        </li>
      <?php endforeach; ?>
    </ul>
    
    <input type="hidden" id="sort_ajax" value="<?php echo site_url("proyectos/proyectoadmin/applySort");?>" />
    
    <script type="text/javascript">

    $(document).ready(function() { 
      adminManager.getInstance().startSortable('sortable', '<?php echo site_url("ordenable/applySort");?>', 'module=<?php echo $sort_module;?>', 'model=<?php echo $sort_model;?>');
    });

    </script>
  </body>
</html>
