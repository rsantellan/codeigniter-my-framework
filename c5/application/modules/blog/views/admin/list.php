<h4>Listado de posts</h4>
<?php //var_dump($list);?>
<table>
  <thead>
    <tr>
    <th>
        Titulo
      </th>
	  <th>
        Cuerpo
      </th>
     <th>
        Visible
      </th>
      <th>
        Creado
      </th>
      <th>
        Actualizado
      </th>
      <th>
        Acciones
      </th>
    </tr>
  </thead>
  <tbody>
    
    <?php foreach($list as $blog): ?>
    
      <tr id="table_row_<?php echo $blog->id;?>">
      <td>
          <?php echo ($blog->title); ?>
        </td>
        <td>
          <?php echo html_entity_decode($blog->body); ?>
        </td>
        <td>
          <?php echo ($blog->visible == "0" || $blog->visible == 0)? "NO" : "SI"; ?>
        </td>
        <td>
          <?php echo ($blog->created_at); ?>
        </td>
        <td>
          <?php echo ($blog->updated_at); ?>
        </td>
        <td>
          <a href="<?php echo site_url("blog/blogadmin/edit/".$blog->id);?>">
            Editar
          </a>
          <a href="javascript:void(0)" onclick="return adminManager.getInstance().deleteTableRow(<?php echo $blog->id;?>, 'Esta seguro de querer eliminar el registro?', '<?php echo site_url("testmulti/multiadmin/delete/".$blog->id);?>');">
            Eliminar
          </a>
        </td>
      </tr>
      
    <?php endforeach; ?>
  </tbody>
</table>


<a href="<?php echo site_url("blog/blogadmin/add");?>">
  Agregar
</a>