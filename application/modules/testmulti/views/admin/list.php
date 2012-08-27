<h4>Listado de contactos</h4>
<?php //var_dump($list);?>
<table>
  <thead>
    <tr>
    <th>
        Color
      </th>
	  <th>
        Fecha
      </th>
     <th>
        Nombre
      </th>
      <th>
        Acciones
      </th>
    </tr>
  </thead>
  <tbody>
    
    <?php foreach($list as $multi): ?>
    
      <tr id="table_row_<?php echo $multi->id;?>">
      <td>
          <?php echo ($multi->color); ?>
        </td>
        <td>
          <?php echo ($multi->fecha); ?>
        </td>
        <td>
          <?php echo ($multi->lang . " - " .$multi->name); ?>
        </td>
        <td>
          <a href="<?php echo site_url("testmulti/multiadmin/edit/".$multi->id);?>">
            Editar
          </a>
          <a href="javascript:void(0)" onclick="return adminManager.getInstance().deleteTableRow(<?php echo $multi->id;?>, 'Esta seguro de querer eliminar el registro?', '<?php echo site_url("testmulti/multiadmin/delete/".$multi->id);?>');">
            Eliminar
          </a>
        </td>
      </tr>
      
    <?php endforeach; ?>
  </tbody>
</table>


<a href="<?php echo site_url("testmulti/multiadmin/add");?>">
  Agregar
</a>