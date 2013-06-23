CREATE TABLE `mail_db` (
  `id` INT( 5 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
  `direccion` VARCHAR( 255 ) NOT NULL ,
  `tipo` VARCHAR( 5 ) NOT NULL DEFAULT 'to',
  `nombre` VARCHAR( 255 ) NOT NULL ,
  `funcion` VARCHAR( 255 ) NOT NULL DEFAULT 'contacto'
) ENGINE = InnoDB;