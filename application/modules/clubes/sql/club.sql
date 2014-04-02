CREATE TABLE IF NOT EXISTS `club` (
  `id` int(40) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` TEXT NOT NULL, 
  `link` varchar(255) NOT NULL,
  `location` VARCHAR(255) NOT NULL,
  `departmentid` INT(40) NOT NULL,
  `ordinal` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

ALTER TABLE `club` ADD INDEX ( `departmentid` );

ALTER TABLE `club` ADD FOREIGN KEY ( `departmentid` ) REFERENCES `departamento` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT ;

ALTER TABLE `club` ADD `number` INT NOT NULL DEFAULT '0' AFTER `departmentid`;
ALTER TABLE `club` CHANGE `number` `number` INT( 11 ) NULL DEFAULT '0';

ALTER TABLE `club` ADD `latitud` FLOAT( 8, 6 ) NOT NULL DEFAULT '-34.908898' AFTER `number` ,
ADD `longitud` FLOAT( 8, 6 ) NOT NULL DEFAULT '-56.194707' AFTER `latitud` ;