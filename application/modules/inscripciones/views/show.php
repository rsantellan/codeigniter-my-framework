<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">Inscripcion</h1>
  </div>
  <!-- /.col-lg-12 -->
</div>
<div class="row">
  <div class="col-lg-8">
    <div class="panel panel-default">
      <div class="panel-body">
        <div class="table-responsive">
          <table class="table table-striped table-bordered table-hover">
            <tbody>
              <tr>
                <td>nombre y apellido</td>
                <td><strong><?php echo $object->name; ?></strong></td>
              </tr>
              <tr>
                <td>documento de identidad* (c.i. o pasaporte)</td>
                <td><strong><?php echo $object->document; ?></strong></td>
              </tr>
              <tr>
                <td>fecha de nacimiento (dd/mm/aaaa)</td>
                <td><strong><?php echo $object->birthdate; ?></strong></td>
              </tr>
              <tr>
                <td>pa&iacute;s de residencia</td>
                <td><strong><?php echo $object->country; ?></strong></td>
              </tr>
              <tr>
                <td>nacionalidad</td>
                <td><strong><?php echo $object->nacionality; ?></strong></td>
              </tr>
              <tr>
                <td>t&iacute;tulo/s</td>
                <td><strong><?php echo $object->title; ?></strong></td>
              </tr>
              <tr>
                <td>mail</td>
                <td><strong><?php echo $object->mail; ?></strong></td>
              </tr>
              <tr>
                <td>instituci&oacute;n</td>
                <td><strong><?php echo $object->institution; ?></strong></td>
              </tr>
              <tr>
                <td>direcci&oacute;n institucional</td>
                <td><strong><?php echo $object->address; ?></strong></td>
              </tr>
              <tr>
                <td>t&eacute;lefono</td>
                <td><strong><?php echo $object->phone; ?></strong></td>
              </tr>
              <tr>
                <td>mail instituci&oacute;n</td>
                <td><strong><?php echo $object->emailinstitucion; ?></strong></td>
              </tr>
              <tr>
                <td>ciudad y c&oacute;digo postal</td>
                <td><strong><?php echo $object->postnumber; ?></strong></td>
              </tr>
              
              <tr>
                <td>pa&iacute;s</td>
                <td><strong><?php echo $object->countryinstitution; ?></strong></td>
              </tr>
              <tr>
                <td>sitio web institucional</td>
                <td><strong><?php echo $object->website; ?></strong></td>
              </tr>
              <tr>
                <td>posici&oacute;n acad&eacute;mica</td>
                <td><strong><?php echo $object->position; ?></strong></td>
              </tr>
              <tr>
                <td>l&iacute;nea de investigaci&oacute;n</td>
                <td><strong><?php echo $object->investigation; ?></strong></td>
              </tr>
              <tr>
                <td>link a cvuy (indicador)</td>
                <td><strong><?php echo $object->cvuy; ?></strong></td>
              </tr>
              <tr>
                <td>comentarios</td>
                <td><strong><?php echo $object->comments; ?></strong></td>
              </tr>
              <?php foreach($media as $file): ?>
                <tr>
                  <td>Archivo</td>
                  <td><strong><a href='<?php echo site_url('inscripciones/archivo/'.$file->id);?>'><?php echo $file->filename; ?></a></strong></td>
                </tr>
              <?php endforeach; ?>
              
            </tbody>
          </table>
        </div>
        <!-- /.table-responsive -->
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-lg-6">
    <a class="btn btn-info" href="<?php echo site_url('inscripciones/index'); ?>"> Volver al indice </a>
  </div>
</div>
