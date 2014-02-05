
CREATE TABLE IF NOT EXISTS `studycase` (
  `id` int(40) NOT NULL AUTO_INCREMENT,
  `ordinal` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

ALTER TABLE `studycase` ADD `studyDate` DATE AFTER `id`; 

-- --------------------------------------------------------

--
-- Table structure for table `studycase_translation`
--

CREATE TABLE IF NOT EXISTS `studycase_translation` (
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
-- Constraints for table `studycase_translation`
--
ALTER TABLE `studycase_translation`
  ADD CONSTRAINT `studycase_translation_ibfk_1` FOREIGN KEY (`id`) REFERENCES `studycase` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
