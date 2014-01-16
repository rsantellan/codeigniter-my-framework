CREATE TABLE IF NOT EXISTS `campeon` (
  `id` int(40) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `periodo` varchar(255) NOT NULL,
  `ordinal` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `deportista` (
  `id` int(40) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `periodo` varchar(255) NOT NULL,
  `ordinal` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `presidente` (
  `id` int(40) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `periodo` varchar(255) NOT NULL,
  `ordinal` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
