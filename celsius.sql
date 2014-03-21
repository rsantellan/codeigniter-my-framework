-- phpMyAdmin SQL Dump
-- version 4.0.6deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 13, 2014 at 01:27 PM
-- Server version: 5.5.35-0ubuntu0.13.10.2
-- PHP Version: 5.5.3-1ubuntu2.2

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `celsius`
--

-- --------------------------------------------------------

--
-- Table structure for table `albumcontent`
--

DROP TABLE IF EXISTS `albumcontent`;
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `albumcontent`
--

INSERT INTO `albumcontent` (`id`, `path`, `name`, `type`, `contenttype`, `url`, `code`, `description`, `extradata`, `album_id`, `ordinal`) VALUES
(1, '/home/rodrigo/proyectos/ci/my-framework-prototype/branches/celsius/assets/uploads/2/30.jpg', 'Algo nuevo', 'jpg', 'content-image', NULL, NULL, NULL, NULL, 2, 1),
(2, '/home/rodrigo/proyectos/ci/my-framework-prototype/branches/celsius/assets/uploads/2/31.jpg', 'Algo nuevo', 'jpg', 'content-image', NULL, NULL, NULL, NULL, 2, 2),
(3, '/home/rodrigo/proyectos/ci/my-framework-prototype/branches/celsius/assets/uploads/2/32.jpg', 'Algo nuevo', 'jpg', 'content-image', NULL, NULL, NULL, NULL, 2, 3),
(4, '/home/rodrigo/proyectos/ci/my-framework-prototype/branches/celsius/assets/uploads/2/33.jpg', 'Algo nuevo', 'jpg', 'content-image', NULL, NULL, NULL, NULL, 2, 4),
(5, '/home/rodrigo/proyectos/ci/my-framework-prototype/branches/celsius/assets/uploads/2/34.jpg', 'Algo nuevo', 'jpg', 'content-image', NULL, NULL, NULL, NULL, 2, 5),
(6, '/home/rodrigo/proyectos/ci/my-framework-prototype/branches/celsius/assets/uploads/1/29.jpg', 'Algo nuevo', 'jpg', 'content-image', NULL, NULL, NULL, NULL, 1, 1),
(7, '/home/rodrigo/proyectos/ci/my-framework-prototype/branches/celsius/assets/uploads/3/1.jpg', 'Algo nuevo', 'jpg', 'content-image', NULL, NULL, NULL, NULL, 3, 1),
(8, '/home/rodrigo/proyectos/ci/my-framework-prototype/branches/celsius/assets/uploads/7/14.jpg', 'Algo nuevo', 'jpg', 'content-image', NULL, NULL, NULL, NULL, 7, 1),
(9, '/home/rodrigo/proyectos/ci/my-framework-prototype/branches/celsius/assets/uploads/11/9.jpg', 'Algo nuevo', 'jpg', 'content-image', NULL, NULL, NULL, NULL, 11, 1),
(10, '/home/rodrigo/proyectos/ci/my-framework-prototype/branches/celsius/assets/uploads/12/12.jpg', 'Algo nuevo', 'jpg', 'content-image', NULL, NULL, NULL, NULL, 12, 1),
(11, '/home/rodrigo/proyectos/ci/my-framework-prototype/branches/celsius/assets/uploads/13/30.jpg', 'Algo nuevo', 'jpg', 'content-image', NULL, NULL, NULL, NULL, 13, 1),
(12, '/home/rodrigo/proyectos/ci/my-framework-prototype/branches/celsius/assets/uploads/14/43.jpg', 'Algo nuevo', 'jpg', 'content-image', NULL, NULL, NULL, NULL, 14, 1),
(13, '/home/rodrigo/proyectos/ci/my-framework-prototype/branches/celsius/assets/uploads/15/27.jpg', 'Algo nuevo', 'jpg', 'content-image', NULL, NULL, NULL, NULL, 15, 1),
(14, '/home/rodrigo/proyectos/ci/my-framework-prototype/branches/celsius/assets/uploads/16/61.jpg', 'Algo nuevo', 'jpg', 'content-image', NULL, NULL, NULL, NULL, 16, 1),
(15, '/home/rodrigo/proyectos/ci/my-framework-prototype/branches/celsius/assets/uploads/24/11.jpg', 'Algo nuevo', 'jpg', 'content-image', NULL, NULL, NULL, NULL, 24, 1),
(16, '/home/rodrigo/proyectos/ci/my-framework-prototype/branches/celsius/assets/uploads/25/11.jpg', 'Algo nuevo', 'jpg', 'content-image', NULL, NULL, NULL, NULL, 25, 1),
(17, '/home/rodrigo/proyectos/ci/my-framework-prototype/branches/celsius/assets/uploads/25/12.jpg', 'Algo nuevo', 'jpg', 'content-image', NULL, NULL, NULL, NULL, 25, 2),
(18, '/home/rodrigo/proyectos/ci/my-framework-prototype/branches/celsius/assets/uploads/25/14.jpg', 'Algo nuevo', 'jpg', 'content-image', NULL, NULL, NULL, NULL, 25, 3),
(19, '/home/rodrigo/proyectos/ci/my-framework-prototype/branches/celsius/assets/uploads/26/20.jpg', 'Algo nuevo', 'jpg', 'content-image', NULL, NULL, NULL, NULL, 26, 1),
(20, '/home/rodrigo/proyectos/ci/my-framework-prototype/branches/celsius/assets/uploads/26/21.jpg', 'Algo nuevo', 'jpg', 'content-image', NULL, NULL, NULL, NULL, 26, 2),
(21, '/home/rodrigo/proyectos/ci/my-framework-prototype/branches/celsius/assets/uploads/26/22.jpg', 'Algo nuevo', 'jpg', 'content-image', NULL, NULL, NULL, NULL, 26, 3),
(22, '/home/rodrigo/proyectos/ci/my-framework-prototype/branches/celsius/assets/uploads/29/14.jpg', '14.jpg', 'jpg', 'content-image', NULL, NULL, NULL, NULL, 29, 1),
(23, '/home/rodrigo/proyectos/ci/my-framework-prototype/branches/celsius/assets/uploads/31/22.jpg', '22.jpg', 'jpg', 'content-image', NULL, NULL, NULL, NULL, 31, 1),
(24, '/home/rodrigo/proyectos/ci/my-framework-prototype/branches/celsius/assets/uploads/32/30.jpg', '30.jpg', 'jpg', 'content-image', NULL, NULL, NULL, NULL, 32, 1);

