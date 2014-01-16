CREATE TABLE IF NOT EXISTS `veterinario` (
  `id` int(40) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `contacto` varchar(255) NOT NULL,
   `isboss` TINYINT(1) DEFAULT 0,
  `ordinal` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;