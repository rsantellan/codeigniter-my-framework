<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">Tesises</h1>
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
                  Titulo
                </th>
                <th>
                  Autor
                </th>
                <th>
                  Orientadores
                </th>
                <th>
                  Acciones
                </th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($list as $object): ?>
                <tr id="table_row_<?php echo $object->id;?>">
                  <td>
                    <?php echo ($object->titulo); ?>
                  </td>
                  <td>
                    <?php echo ($object->subtitulo); ?>
                  </td>
                  <td>
                    <?php echo ($object->orientadores); ?>
                  </td>
                  <td>
                    <a class="btn btn-default" href="<?php echo site_url("tesises/edit/" . $object->id); ?>">
                      Editar
                    </a>
                    <a class="btn btn-danger" href="javascript:void(0)" onclick="return adminManager.getInstance().deleteTableRow(<?php echo $object->id;?>, 'Esta seguro de querer eliminar?', '<?php echo site_url("tesises/delete/".$object->id);?>');">
                      Eliminar
                    </a>
                  </td>
                </tr>

              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
        <a class="btn btn-primary" href="<?php echo site_url("tesises/add"); ?>">Agregar</a>
        <a class="colorbox_link_sort btn btn-info" href="<?php echo site_url("ordenable/sort/tesises/tesis/titulo");?>" >
          Ordenar
        </a>
      </div>
    </div>
  </div>
</div>

