-- phpMyAdmin SQL Dump
-- version 4.0.6deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 25, 2014 at 04:41 PM
-- Server version: 5.5.37-0ubuntu0.13.10.1
-- PHP Version: 5.5.3-1ubuntu2.3

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sumuy`
--

-- --------------------------------------------------------

--
-- Table structure for table `albumcontent`
--

DROP TABLE IF EXISTS `albumcontent`;
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `albumcontent`
--

INSERT INTO `albumcontent` (`id`, `path`, `basepath`, `name`, `type`, `contenttype`, `url`, `code`, `description`, `extradata`, `album_id`, `ordinal`) VALUES
(24, 'assets/uploads/17/ComputerDesktopWallpapersCollection429_003.jpg', '/home/rodrigo/proyectos/ci/my-framework-prototype/branches/sumuy/', 'ComputerDesktopWallpapersCollection429_003.jpg', 'jpg', 'content-image', NULL, NULL, NULL, NULL, 17, 1),
(25, 'assets/uploads/17/ComputerDesktopWallpapersCollection429_004.jpg', '/home/rodrigo/proyectos/ci/my-framework-prototype/branches/sumuy/', 'ComputerDesktopWallpapersCollection429_004.jpg', 'jpg', 'content-image', NULL, NULL, NULL, NULL, 17, 2);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `albums`
--

INSERT INTO `albums` (`id`, `name`, `obj_id`, `obj_class`, `atype`) VALUES
(8, 'default', 9, 'novedad', 'images'),
(9, 'default', 10, 'novedad', 'images'),
(10, 'default', 11, 'novedad', 'images'),
(11, 'default', 12, 'novedad', 'images'),
(12, 'default', 13, 'novedad', 'images'),
(13, 'default', 14, 'novedad', 'images'),
(14, 'default', 15, 'novedad', 'images'),
(15, 'default', 16, 'novedad', 'images'),
(16, 'default', 17, 'novedad', 'images'),
(17, 'default', 18, 'novedad', 'images'),
(18, 'default', 19, 'novedad', 'images'),
(19, 'default', 20, 'novedad', 'images');

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
-- Table structure for table `inscripcion`
--

DROP TABLE IF EXISTS `inscripcion`;
CREATE TABLE IF NOT EXISTS `inscripcion` (
  `id` int(40) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `document` varchar(255) NOT NULL,
  `birthdate` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `nacionality` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `institution` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `emailinstitucion` varchar(255) NOT NULL,
  `postnumber` varchar(255) NOT NULL,
  `countryinstitution` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `investigation` varchar(255) NOT NULL,
  `cvuy` varchar(255) NOT NULL,
  `comments` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `inscripcionarchivo`
--

DROP TABLE IF EXISTS `inscripcionarchivo`;
CREATE TABLE IF NOT EXISTS `inscripcionarchivo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `inscripcion_id` int(11) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `filepath` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `inscripcion_id` (`inscripcion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
('enlaces_titulo', 'enlaces_lang.php', '', 'sumuy'),
('enlaces_titulo_sociedades', 'enlaces_lang.php', '', 'sumuy'),
('enlaces_listado_sociedades', 'enlaces_lang.php', '', 'sumuy'),
('enlaces_titulo_sitios', 'enlaces_lang.php', '', 'sumuy'),
('enlaces_listado_sitios', 'enlaces_lang.php', '', 'sumuy'),
('tesis_titulo', 'tesis_lang.php', '', 'sumuy'),
('menu_sum', 'menu_lang.php', '', 'sumuy'),
('menu_sociedad', 'menu_lang.php', '', 'sumuy'),
('menu_socios', 'menu_lang.php', '', 'sumuy'),
('menu_novedades', 'menu_lang.php', '', 'sumuy'),
('menu_tesis', 'menu_lang.php', '', 'sumuy'),
('menu_llamados', 'menu_lang.php', '', 'sumuy'),
('menu_inscripcion', 'menu_lang.php', '', 'sumuy'),
('menu_enlaces', 'menu_lang.php', '', 'sumuy'),
('menu_contacto', 'menu_lang.php', '', 'sumuy'),
('menu_footer', 'menu_lang.php', '', 'sumuy'),
('novedades_titulo', 'novedades_lang.php', '', 'sumuy'),
('novedades_vermas', 'novedades_lang.php', '', 'sumuy'),
('contacto_titulo', 'contacto_lang.php', '', 'sumuy'),
('contacto_copete', 'contacto_lang.php', '', 'sumuy'),
('contacto_consulta', 'contacto_lang.php', '', 'sumuy'),
('contacto_nombreapellido', 'contacto_lang.php', '', 'sumuy'),
('contacto_mail', 'contacto_lang.php', '', 'sumuy'),
('contacto_telefono', 'contacto_lang.php', '', 'sumuy'),
('contacto_comentario', 'contacto_lang.php', '', 'sumuy'),
('contacto_enviar', 'contacto_lang.php', '', 'sumuy'),
('contacto_mensaje_enviado', 'contacto_lang.php', '', 'sumuy'),
('home_titulo', 'home_lang.php', '', 'sumuy'),
('home_listado', 'home_lang.php', '', 'sumuy'),
('socios_titulo', 'socios_lang.php', '', 'sumuy'),
('socios_cuota_titulo', 'socios_lang.php', '', 'sumuy'),
('socios_cuota_tabla', 'socios_lang.php', '', 'sumuy'),
('socios_texto', 'socios_lang.php', '', 'sumuy'),
('socios_texto_afiliacion', 'socios_lang.php', '', 'sumuy'),
('socios_texto_link', 'socios_lang.php', '', 'sumuy'),
('sociedad_titulo', 'sociedad_lang.php', '', 'sumuy'),
('sociedad_titulo_directiva', 'sociedad_lang.php', '', 'sumuy'),
('sociedad_directiva', 'sociedad_lang.php', '', 'sumuy'),
('sociedad_fundacion', 'sociedad_lang.php', '', 'sumuy'),
('sociedad_fundacion_integrantes', 'sociedad_lang.php', '', 'sumuy'),
('sociedad_mision_titulo', 'sociedad_lang.php', '', 'sumuy'),
('sociedad_mision_texto', 'sociedad_lang.php', '', 'sumuy'),
('sociedad_mision_fines', 'sociedad_lang.php', '', 'sumuy'),
('llamados_titulo', 'llamados_lang.php', '', 'sumuy'),
('llamados_texto', 'llamados_lang.php', '', 'sumuy'),
('llamados_nombre', 'llamados_lang.php', '', 'sumuy'),
('llamados_ci', 'llamados_lang.php', '', 'sumuy'),
('llamados_birthdate', 'llamados_lang.php', '', 'sumuy'),
('llamados_country', 'llamados_lang.php', '', 'sumuy'),
('llamados_nacionality', 'llamados_lang.php', '', 'sumuy'),
('llamados_title', 'llamados_lang.php', '', 'sumuy'),
('llamados_mail', 'llamados_lang.php', '', 'sumuy'),
('llamados_institution', 'llamados_lang.php', '', 'sumuy'),
('llamados_address', 'llamados_lang.php', '', 'sumuy'),
('llamados_phone', 'llamados_lang.php', '', 'sumuy'),
('llamados_emailinstitucion', 'llamados_lang.php', '', 'sumuy'),
('llamados_postnumber', 'llamados_lang.php', '', 'sumuy'),
('llamados_countryinstitution', 'llamados_lang.php', '', 'sumuy'),
('llamados_website', 'llamados_lang.php', '', 'sumuy'),
('llamados_position', 'llamados_lang.php', '', 'sumuy'),
('llamados_investigation', 'llamados_lang.php', '', 'sumuy'),
('llamados_tutor', 'llamados_lang.php', '', 'sumuy'),
('llamados_cvuy', 'llamados_lang.php', '', 'sumuy'),
('llamados_comentarios', 'llamados_lang.php', '', 'sumuy'),
('sum_titulo', 'sum_lang.php', '', 'sumuy'),
('sum_texto', 'sum_lang.php', '', 'sumuy'),
('sum_listado', 'sum_lang.php', '', 'sumuy');

-- --------------------------------------------------------

--
-- Table structure for table `llamado`
--

DROP TABLE IF EXISTS `llamado`;
CREATE TABLE IF NOT EXISTS `llamado` (
  `id` int(40) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `document` varchar(255) NOT NULL,
  `birthdate` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `nacionality` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `institution` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `emailinstitucion` varchar(255) NOT NULL,
  `postnumber` varchar(255) NOT NULL,
  `countryinstitution` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `investigation` varchar(255) NOT NULL,
  `tutor` varchar(255) NOT NULL,
  `cvuy` varchar(255) NOT NULL,
  `comments` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `llamado`
--

INSERT INTO `llamado` (`id`, `name`, `document`, `birthdate`, `country`, `nacionality`, `title`, `mail`, `institution`, `address`, `phone`, `emailinstitucion`, `postnumber`, `countryinstitution`, `website`, `position`, `investigation`, `tutor`, `cvuy`, `comments`) VALUES
(1, 'name', 'document', '12/02/1984', 'country', 'nacionality', 'title', 'mail@mail.com', 'institution', 'address', 'phone', 'example@example.com', 'postnumber', 'countryinstitution', 'website', 'position', 'investigation', 'tutor', 'cvuy', 'comments');

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
  `direccion` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `tipo` varchar(5) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'to',
  `nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `funcion` varchar(255) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'contacto',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `mail_db`
--

INSERT INTO `mail_db` (`id`, `direccion`, `tipo`, `nombre`, `funcion`) VALUES
(1, 'rsantellan@gmail.com', 'from', 'Rodrigo Santellan', 'contacto'),
(2, 'rsantellan@gmail.com', 'to', 'Ignacio Wibmer', 'contacto');

-- --------------------------------------------------------

--
-- Table structure for table `novedades`
--

DROP TABLE IF EXISTS `novedades`;
CREATE TABLE IF NOT EXISTS `novedades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `copete` text COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `ordinal` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=20 ;

--
-- Dumping data for table `novedades`
--

INSERT INTO `novedades` (`id`, `nombre`, `copete`, `descripcion`, `ordinal`) VALUES
(10, 'calendario de cursos', 'Está disponible el calendario de cursos aceptados por la Subárea Microbiología de PEDECIBA (Biología) para el segundo semestre del 2013', '&lt;h3&gt;Est&amp;aacute; disponible el calendario de cursos aceptados por la Sub&amp;aacute;rea Microbiolog&amp;iacute;a de PEDECIBA (Biolog&amp;iacute;a) para el segundo semestre del 2013&lt;/h3&gt;\n&lt;table cellpadding=&quot;0&quot;&gt;\n&lt;tbody&gt;\n&lt;tr&gt;\n&lt;th&gt;NOMBRE DEL CURSO&lt;/th&gt; &lt;th&gt;COORDINADOR/ES&lt;/th&gt; &lt;th&gt;FECHA INICIO&lt;/th&gt; &lt;th&gt;DURACI&amp;Oacute;N&lt;/th&gt; &lt;th&gt;CR&amp;Eacute;DITOS&lt;/th&gt;\n&lt;/tr&gt;\n&lt;tr&gt;\n&lt;td&gt;&lt;strong&gt;Bacterias y Hongos End&amp;oacute;fitos Nativos&lt;/strong&gt;&lt;/td&gt;\n&lt;td&gt;Dra.Margarita Sicardi&lt;/td&gt;\n&lt;td&gt;26/08/2013&lt;/td&gt;\n&lt;td&gt;4 sem.&lt;/td&gt;\n&lt;td&gt;1&lt;/td&gt;\n&lt;/tr&gt;\n&lt;tr&gt;\n&lt;td&gt;&lt;strong&gt;Principios y Aplicaciones de Microscop&amp;iacute;a&lt;/strong&gt;&lt;/td&gt;\n&lt;td&gt;Dras.AlejandraKun/Anabel Fern&amp;aacute;ndez/Marita Castell&amp;oacute;&lt;/td&gt;\n&lt;td&gt;05/08/2013&lt;/td&gt;\n&lt;td&gt;15 d&amp;iacute;as&lt;/td&gt;\n&lt;td&gt;1&lt;/td&gt;\n&lt;/tr&gt;\n&lt;tr&gt;\n&lt;td&gt;&lt;strong&gt;Obtenci&amp;oacute;n y Analisis de Datos&lt;/strong&gt;&lt;/td&gt;\n&lt;td&gt;Dr.WalterNorbis&lt;/td&gt;\n&lt;td&gt;06/08/2013&lt;/td&gt;\n&lt;td&gt;4 meses&lt;/td&gt;\n&lt;td&gt;15&lt;/td&gt;\n&lt;/tr&gt;\n&lt;tr&gt;\n&lt;td&gt;&lt;strong&gt;Respuesta de los Ecosistemas Acu&amp;aacute;ticos e Impactos Antropog&amp;eacute;nicos&lt;/strong&gt;&lt;/td&gt;\n&lt;td&gt;Dra.ClaudiaPiccini&lt;/td&gt;\n&lt;td&gt;5/11/2013&lt;/td&gt;\n&lt;td&gt;10 d&amp;iacute;as&lt;/td&gt;\n&lt;td&gt;7&lt;/td&gt;\n&lt;/tr&gt;\n&lt;tr&gt;\n&lt;td&gt;&lt;strong&gt;Biolog&amp;iacute;a Parasitaria&lt;/strong&gt;&lt;/td&gt;\n&lt;td&gt;Dr.Carlos Carmona&lt;/td&gt;\n&lt;td&gt;19/08/2013&lt;/td&gt;\n&lt;td&gt;14 sem.&lt;/td&gt;\n&lt;td&gt;12&lt;/td&gt;\n&lt;/tr&gt;\n&lt;/tbody&gt;\n&lt;/table&gt;', 1),
(11, 'Listado de becas aprobadas en el llamado a apoyo para Congresos Internacionales 2013:', 'Ingresé para ver el listado completo', '&lt;p&gt;Adalgisa Mart&amp;iacute;nez&lt;br /&gt;Virginia Ferreira&lt;br /&gt;Ignacio Ferr&amp;eacute;s&lt;br /&gt;Natalia Bajsa&lt;br /&gt;Gabriela Jorc&amp;iacute;n&lt;br /&gt;Loreley Castelli&lt;br /&gt;Federico Rosconi&lt;br /&gt;Mar&amp;iacute;a In&amp;eacute;s Lapaz&lt;/p&gt;', 2),
(12, '1er. ENCUENTRO DE VIROLOGOS DEL URUGUAY', 'Con el fin de conocernos y poder programar actividades conjuntas en base a saber lo que estamos haciendo cada uno, los virologos del Uruguay, hemos programado reunirnos por primera vez, el dia 16 de diciembre del presente año, en el Hotel Holiday Inn.', '&lt;p&gt;Con el fin de conocernos y poder programar actividades conjuntas en  base a saber lo que estamos haciendo cada uno, los virologos del  Uruguay, hemos programado reunirnos por primera vez, el dia 16 de  diciembre del presente a&amp;ntilde;o, en el Hotel Holiday Inn.&lt;/p&gt;\n&lt;p&gt;Entendemos que pueden existir colegas que a pesar de que  no trabajen en virolog&amp;iacute;a pueda interesarles asistir a las  presentaciones, por tanto realizaremos dos tipos de llamados a fin de  contemplar las opciones y poder coordinar la log&amp;iacute;stica del encuentro.&lt;/p&gt;\n&lt;p&gt;&lt;strong&gt;1)&lt;/strong&gt; Quienes trabajan en Virolog&amp;iacute;a y van a  realizar presentaci&amp;oacute;n, enviar hasta el 20 de Noviembre a la siguiente  direcci&amp;oacute;n de correo: &lt;a href=&quot;mailto:encuentrovirologos2013@gmail.com&quot;&gt;encuentrovirologos2013@gmail.com&lt;/a&gt;, el titulo del trabajo, los autores (subrayando quien realizara la presentaci&amp;oacute;n)  y la instituci&amp;oacute;n correspondiente.&lt;/p&gt;\n&lt;p&gt;&lt;strong&gt;2)&lt;/strong&gt; Quienes est&amp;eacute;n interesados en  participar de la presentaciones, enviar su inscripci&amp;oacute;n hasta el d&amp;iacute;a 29  de noviembre a la siguiente direcci&amp;oacute;n: &lt;a href=&quot;http://sumuy.org.uy/encuentrovirologos2013@gmail.com&quot;&gt;encuentrovirologos2013@gmail.com&lt;/a&gt;.&lt;/p&gt;\n&lt;p&gt;Comit&amp;eacute; Organizador&lt;br /&gt;1er.  Encuentro de Virologos del Uruguay&lt;br /&gt;2013&lt;/p&gt;', 3),
(13, '¡¡¡¡ ATENCION !!!!', 'A partir del lunes 18 de noviembre estará abierto el colectivo en RedPagos nº 38574 Sociedad Uruguaya de Microbiología (SUM) para realizar el pago de las anualidades. ', '&lt;p&gt;A partir del lunes 18 de noviembre estar&amp;aacute; abierto el colectivo en  RedPagos n&amp;ordm; 38574 Sociedad Uruguaya de Microbiolog&amp;iacute;a (SUM) para realizar  el pago de las anualidades.&lt;/p&gt;\n&lt;p&gt;Aquellos interesados en hacerse socios de la SUM  tambi&amp;eacute;n podr&amp;aacute;n hacerlo enviando un correo electr&amp;oacute;nico a la direcci&amp;oacute;n de  contacto y realizando el pago en dicho colectivo.&lt;/p&gt;\n&lt;p&gt;&lt;strong&gt;IMPORTANTE: Se debe indicar Nombre completo seguido por &quot;cuota&quot; o &quot;anualidad&quot;&lt;/strong&gt;&lt;/p&gt;', 4),
(14, 'XV Jornadas Argentinas de Microbiología', '&lt;p&gt;14 - 16 de agosto, 2014&lt;br /&gt;C&amp;oacute;rdoba, Argentina&lt;/p&gt;\n&lt;p&gt;Por m&amp;aacute;s informaci&amp;oacute;n:&lt;a href=&quot;http://microbiologia2014.com.ar/website/&quot; target=&quot;blank&quot;&gt;microbiologia2014.com.ar/web', '&lt;p&gt;14 - 16 de agosto, 2014&lt;br /&gt;C&amp;oacute;rdoba, Argentina&lt;/p&gt;\n&lt;p&gt;Por m&amp;aacute;s informaci&amp;oacute;n:&lt;a href=&quot;http://microbiologia2014.com.ar/website/&quot; target=&quot;blank&quot;&gt;microbiologia2014.com.ar/website/&lt;/a&gt;&lt;/p&gt;', 5),
(15, 'Hospital-Acquired Infections and Antimicrobial Resistance - Regional Course for Latin America', 'This course is brought to you through a joint effort of the American  Society for Microbiology, the Society for Worldwide Medical Exchange,  and the C&amp;aacute;tedra de Enfermedades Infecciosas, Facultad de Medicina,  Universidad de la Republica, Urugua', '&lt;p&gt;This course is brought to you through a joint effort of the American  Society for Microbiology, the Society for Worldwide Medical Exchange,  and the C&amp;aacute;tedra de Enfermedades Infecciosas, Facultad de Medicina,  Universidad de la Republica, Uruguay.&lt;/p&gt;\n&lt;p&gt;This will be a two-month interactive online course focused on clinical practice.&lt;br /&gt;Online Coursework: July 25 &amp;ndash; September 15, 2014&lt;br /&gt;This course will consist of approximately 26 study hours.&lt;/p&gt;\n&lt;p&gt;For more information please visit:&lt;a href=&quot;http://www.infectology2014.com/Home.aspx&quot; target=&quot;blank&quot;&gt;www.infectology2014.com&lt;/a&gt;&lt;/p&gt;', 6),
(16, 'XIX LANCEFIELD INTERNATIONAL SYMPOSIUM ON STREPTOCOCCI AND STREPTOCOCCAL DISEASES', 'November 9-12, 2014 // Buenos Aires, Argentina', '&lt;p&gt;NOVEMBER 9-12, 2014 // BUENOS AIRES, ARGENTINA&lt;/p&gt;\n&lt;p&gt;Chairman: H.A. Lopardo (Argentina)&lt;br /&gt;Co-chairperson: L.M. Teixeira (Brazil)&lt;br /&gt;Co-President: G. Orefici (Italy)&lt;br /&gt;Co-President: A. Boccazzi (Italy)&lt;br /&gt;Vice-chairpersons: M. Mollerach (Argentina), A. Jasir (ECDC)&lt;/p&gt;\n&lt;p&gt;30 APRIL  Abstract submission deadline&lt;/p&gt;\n&lt;p&gt;&lt;a href=&quot;http://www.lancefield2014.com&quot; target=&quot;blank&quot;&gt;www.lancefield2014.com&lt;/a&gt;&lt;/p&gt;\n&lt;p&gt;E-mail: &lt;a href=&quot;mailto:lancefield2014@gmail.com&quot;&gt;lancefield2014@gmail.com&lt;/a&gt;&lt;/p&gt;', 7),
(17, 'APOYO A PROYECTOS DE INVESTIGACIÓN PARA ESTUDIANTES DE GRADO (APIPE)', '&lt;p&gt;La SUM tiene el agrado de informar la Apertura del primer llamado de  Apoyo para Proyectos de Investigaci&amp;oacute;n Para Estudiantes de grado.&lt;/p&gt;\n&lt;p&gt;El per&amp;iacute;odo de inscripci&amp;oacute;n ser&amp;aacute; del 8 al 27 de abril de  2014 inclusive y las bases del llamado se encuentran disponibles en esta  p&amp;aacute;gina.&lt;/p&gt;', '&lt;p&gt;La SUM tiene el agrado de informar la Apertura del primer llamado de  Apoyo para Proyectos de Investigaci&amp;oacute;n Para Estudiantes de grado.&lt;/p&gt;\n&lt;p&gt;El per&amp;iacute;odo de inscripci&amp;oacute;n ser&amp;aacute; del 8 al 27 de abril de  2014 inclusive y las bases del llamado se encuentran disponibles en esta  p&amp;aacute;gina.&lt;/p&gt;', 8),
(18, 'I ENCUENTRO NACIONAL DE JÓVENES MICROBIÓLOGOS', '&lt;p&gt;2 - 3 de Octubre 2014&lt;/p&gt;\n&lt;p&gt;La SUM te invita a participar del 1er encuentro de j&amp;oacute;venes investigadores en el &amp;aacute;rea de la Microbiolog&amp;iacute;a&lt;/p&gt;\n&lt;p&gt;El objetivo de este encuentro es fomentar el  intercambio entre estudiantes de grado en la &amp;uacute;ltima etapa de su carrera,  profesionales reci&amp;eacute;n recibidos y estudiantes de posgrado, con miras a  la creaci&amp;oacute;n de redes de investigadores nacionales.&lt;/p&gt;', '&lt;p&gt;2 - 3 de Octubre 2014&lt;/p&gt;\n&lt;p&gt;La SUM te invita a participar del 1er encuentro de j&amp;oacute;venes investigadores en el &amp;aacute;rea de la Microbiolog&amp;iacute;a&lt;/p&gt;\n&lt;p&gt;El objetivo de este encuentro es fomentar el  intercambio entre estudiantes de grado en la &amp;uacute;ltima etapa de su carrera,  profesionales reci&amp;eacute;n recibidos y estudiantes de posgrado, con miras a  la creaci&amp;oacute;n de redes de investigadores nacionales.&lt;/p&gt;', 9),
(19, 'apoyo a proyectos de investigación', 'APOYO A PROYECTOS DE INVESTIGACI&amp;Oacute;N PARA ESTUDIANTES DE GRADO (APIPE)&lt;br /&gt;La  SUM tiene el agrado de informar la Apertura del primer llamado de Apoyo  para Proyectos de Investigaci&amp;oacute;n Para Estudiantes de grado.', 'APOYO A PROYECTOS DE INVESTIGACI&amp;Oacute;N PARA ESTUDIANTES DE GRADO (APIPE)&lt;br /&gt;La  SUM tiene el agrado de informar la Apertura del primer llamado de Apoyo  para Proyectos de Investigaci&amp;oacute;n Para Estudiantes de grado.', 10);

-- --------------------------------------------------------

--
-- Table structure for table `tesis`
--

DROP TABLE IF EXISTS `tesis`;
CREATE TABLE IF NOT EXISTS `tesis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `subtitulo` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `orientadores` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `tribunal` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `defensa` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `academica` varchar(255) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `ordinal` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tesis`
--

INSERT INTO `tesis` (`id`, `titulo`, `subtitulo`, `orientadores`, `tribunal`, `defensa`, `academica`, `ordinal`) VALUES
(3, 'Factores que afectan la composición y diversidad de la comunidad de bacterias endófitas en arroz (Oryza sativa)', 'Tesis de Doctorado en Química de Lucía Ferrando', 'Ana Fernández Scavino', 'Silvia Batista, Fátima Moreira, Margarita Sicardi', '17 de abril de 2013', '', 1),
(4, 'Epidemiología de los principales patógenos de interés apícola en Uruguay', 'Tesis de Maestría: Matilde Anido', 'Dra. Karina Antúnez y Dr. Pablo Zunino', 'Dr. Juan Arbiza, Dra. Inés Ponce de León, Dr. Ciro Invernizzi', '21 de junio de 2013', '', 2),
(5, 'Rol de endófitos en reacciones biocatalíticas mediadas por vegetales. Identificación y caracterización de nuevos biocatalizadores', 'Tesis de Doctorado en Química de Paula Rodríguez Bonnecarrere', 'David Gonzalez y Sonia Rodríguez', 'Dr. Ignacio Carrera, Dr. Adolfo Iribarren (UNQ, Bs.As.), Dra.Matilde Soubes', '27 de Junio de 2013', 'Pilar Menéndez', 3),
(6, 'Costo Biológico de la Expresión de B-lactamasas en Salmonella entericaserovar Typhimurium', 'Tesis de Maestría: Nicolás Cordeiro', 'Dra. Lucía Yim', 'Dr. Pablo Zunino, Dra. Fernanda Azpiroz, Dr. Gabriel Gutkind', '3 de julio de 2013', '', 4),
(7, 'Evaluación de la capacidad probiótica de una cepa de Lactobacillus murinus y su uso en el tratamiento de diarreas virales en caninos', 'Tesis de Maestría en Salud Animal de Luis Delucchi', 'Dr. Pablo Zunino', 'Dres. Celia Tasende (Presidente y Revisora de Aspectos Formales de la Tesis), Fernando Dutra y Gustavo Varela', '1 de agosto de 2013', '', 5),
(8, 'Aproximaciones de genómica estructura y funcional en tripanosomátidos', 'Tesis Doctorado, PEDECIBA Biología de Pablo Smircich', 'Dra. Beatriz Garat. Co-director: Dr. Najib El-Sayed', 'Dr. Fernando Alvarez, Dr. José Sotelo, Dr. Gustavo Cerqueira', '29 de agosto de 2013', '', 6),
(9, 'Evaluación y optimización de las propiedades bioquímicas, genéticas y moleculares de las lipasas de Pseudomonas y prospección de nuevas enzimas lipolíticas para biocatálisis', 'Tesis de Doctorado en Química de Paola Panizza', 'Pilar Díaz (Universidad de Barcelona) y Sonia Rodríguez (Facultad de Química, UdelaR)', 'Dra. Anita Marsaioli (UNICAMP, Campinas, Brasil), Dra. Laura Franco-Fraguas, Dra. Matilde Soubes', '11 de Setiembre de 2013', '', 7),
(10, 'Sistemas de adquisición de hierro mediados por sideróforos en Herbaspirillum seropedicae Z67', 'Tesis de Doctorado, PEDECIBA Biología de Federico Rosconi', 'Dra. Elena Fabiano y Q. F. Alicia Arias', 'Dr. Jorge Monza, Dra. Ana Fernández, Dr. Pablo Zunino', '20 de setiembre de 2013', '', 8);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `activated`, `banned`, `ban_reason`, `new_password_key`, `new_password_requested`, `new_email`, `new_email_key`, `last_ip`, `last_login`, `created`, `modified`) VALUES
(2, 'admin', '$P$BLcJ/R6.B4IG93UnZunn14heHtRclr.', 'rsantellan@gmail.com', 1, 0, NULL, NULL, NULL, NULL, NULL, '127.0.0.1', '2014-04-22 13:37:31', '2012-08-20 18:05:44', '2014-04-22 16:37:31');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `albumcontent`
--
ALTER TABLE `albumcontent`
  ADD CONSTRAINT `fk_albumcontent_album` FOREIGN KEY (`album_id`) REFERENCES `albums` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `inscripcionarchivo`
--
ALTER TABLE `inscripcionarchivo`
  ADD CONSTRAINT `fk_inscripcion_archivo` FOREIGN KEY (`inscripcion_id`) REFERENCES `inscripcion` (`id`);
SET FOREIGN_KEY_CHECKS=1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
