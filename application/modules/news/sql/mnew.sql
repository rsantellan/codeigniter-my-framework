
CREATE TABLE IF NOT EXISTS `mnew` (
  `id` int(40) NOT NULL AUTO_INCREMENT,
  `ordinal` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

ALTER TABLE `mnew` ADD `slider` INT( 1 ) NOT NULL DEFAULT '0' AFTER `id`; 

-- --------------------------------------------------------

--
-- Table structure for table `mnew_translation`
--

CREATE TABLE IF NOT EXISTS `mnew_translation` (
  `id` int(40) NOT NULL AUTO_INCREMENT,
  `lang` varchar(3) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` TEXT,
  `slug` varchar(255) NOT NULL,
  PRIMARY KEY (`id`,`lang`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mnew_translation`
--
ALTER TABLE `mnew_translation`
  ADD CONSTRAINT `mnew_translation_ibfk_1` FOREIGN KEY (`id`) REFERENCES `mnew` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
