<h3>Listado de noticias</h3>
<table id="table_data">
  <thead>
    <tr>
      <th>
        Imagen
      </th>
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
    <?php foreach($objects_list as $object): ?>
    <tr id="table_row_<?php echo $object->id;?>">
          <td>
          <?php 
            $imgType = 3;
            $width = 100;
            $height = 100;
            ?>
          <?php if(!is_null($object->avatar)): ?>
            <img alt="<?php echo $object->name;?>" src="<?php echo thumbnail_image(base_url(), $object->avatar->getPath() , $width, $height, $imgType); ?>" class="img_servicios" />
            <?php else: ?>
            <img src="<?php echo base_url();?>assets/images/noimage.png" class="img_servicios" width="<?php echo $width;?>" height="<?php echo $height;?>"/>
        <?php endif; ?>
      </td>
        <td>
        <?php echo ($object->name); ?>
      </td>
      <td>
        <?php echo character_limiter(html_purify(html_entity_decode($object->description)), 100); ?>
      </td>
      <td>
        <a href="<?php echo site_url("noticias/edit/".$object->id);?>">
          Editar
        </a>
        <a href="javascript:void(0)" onclick="return adminManager.getInstance().deleteTableRow(<?php echo $object->id;?>, 'Esta seguro de querer eliminar?', '<?php echo site_url("noticias/delete/".$object->id);?>');">
          Eliminar
        </a>
      </td>
    </tr>
      
    <?php endforeach; ?>
  </tbody>
</table>

<hr/>
<a href="<?php echo site_url("noticias/add");?>">
  Agregar
</a>

<a class="colorbox_link iframe" href="<?php echo site_url("ordenable/sort/noticias/noticia/name");?>" >
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