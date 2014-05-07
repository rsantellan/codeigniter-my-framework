CREATE TABLE IF NOT EXISTS `efsaextension` (
  `id` int(40) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text,
  `link` varchar(255) DEFAULT '',
  `ordinal` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;