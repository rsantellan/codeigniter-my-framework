CREATE TABLE IF NOT EXISTS `integrante` (
  `id` int(40) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `area` varchar(255) NOT NULL,
  `description` text,
  `ordinal` int(11) DEFAULT '0',
  `tipo` int(3) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;