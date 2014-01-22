<h4>Listado de Categorias</h4>
<?php //var_dump($list);?>
<table>
  <thead>
    <tr>
      <th>
        Nombre
      </th>
      <th>
        Descripción
      </th>
	  <th>
        Acciones
      </th>
    </tr>
  </thead>
  <tbody>
    
    <?php foreach($list as $categoria): ?>
    
      <tr id="table_row_<?php echo $categoria->id;?>">
        <td>
          <?php echo ($categoria->name); ?>
        </td>
        <td>
          <?php $aux = html_purify(html_entity_decode($categoria->description));?>
          <?php echo character_limiter($aux, 100); ?>
        </td>
        <td>
          <a href="<?php echo site_url("categorias/categoriasadmin/edit/".$categoria->id);?>">
            Editar
          </a>
          <a href="javascript:void(0)" onclick="return adminManager.getInstance().deleteTableRow(<?php echo $categoria->id;?>, 'Esta seguro de querer eliminar el registro?', '<?php echo site_url("categorias/categoriasadmin/delete/".$categoria->id);?>');">
            Eliminar
          </a>
        </td>
      </tr>
      
    <?php endforeach; ?>
  </tbody>
</table>


<a href="<?php echo site_url("categorias/categoriasadmin/add");?>">
  Agregar
</a>

<a class="colorbox_link iframe" href="<?php echo site_url("categorias/categoriasadmin/sort");?>" >
  Ordenar
</a>

<script type="text/javascript">

$(document).ready(function() { 
  adminManager.getInstance().startFancyInPage('colorbox_link');
});

</script>