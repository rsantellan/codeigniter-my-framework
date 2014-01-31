-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 20, 2014 at 05:52 PM
-- Server version: 5.5.34
-- PHP Version: 5.3.10-1ubuntu3.8

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `feu`
--

-- --------------------------------------------------------

--
-- Table structure for table `albumcontent`
--

CREATE TABLE IF NOT EXISTS `albumcontent` (
  `id` smallint(9) NOT NULL AUTO_INCREMENT,
  `path` varchar(256) DEFAULT NULL,
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `albumcontent`
--

INSERT INTO `albumcontent` (`id`, `path`, `name`, `type`, `contenttype`, `url`, `code`, `description`, `extradata`, `album_id`, `ordinal`) VALUES
(1, '/home/rodrigo/proyectos/ci/my-framework-prototype/branches/feu/assets/uploads/21937a76a7d4f00423759be699f6c8f2f4.png', 'cnea-chrome.png', 'png', 'content-image', NULL, NULL, NULL, NULL, 21, 0),
(2, '/home/rodrigo/proyectos/ci/my-framework-prototype/branches/feu/assets/uploads/212bdc76cb0f5bb81d4a693ec84062735b.pdf', '093-7-185-192.pdf', 'pdf', 'content-image', NULL, NULL, NULL, NULL, 21, 2),
(3, '/home/rodrigo/proyectos/ci/my-framework-prototype/branches/feu/assets/uploads/2169611d1ae9a1ad8465a1e9baed0f362e.pdf', 'rc197-010-SpringIntegration_0.pdf', 'pdf', 'content-image', NULL, NULL, NULL, NULL, 21, 4),
(4, '/home/rodrigo/proyectos/ci/my-framework-prototype/branches/feu/assets/uploads/2165f017e47147a98fe615aaa10c717d6a.png', 'antel_epin_cert.png', 'png', 'content-image', NULL, NULL, NULL, NULL, 21, 5),
(5, '/home/rodrigo/proyectos/ci/my-framework-prototype/branches/feu/assets/uploads/21fb42659584646b4125c58deffd9f7f28.png', 'cnea-chrome.png', 'png', 'content-image', NULL, NULL, NULL, NULL, 21, 1),
(6, '/home/rodrigo/proyectos/ci/my-framework-prototype/branches/feu/assets/uploads/21db5c9d559911e1040d3df10438d880ad.png', 'cnea-firefox.png', 'png', 'content-image', NULL, NULL, NULL, NULL, 21, 3),
(7, '/home/rodrigo/proyectos/ci/my-framework-prototype/branches/feu/assets/uploads/2177d9036e5fdbdde94ddbc60f1fd8f5ce.png', 'consoleOnlyCroped1.png', 'png', 'content-image', NULL, NULL, NULL, NULL, 21, 6),
(8, '/home/rodrigo/proyectos/ci/my-framework-prototype/branches/feu/assets/uploads/2170b37ab364fa455102ca1c7013655d09.jpg', '(1).jpg', 'jpg', 'content-image', NULL, NULL, NULL, NULL, 21, 7),
(9, '/home/rodrigo/proyectos/ci/my-framework-prototype/branches/feu/assets/uploads/216405afcd81f1b4806bd0ca06ac1ae756.jpg', '(2).jpg', 'jpg', 'content-image', NULL, NULL, NULL, NULL, 21, 8),
(10, '/home/rodrigo/proyectos/ci/my-framework-prototype/branches/feu/assets/uploads/21029440a612cede64fe43af3b560c02cb.jpg', '(3).jpg', 'jpg', 'content-image', NULL, NULL, NULL, NULL, 21, 9),
(11, '/home/rodrigo/proyectos/ci/my-framework-prototype/branches/feu/assets/uploads/2145c11717677248c22264ba4d2d029342.jpg', '(4).jpg', 'jpg', 'content-image', NULL, NULL, NULL, NULL, 21, 10),
(12, '/home/rodrigo/proyectos/ci/my-framework-prototype/branches/feu/assets/uploads/21ae97525fea52525b2d846345f225f094.jpg', '(5).jpg', 'jpg', 'content-image', NULL, NULL, NULL, NULL, 21, 11),
(13, '/home/rodrigo/proyectos/ci/my-framework-prototype/branches/feu/assets/uploads/2106654e7280e03ac5285bb92d005a91c0.jpg', '(6).jpg', 'jpg', 'content-image', NULL, NULL, NULL, NULL, 21, 12),
(14, '/home/rodrigo/proyectos/ci/my-framework-prototype/branches/feu/assets/uploads/21474335c2d09fe07c3a3b333e4e46f3cf.jpg', '(7).jpg', 'jpg', 'content-image', NULL, NULL, NULL, NULL, 21, 13),
(15, 'http://img.youtube.com/vi/0e441O5MpA0/2.jpg', 'Episodes Season 3: Tease - Episodes...Everybody Has Them', 'youtube', 'content-youtube', 'http://www.youtube.com/watch?v=0e441O5MpA0&feature=youtu.be', '0e441O5MpA0', 'Matt LeBlanc is back. Don''t miss season 3 of Episodes premiering January 12th at 10:30PM ET/PT.', 'Showtime', 23, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `albums`
--

INSERT INTO `albums` (`id`, `name`, `obj_id`, `obj_class`, `atype`) VALUES
(5, 'default', 6, 'radio', 'images'),
(6, 'default', 7, 'radio', 'images'),
(7, 'default', 8, 'radio', 'images'),
(8, 'default', 1, 'document', 'images'),
(9, 'default', 2, 'document', 'images'),
(10, 'default', 3, 'document', 'images'),
(11, 'default', 4, 'document', 'images'),
(12, 'default', 1, 'banner', 'images'),
(13, 'default', 2, 'banner', 'images'),
(14, 'default', 1, 'club', 'images'),
(15, 'default', 2, 'club', 'images'),
(16, 'default', 3, 'club', 'images'),
(17, 'default', 4, 'club', 'images'),
(18, 'default', 1, 'jornadatema', 'images'),
(19, 'default', 2, 'noticia', 'images'),
(20, 'default', 1, 'galeria', 'images'),
(21, 'default', 2, 'galeria', 'images'),
(22, 'default', 3, 'galeria', 'images'),
(23, 'default', 4, 'galeria', 'mixed');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE IF NOT EXISTS `banner` (
  `id` int(40) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `ordinal` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `name`, `link`, `ordinal`) VALUES
(1, 'test', 'test', 1),
(2, 'test', 'test', 2);

-- --------------------------------------------------------

--
-- Table structure for table `campeon`
--

CREATE TABLE IF NOT EXISTS `campeon` (
  `id` int(40) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `periodo` varchar(255) NOT NULL,
  `ordinal` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `ip_address` varchar(16) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `user_agent` varchar(150) COLLATE utf8_bin NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` longtext COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `club`
--

CREATE TABLE IF NOT EXISTS `club` (
  `id` int(40) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `link` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `departmentid` int(40) NOT NULL,
  `ordinal` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `departmentid` (`departmentid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `club`
--

INSERT INTO `club` (`id`, `name`, `description`, `link`, `location`, `departmentid`, `ordinal`) VALUES
(1, 'test', 'test', 'test', 'test', 1, 1),
(2, 'test2', '4532423', 'test', '423423423', 1, 0),
(3, '543534', '543534534', '543534', '534534', 2, 1),
(4, '&lt;&lt;zzzzz', 'zzzzzzzzzzz', 'zzzzzzzz', 'zzzzzzzzzz', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `departamento`
--

CREATE TABLE IF NOT EXISTS `departamento` (
  `id` int(40) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text,
  `ordinal` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `departamento`
--

INSERT INTO `departamento` (`id`, `name`, `description`, `ordinal`) VALUES
(1, ' test12312', 'testests', 1),
(2, 'test', 'Soy una prueba de algo que se puede insertar!! &lt;br /&gt;&lt;strong&gt;Prepago Test&lt;/strong&gt; &lt;br class=&quot;atl-forced-newline&quot; /&gt; \n&lt;ul&gt;\n&lt;li&gt;URL:&amp;nbsp;&lt;a class=&quot;external-link&quot; rel=&quot;nofollow&quot; href=&quot;http://192.168.180.29:8092/gre-web-services/Services?wsdl&quot;&gt;http://192.168.180.29:8092/gre-web-services/Services?wsdl&lt;/a&gt;&lt;/li&gt;\n&lt;li&gt;Usuario: GEOCOM&amp;nbsp;&lt;/li&gt;\n&lt;li&gt;Comercio:&amp;nbsp;COMGEOAUT&lt;/li&gt;\n&lt;li&gt;Terminal:&amp;nbsp;GEOAUT01&lt;/li&gt;\n&lt;/ul&gt;', 0);

-- --------------------------------------------------------

--
-- Table structure for table `deportista`
--

CREATE TABLE IF NOT EXISTS `deportista` (
  `id` int(40) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `periodo` varchar(255) NOT NULL,
  `ordinal` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `document`
--

CREATE TABLE IF NOT EXISTS `document` (
  `id` int(40) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `ordinal` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `document`
--

INSERT INTO `document` (`id`, `name`, `tipo`, `ordinal`) VALUES
(1, 'test', 'doc', 0),
(2, 'test2', 'doc', 1),
(3, 'Formulario', 'form', 1),
(4, 'test form123', 'form', 0);

-- --------------------------------------------------------

--
-- Table structure for table `galeria`
--

CREATE TABLE IF NOT EXISTS `galeria` (
  `id` int(40) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `ordinal` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `galeria`
--

INSERT INTO `galeria` (`id`, `name`, `ordinal`) VALUES
(1, 'test', 1),
(2, 'test2131', 2),
(3, '656442', 3),
(4, 'mixed', 4);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `id` smallint(9) NOT NULL AUTO_INCREMENT,
  `path` varchar(256) DEFAULT NULL,
  `name` varchar(64) DEFAULT NULL,
  `type` varchar(32) DEFAULT NULL,
  `album_id` smallint(9) DEFAULT NULL,
  `ordinal` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fk_images_album` (`album_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `path`, `name`, `type`, `album_id`, `ordinal`) VALUES
(2, '/home/rodrigo/proyectos/ci/my-framework-prototype/branches/feu/assets/uploads/976281fd0f9a180b5e1cff388f97211fb.pdf', 'MAV Dealers - Documentacion.pdf', 'pdf', 9, 1),
(3, '/home/rodrigo/proyectos/ci/my-framework-prototype/branches/feu/assets/uploads/95e3398bc452b4f5d6f208a7fdf224c0f.doc', 'Especificación de web services CSP v1.1.doc', 'doc', 9, 2),
(4, '/home/rodrigo/proyectos/ci/my-framework-prototype/branches/feu/assets/uploads/9820b16ee9d5f65196111cf7ff157615d.jpg', ' 11.jpg', 'jpg', 9, 3),
(5, '/home/rodrigo/proyectos/ci/my-framework-prototype/branches/feu/assets/uploads/1473662890eec46e064dbed1038639f8f5.png', 'antel_epin_cert.png', 'png', 14, 1),
(6, '/home/rodrigo/proyectos/ci/my-framework-prototype/branches/feu/assets/uploads/15a7933ac3266abafb38efdee8864db540.png', 'mts_mensaje_ws_subscriptores.png', 'png', 15, 1),
(7, '/home/rodrigo/proyectos/ci/my-framework-prototype/branches/feu/assets/uploads/1601a032960c283f71940001e55bddfb0f.jpg', 'Foto0527.jpg', 'jpg', 16, 1),
(8, '/home/rodrigo/proyectos/ci/my-framework-prototype/branches/feu/assets/uploads/18677d3a0b41c7184d2328b51f94c7978d.pdf', 'rc197-010-SpringIntegration_0.pdf', 'pdf', 18, 1),
(9, '/home/rodrigo/proyectos/ci/my-framework-prototype/branches/feu/assets/uploads/19b8fe61840a0b666eec6234fa712fc239.pdf', 'rc197-010-SpringIntegration_0.pdf', 'pdf', 19, 1),
(10, '/home/rodrigo/proyectos/ci/my-framework-prototype/branches/feu/assets/uploads/19399e173fba2b19cd49491fdf6d3f0c29.jpg', 'BANDERA FEU.jpg', 'jpg', 19, 0),
(11, '/home/rodrigo/proyectos/ci/my-framework-prototype/branches/feu/assets/uploads/205412386aa0443e87638c53efcfa2f474.png', 'consoleOnlyCroped1.png', 'png', 20, 1);

-- --------------------------------------------------------

--
-- Table structure for table `jornada`
--

CREATE TABLE IF NOT EXISTS `jornada` (
  `id` int(40) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `ordinal` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `jornada`
--

INSERT INTO `jornada` (`id`, `name`, `ordinal`) VALUES
(1, 'jornada1', 0),
(2, 'jornada2', 2),
(3, '12-jornada3', 1);

-- --------------------------------------------------------

--
-- Table structure for table `jornadatema`
--

CREATE TABLE IF NOT EXISTS `jornadatema` (
  `id` int(40) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `orator` varchar(255) NOT NULL,
  `jornadaid` int(40) NOT NULL,
  `ordinal` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `jornadaid` (`jornadaid`),
  KEY `jornadaid_2` (`jornadaid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `jornadatema`
--

INSERT INTO `jornadatema` (`id`, `name`, `orator`, `jornadaid`, `ordinal`) VALUES
(1, 'test', 'test', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `laboratorio`
--

CREATE TABLE IF NOT EXISTS `laboratorio` (
  `id` int(40) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `ordinal` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `laboratorio`
--

INSERT INTO `laboratorio` (`id`, `name`, `link`, `ordinal`) VALUES
(1, 'test 45645', 'testes23423', 1),
(2, 'yytr', 'hhh', 0);

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
-- Table structure for table `noticia`
--

CREATE TABLE IF NOT EXISTS `noticia` (
  `id` int(40) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text,
  `ordinal` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `noticia`
--

INSERT INTO `noticia` (`id`, `name`, `description`, `ordinal`) VALUES
(2, 'test', 'test', 1);

-- --------------------------------------------------------

--
-- Table structure for table `presidente`
--

CREATE TABLE IF NOT EXISTS `presidente` (
  `id` int(40) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `periodo` varchar(255) NOT NULL,
  `ordinal` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `radio`
--

CREATE TABLE IF NOT EXISTS `radio` (
  `id` int(40) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `ordinal` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `radio`
--

INSERT INTO `radio` (`id`, `name`, `link`, `ordinal`) VALUES
(6, 'test', 'test', 1),
(7, 'test324', 'tests24423', 2),
(8, '423423', '423423432', 0);

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `activated`, `banned`, `ban_reason`, `new_password_key`, `new_password_requested`, `new_email`, `new_email_key`, `last_ip`, `last_login`, `created`, `modified`) VALUES
(2, 'admin', '$P$BLcJ/R6.B4IG93UnZunn14heHtRclr.', 'rsantellan@gmail.com', 1, 0, NULL, NULL, NULL, NULL, NULL, '127.0.0.1', '2014-01-20 16:52:38', '2012-08-20 18:05:44', '2014-01-20 18:52:38');

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

-- --------------------------------------------------------

--
-- Table structure for table `veterinario`
--

CREATE TABLE IF NOT EXISTS `veterinario` (
  `id` int(40) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `contacto` varchar(255) NOT NULL,
  `isboss` tinyint(1) DEFAULT '0',
  `ordinal` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `veterinario`
--

INSERT INTO `veterinario` (`id`, `name`, `contacto`, `isboss`, `ordinal`) VALUES
(1, 'test', 'test', 1, 1),
(2, 'jeje', 'ejee', 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `youtubevideo`
--

CREATE TABLE IF NOT EXISTS `youtubevideo` (
  `id` int(40) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `src` varchar(255) NOT NULL,
  `code` varchar(64) NOT NULL,
  `duration` varchar(64) NOT NULL,
  `description` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `album_id` smallint(9) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_youtubevideo_album` (`album_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `albumcontent`
--
ALTER TABLE `albumcontent`
  ADD CONSTRAINT `fk_albumcontent_album` FOREIGN KEY (`album_id`) REFERENCES `albums` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `club`
--
ALTER TABLE `club`
  ADD CONSTRAINT `club_ibfk_1` FOREIGN KEY (`departmentid`) REFERENCES `departamento` (`id`);

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `fk_images_album` FOREIGN KEY (`album_id`) REFERENCES `albums` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `jornadatema`
--
ALTER TABLE `jornadatema`
  ADD CONSTRAINT `jornadatema_ibfk_3` FOREIGN KEY (`jornadaid`) REFERENCES `jornada` (`id`),
  ADD CONSTRAINT `jornadatema_ibfk_1` FOREIGN KEY (`jornadaid`) REFERENCES `jornada` (`id`),
  ADD CONSTRAINT `jornadatema_ibfk_2` FOREIGN KEY (`jornadaid`) REFERENCES `jornada` (`id`);

--
-- Constraints for table `youtubevideo`
--
ALTER TABLE `youtubevideo`
  ADD CONSTRAINT `fk_youtubevideo_album` FOREIGN KEY (`album_id`) REFERENCES `albums` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
SET FOREIGN_KEY_CHECKS=1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
