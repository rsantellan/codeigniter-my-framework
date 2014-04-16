<div class="grid_16">
  <h2>Mostrar CV</h2>
  <div class="grid_7">
    <span style="font-weight: bold">Nombre:</span>
    <label ><?php echo $object->nombre;?></label>
  </div>
  <div class="grid_7">
    <span style="font-weight: bold">Apellido:</span>
    <label><?php echo $object->apellido;?></label>
  </div>
  <div class="grid_7">
    <span style="font-weight: bold">Cedula:</span>
    <label><?php echo $object->cedula;?></label>
  </div>
  <div class="grid_7">
    <span style="font-weight: bold">Email:</span>
    <label><?php echo $object->email;?></label>
  </div>
  <div class="grid_7">
    <span style="font-weight: bold">Dirección:</span>
    <label><?php echo $object->direccion;?></label>
  </div>
  <div class="grid_7">
    <span style="font-weight: bold">Ciudad:</span>
    <label><?php echo $object->ciudad;?></label>
  </div>
  <div class="grid_7">
    <span style="font-weight: bold">País:</span>
    <label><?php echo $object->pais;?></label>
  </div>
  <div class="grid_7">
    <span style="font-weight: bold">Télefono:</span>
    <label><?php echo $object->phone;?></label>
  </div>
  <div class="grid_7">
    <span style="font-weight: bold">Fax:</span>
    <label><?php echo $object->fax;?></label>
  </div>
  <div class="grid_7">
    <span style="font-weight: bold">Área:</span>
    <label>
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
      </label>
  </div>
  <div class="grid_7">
    <span style="font-weight: bold">CV:</span>
    <a href="<?php echo site_url("trabajaconnosotros/cv/".$object->id);?>">Descargar</a>
  </div>
</div>