-- --------------------------------------------------------

--
-- Table structure for table `albums`
--

DROP TABLE IF EXISTS `albums`;
CREATE TABLE IF NOT EXISTS `albums` (
  `id` smallint(9) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) DEFAULT NULL,
  `obj_id` smallint(9) DEFAULT NULL,
  `obj_class` varchar(64) DEFAULT NULL,
  `atype` varchar(64) NOT NULL DEFAULT 'images',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `albums`
--

INSERT INTO `albums` (`id`, `name`, `obj_id`, `obj_class`, `atype`) VALUES
(1, 'default', 1, 'mnew', 'images'),
(2, 'default', 2, 'mnew', 'images'),
(3, 'es', 1, 'studycase', 'images'),
(4, 'en', 1, 'studycase', 'images'),
(5, 'es', 2, 'studycase', 'images'),
(6, 'en', 2, 'studycase', 'images'),
(7, 'es', 3, 'studycase', 'images'),
(8, 'en', 3, 'studycase', 'images'),
(9, 'default', 3, 'mnew', 'images'),
(10, 'default', 1, 'event', 'images'),
(11, 'default', 2, 'event', 'images'),
(12, 'default', 3, 'event', 'images'),
(13, 'default', 4, 'event', 'images'),
(14, 'default', 5, 'event', 'images'),
(15, 'default', 1, 'ocongress', 'images'),
(16, 'default', 2, 'ocongress', 'images'),
(17, 'imagen', 1, 'product', 'images'),
(18, 'medico-es', 1, 'product', 'images'),
(19, 'medico-en', 1, 'product', 'images'),
(20, 'folleto-es', 1, 'presentation', 'images'),
(21, 'folleto-en', 1, 'presentation', 'images'),
(22, 'folleto-es', 2, 'presentation', 'images'),
(23, 'folleto-en', 2, 'presentation', 'images'),
(24, 'imagen', 2, 'product', 'images'),
(25, 'medico-es', 2, 'product', 'images'),
(26, 'medico-en', 2, 'product', 'images'),
(27, 'folleto-es', 3, 'presentation', 'images'),
(28, 'folleto-en', 3, 'presentation', 'images'),
(29, 'folleto-es', 4, 'presentation', 'images'),
(30, 'folleto-en', 4, 'presentation', 'images'),
(31, 'default', 1, 'link', 'images'),
(32, 'default', 2, 'link', 'images'),
(33, 'default', 3, 'link', 'images');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(40) NOT NULL AUTO_INCREMENT,
  `ordinal` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `ordinal`) VALUES
(4, 2),
(5, 3),
(6, 4),
(7, 5),
(8, 6),
(9, 7),
(10, 8),
(11, 9),
(12, 10),
(13, 11),
(14, 12),
(15, 13),
(16, 14),
(17, 15),
(18, 16),
(19, 17);

-- --------------------------------------------------------

--
-- Table structure for table `category_translation`
--

