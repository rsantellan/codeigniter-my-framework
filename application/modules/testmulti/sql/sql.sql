--
-- Database: `ci_framework`
--

-- --------------------------------------------------------

--
-- Table structure for table `multi`
--

CREATE TABLE IF NOT EXISTS `multi` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fecha` date DEFAULT NULL,
  `color` varchar(125) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `multi_i18n`
--

CREATE TABLE IF NOT EXISTS `multi_i18n` (
  `id` int(11) NOT NULL,
  `lang` varchar(3) NOT NULL,
  `name` varchar(125) DEFAULT NULL,
  `slug` varchar(125) DEFAULT NULL,
  PRIMARY KEY (`id`,`lang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `multi_i18n`
--
ALTER TABLE `multi_i18n`
  ADD CONSTRAINT `multi_i18n_ibfk_1` FOREIGN KEY (`id`) REFERENCES `multi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
SET FOREIGN_KEY_CHECKS=1;