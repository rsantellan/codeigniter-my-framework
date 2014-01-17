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

ALTER TABLE `club` ADD FOREIGN KEY ( `departmentid` ) REFERENCES `feu`.`departamento` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT ;

