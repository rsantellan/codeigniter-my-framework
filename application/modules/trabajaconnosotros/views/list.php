<h3>Listado de noticias</h3>
<table id="table_data">
  <thead>
    <tr>
      <th>
        Nombre Apellido
      </th>
      <th>
        Email
      </th>
      <th>
        Telefono
      </th>
      <th>
        Posición
      </th>
      <th>
        Subido el
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
        <?php echo $object->nombre;?> <?php echo $object->apellido;?>
      </td>
      <td>
        <?php echo $object->email;?>
      </td>
      <td>
        <?php echo $object->phone;?>
      </td>
      <td>
        <?php $first = true; ?>
        <?php if($object->quimicofarmaceuticorecibido == 1): ?>
          Químicos farmacéuticos
          <?php $first = false; ?>
        <?php endif; ?>
        <?php if($object->quimicofarmaceuticoestudiante == 1): 
          if(!$first)
          {
            echo ',';
          }
          else
          {
            $first = false;
          }
          ?>
          
          Estudiantes de Química farmacéutica
        <?php endif; ?>
        <?php if($object->quimicotecnologorecibido == 1): 
          if(!$first)
          {
            echo ',';
          }
          else
          {
            $first = false;
          }
          ?>
          Tecnólogos químicos
        <?php endif; ?>
        <?php if($object->quimicotecnologoestudiante == 1): 
          if(!$first)
          {
            echo ',';
          }
          else
          {
            $first = false;
          }
          ?>
          Estudiantes de Tecnologóa Química
        <?php endif; ?>
        <?php if($object->mantenimientomecanico == 1): 
          if(!$first)
          {
            echo ',';
          }
          else
          {
            $first = false;
          }
          ?>
          Mantenimiento mecánico
        <?php endif; ?>
        <?php if($object->operariopreparador == 1): 
          if(!$first)
          {
            echo ',';
          }
          else
          {
            $first = false;
          }
          ?>
          Operarios/Preparadores
        <?php endif; ?>
        <?php if($object->depositologisticaexpedicion == 1): 
          if(!$first)
          {
            echo ',';
          }
          else
          {
            $first = false;
          }
          ?>
          Personal para depósito/logística/expedición
        <?php endif; ?>
        <?php if($object->limpieza == 1): 
          if(!$first)
          {
            echo ',';
          }
          else
          {
            $first = false;
          }
          ?>
          Limpiadores/Auxiliares de limpieza
        <?php endif; ?>
        <?php if($object->comprascomercionexterios == 1): 
          if(!$first)
          {
            echo ',';
          }
          else
          {
            $first = false;
          }
          ?>
          Compras/Comercio Exterior
        <?php endif; ?>
        <?php if($object->ventascomercialpromocion == 1): 
          if(!$first)
          {
            echo ',';
          }
          else
          {
            $first = false;
          }
          ?>
          Ventas /Comercial /Promoción
        <?php endif; ?>
        <?php if($object->administrativosfinancieroscontable == 1): 
          if(!$first)
          {
            echo ',';
          }
          else
          {
            $first = false;
          }
          ?>
          Administrativos /Financieros /Contables
        <?php endif; ?>
        <?php if($object->sistemainformatica == 1): 
          if(!$first)
          {
            echo ',';
          }
          else
          {
            $first = false;
          }
          ?>
          Sistemas / Informática
        <?php endif; ?>
        <?php if($object->recepcionistasecretaria == 1): 
          if(!$first)
          {
            echo ',';
          }
          else
          {
            $first = false;
          }
          ?>
          Recepcionistas / Telefonistas / Secretarias
        <?php endif; ?>
        <?php if($object->cientificoinvestigadores == 1): 
          if(!$first)
          {
            echo ',';
          }
          else
          {
            $first = false;
          }
          ?>
          Científicos / Investigadores
        <?php endif; ?>
        <?php if($object->estudiantessinexperiencia == 1): 
          if(!$first)
          {
            echo ',';
          }
          else
          {
            $first = false;
          }
          ?>
          Estudiantes de carreras de grado o técnicas sin experiencia laboral
        <?php endif; ?>
      </td>
      <td>
        <?php echo date ("d/m/Y h:ia",strtotime($object->created_at)); ?>
      </td>
      <td>
        <a href="<?php echo site_url("noticias/edit/".$object->id);?>">
          Mostrar
        </a>
      </td>
    </tr>
      
    <?php endforeach; ?>
  </tbody>
</table>

<hr/>



<script type="text/javascript">
    $(document).ready(function() {
        $("a.colorbox_link").colorbox({
            'width' : '40%',
            'height' : '80%',
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