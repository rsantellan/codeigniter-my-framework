<h3>Listado de Veterinarios</h3>
<table id="table_data">
  <thead>
    <tr>
      <th>
        Nombre
      </th>  
      <th>
        Contacto
      </th>
      <th>
        Es jefe
      </th>
      <th>
        Acciones
      </th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($objects_list as $object): ?>
    <tr id="table_row_<?php echo $object->id;?>">
      <td>
        <?php echo ($object->name); ?>
      </td>
      <td>
        <?php echo ($object->contacto); ?>
      </td>
      <td>
        <?php echo ($object->isboss == 1)? 'Si': 'No';?>  
      </td>
      <td>
        <a href="<?php echo site_url("veterinariosadmin/edit/".$object->id);?>">
          Editar
        </a>
        <a href="javascript:void(0)" onclick="return adminManager.getInstance().deleteTableRow(<?php echo $object->id;?>, 'Esta seguro de querer eliminar?', '<?php echo site_url("veterinariosadmin/delete/".$object->id);?>');">
          Eliminar
        </a>
      </td>
    </tr>
      
    <?php endforeach; ?>
  </tbody>
</table>

<hr/>
<a href="<?php echo site_url("veterinariosadmin/add");?>">
  Agregar
</a>

<a class="fancy_link iframe" href="<?php echo site_url("ordenable/sort/veterinariosadmin/veterinario/name");?>" >
  Ordenar
</a>

<script type="text/javascript">
    $(document).ready(function() {
        $("a.fancy_link").fancybox({
            'onClosed': function(){window.location.reload();}
        });
        $('#table_data').dataTable({
            "aaSorting": [],
            "oLanguage" : {
                "sProcessing":     "Procesando...",
                "sLengthMenu":     "Mostrar _MENU_ registros",
                "sZeroRecords":    "No se encontraron resultados",
                "sEmptyTable":     "Ningún dato disponible en esta tabla",
                "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix":    "",
                "sSearch":         "Buscar:",
                "sUrl":            "",
                "sInfoThousands":  ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst":    "Primero",
                    "sLast":     "Último",
                    "sNext":     "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                }
            }
        });
    });
</script>