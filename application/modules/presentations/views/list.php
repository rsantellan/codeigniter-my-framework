<h3>Listado de Presentaciones del producto "<?php echo $productObject->name;?>"[<?php echo ($lang == 'es')? "Español" : "Ingles";?>]
    <?php $otherLang = ($lang == 'es')? "en" : "es"; ?>
    <a href="<?php echo site_url('presentations/index/'.$otherLang.'/'.$productId); ?>">
        <img src="<?php echo base_url();?>assets/celsius/images/<?php echo $otherLang;?>.png" width="25px" height="25px"/>
    </a>
</h3>
<table id="table_data">
  <thead>
    <tr>
      <th>
        Identificador
      </th>  
      <th>
        Presentación
      </th>
      <th>
        Nombre generico
      </th>
      <th>
        Componente activo
      </th>
      <th>
        Accion
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
        <?php echo ($object->id); ?>
      </td>
      <td>
        <?php echo ($object->name); ?>
      </td>
      <td>
        <?php echo ($object->genericname);?>
      </td>
      <td>
        <?php echo ($object->activecomponent);?>
      </td>
      <td>
        <?php echo ($object->action);?>
      </td>
      <td>
        <a href="<?php echo site_url("presentations/edit/".$lang."/".$object->id);?>">
          Editar
        </a>
        <a href="javascript:void(0)" onclick="return adminManager.getInstance().deleteTableRow(<?php echo $object->id;?>, 'Esta seguro de querer eliminar?', '<?php echo site_url("presentations/delete/".$object->id);?>');">
          Eliminar
        </a>
      </td>
    </tr>
      
    <?php endforeach; ?>
  </tbody>
</table>

<hr/>
<a href="<?php echo site_url("presentations/add/".$lang.'/'.$productId);?>">
  Agregar
</a>

<a class="colorbox_link iframe" href="<?php echo site_url("ordenable/sortMultipleWithParametersAndLang/presentations/presentation/products/product/presentations/presentation/retrieveByProduct/".$lang);?>" >
  Ordenar
</a>

<script type="text/javascript">
    $(document).ready(function() {
        $("a.colorbox_link").colorbox({
            'width' : '40%',
            'height' : '80%',
            'onClosed' : function(){window.location.reload();},
            'iframe' : true
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