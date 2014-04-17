<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">Listado de contactos</h1>
  </div>
  <!-- /.col-lg-12 -->
</div>
<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-default">
      <div class="panel-body">
        <div class="table-responsive">
          <table id="table_data" class="table table-striped table-bordered table-hover">
            <thead>
              <tr>
                <th>
                  Direcci&oacute;n
                </th>
                <th>
                  Tipo
                </th>
               <th>
                  Nombre
                </th>
                <th>
                  Funci&oacute;n
                </th>
                <th>
                  Acciones
                </th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($list as $funcion => $arr): ?>
                <?php foreach($arr as $contacto): ?>
                <tr id="table_row_<?php echo $contacto->id;?>">
                  <td>
                    <?php echo ($contacto->direccion); ?>
                  </td>
                  <td>
                    <?php echo ($contacto->tipo); ?>
                  </td>
                  <td>
                    <?php echo ($contacto->nombre); ?>
                  </td>
                  <td>
                    <?php echo ($contacto->funcion); ?>
                  </td>
                  <td>
                    <a class="btn btn-default" href="<?php echo site_url("contacto/contactoadmin/editContacto/".$contacto->id);?>">
                      Editar
                    </a>
                    <a class="btn btn-danger" href="javascript:void(0)" onclick="return adminManager.getInstance().deleteTableRow(<?php echo $contacto->id;?>, 'Esta seguro de querer eliminar?', '<?php echo site_url("contacto/contactoadmin/deleteContacto/".$contacto->id);?>');">
                      Eliminar
                    </a>
                  </td>
                </tr>
                <?php endforeach; ?>  
                <?php endforeach; ?>
            </tbody>
          </table>
        </div>
        <a class="btn btn-primary" href="<?php echo site_url("contacto/contactoadmin/addContacto");?>">
          Agregar
        </a>
      </div>
    </div>
  </div>
</div>