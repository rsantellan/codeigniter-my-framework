CREATE TABLE IF NOT EXISTS `efsaproyecto` (
  `id` int(40) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `responsables` text,
  `description` text,
  `ordinal` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;