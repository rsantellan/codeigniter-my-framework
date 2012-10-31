<h4>Listado de proyectos</h4>
<?php //var_dump($list);?>
<table>
  <thead>
    <tr>
    <th>
        Nombre
      </th>
	  <th>
        Cliente
      </th>
     <th>
        Descripcion
      </th>
     <th>
        Tipo de trabajo
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
    
    <?php foreach($list as $proyectos): ?>
    
      <tr id="table_row_<?php echo $proyectos->id;?>">
        <td>
          <?php echo ($proyectos->nombre); ?>
        </td>
        <td>
          <?php echo ($proyectos->cliente); ?>
        </td>
        <td>
          <?php echo html_entity_decode($proyectos->descripcion); ?>
        </td>
        <td>
          <?php echo html_entity_decode($proyectos->tipo_de_trabajo); ?>
        </td>
        <td>
          <?php echo ($proyectos->created_at); ?>
        </td>
        <td>
          <?php echo ($proyectos->updated_at); ?>
        </td>
        <td>
          <a href="<?php echo site_url("proyectos/proyectoadmin/edit/".$proyectos->id);?>">
            Editar
          </a>
          <a href="javascript:void(0)" onclick="return adminManager.getInstance().deleteTableRow(<?php echo $proyectos->id;?>, 'Esta seguro de querer eliminar el registro?', '<?php echo site_url("proyectos/proyectoadmin/delete/".$proyectos->id);?>');">
            Eliminar
          </a>
        </td>
      </tr>
      
    <?php endforeach; ?>
  </tbody>
</table>


<a href="<?php echo site_url("proyectos/proyectoadmin/add");?>">
  Agregar
</a>

<a class="fancy_link iframe" href="<?php echo site_url("proyectos/proyectoadmin/sort");?>" >
  Ordenar
</a>

<script type="text/javascript">

$(document).ready(function() { 
  adminManager.getInstance().startFancyInPage('fancy_link');
});

</script>