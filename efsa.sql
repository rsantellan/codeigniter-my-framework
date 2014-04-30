-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 30, 2014 at 07:39 AM
-- Server version: 5.5.37
-- PHP Version: 5.3.10-1ubuntu3.11

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `efsa`
--

-- --------------------------------------------------------

--
-- Table structure for table `albumcontent`
--

CREATE TABLE IF NOT EXISTS `albumcontent` (
  `id` smallint(9) NOT NULL AUTO_INCREMENT,
  `path` varchar(256) DEFAULT NULL,
  `basepath` varchar(255) NOT NULL DEFAULT '',
  `name` varchar(64) DEFAULT NULL,
  `type` varchar(32) DEFAULT NULL,
  `contenttype` varchar(32) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `code` varchar(64) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `extradata` text,
  `album_id` smallint(9) DEFAULT NULL,
  `ordinal` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fk_albumcontent_album` (`album_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `albumcontent`
--

INSERT INTO `albumcontent` (`id`, `path`, `basepath`, `name`, `type`, `contenttype`, `url`, `code`, `description`, `extradata`, `album_id`, `ordinal`) VALUES
(1, 'assets/uploads/1/74cc6b23deccd17b1622630bdb58aa31.png', '/home/rodrigo/proyectos/my-framework-prototype/branches/efsa/', '74cc6b23deccd17b1622630bdb58aa31.png', 'png', 'content-image', NULL, NULL, NULL, NULL, 1, 1),
(2, 'assets/uploads/2/direcciones.png', '/home/rodrigo/proyectos/my-framework-prototype/branches/efsa/', 'direcciones.png', 'png', 'content-image', NULL, NULL, NULL, NULL, 2, 1),
(3, 'assets/uploads/3/mailProblema.png', '/home/rodrigo/proyectos/my-framework-prototype/branches/efsa/', 'mailProblema.png', 'png', 'content-image', NULL, NULL, NULL, NULL, 3, 1),
(4, 'assets/uploads/7/fondoPNG.png', '/home/rodrigo/proyectos/my-framework-prototype/branches/efsa/', 'fondoPNG.png', 'png', 'content-image', NULL, NULL, NULL, NULL, 7, 1),
(5, 'assets/uploads/8/softwaresources.png', '/home/rodrigo/proyectos/my-framework-prototype/branches/efsa/', 'softwaresources.png', 'png', 'content-image', NULL, NULL, NULL, NULL, 8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `albums`
--

CREATE TABLE IF NOT EXISTS `albums` (
  `id` smallint(9) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) DEFAULT NULL,
  `obj_id` smallint(9) DEFAULT NULL,
  `obj_class` varchar(64) DEFAULT NULL,
  `atype` varchar(64) NOT NULL DEFAULT 'images',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `albums`
--

INSERT INTO `albums` (`id`, `name`, `obj_id`, `obj_class`, `atype`) VALUES
(1, 'default', 1, 'integrante', 'images'),
(2, 'default', 2, 'integrante', 'images'),
(3, 'default', 3, 'integrante', 'images'),
(7, 'default', 1, 'efsadocencia', 'images'),
(8, 'default', 2, 'efsadocencia', 'images');

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `ip_address` varchar(16) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `user_agent` varchar(150) COLLATE utf8_bin NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `efsadocencia`
--

CREATE TABLE IF NOT EXISTS `efsadocencia` (
  `id` int(40) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text,
  `ordinal` int(11) DEFAULT '0',
  `tipo` int(3) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `efsadocencia`
--

INSERT INTO `efsadocencia` (`id`, `name`, `description`, `ordinal`, `tipo`) VALUES
(1, 'daslkdj safld sfjklsdajf dsa', 'fadsfk jsadlf jsadlkf jsdlkf jasdlfsadfsa', 1, 1),
(2, '534534', 'gdsgdfgj lkd gfjsdlkgsdfgds', 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `integrante`
--

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `integrante`
--

INSERT INTO `integrante` (`id`, `name`, `title`, `location`, `contact`, `area`, `description`, `ordinal`, `tipo`) VALUES
(1, 'nombre', 'title', 'location', 'contact@mail.com', 'area', 'lfjadslkfjsadfsdafsa', 1, 1),
(2, 'lfksjdfas', '', 'lkjfslkjfaslkdfjas', 'sdfasfas@asdada.com', 'lkdjsaflkasjf 0923 43209i', '&lt;img src=&quot;../../assets/uploads/tiny/test1/direcciones.png&quot; alt=&quot;test&quot; /&gt;lfjas fsaldkjfsa&lt;br /&gt;f&lt;br /&gt;sadf&lt;br /&gt;asdfs&lt;br /&gt;adf&lt;br /&gt;asdf&lt;br /&gt;asd&lt;br /&gt;fa&lt;br /&gt;sdf&lt;br /&gt;sadfasfsad', 2, 2),
(3, '429304', '2103928', '1309821903', '31232@LDKAJSDS.COM', '130981 jlkj', '1309132012 3&lt;br /&gt;&lt;br /&gt;&lt;br /&gt;fsdlkfjsdlfkasd&lt;br /&gt;fasd&lt;br /&gt;fa&lt;br /&gt;sdf&lt;br /&gt;asd&lt;br /&gt;fas&lt;br /&gt;dfasdfdsa', 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE IF NOT EXISTS `login_attempts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(40) COLLATE utf8_bin NOT NULL,
  `login` varchar(50) COLLATE utf8_bin NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `publicacion`
--

CREATE TABLE IF NOT EXISTS `publicacion` (
  `id` int(40) NOT NULL AUTO_INCREMENT,
  `description` text,
  `ordinal` int(11) DEFAULT '0',
  `tipo` int(3) DEFAULT '0',
  `letter` varchar(2) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `publicacion`
--

INSERT INTO `publicacion` (`id`, `description`, `ordinal`, `tipo`, `letter`) VALUES
(1, 'fasdlfkjsadlfk adsfjklasdjf dsalkfja sdflkasdj flksadfj asldkfjasdl fjasdlfk jsadlkfjsad flkasdjflsakdjfsalkdjfsad', 1, 1, 'f'),
(2, 'aaasdasdasdsa', 2, 1, 'a'),
(3, 'aaasdasdasdsa', 3, 1, 'a'),
(4, 'a lkjda czlkjcz 90921381231', 4, 1, 'a'),
(5, 'ad;a1231231 lksjad fsdfasd lkjfsadfsd', 5, 2, 'a');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8_bin NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL,
  `email` varchar(100) COLLATE utf8_bin NOT NULL,
  `activated` tinyint(1) NOT NULL DEFAULT '1',
  `banned` tinyint(1) NOT NULL DEFAULT '0',
  `ban_reason` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `new_password_key` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `new_password_requested` datetime DEFAULT NULL,
  `new_email` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `new_email_key` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `last_ip` varchar(40) COLLATE utf8_bin NOT NULL,
  `last_login` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `mutualista` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `medicamentos` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `activated`, `banned`, `ban_reason`, `new_password_key`, `new_password_requested`, `new_email`, `new_email_key`, `last_ip`, `last_login`, `created`, `modified`, `mutualista`, `medicamentos`) VALUES
(2, 'admin', '$P$BLcJ/R6.B4IG93UnZunn14heHtRclr.', 'rsantellan@gmail.com', 1, 0, NULL, NULL, NULL, NULL, NULL, '127.0.0.1', '2014-04-30 05:46:05', '2012-08-20 18:05:44', '2014-04-30 08:46:05', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_autologin`
--

CREATE TABLE IF NOT EXISTS `user_autologin` (
  `key_id` char(32) COLLATE utf8_bin NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `user_agent` varchar(150) COLLATE utf8_bin NOT NULL,
  `last_ip` varchar(40) COLLATE utf8_bin NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`key_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `user_profiles`
--

CREATE TABLE IF NOT EXISTS `user_profiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `country` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `website` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `albumcontent`
--
ALTER TABLE `albumcontent`
  ADD CONSTRAINT `fk_albumcontent_album` FOREIGN KEY (`album_id`) REFERENCES `albums` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
SET FOREIGN_KEY_CHECKS=1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
