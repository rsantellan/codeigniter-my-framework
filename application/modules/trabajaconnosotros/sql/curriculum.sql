CREATE TABLE IF NOT EXISTS  `trabajaconnosotros` (
 id int(40) NOT NULL auto_increment,
 nombre VARCHAR(255) NOT NULL,
 apellido VARCHAR(255) NOT NULL,
 cedula VARCHAR(255) NOT NULL,
 email VARCHAR(255) NOT NULL,
 direccion VARCHAR(255) NOT NULL,
 ciudad VARCHAR(255) NOT NULL,
 pais VARCHAR(255) NOT NULL,
 phone VARCHAR(255) NOT NULL,
 fax VARCHAR(255) NOT NULL,
 cv VARCHAR(255) NOT NULL,
 quimicofarmaceuticorecibido TINYINT(1) default 0,
 quimicofarmaceuticoestudiante TINYINT(1) default 0,
 quimicotecnologorecibido TINYINT(1) default 0,
 quimicotecnologoestudiante TINYINT(1) default 0,
 mantenimientomecanico TINYINT(1) default 0,
 operariopreparador TINYINT(1) default 0,
 depositologisticaexpedicion TINYINT(1) default 0,
 limpieza TINYINT(1) default 0,
 comprascomercionexterios TINYINT(1) default 0,
 ventascomercialpromocion TINYINT(1) default 0,
 administrativosfinancieroscontable TINYINT(1) default 0,
 sistemainformatica TINYINT(1) default 0,
 recepcionistasecretaria TINYINT(1) default 0,
 cientificoinvestigadores TINYINT(1) default 0,
 estudiantessinexperiencia TINYINT(1) default 0,
 PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

ALTER TABLE `trabajaconnosotros` ADD `cvfile` VARCHAR( 255 ) NOT NULL AFTER `cv` ;
ALTER TABLE `trabajaconnosotros` ADD `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ;