CREATE TABLE `novedades` (
`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`nombre` VARCHAR( 255 ) NOT NULL ,
`descripcion` TEXT NOT NULL ,
`ordinal` INT NOT NULL DEFAULT '0'
) ENGINE = InnoDB;

ALTER TABLE `novedades` ADD `copete` VARCHAR( 255 ) NOT NULL DEFAULT '' AFTER `nombre` ;
ALTER TABLE `novedades` CHANGE `copete` `copete` TEXT CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL DEFAULT '';