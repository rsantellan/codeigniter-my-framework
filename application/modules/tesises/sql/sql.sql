CREATE TABLE `tesis` (
`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`titulo` VARCHAR( 255 ) NOT NULL ,
`subtitulo` VARCHAR( 255 ) NOT NULL ,
`orientadores` VARCHAR( 255 ) NOT NULL ,
`tribunal` VARCHAR( 255 ) NOT NULL ,
`defensa` VARCHAR( 255 ) NOT NULL,
`ordinal` INT NOT NULL DEFAULT '0'
) ENGINE = InnoDB;

ALTER TABLE `tesis` ADD `academica` VARCHAR( 255 ) NOT NULL DEFAULT '' AFTER `defensa`;