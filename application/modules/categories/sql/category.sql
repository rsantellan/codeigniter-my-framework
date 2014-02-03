CREATE TABLE IF NOT EXISTS `category` (
  `id` int(40) NOT NULL AUTO_INCREMENT,
  `slug-es` varchar(255) DEFAULT NULL,
  `slug-en` varchar(255) DEFAULT NULL,
  `ordinal` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `category_translation` (
  `id` int(40) NOT NULL AUTO_INCREMENT,
  `lang` varchar(3) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`, `lang`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;