<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">Facilidades</h1>
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
                  Nombre
                </th>
                <th>
                  Acciones
                </th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($list as $object): ?>
                  <td>
                    <?php echo ($object->name); ?>
                  </td>
				  <td>
                    <a class="btn btn-default" href="<?php echo site_url("efsalaboratorios/edit/" . $object->id); ?>">
                      Editar
                    </a>
                    <a class="btn btn-danger" href="javascript:void(0)" onclick="return adminManager.getInstance().deleteTableRow(<?php echo $object->id;?>, 'Esta seguro de querer eliminar?', '<?php echo site_url("efsalaboratorios/delete/".$object->id);?>');">
                      Eliminar
                    </a>
                  </td>
                </tr>

              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
        <a class="btn btn-primary" href="<?php echo site_url("efsalaboratorios/add"); ?>">Agregar</a>
      </div>
    </div>
  </div>
</div>

