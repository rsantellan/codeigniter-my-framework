<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Laboratorios Celsius</title>
</head>
<body>
	<table cellpadding="0" cellspacing="0" style="width:800px; margin:25px;">
    	<tr>
        	<td style="width:800px"><img src="<?php echo base_url(); ?>assets/celsius/images/logo.jpg"></td>
        </tr>
        <tr>
        	<td style="height:30px; padding:15px 0; font-size:14px; font-weight:bold;text-transform:uppercase; font-family:Lucida Grande, Lucida Sans Unicode, sans-serif; color:#023b81;">Trabaja con nosotros</td>
        </tr>
       <tr>
        	<td style="font-size:12px; padding:5px 0 5px 0; font-family:Lucida Grande, Lucida Sans Unicode, sans-serif; color:#1a171b; font-weight:bold; text-align:left">Nombre:<span style="font-size:12px; padding:5px 0 5px 10px; font-family:Lucida Grande, Lucida Sans Unicode, sans-serif; color:#1a171b; text-align:left; font-weight:normal;"><?php echo $nombre;?></span></td>
        </tr>
       <tr>
        	<td style="font-size:12px; padding:5px 0 5px 0; font-family:Lucida Grande, Lucida Sans Unicode, sans-serif; color:#1a171b; font-weight:bold; text-align:left">Apellido:<span style="font-size:12px; padding:5px 0 5px 10px; font-family:Lucida Grande, Lucida Sans Unicode, sans-serif; color:#1a171b; text-align:left; font-weight:normal;"><?php echo $apellido;?></span></td>
        </tr>
       <tr>
        	<td style="font-size:12px; padding:5px 0 5px 0; font-family:Lucida Grande, Lucida Sans Unicode, sans-serif; color:#1a171b; font-weight:bold; text-align:left">C&eacute;dula de Indentidad:<span style="font-size:12px; padding:5px 0 5px 10px; font-family:Lucida Grande, Lucida Sans Unicode, sans-serif; color:#1a171b; text-align:left; font-weight:normal;"><?php echo $cedula;?></span></td>
        </tr>
       <tr>
        	<td style="font-size:12px; padding:5px 0 5px 0; font-family:Lucida Grande, Lucida Sans Unicode, sans-serif; color:#1a171b; font-weight:bold; text-align:left">e-mail:<span style="font-size:12px; padding:5px 0 5px 10px; font-family:Lucida Grande, Lucida Sans Unicode, sans-serif; color:#1a171b; text-align:left; font-weight:normal;"><?php echo $email;?></span></td>
        </tr>
       <tr>
        	<td style="font-size:12px; padding:5px 0 5px 0; font-family:Lucida Grande, Lucida Sans Unicode, sans-serif; color:#1a171b; font-weight:bold; text-align:left">Direcci&oacute;n:<span style="font-size:12px; padding:5px 0 5px 10px; font-family:Lucida Grande, Lucida Sans Unicode, sans-serif; color:#1a171b; text-align:left; font-weight:normal;"><?php echo $direccion;?></span></td>
        </tr>
       <tr>
        	<td style="font-size:12px; padding:5px 0 5px 0; font-family:Lucida Grande, Lucida Sans Unicode, sans-serif; color:#1a171b; font-weight:bold; text-align:left">Ciudad:<span style="font-size:12px; padding:5px 0 5px 10px; font-family:Lucida Grande, Lucida Sans Unicode, sans-serif; color:#1a171b; text-align:left; font-weight:normal;"><?php echo $ciudad;?></span></td>
        </tr>
       <tr>
        	<td style="font-size:12px; padding:5px 0 5px 0; font-family:Lucida Grande, Lucida Sans Unicode, sans-serif; color:#1a171b; font-weight:bold; text-align:left">Pa&iacute;s:<span style="font-size:12px; padding:5px 0 5px 10px; font-family:Lucida Grande, Lucida Sans Unicode, sans-serif; color:#1a171b; text-align:left; font-weight:normal;"><?php echo $pais;?></span></td>
        </tr>
       <tr>
        	<td style="font-size:12px; padding:5px 0 5px 0; font-family:Lucida Grande, Lucida Sans Unicode, sans-serif; color:#1a171b; font-weight:bold; text-align:left">Tele&eacute;fono / M&oacute;vil:<span style="font-size:12px; padding:5px 0 5px 10px; font-family:Lucida Grande, Lucida Sans Unicode, sans-serif; color:#1a171b; text-align:left; font-weight:normal;"><?php echo $phone;?></span></td>
        </tr>
       <tr>
        	<td style="font-size:12px; padding:5px 0 5px 0; font-family:Lucida Grande, Lucida Sans Unicode, sans-serif; color:#1a171b; font-weight:bold; text-align:left">Fax:<span style="font-size:12px; padding:5px 0 5px 10px; font-family:Lucida Grande, Lucida Sans Unicode, sans-serif; color:#1a171b; text-align:left; font-weight:normal;"><?php echo $fax;?></span></td>
        </tr>
       <tr>
        	<td style="font-size:12px; padding:5px 0 5px 0; font-family:Lucida Grande, Lucida Sans Unicode, sans-serif; color:#1a171b; font-weight:bold; text-align:left">&Aacute;reas de postulaci&oacute;n:<span style="font-size:12px; padding:5px 0 5px 10px; font-family:Lucida Grande, Lucida Sans Unicode, sans-serif; color:#1a171b; text-align:left; font-weight:normal;">
