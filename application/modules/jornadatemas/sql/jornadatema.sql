CREATE TABLE IF NOT EXISTS `jornadatema` (
  `id` int(40) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `orator` VARCHAR(255) NOT NULL,
  `jornadaid` INT(40) NOT NULL,
  `ordinal` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

ALTER TABLE `jornadatema` ADD INDEX ( `jornadaid` );

ALTER TABLE `jornadatema` ADD FOREIGN KEY ( `jornadaid` ) REFERENCES `jornada` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT ;

