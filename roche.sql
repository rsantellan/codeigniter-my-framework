-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 03, 2013 at 06:31 PM
-- Server version: 5.5.31
-- PHP Version: 5.3.10-1ubuntu3.6

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `roche`
--

-- --------------------------------------------------------

--
-- Table structure for table `albums`
--

CREATE TABLE IF NOT EXISTS `albums` (
  `id` smallint(9) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) DEFAULT NULL,
  `obj_id` smallint(9) DEFAULT NULL,
  `obj_class` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Table structure for table `categorias`
--

CREATE TABLE IF NOT EXISTS `categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text,
  `order` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `language_keys`
--

CREATE TABLE IF NOT EXISTS `language_keys` (
  `key` varchar(255) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `module` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `language_keys`
--

INSERT INTO `language_keys` (`key`, `filename`, `comment`, `module`) VALUES
('header', 'global_lang.php', '', 'sitio'),
('menu_inicio', 'global_lang.php', '', 'sitio'),
('menu_historia', 'global_lang.php', '', 'sitio'),
('menu_Servicios', 'global_lang.php', '', 'sitio'),
('menu_clientes', 'global_lang.php', '', 'sitio'),
('menu_certificacion', 'global_lang.php', '', 'sitio'),
('menu_contacto', 'global_lang.php', '', 'sitio'),
('destacados_titulo', 'global_lang.php', '', 'sitio'),
('destacados_ver_mas', 'global_lang.php', '', 'sitio'),
('footer_informacion', 'global_lang.php', '', 'sitio'),
('historia_titulo', 'historia_lang.php', '', 'sitio'),
('historia_sub_titulo', 'historia_lang.php', '', 'sitio'),
('historia_columna_izquierda', 'historia_lang.php', '', 'sitio'),
('historia_columna_centro', 'historia_lang.php', '', 'sitio'),
('historia_columna_derecha', 'historia_lang.php', '', 'sitio'),
('contacto_titulo', 'contacto_lang.php', '', 'sitio'),
('contacto_sub_titulo', 'contacto_lang.php', '', 'sitio'),
('contacto_consulta', 'contacto_lang.php', '', 'sitio'),
('contacto_nombre', 'contacto_lang.php', '', 'sitio'),
('contacto_email', 'contacto_lang.php', '', 'sitio'),
('contacto_texto', 'contacto_lang.php', '', 'sitio'),
('servicios_titulo', 'servicios_lang.php', '', 'sitio'),
('certificacion_titulo', 'certificacion_lang.php', '', 'sitio'),
('certificacion_sub_titulo', 'certificacion_lang.php', '', 'sitio'),
('certificacion_columna_izquierda', 'certificacion_lang.php', '', 'sitio'),
('certificacion_columna_centro', 'certificacion_lang.php', '', 'sitio'),
('certificacion_columna_derecha', 'certificacion_lang.php', '', 'sitio'),
('clientes_titulo', 'clientes_lang.php', '', 'sitio'),
('clientes_sub_titulo', 'clientes_lang.php', '', 'sitio'),
('clientes_industria', 'clientes_lang.php', '', 'sitio'),
('clientes_edilicia', 'clientes_lang.php', '', 'sitio'),
('clientes_privados', 'clientes_lang.php', '', 'sitio');

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
-- Table structure for table `mail_db`
--

CREATE TABLE IF NOT EXISTS `mail_db` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `direccion` varchar(255) NOT NULL,
  `tipo` varchar(5) NOT NULL DEFAULT 'to',
  `nombre` varchar(255) NOT NULL,
  `funcion` varchar(255) NOT NULL DEFAULT 'contacto',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `mail_db`
--

INSERT INTO `mail_db` (`id`, `direccion`, `tipo`, `nombre`, `funcion`) VALUES
(1, 'rsantellan@gmail.com', 'from', 'Rodrigo Santellan', 'contacto'),
(2, 'rswibmer@hotmail.com', 'to', 'Ignacio Wibmer', 'contacto'),
(3, 'rswibmer@hotmail.com', 'cc', 'Juan', 'contacto'),
(4, 'rsantellan@gmail.com', 'bcc', 'pepito', 'contacto'),
(5, 'rodrigosantellan@yahoo.com.ar', 'reply', 'Reply to', 'contacto');

-- --------------------------------------------------------

--
-- Table structure for table `roche_usuarios`
--

CREATE TABLE IF NOT EXISTS `roche_usuarios` (
  `id` int(40) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `ci` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `center` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ci` (`ci`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `roche_usuarios`
--

INSERT INTO `roche_usuarios` (`id`, `name`, `lastname`, `ci`, `phone`, `center`) VALUES
(7, 'test', 'test 1', '432423', '', ''),
(8, 'Juan', 'perez', '7889456', '6542', 'Hevangelico'),
(9, '432423', '312312', '312312312', '312312312', '3123123'),
(10, 'test 1', 'test 1', '4325hgf', 'gdster543534543', 'ahdgfd');

-- --------------------------------------------------------

--
-- Table structure for table `roche_usuarios_ficha`
--

CREATE TABLE IF NOT EXISTS `roche_usuarios_ficha` (
  `id` int(40) NOT NULL AUTO_INCREMENT,
  `roche_usuarios_id` int(40) NOT NULL,
  `fecha_ingreso` date DEFAULT NULL,
  `filepath` varchar(255) NOT NULL,
  `filename` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `roche_usuarios_ficha`
--

INSERT INTO `roche_usuarios_ficha` (`id`, `roche_usuarios_id`, `fecha_ingreso`, `filepath`, `filename`) VALUES
(2, 7, NULL, '/media/olddisk/home/rodrigo/proyectos/ci/my-framework-prototype/branches/roche/assets/uploads/roche/', 'c5_phpinfo.png'),
(3, 8, NULL, '/media/olddisk/home/rodrigo/proyectos/ci/my-framework-prototype/branches/roche/assets/uploads/roche/', 'Screenshot_-_02252013_-_11:39:03_AM.png'),
(4, 9, '2013-05-16', '/media/olddisk/home/rodrigo/proyectos/ci/my-framework-prototype/branches/roche/assets/uploads/roche/', 'Screenshot_-_04172013_-_12:49:34_PM.png'),
(5, 10, '2013-05-15', '/media/olddisk/home/rodrigo/proyectos/ci/my-framework-prototype/branches/roche/assets/uploads/roche/', 'Screenshot_-_10032012_-_12:39:50_PM.png');

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
  `last_ip` varchar(40) COLLATE utf8_bin NOT NULL DEFAULT '0000-00-00 00:00:00',
  `last_login` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `activated`, `banned`, `ban_reason`, `new_password_key`, `new_password_requested`, `new_email`, `new_email_key`, `last_ip`, `last_login`, `created`, `modified`) VALUES
(2, 'admin', '$P$BLcJ/R6.B4IG93UnZunn14heHtRclr.', 'rsantellan@gmail.com', 1, 0, NULL, NULL, NULL, NULL, NULL, '127.0.0.1', '2013-05-03 14:22:30', '2012-08-20 18:05:44', '2013-05-03 17:22:30');

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
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `fk_images_album` FOREIGN KEY (`album_id`) REFERENCES `albums` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
SET FOREIGN_KEY_CHECKS=1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
