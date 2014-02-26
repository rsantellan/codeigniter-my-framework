
CREATE TABLE IF NOT EXISTS `presentation` (
  `id` int(40) NOT NULL AUTO_INCREMENT,
  `product_id` int(40) NOT NULL,
  `ordinal` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

ALTER TABLE `presentation`
  ADD CONSTRAINT `presentation_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
--
-- Table structure for table `presentation_translation`
--

CREATE TABLE IF NOT EXISTS `presentation_translation` (
  `id` int(40) NOT NULL AUTO_INCREMENT,
  `lang` varchar(3) NOT NULL,
  `name` varchar(255) NOT NULL,
  `genericname` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `activecomponent` varchar(255) NOT NULL,
  `action` varchar(255) NOT NULL,
  PRIMARY KEY (`id`,`lang`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


-- ALTER TABLE `presentation_translation` ADD `genericname` VARCHAR( 255 ) NOT NULL DEFAULT '' AFTER `name` ;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `product_translation`
--
ALTER TABLE `presentation_translation`
  ADD CONSTRAINT `presentation_translation_ibfk_1` FOREIGN KEY (`id`) REFERENCES `presentation` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Table structure for table `product_category`
--

CREATE TABLE IF NOT EXISTS `presentation_country` (
  `presentation_id` int(40) NOT NULL,
  `country_id` int(40) NOT NULL,
  `presencia` varchar(2) NOT NULL,
  PRIMARY KEY (`presentation_id`,`country_id`),
  KEY `country_id` (`country_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS `country` (
  `id` int(40) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `flag` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `product_category`
--
ALTER TABLE `presentation_country`
  ADD CONSTRAINT `presentation_country_ibfk_2` FOREIGN KEY (`presentation_id`) REFERENCES `presentation` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `presentation_country_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
