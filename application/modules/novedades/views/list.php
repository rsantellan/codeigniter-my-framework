<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">Noticias</h1>
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
              <?php foreach ($list as $object): ?>
                <tr id="table_row_<?php echo $object->id;?>">
                  <td>
                    <?php 
                      $imgType = 3;
                      $width = 100;
                      $height = 100;
                      ?>
                    <?php if(!is_null($object->avatar)): ?>
                      <img alt="<?php echo $object->nombre;?>" src="<?php echo thumbnail_image(base_url(), $object->avatar->getPath() , $width, $height, $imgType); ?>" />
                      <?php else: ?>
                      <img src="<?php echo base_url();?>assets/images/noimage.png" class="img_servicios" width="<?php echo $width;?>" height="<?php echo $height;?>"/>
                  <?php endif; ?>
                </td>
                  <td>
                    <?php echo ($object->nombre); ?>
                  </td>
                  <td>
                    <?php $aux = html_purify(html_entity_decode($object->descripcion));
                    ?>
                    <?php echo character_limiter($aux, 100); ?>
                  </td>
                  <td>
                    <a class="btn btn-default" href="<?php echo site_url("novedades/edit/" . $object->id); ?>">
                      Editar
                    </a>
                    <a class="btn btn-danger" href="javascript:void(0)" onclick="return adminManager.getInstance().deleteTableRow(<?php echo $object->id;?>, 'Esta seguro de querer eliminar?', '<?php echo site_url("novedades/delete/".$object->id);?>');">
                      Eliminar
                    </a>
                  </td>
                </tr>

              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
        <a class="btn btn-primary" href="<?php echo site_url("novedades/add"); ?>">Agregar</a>
        <a class="colorbox_link_sort btn btn-info" href="<?php echo site_url("ordenable/sort/novedades/novedad/nombre");?>" >
          Ordenar
        </a>
      </div>
    </div>
  </div>
</div>
