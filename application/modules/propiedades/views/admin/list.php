<h4>Listado de propiedades</h4>
<?php //var_dump($list);?>
<table>
  <thead>
    <tr>
    <th>
        Titulo
      </th>
	  <th>
        Detalle
      </th>
     <th>
        Ubicación
      </th>
     <th>
        Precio de venta
      </th>      
      <th>
        Precio de alquiler
      </th>
      <th>
        Alquilada
      </th>
      <th>
        Vendida
      </th>
      <th>
        Visibilidad
      </th>
      <th>
        Acciones
      </th>
    </tr>
  </thead>
  <tbody>
    
    <?php foreach($list as $propiedad): ?>
    <?php //var_dump($proyectos); ?>
      <tr id="table_row_<?php echo $propiedad->id;?>">
        <td>
          <?php echo ($propiedad->titulo); ?>
        </td>
        <td>
          <?php echo html_entity_decode($propiedad->detalle); ?>
        </td>
        <td>
          <?php echo html_entity_decode($propiedad->ubicacion); ?>
        </td>
        <td>
          <?php echo ($propiedad->moneda_venta == 0) ? "U\$S" : "\$" ; ?>
          <?php echo $propiedad->precio_venta; ?>
        </td>
        <td>
            <?php echo ($propiedad->moneda_alquiler == 0) ? "U\$S" : "\$" ; ?>
            <?php echo ($propiedad->precio_alquiler); ?>
        </td>
        <td>
          <?php echo ($propiedad->esta_alquilada == 0) ? "No" : "Si" ; ?>
        </td>
        <td>
          <?php echo ($propiedad->esta_vendida == 0) ? "No" : "Si" ; ?>
        </td>
        <td>
          <?php echo ($propiedad->visibilidad == 0) ? "No" : "Si" ; ?>
        </td>
        <td>
          
          <a href="<?php echo site_url("propiedades/propiedadesadmin/edit/".$propiedad->id);?>">
            Editar
          </a>
          <a href="javascript:void(0)" onclick="return adminManager.getInstance().deleteTableRow(<?php echo $propiedad->id;?>, 'Esta seguro de querer eliminar el registro?', '<?php echo site_url("propiedades/propiedadesadmin/delete/".$propiedad->id);?>');">
            Eliminar
          </a>
        </td>
      </tr>
      
    <?php endforeach; ?>
  </tbody>
</table>


<a href="<?php echo site_url("propiedades/propiedadesadmin/add");?>">
  Agregar
</a>

<a class="fancy_link iframe" href="<?php echo site_url("propiedades/propiedadesadmin/sort");?>" >
  Ordenar
</a>

<script type="text/javascript">

$(document).ready(function() { 
  adminManager.getInstance().startFancyInPage('fancy_link');
});

</script>