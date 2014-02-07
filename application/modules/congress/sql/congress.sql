
CREATE TABLE IF NOT EXISTS `ocongress` (
  `id` int(40) NOT NULL AUTO_INCREMENT,
  `ordinal` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

ALTER TABLE `ocongress` ADD `congress` INT( 1 ) NOT NULL DEFAULT '0' AFTER `id`; 

-- --------------------------------------------------------

--
-- Table structure for table `ocongress_translation`
--

CREATE TABLE IF NOT EXISTS `ocongress_translation` (
  `id` int(40) NOT NULL AUTO_INCREMENT,
  `lang` varchar(3) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `members` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  PRIMARY KEY (`id`,`lang`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ocongress_translation`
--
ALTER TABLE `ocongress_translation`
  ADD CONSTRAINT `ocongress_translation_ibfk_1` FOREIGN KEY (`id`) REFERENCES `ocongress` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