DROP TABLE IF EXISTS `category_translation`;
CREATE TABLE IF NOT EXISTS `category_translation` (
  `id` int(40) NOT NULL AUTO_INCREMENT,
  `lang` varchar(3) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  PRIMARY KEY (`id`,`lang`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `category_translation`
--

INSERT INTO `category_translation` (`id`, `lang`, `name`, `slug`) VALUES
(4, 'es', 'psiquiatría', 'psiquiatria'),
(5, 'es', 'neurología', 'neurologia'),
(6, 'es', 'cardiología', 'cardiologia'),
(7, 'es', 'gastroenterología', 'gastroenterologia'),
(8, 'es', 'corticoides', 'corticoides'),
(9, 'es', 'antimióticos', 'antimioticos'),
(10, 'es', 'ginecología', 'ginecologia'),
(11, 'es', 'antibióticos', 'antibioticos'),
(12, 'es', 'sistema respiratorio', 'sistema-respiratorio'),
(13, 'es', 'urología', 'urologia'),
(14, 'es', 'sangre y aparato hematopoyetico', 'sangre-y-aparato-hematopoyetico'),
(15, 'es', 'sistema músculo-esquelético', 'sistema-musculo-esqueletico'),
(16, 'es', 'vitaminas', 'vitaminas'),
(17, 'es', 'dermatología', 'dermatologia'),
(18, 'es', 'antiparasitarios', 'antiparasitarios'),
(19, 'es', 'antiinflamatorios', 'antiinflamatorios');

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

DROP TABLE IF EXISTS `ci_sessions`;
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
-- Table structure for table `country`
--

DROP TABLE IF EXISTS `country`;
CREATE TABLE IF NOT EXISTS `country` (
  `id` int(40) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `flag` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `name`, `flag`) VALUES
(1, 'Republica Dominicana', 'repdominicana'),
(2, 'Paraguay', 'paraguay'),
(3, 'Ecuador', 'ecuador'),
(4, 'Trinidad y Tobago', 'trinidad'),
(5, 'Peru', 'peru'),
(6, 'Vietnam', 'vietnam'),
(7, 'Guatemala', 'guatemala'),
(8, 'Cuba', 'cuba'),
(9, 'Panama', 'panama'),
(10, 'El Salvador', 'elsalvador'),
(11, 'Barbados', 'barbados'),
(12, 'Costa Rica', 'costarica');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

DROP TABLE IF EXISTS `event`;
CREATE TABLE IF NOT EXISTS `event` (
  `id` int(40) NOT NULL AUTO_INCREMENT,
  `congress` int(1) NOT NULL DEFAULT '0',
  `ordinal` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `congress`, `ordinal`) VALUES
(1, 0, 1),
(2, 0, 0),
(3, 0, 2),
(4, 0, 3),
(5, 0, 4);

-- --------------------------------------------------------

--
-- Table structure for table `event_translation`
--

DROP TABLE IF EXISTS `event_translation`;
CREATE TABLE IF NOT EXISTS `event_translation` (
  `id` int(40) NOT NULL AUTO_INCREMENT,
  `lang` varchar(3) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `members` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  PRIMARY KEY (`id`,`lang`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `event_translation`
--

INSERT INTO `event_translation` (`id`, `lang`, `name`, `description`, `members`, `slug`) VALUES
(1, 'es', 'test', 'test', 'test', 'test'),
(2, 'es', 'algo219', 'lkjfasdekj', '90kljdfsafasd', 'algo219'),
(3, 'es', 'jeje', 'lsdfklj', 'qlkjfs90i23', 'jeje'),
(4, 'es', 'vv', 'description', 'members', 'vv'),
(5, 'es', 'gfghf', 'hgfhfg', 'hfghfghfg', 'gfghf');

-- --------------------------------------------------------

--
-- Table structure for table `language_keys`
--

DROP TABLE IF EXISTS `language_keys`;
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
('presentacion_titulo', 'empresa_lang.php', '', 'celsius'),
('presentacion_texto', 'empresa_lang.php', '', 'celsius'),
('presentacion_texto1', 'empresa_lang.php', '', 'celsius'),
('infraestructura_titulo', 'empresa_lang.php', '', 'celsius'),
('infraestructura_texto', 'empresa_lang.php', '', 'celsius'),
('mercados_titulo', 'empresa_lang.php', '', 'celsius'),
('mercados_texto', 'empresa_lang.php', '', 'celsius'),
('recursoshumanos_titulo', 'empresa_lang.php', '', 'celsius'),
('recursoshumanos_texto', 'empresa_lang.php', '', 'celsius'),
('salonconferencias_texto', 'empresa_lang.php', '', 'celsius'),
('novedad_leer_mas', 'congresos_lang.php', '', 'celsius'),
('menu_spanish', 'casoestudio_lang.php', '', 'celsius'),
('consultamedico_title', 'consultamedico_lang.php', '', 'celsius'),
('consultamedico_aviso', 'consultamedico_lang.php', '', 'celsius'),
('contacto_title', 'contacto_lang.php', '', 'celsius'),
('contacto_company_data', 'contacto_lang.php', '', 'celsius');

-- --------------------------------------------------------

--
-- Table structure for table `link`
--

DROP TABLE IF EXISTS `link`;
CREATE TABLE IF NOT EXISTS `link` (
  `id` int(40) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `ordinal` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `link`
--

INSERT INTO `link` (`id`, `name`, `url`, `ordinal`) VALUES
(1, 'test 1', 'http://celsius.framework', 1),
(2, 'test ', 'http://celsius.framework/es', 2),
(3, 'test 1232', 'http://celsius.framework/en', 3);

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

DROP TABLE IF EXISTS `login_attempts`;
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

DROP TABLE IF EXISTS `mail_db`;
CREATE TABLE IF NOT EXISTS `mail_db` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `direccion` varchar(255) NOT NULL,
  `tipo` varchar(5) NOT NULL DEFAULT 'to',
  `nombre` varchar(255) NOT NULL,
  `funcion` varchar(255) NOT NULL DEFAULT 'contacto',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `mail_db`
--

INSERT INTO `mail_db` (`id`, `direccion`, `tipo`, `nombre`, `funcion`) VALUES
(1, 'rsantellan@gmail.com', 'from', 'Rodrigo Santellan', 'contacto'),
(2, 'rswibmer@hotmail.com', 'to', 'Ignacio Wibmer', 'contacto'),
(3, 'rswibmer@hotmail.com', 'cc', 'Juan', 'contacto'),
(4, 'rsantellan@gmail.com', 'bcc', 'pepito', 'contacto'),
(5, 'rodrigosantellan@yahoo.com.ar', 'reply', 'Reply to', 'contacto'),
(6, 'rsantellan@gmail.com', 'from', 'Rodrigo Santellan', 'medicos'),
(7, 'rswibmer@hotmail.com', 'to', 'Ignacio Wibmer', 'medicos'),
(8, 'rodrigosantellan@yahoo.com.ar', 'reply', 'Reply to', 'medicos'),
(9, 'rsantellan@gmail.com', 'from', 'Rodrigo Santellan', 'trabaja'),
(10, 'rswibmer@hotmail.com', 'to', 'Ignacio Wibmer', 'trabaja'),
(11, 'rodrigosantellan@yahoo.com.ar', 'reply', 'Reply to', 'trabaja');

-- --------------------------------------------------------

--
-- Table structure for table `mnew`
--

DROP TABLE IF EXISTS `mnew`;
CREATE TABLE IF NOT EXISTS `mnew` (
  `id` int(40) NOT NULL AUTO_INCREMENT,
  `slider` int(1) NOT NULL DEFAULT '0',
  `ordinal` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `mnew`
--

INSERT INTO `mnew` (`id`, `slider`, `ordinal`) VALUES
(1, 1, 0),
(2, 1, 1),
(3, 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `mnew_translation`
--

DROP TABLE IF EXISTS `mnew_translation`;
CREATE TABLE IF NOT EXISTS `mnew_translation` (
  `id` int(40) NOT NULL AUTO_INCREMENT,
  `lang` varchar(3) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `slug` varchar(255) NOT NULL,
  PRIMARY KEY (`id`,`lang`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `mnew_translation`
--

INSERT INTO `mnew_translation` (`id`, `lang`, `name`, `description`, `slug`) VALUES
(1, 'es', 'test', 'testsetst s', 'test'),
(2, 'es', '&quot;Pesca&quot; de votos dentro del FA genera quejas internas', '&lt;div class=&quot;article-content&quot;&gt;\n&lt;p id=&quot;m74-1-75&quot;&gt;La campa&amp;ntilde;a para las elecciones internas dentro  del Frente Amplio comenz&amp;oacute; en un clima de desconfianza. Una prueba de  ello fue un comentario que hizo en Facebook el diputado Alejandro  S&amp;aacute;nchez (MPP) donde indic&amp;oacute;: &quot;hay que andar con m&amp;aacute;s cuidado!! Ya que con  tanto `compa&amp;ntilde;er@s` obsesionado por pescar en la pecera, el ambiente  frenteamplista esta llenito de anzuelos!!!&quot;.&lt;/p&gt;\n&lt;p id=&quot;m81-2-82&quot;&gt;Esta frase gener&amp;oacute; comentarios de otros dirigentes  frenteamplistas que se quejaron de la lucha interna por conseguir votos.  &quot;En Paysand&amp;uacute; est&amp;aacute; bravo. Es una pena, los votos los tenemos que buscar  afuera&quot;, escribi&amp;oacute; en Facebook una militante del MPP en ese departamento.&lt;/p&gt;\n&lt;p id=&quot;m88-3-89&quot;&gt;&quot;C&amp;oacute;mo cuesta aprender que la izquierda avanza y se  desarrolla, cu&amp;aacute;ndo dejamos de luchar contra el enemigo interno y nos  ponemos a construir propuestas y abrirnos las puertas para que entre m&amp;aacute;s  pueblo a engrosar la fila!!! Hay que terminar con el internismo  paralizante y organizar lo que no est&amp;aacute; organizado!!&quot;, insisti&amp;oacute; S&amp;aacute;nchez.&lt;/p&gt;\n&lt;p id=&quot;m95-4-96&quot;&gt;Consultado por El Pa&amp;iacute;s, el legislador prefiri&amp;oacute; no hacer  comentarios al respecto y solo se limit&amp;oacute; a se&amp;ntilde;alar que no se refiri&amp;oacute; a  la captaci&amp;oacute;n de dirigentes del MPP por parte de otros sectores de la  coalici&amp;oacute;n.&lt;/p&gt;\n&lt;p id=&quot;m102-5-103&quot;&gt;El diputado An&amp;iacute;bal Pereyra, tambi&amp;eacute;n del MPP, dijo a  El Pa&amp;iacute;s que &quot;en una campa&amp;ntilde;a electoral cada uno trata de acumular hasta  donde le llega la ca&amp;ntilde;a, unos pueden tirar m&amp;aacute;s lejos y otros le queda  mejor tirar en la pecera. Eso no es nuevo, pero no me consta que exista  un caso concreto&quot;.&lt;/p&gt;\n&lt;p id=&quot;m109-6-110&quot;&gt;Pereyra dijo que &quot;es parte de la vida misma&quot; el hecho  de que se integre un sector y luego se pase a otro dentro del propio  Frente Amplio.&lt;/p&gt;\n&lt;p class=&quot;article-ad&quot;&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p id=&quot;m116-7-117&quot;&gt;&quot;Tenemos mucha gente que perteneci&amp;oacute; a otro sector y  hay compa&amp;ntilde;eros que dejaron de participar con nosotros y est&amp;aacute;n en otra  fuerza. Mientras est&amp;eacute;n en el proyecto del Frente Amplio a mi no me  genera nada, otra cosa ser&amp;iacute;a tener una pol&amp;iacute;tica proactiva de querer  crecer desde adentro&quot;, explic&amp;oacute;.&lt;/p&gt;\n&lt;p id=&quot;m123-8-124&quot;&gt;El diputado V&amp;iacute;ctor Semproni (Espacio 609) dijo a El  Pa&amp;iacute;s que &quot;siempre dentro de la izquierda ha habido un mont&amp;oacute;n de grupos  pescando dentro de la pecera del Frente Amplio, otros nunca quisimos  pescar en la pecera del Frente Amplio&quot;.&lt;/p&gt;\n&lt;p id=&quot;m130-9-131&quot;&gt;&quot;La l&amp;iacute;nea que est&amp;aacute; marcando ahora S&amp;aacute;nchez, es la  misma l&amp;iacute;nea que marc&amp;oacute; (Jos&amp;eacute;) Pepe Mujica, siempre hay que traer gente de  afuera, porque en definitiva todos los veteranos que estamos hoy en el  Frente provenimos de los partidos tradicionales&quot;, dijo Semproni.&lt;/p&gt;\n&lt;p id=&quot;m137-10-138&quot;&gt;El sector Compromiso Frenteamplista (Lista 711), que  lidera el expresidente de Ancap Ra&amp;uacute;l Sendic, ha sido uno de los grupos  que dentro del Frente Amplio m&amp;aacute;s incorporaciones de dirigentes de otros  sectores ha tenido en los &amp;uacute;ltimos meses.&lt;/p&gt;\n&lt;p id=&quot;m144-11-145&quot;&gt;El edil Pablo Gonz&amp;aacute;lez dijo a El Pa&amp;iacute;s que &quot;la lista  711 est&amp;aacute; viviendo un momento de crecimiento en funci&amp;oacute;n de la expectativa  que ha causado en la gente. Sin duda que han llegado compa&amp;ntilde;eros de  otros sectores que se han volcado a nuestra agrupaci&amp;oacute;n pero no es una  definici&amp;oacute;n nuestra, sino un hecho de la realidad&quot;.&lt;/p&gt;\n&lt;p id=&quot;m151-12-152&quot;&gt;&quot;Nosotros no estamos para pescar en la pecera.  Estamos para construir y aportar al Frente Amplio y no para fragmentarlo  y pescar dentro de la pecera&quot;, declar&amp;oacute;.&lt;/p&gt;\n&lt;p id=&quot;m158-13-159&quot;&gt;Al ser consultado por los comentarios de S&amp;aacute;nchez,  Gonz&amp;aacute;lez se&amp;ntilde;al&amp;oacute; que Compromiso Frenteamplista &quot;no se da por aludido.  Seguramente ni tiene que ver con nosotros porque estamos viviendo un  fen&amp;oacute;meno que no se basa en salir a buscar a nadie. Simplemente estamos  construyendo un liderazgo y en ese contexto se genera esta correntada de  dirigentes que apoya a este nuevo liderazgo (por Sendic). No hay una  definici&amp;oacute;n pol&amp;iacute;tica de hacerlo&quot;.&lt;/p&gt;\n&lt;p id=&quot;m165-14-166&quot;&gt;Gonz&amp;aacute;lez  reconoci&amp;oacute; que la incorporaci&amp;oacute;n a  Compromiso Frenteamplista de dirigentes de otros sectores de la  coalici&amp;oacute;n puede generar malestar en la interna. &quot;Son las reglas de juego  y la gente es libre en decidir d&amp;oacute;nde participa, si hay compa&amp;ntilde;eros que  no logran captar la atenci&amp;oacute;n de sus seguidores no es responsabilidad de  nuestro sector&quot;, agreg&amp;oacute;.&lt;/p&gt;\n&lt;h3 id=&quot;m172-15-173&quot;&gt;&quot;Unitaria&quot;.&lt;/h3&gt;\n&lt;p id=&quot;m179-16-180&quot;&gt;El responsable de medios del MPP, Carlos Otero, dijo  a El Pa&amp;iacute;s que ese sector har&amp;aacute; una campa&amp;ntilde;a &quot;totalmente unitaria&quot;. &quot;Yo  escrib&amp;iacute; en Twitter que los Arismendi, los Quijanos, y los Garganos no  nos perdonar&amp;iacute;an perder un tercer gobierno del Frente. Vamos a hacer una  campa&amp;ntilde;a totalmente unitaria para que vote la mayor&amp;iacute;a de frenteamplistas  en la interna&quot;, precis&amp;oacute;.&lt;/p&gt;\n&lt;h3 id=&quot;m186-17-187&quot;&gt;Defensa: reclaman &quot;centrar&quot; el debate&lt;/h3&gt;\n&lt;p id=&quot;m193-18-194&quot;&gt;El exministro de Trabajo y senador Eduardo Brenta  (Vertiente Artiguista) pidi&amp;oacute; &quot;evitar falsas contradicciones&quot; en relaci&amp;oacute;n  a la pol&amp;eacute;mica sobre el gasto militar que protagoniz&amp;oacute; la precandidata  Constanza Moreira con el ministro de Defensa, Eleuterio Fern&amp;aacute;ndez  Huidobro.&lt;/p&gt;\n&lt;p id=&quot;m200-19-201&quot;&gt;Moreira se&amp;ntilde;al&amp;oacute; que es partidaria de acotar el  presupuesto de Defensa, en tanto Fern&amp;aacute;ndez Huidobro calific&amp;oacute; este tipo  de planteos como de una &quot;ignorancia supina&quot;.&lt;/p&gt;\n&lt;p id=&quot;m207-20-208&quot;&gt;&quot;Ni los que defienden la reducci&amp;oacute;n de las Fuerzas  Armadas y de su presupuesto padecen de ignorancia supina, ni los que  opinan diferente asumen la defensa de los asesinos y torturadores&quot;,  indic&amp;oacute; Brenta .&lt;/p&gt;\n&lt;p id=&quot;m214-21-215&quot;&gt;En ese sentido, el exministro pidi&amp;oacute; &quot;centrar&quot; el  debate en  las necesidades del pa&amp;iacute;s, &quot;sin eludir las diferencias pero  sin falsas contradicciones. Eso nos permitir&amp;aacute; asegurar el tercer  gobierno del Frente Amplio&quot;.&lt;/p&gt;\n&lt;/div&gt;', 'pesca-de-votos-dentro-del-fa-genera-quejas-internas'),
(3, 'es', 'test', 'test', 'test-1');

-- --------------------------------------------------------

--
-- Table structure for table `ocongress`
--

DROP TABLE IF EXISTS `ocongress`;
CREATE TABLE IF NOT EXISTS `ocongress` (
  `id` int(40) NOT NULL AUTO_INCREMENT,
  `congress` int(1) NOT NULL DEFAULT '0',
  `ordinal` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `ocongress`
--

INSERT INTO `ocongress` (`id`, `congress`, `ordinal`) VALUES
(1, 0, 1),
(2, 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `ocongress_translation`
--

DROP TABLE IF EXISTS `ocongress_translation`;
CREATE TABLE IF NOT EXISTS `ocongress_translation` (
  `id` int(40) NOT NULL AUTO_INCREMENT,
  `lang` varchar(3) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `members` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  PRIMARY KEY (`id`,`lang`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `ocongress_translation`
--

INSERT INTO `ocongress_translation` (`id`, `lang`, `name`, `description`, `members`, `slug`) VALUES
(1, 'es', 'test', 'test', 'test', 'test'),
(2, 'es', '23423', 'sdv dsgdfgdf', 'gdfgdfsgdfgdf', '23423');

-- --------------------------------------------------------

--
-- Table structure for table `presentation`
--

DROP TABLE IF EXISTS `presentation`;
CREATE TABLE IF NOT EXISTS `presentation` (
  `id` int(40) NOT NULL AUTO_INCREMENT,
  `product_id` int(40) NOT NULL,
  `ordinal` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `presentation_ibfk_1` (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `presentation`
--

INSERT INTO `presentation` (`id`, `product_id`, `ordinal`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 3),
(4, 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `presentation_country`
--

DROP TABLE IF EXISTS `presentation_country`;
CREATE TABLE IF NOT EXISTS `presentation_country` (
  `presentation_id` int(40) NOT NULL,
  `country_id` int(40) NOT NULL,
  `presencia` varchar(2) NOT NULL,
  `compuesto` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`presentation_id`,`country_id`),
  KEY `country_id` (`country_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `presentation_country`
--

INSERT INTO `presentation_country` (`presentation_id`, `country_id`, `presencia`, `compuesto`) VALUES
(2, 3, 'C', ''),
(2, 7, 'C', ''),
(3, 1, 'C', ''),
(4, 1, 'C', ''),
(4, 6, 'C', 'test'),
(4, 7, 'C', '123'),
(4, 9, 'C', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `presentation_translation`
--

DROP TABLE IF EXISTS `presentation_translation`;
CREATE TABLE IF NOT EXISTS `presentation_translation` (
  `id` int(40) NOT NULL AUTO_INCREMENT,
  `lang` varchar(3) NOT NULL,
  `name` varchar(255) NOT NULL,
  `genericname` varchar(255) NOT NULL DEFAULT '',
  `slug` varchar(255) NOT NULL,
  `activecomponent` varchar(255) NOT NULL,
  `action` varchar(255) NOT NULL,
  PRIMARY KEY (`id`,`lang`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `presentation_translation`
--

INSERT INTO `presentation_translation` (`id`, `lang`, `name`, `genericname`, `slug`, `activecomponent`, `action`) VALUES
(1, 'es', 'name', 'genericname', 'name', 'activecomponent', 'action'),
(2, 'es', 'name', 'genericname', 'name-2', 'activecomponent 123', 'action'),
(3, 'es', 'name1 321', 'genericname', 'name1-321', 'activecomponent', 'action'),
(4, 'es', 'name 132fdsafdsa', 'gfsdafsdafsd', 'name-132fdsafdsa', 'sadfsdafdsa activecomponentsdafdsaf', 'fsdafsadf');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` int(40) NOT NULL AUTO_INCREMENT,
  `receta` tinyint(1) DEFAULT '0',
  `ordinal` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `receta`, `ordinal`) VALUES
(1, 1, 0),
(2, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

DROP TABLE IF EXISTS `product_category`;
CREATE TABLE IF NOT EXISTS `product_category` (
  `product_id` int(40) NOT NULL,
  `category_id` int(40) NOT NULL,
  PRIMARY KEY (`product_id`,`category_id`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`product_id`, `category_id`) VALUES
(1, 4),
(2, 4),
(1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `product_translation`
--

DROP TABLE IF EXISTS `product_translation`;
CREATE TABLE IF NOT EXISTS `product_translation` (
  `id` int(40) NOT NULL AUTO_INCREMENT,
  `lang` varchar(3) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  PRIMARY KEY (`id`,`lang`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `product_translation`
--

INSERT INTO `product_translation` (`id`, `lang`, `name`, `slug`) VALUES
(1, 'es', 'test', 'test'),
(2, 'es', 'test 2132', 'test-2132');

-- --------------------------------------------------------

--
-- Table structure for table `studycase`
--

DROP TABLE IF EXISTS `studycase`;
CREATE TABLE IF NOT EXISTS `studycase` (
  `id` int(40) NOT NULL AUTO_INCREMENT,
  `studyDate` date DEFAULT NULL,
  `ordinal` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `studycase`
--

INSERT INTO `studycase` (`id`, `studyDate`, `ordinal`) VALUES
(1, '2014-02-06', 1),
(2, '2014-02-17', 2),
(3, '2014-02-05', 3);

-- --------------------------------------------------------

--
-- Table structure for table `studycase_translation`
--

DROP TABLE IF EXISTS `studycase_translation`;
CREATE TABLE IF NOT EXISTS `studycase_translation` (
  `id` int(40) NOT NULL AUTO_INCREMENT,
  `lang` varchar(3) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `slug` varchar(255) NOT NULL,
  PRIMARY KEY (`id`,`lang`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `studycase_translation`
--

INSERT INTO `studycase_translation` (`id`, `lang`, `name`, `description`, `slug`) VALUES
(1, 'es', 'test', 'soihj fdoas fjdasofji daso fjdasofji dsofjisda ofijasdofijsdfsda', 'test'),
(2, 'es', '32423', 'fasdfdas fdas fads fdasf asdfdasfdasfdas2014-02-0611:55:0611:55:0611:55:0611:55:06f11:55:07dasf asdfdas fsdf', '32423'),
(3, 'es', 'fasdfasd 2342342', 'fasdf asdf asdfdas fdasfdas fasd', 'fasdfasd-2342342');

-- --------------------------------------------------------

--
-- Table structure for table `trabajaconnosotros`
--

DROP TABLE IF EXISTS `trabajaconnosotros`;
CREATE TABLE IF NOT EXISTS `trabajaconnosotros` (
  `id` int(40) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `cedula` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `ciudad` varchar(255) NOT NULL,
  `pais` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `fax` varchar(255) NOT NULL,
  `cv` varchar(255) NOT NULL,
  `cvfile` varchar(255) NOT NULL,
  `quimicofarmaceuticorecibido` tinyint(1) DEFAULT '0',
  `quimicofarmaceuticoestudiante` tinyint(1) DEFAULT '0',
  `quimicotecnologorecibido` tinyint(1) DEFAULT '0',
  `quimicotecnologoestudiante` tinyint(1) DEFAULT '0',
  `mantenimientomecanico` tinyint(1) DEFAULT '0',
  `operariopreparador` tinyint(1) DEFAULT '0',
  `depositologisticaexpedicion` tinyint(1) DEFAULT '0',
  `limpieza` tinyint(1) DEFAULT '0',
  `comprascomercionexterios` tinyint(1) DEFAULT '0',
  `ventascomercialpromocion` tinyint(1) DEFAULT '0',
  `administrativosfinancieroscontable` tinyint(1) DEFAULT '0',
  `sistemainformatica` tinyint(1) DEFAULT '0',
  `recepcionistasecretaria` tinyint(1) DEFAULT '0',
  `cientificoinvestigadores` tinyint(1) DEFAULT '0',
  `estudiantessinexperiencia` tinyint(1) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `trabajaconnosotros`
--

INSERT INTO `trabajaconnosotros` (`id`, `nombre`, `apellido`, `cedula`, `email`, `direccion`, `ciudad`, `pais`, `phone`, `fax`, `cv`, `cvfile`, `quimicofarmaceuticorecibido`, `quimicofarmaceuticoestudiante`, `quimicotecnologorecibido`, `quimicotecnologoestudiante`, `mantenimientomecanico`, `operariopreparador`, `depositologisticaexpedicion`, `limpieza`, `comprascomercionexterios`, `ventascomercialpromocion`, `administrativosfinancieroscontable`, `sistemainformatica`, `recepcionistasecretaria`, `cientificoinvestigadores`, `estudiantessinexperiencia`, `created_at`) VALUES
(1, 'nombre', 'apellido', '1111111-1', 'example@example.com', 'direccion', 'ciudad', 'pais', 'phone', 'fax', 'rest-security.pdf', '/home/rodrigo/proyectos/ci/my-framework-prototype/branches/celsius/assets/protectedfiles/', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2014-03-03 10:22:37'),
(2, 'nombre', 'apellido', '1111111-1', 'example@example.com', 'direccion', 'ciudad', 'pais', 'phone', 'fax', 'rest-security1.pdf', '/home/rodrigo/proyectos/ci/my-framework-prototype/branches/celsius/assets/protectedfiles/', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2014-03-03 19:41:31'),
(3, 'nombre', 'apellido', '1111111-1', 'example@example.com', 'direccion', 'ciudad', 'pais', 'phone', 'fax', 'rest-security2.pdf', '/home/rodrigo/proyectos/ci/my-framework-prototype/branches/celsius/assets/protectedfiles/', 0, 1, 1, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, '2014-03-03 19:57:25'),
(4, 'nombre', 'apellido', '1111111-1', 'example@example.com', 'direccion', 'ciudad', 'pais', 'phone', 'fax', 'rest-security3.pdf', '/home/rodrigo/proyectos/ci/my-framework-prototype/branches/celsius/assets/protectedfiles/', 0, 1, 1, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, '2014-03-04 12:04:58'),
(5, 'nombre', 'apellido', '1111111-1', 'example@example.com', 'direccion', 'ciudad', 'pais', 'phone', 'fax', 'rest-security4.pdf', '/home/rodrigo/proyectos/ci/my-framework-prototype/branches/celsius/assets/protectedfiles/', 0, 1, 1, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, '2014-03-04 12:05:18'),
(6, 'nombre', 'apellido', '1111111-1', 'example@example.com', 'direccion', 'ciudad', 'pais', 'phone', 'fax', 'rest-security5.pdf', '/home/rodrigo/proyectos/ci/my-framework-prototype/branches/celsius/assets/protectedfiles/', 0, 1, 1, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, '2014-03-04 12:08:39'),
(7, 'nombre', 'apellido', '1111111-1', 'example@example.com', 'direccion', 'ciudad', 'pais', 'phone', 'fax', 'rest-security6.pdf', '/home/rodrigo/proyectos/ci/my-framework-prototype/branches/celsius/assets/protectedfiles/', 0, 1, 1, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, '2014-03-04 12:52:35'),
(8, 'nombre', 'apellido', '1111111-1', 'example@example.com', 'direccion', 'ciudad', 'pais', 'phone', 'fax', 'rest-security7.pdf', '/home/rodrigo/proyectos/ci/my-framework-prototype/branches/celsius/assets/protectedfiles/', 0, 1, 1, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, '2014-03-04 12:54:49'),
(9, 'nombre', 'apellido', '1111111-1', 'example@example.com', 'direccion', 'ciudad', 'pais', 'phone', 'fax', 'rest-security8.pdf', '/home/rodrigo/proyectos/ci/my-framework-prototype/branches/celsius/assets/protectedfiles/', 0, 1, 1, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, '2014-03-04 13:46:49');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
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
  `especialidad` varchar(255) COLLATE utf8_bin NOT NULL,
  `cjp` varchar(255) COLLATE utf8_bin NOT NULL,
  `telefono` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `direccion` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `profile` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=8 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `activated`, `banned`, `ban_reason`, `new_password_key`, `new_password_requested`, `new_email`, `new_email_key`, `last_ip`, `last_login`, `created`, `modified`, `especialidad`, `cjp`, `telefono`, `direccion`, `profile`) VALUES
(2, 'admin', '$P$B.03uLRKRldiUlNKYIdifVFM57BePR/', 'rsantellan@gmail.com', 1, 0, NULL, NULL, NULL, NULL, NULL, '127.0.0.1', '2014-03-13 10:59:18', '2012-08-20 18:05:44', '2014-03-13 13:59:18', '12', '12', '123', '', 'admin'),
(3, 'test', '$P$BIxjmzU72WdtyW7NFNw.v3DC5/yPzm/', 'test@test.com', 1, 0, NULL, NULL, NULL, NULL, NULL, '127.0.0.1', '2014-03-07 15:19:51', '2014-02-04 15:26:02', '2014-03-07 17:19:51', 'ads', '1', NULL, 'asda', 'empleado'),
(4, 'juan', '$P$BLOAOhoaOYGPLaSxIISDa8o6akXSBf/', 'juan@juag.com', 1, 0, NULL, NULL, NULL, NULL, NULL, '127.0.0.1', '0000-00-00 00:00:00', '2014-02-07 10:20:22', '2014-03-04 14:04:13', '123', '123', '123', '123', 'empleado'),
(5, '2135', '$P$B9SnGqEq7Yega45PrFjxhDHi0NMVxy1', '1231@ada.com', 1, 0, NULL, NULL, NULL, NULL, NULL, '127.0.0.1', '0000-00-00 00:00:00', '2014-02-07 10:25:01', '2014-03-07 17:19:39', '', '', NULL, NULL, 'medico'),
(6, '52543543', '$P$BfoDXQtrfXofUBVxb6RmXY8UAGB//W0', 'fdasfasd@sadfasd.com', 1, 1, 'Admin deactivated', '9dcb244bba19a55990e09febfc6b9192', '2014-02-07 10:45:49', NULL, NULL, '127.0.0.1', '0000-00-00 00:00:00', '2014-02-07 10:26:21', '2014-03-04 13:57:52', '', '', NULL, NULL, 'admin'),
(7, 'test1', '$P$BFpfRA6FmRo2WmlS1MFven4SW1AuFx.', 'admin@test1.com', 1, 0, NULL, NULL, NULL, NULL, NULL, '127.0.0.1', '0000-00-00 00:00:00', '2014-02-24 15:14:39', '2014-03-04 13:57:52', 'algo', 'test', 'test', 'test', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `user_autologin`
--

DROP TABLE IF EXISTS `user_autologin`;
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

DROP TABLE IF EXISTS `user_profiles`;
CREATE TABLE IF NOT EXISTS `user_profiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `country` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `website` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=8 ;

--
-- Dumping data for table `user_profiles`
--

INSERT INTO `user_profiles` (`id`, `user_id`, `country`, `website`) VALUES
(1, 4, NULL, NULL),
(2, 5, NULL, NULL),
(3, 6, NULL, NULL),
(4, 6, NULL, NULL),
(5, 3, NULL, NULL),
(6, 6, NULL, NULL),
(7, 7, NULL, NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `albumcontent`
--
ALTER TABLE `albumcontent`
  ADD CONSTRAINT `fk_albumcontent_album` FOREIGN KEY (`album_id`) REFERENCES `albums` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `category_translation`
--
ALTER TABLE `category_translation`
  ADD CONSTRAINT `category_translation_ibfk_1` FOREIGN KEY (`id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `event_translation`
--
ALTER TABLE `event_translation`
  ADD CONSTRAINT `event_translation_ibfk_1` FOREIGN KEY (`id`) REFERENCES `event` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mnew_translation`
--
ALTER TABLE `mnew_translation`
  ADD CONSTRAINT `mnew_translation_ibfk_1` FOREIGN KEY (`id`) REFERENCES `mnew` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ocongress_translation`
--
ALTER TABLE `ocongress_translation`
  ADD CONSTRAINT `ocongress_translation_ibfk_1` FOREIGN KEY (`id`) REFERENCES `ocongress` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `presentation`
--
ALTER TABLE `presentation`
  ADD CONSTRAINT `presentation_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `presentation_country`
--
ALTER TABLE `presentation_country`
  ADD CONSTRAINT `presentation_country_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `presentation_country_ibfk_2` FOREIGN KEY (`presentation_id`) REFERENCES `presentation` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `presentation_translation`
--
ALTER TABLE `presentation_translation`
  ADD CONSTRAINT `presentation_translation_ibfk_1` FOREIGN KEY (`id`) REFERENCES `presentation` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_category`
--
ALTER TABLE `product_category`
  ADD CONSTRAINT `product_category_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_category_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_translation`
--
ALTER TABLE `product_translation`
  ADD CONSTRAINT `product_translation_ibfk_1` FOREIGN KEY (`id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `studycase_translation`
--
ALTER TABLE `studycase_translation`
  ADD CONSTRAINT `studycase_translation_ibfk_1` FOREIGN KEY (`id`) REFERENCES `studycase` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
SET FOREIGN_KEY_CHECKS=1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