<?php 
$first = true;
if(!empty($quimicofarmaceuticorecibido)){
   echo lang('trabajaconnosotros_eleccion_quimicofarmaceuticorecibido');
   $first = false;
}
if(!empty($quimicofarmaceuticoestudiante)){
   if(!$first)
     echo ',';
   echo lang('trabajaconnosotros_eleccion_quimicofarmaceuticoestudiante');
   $first = false;
}
if(!empty($quimicotecnologorecibido)){
   if(!$first)
     echo ',';
   echo lang('trabajaconnosotros_eleccion_quimicotecnologorecibido');
   $first = false;
}
if(!empty($quimicotecnologoestudiante)){
   if(!$first)
     echo ',';
   echo lang('trabajaconnosotros_eleccion_quimicotecnologoestudiante');
   $first = false;
}
if(!empty($mantenimientomecanico)){
   if(!$first)
     echo ',';
   echo lang('trabajaconnosotros_eleccion_mantenimientomecanico');
   $first = false;
}
if(!empty($operariopreparador)){
   if(!$first)
     echo ',';
   echo lang('trabajaconnosotros_eleccion_operariopreparador');
   $first = false;
}
if(!empty($depositologisticaexpedicion)){
   if(!$first)
     echo ',';
   echo lang('trabajaconnosotros_eleccion_depositologisticaexpedicion');
   $first = false;
}
if(!empty($limpieza)){
   if(!$first)
     echo ',';
   echo lang('trabajaconnosotros_eleccion_limpieza');
   $first = false;
}
if(!empty($comprascomercionexterios)){
   if(!$first)
     echo ',';
   echo lang('trabajaconnosotros_eleccion_comprascomercionexterios');
   $first = false;
}
if(!empty($ventascomercialpromocion)){
   if(!$first)
     echo ',';
   echo lang('trabajaconnosotros_eleccion_ventascomercialpromocion');
   $first = false;
}
if(!empty($administrativosfinancieroscontable)){
   if(!$first)
     echo ',';
   echo lang('trabajaconnosotros_eleccion_administrativosfinancieroscontable');
   $first = false;
}
if(!empty($sistemainformatica)){
   if(!$first)
     echo ',';
   echo lang('trabajaconnosotros_eleccion_sistemainformatica');
   $first = false;
}
if(!empty($recepcionistasecretaria)){
   if(!$first)
     echo ',';
   echo lang('trabajaconnosotros_eleccion_recepcionistasecretaria');
   $first = false;
}
if(!empty($cientificoinvestigadores)){
   if(!$first)
     echo ',';
   echo lang('trabajaconnosotros_eleccion_cientificoinvestigadores');
   $first = false;
}
if(!empty($estudiantessinexperiencia)){
   if(!$first)
     echo ',';
   echo lang('trabajaconnosotros_eleccion_estudiantessinexperiencia');
   $first = false;
}
?>

</span></td>
        </tr>
    </table>
</body>
</html>
