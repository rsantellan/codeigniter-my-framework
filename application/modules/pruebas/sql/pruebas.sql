CREATE TABLE IF NOT EXISTS `prueba` (
  `id` int(40) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `type` int(4) NOT NULL,
  `ordinal` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


ALTER TABLE `prueba` ADD `pruebaDate` DATE default NULL AFTER `id`; 
UPDATE `prueba` SET `pruebaDate` = '2014-01-01';