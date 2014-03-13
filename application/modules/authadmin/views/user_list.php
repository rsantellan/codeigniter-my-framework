<h1>Usuario</h1>
<?php if($this->session->flashdata('message')): ?>
  	<p id="salvado_ok" class="success">Usuario creado con exito</p>
  	
  	<script type="text/javascript">
 		$(document).ready(function() {
 			$("#salvado_ok").fadeOut(3000);
 		});
 	</script>
  <hr/>
<?php endif; ?>
  
<table id="table_data">
  <thead>
    <tr>
      <th>
        Usuario
      </th>
      <th>
        Mail
      </th>
      <th>
        Permiso
      </th>
      <th>
        Activo
      </th>
      <th>
        Baneado
      </th>
      <th>
        Creado el
      </th>
      <th>
        Acciones
      </th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($user_rows as $row):
      echo $row;
    endforeach;
    ?>
  </tbody>
</table>

<div class="clear"></div>

<a href="<?php echo site_url("authadmin/register");?>">
  Agregar enviando e-mail
</a>
<a href="<?php echo site_url("authadmin/registerPassword");?>">
  Agregar con contraseña
</a>

<a href="<?php echo site_url("authadmin/addByExcel");?>">
  Carga masiva por excel
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