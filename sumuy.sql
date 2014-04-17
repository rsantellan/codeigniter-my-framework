-- phpMyAdmin SQL Dump
-- version 4.0.6deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 17, 2014 at 05:58 PM
-- Server version: 5.5.35-0ubuntu0.13.10.2
-- PHP Version: 5.5.3-1ubuntu2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sumuy`
--
CREATE DATABASE IF NOT EXISTS `sumuy` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `sumuy`;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `albumcontent`
--

INSERT INTO `albumcontent` (`id`, `path`, `basepath`, `name`, `type`, `contenttype`, `url`, `code`, `description`, `extradata`, `album_id`, `ordinal`) VALUES
(22, 'assets/uploads/5/ComputerDesktopWallpapersCollection429_012.jpg', '/home/rodrigo/proyectos/ci/my-framework-prototype/branches/sumuy/', 'ComputerDesktopWallpapersCollection429_012.jpg', 'jpg', 'content-image', NULL, NULL, NULL, NULL, 5, 1),
(23, 'assets/uploads/5/ComputerDesktopWallpapersCollection429_013.jpg', '/home/rodrigo/proyectos/ci/my-framework-prototype/branches/sumuy/', 'ComputerDesktopWallpapersCollection429_013.jpg', 'jpg', 'content-image', NULL, NULL, NULL, NULL, 5, 2);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `albums`
--

INSERT INTO `albums` (`id`, `name`, `obj_id`, `obj_class`, `atype`) VALUES
(2, 'default', 3, 'novedad', 'images'),
(3, 'default', 4, 'novedad', 'images'),
(4, 'default', 5, 'novedad', 'images'),
(5, 'default', 6, 'novedad', 'images'),
(6, 'default', 7, 'novedad', 'images');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=4 ;

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
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `ordinal` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `novedades`
--

INSERT INTO `novedades` (`id`, `nombre`, `descripcion`, `ordinal`) VALUES
(4, 't 23423', 'I was intrigued to read this recent article in The Guardian about public libraries&amp;rsquo; new role as community problem solvers. If you read carefully into this article you&amp;rsquo;ll notice the author talks about libraries becoming more involved with &quot;proactive community engagement.&quot;&lt;br /&gt;&lt;br /&gt;This means that libraries are looking to community members as partners to help solve community problems. In the open source community, we&amp;rsquo;re familiar with how well these methods can work. In open source, different players contribute to group projects according to their own personal strengths. The results can be far greater than anyone originally imagines.&lt;br /&gt;&lt;br /&gt;View the complete collection of articles for Open Library Week&lt;br /&gt;&lt;br /&gt;Back in 1996, I had an experience at a public library in Washington DC that gave me a taste of this. At that time I was volunteer teaching an Introduction to Internet class at the Chevy Chase Neighborhood Library. One day a medical doctor and his 3rd grade daughter showed up to the class. &quot;My daughter wants to learn to create web pages,&quot; the kindly doctor said. &quot;I don&amp;rsquo;t know how to build web pages, so my job is to find someone who does.&quot; I responded, &quot;If no one else shows up for the Internet training today, I&amp;rsquo;ll be happy to teach your daughter how to build web pages.&quot;&lt;br /&gt;&lt;br /&gt;As it happened, the doctor and his daughter were my only students that day, and we had a fabulous learning session on basic HTML. I was also able to explain to this youngster the importance of her protecting her personal privacy. She walked home that day with her own personal web page on a floppy disk, and with a basic understanding of HTML, delivered to her from her public library.&lt;br /&gt;&lt;br /&gt;On that day, this parent expected more from his public library, and his public library delivered. Not via any of their professional staff, but via a volunteer relationship they had cultivated and nurtured. If you&amp;rsquo;re interested in learning more about the idea of expecting more from your public library, this short, engaging book is a must read: Expect More: Demanding Better Libraries For Today&amp;rsquo;s Complex World (free download).&lt;br /&gt;&lt;br /&gt;How can you help your own public library move forward using open source methods?&lt;br /&gt;&lt;br /&gt;A great first step is to help organize a series of lightning talks, which are in some ways short TED talks. Some of you might know this talk format as &quot;ignite talks&quot; or &quot;pecha kucha.&quot; When community members come to the library to share their most passionate ideas, community fabric is formed. After the event, the conversations that happen as people walk out of the library can move the community forward. All of a sudden, the sharing of ideas moves from within the library walls to the library parking lot, and beyond. &lt;br /&gt;&lt;br /&gt;Another way of open sourcing your public library is to promote awareness about the maker movement and what that movement offers community. I&amp;rsquo;ve shared some tips for that in this recent MAKE magazine blog post: A Librarian&amp;rsquo;s Guide to Boosting the Maker Movement.&lt;br /&gt;&lt;br /&gt;One other step you can take to bring open source methods to your public library is to study and share best practices of how human beings in the past worked together to accomplish shared goals. I was interested to read a practice of the Wright Brothers where one brother woke up a few hours earlier than the other brother to help prepare for the day. The two then spent the day conducting flying experiments at Kitty Hawk. Then after the first brother went to sleep early, the other brother spent time analyzing the results of their experiments. By using this time-shifting collaborative method, the Wright Brothers were able to comfortably work a long work day, with both brothers getting a full night&amp;rsquo;s sleep. (Read more: To Conquer the Air: The Wright Brothers and the Great Race for Flight by James Tobin). The Wright Brothers (and their sister Katharine) were collaborative work-hackers as well as outstanding physical engineers.&lt;br /&gt;&lt;br /&gt;One thing our public libraries need more of is ideas about social innovators. Strike up a conversation with your own library staff (or Friends of the Library members) and see what transpires. From little acorns great oaks grow.', 2),
(5, '423423', 'Libraries of all types have the same questions about open source software that are asked by technologists in other fields. Does open source make sense for me? What open source packages mesh well with the skills already in my organization? Where can I go to get training, documentation, hosting, and/or contract software development for a specific open source package?&lt;br /&gt;&lt;br /&gt;With funding from the Andrew W. Mellon Foundation, we set out to build tools that help libraries answer these questions. These questions and answers may be useful to others as well.&lt;br /&gt;&lt;br /&gt;View the complete collection of articles for Open Library Week&lt;br /&gt;&lt;br /&gt;In 2012, LYRASIS launched the FOSS4Lib site with this tag line: &quot;Helping libraries decide if and which open source software is right for them.&quot; With that tag line, you could probably guess that the site has two overarching components. The first is a set of decision support tools that help libraries decide if open source is right for them. Libraries are encouraged to start with a 40 question survey that helps them think about the way they run software. And because many smaller libraries do not have in-house IT support, another tool lists a series of questions they can ask their IT support provider. We know that open source is free to adopt but not free of costs, so we also provide descriptions of factors that libraries should track to create a clearer understanding of how the cost of open source compares to proprietary solutions. Lastly, libraries need a software selection methodology that puts open source on par with proprietary options.&lt;br /&gt;Open source options and decision-making tools&lt;br /&gt;&lt;br /&gt;The second part of the FOSS4Lib site is a registry of open source packages for libraries and related to libraries. There are, of course, many such registries out there; this one is for software specific to libraries and describes software using terms that libraries would use. We built the registry based on a similar tool from the neuroimaging informatics field. The registry is like an open wiki&amp;mdash;anyone can sign up for an account, then add and edit information that they know about software packages, releases, events, and service providers.&lt;br /&gt;&lt;br /&gt;Updates of registry information are available through RSS feeds and are automatically posted to Twitter. The software registry is just that&amp;mdash;pointers to software packages and their communities&amp;rsquo; resources. We realized that sites like GitHub, SourceForge, Google Code, and the like are already providing hosting sites for projects. We want the registry to be the one place a person could go to find details about open source projects for libraries no matter where the projects are hosted.&lt;br /&gt;&lt;br /&gt;Coming soon to the FOSS4Lib site is a series of case studies on how libraries made the decision to adopt open source and documents from an upcoming symposium on how open source projects in cultural heritage organizations can find sustainability. Keep watch on the site announcements through the RSS feed or Twitter account @FOSS4Lib for details.&lt;br /&gt;FOSS4Lib is built using open source&lt;br /&gt;&lt;br /&gt;And, of course, FOSS4Lib is built using open source. We use the Drupal content management system and customized it with the content types and functionality needed to make the registry useful. Although the grant funding has ended, LYRASIS&amp;mdash;a non-profit association of libraries in the United States&amp;mdash;is committed to maintaining the site for the benefit of all.&lt;br /&gt;&lt;br /&gt;Libraries have a natural affinity to fundamental tenants of the open source community. Both recognize the power of collective action and the value that open communication brings to a community. Each sees the benefit of building on the work of others and the importance of taking steps to make that happen. FOSS4Lib is a bridge between these two communities.', 0),
(6, 'Soy una noticia de farandula', 'Wanda Nara y Maxi L&amp;oacute;pez est&amp;aacute;n nuevamente en guerra por el bozal legal que el futbolista le aplic&amp;oacute; a la rubia con el aval de la Justicia y que determin&amp;oacute; que la mayor de las Nara deber&amp;iacute;a pagar una multa de 450 mil d&amp;oacute;lares.&lt;br /&gt;&lt;br /&gt;En medio de todo este esc&amp;aacute;ndalo, la Miss Italia Melissa Castiglioni, a quien se la involucra sentimentalmente con Maxi L&amp;oacute;pez, habl&amp;oacute; en AM (Telefe) sobre su v&amp;iacute;nculo con el delantero de la Sampdoria.&lt;br /&gt;&lt;br /&gt;&quot;Nos conocimos el mes pasado. Yo estaba cenando con amigos y nos quedamos charlando. Despu&amp;eacute;s salimos solos y fue un gal&amp;aacute;n conmigo, hasta me trajo flores&quot;, arranc&amp;oacute; la italiana.&lt;br /&gt;&lt;br /&gt;&quot;Maxi me pas&amp;oacute; a buscar en la Ferrari y cenamos en un restaurante de sushi. Me gusta como chico, pero su situaci&amp;oacute;n es muy delicada. Me cont&amp;oacute; varias veces que est&amp;aacute; preocupado por sus hijos y que le molesta que tanto Wanda como Mauro (Icardi) suban fotos permanentemente a la redes sociales&quot;, agreg&amp;oacute;,&lt;br /&gt;&lt;br /&gt;Tras referirse a la situaci&amp;oacute;n familiar de Maxi apunt&amp;oacute; contra Wanda Nara y fue contunedente:&amp;nbsp; &quot;No es considerada una chica linda, para m&amp;iacute; es fea&quot;.&lt;br /&gt;&lt;br /&gt;Melissa no quiso hablar demasiado sobre su relaci&amp;oacute;n con el futbolista. &quot;Habr&amp;aacute; que ver qu&amp;eacute; pasa&quot;, reflexion&amp;oacute;, pero reconoci&amp;oacute; que &quot;Maxi es hermoso&quot;.', 3),
(7, 'Polemica!', 'Sergio P&amp;eacute;rez es la persona a la que aproximadamente una semana se le impidi&amp;oacute; viajar en un taxi al que subi&amp;oacute; en plaza Cuba, inform&amp;oacute; Canal 10.&lt;br /&gt;&lt;br /&gt;&quot;Venia de Colonia. par&amp;eacute; un taxi y la perra se subi&amp;oacute;. El chofer me dijo que bajara ya a la perra sino arrancaba y la dejaba tirada por ah&amp;iacute;&quot;, declar&amp;oacute; P&amp;eacute;rez a El Pa&amp;iacute;s.&lt;br /&gt;&lt;br /&gt;Desde 2013, los ciegos y sus perros gu&amp;iacute;as pueden ingresar a los lugares p&amp;uacute;blicos. a los lugares privados de acceso p&amp;uacute;blico y a establecimientos o transportes de uso p&amp;uacute;blico, seg&amp;uacute;n un decreto firmado por el presidente Jos&amp;eacute; Mujica. El decreto indica que la Comisi&amp;oacute;n Honoraria de Bienestar Animal ser&amp;aacute; la que certifique si un perro est&amp;aacute; adiestrado y recomienda que se haga en base a criterios de la Federaci&amp;oacute;n Internacional de Escuelas de Perros Gu&amp;iacute;a.&lt;br /&gt;&lt;br /&gt;La gremial del taxi indic&amp;oacute; que la Intendencia de Montevideo &quot;solamente ha concedido la habilitaci&amp;oacute;n y autorizaci&amp;oacute;n, en forma expresa a 4 perros gu&amp;iacute;as&quot;, los que &quot;se encuentran debidamente identificados con el carn&amp;eacute;s que portan sus usuarios&quot;.&lt;br /&gt;&lt;br /&gt;Agreg&amp;oacute; que el perro que acompa&amp;ntilde;aba al denunciante no es uno de estos cuatro animales habilitados, por lo que entiende &quot;injusta la agresi&amp;oacute;n&quot; de P&amp;eacute;rez el &quot;a nuestro servicio de Radio Taxi y al conjunto de integrantes de nuestro gremio&quot;&lt;br /&gt;&lt;br /&gt;P&amp;eacute;rez en cambio dijo que la IMM no est&amp;aacute; facultada para expedir pases libres a perros lazarillos. &quot;No tiene gente capacitada para controlarlo. Quien deber&amp;iacute;a tomar esa medida es la Comisi&amp;oacute;n Honoraria de Bienestar Animal, pero estamos esperando una reuni&amp;oacute;n porque no tienen definido qu&amp;eacute; distintivo le van a poner a los animales&quot;.&lt;br /&gt;&lt;br /&gt;&amp;nbsp;&lt;br /&gt;&lt;br /&gt;A&amp;ntilde;adi&amp;oacute; que la Asociaci&amp;oacute;n Uruguaya Perros de Asistencia para Ciegos que &amp;eacute;l integra solicit&amp;oacute; una audiencia a la Instituci&amp;oacute;n de Derechos Humanos &quot;para plantear que no se est&amp;aacute; cumpliendo con la normativa&quot;.&lt;br /&gt;&lt;br /&gt;Otra es la posici&amp;oacute;n de la Fundaci&amp;oacute;n de Apoyo y Promoci&amp;oacute;n del Perro de Asistencia (Fundappas), responsable de la tra&amp;iacute;da desde el exterior de los cinco perros gu&amp;iacute;as entrenados bajo normativa internacional que hay en Uruguay.&lt;br /&gt;&lt;br /&gt;Alberto Calcagno, integrante de esta fundaci&amp;oacute;n, record&amp;oacute; que el decreto 2878/10 de la IMM autoriza a a las personas con discapacidad visual a viajar en el transporte colectivo con caninos entrenados que cumplan con los requisitos necesarios.&lt;br /&gt;&lt;br /&gt;Afirm&amp;oacute; que Tr&amp;aacute;nsito de la comuna le pidi&amp;oacute; a Fundappas la documentaci&amp;oacute;n que acredita la formaci&amp;oacute;n de los perros que llegaron del exterior, as&amp;iacute; se hizo y la IMM lo comunic&amp;oacute; a las empresas de transporte. &quot;Si alguien sube y no esta en esa lista no se lo puede llevar, y es porque ese perro no esta acreditado, no sabemos si fue adiestrado como corresponde, si puede agredir a alguien&quot;, acot&amp;oacute;.', 4);

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
(2, 'admin', '$P$BLcJ/R6.B4IG93UnZunn14heHtRclr.', 'rsantellan@gmail.com', 1, 0, NULL, NULL, NULL, NULL, NULL, '127.0.0.1', '2014-04-17 15:41:12', '2012-08-20 18:05:44', '2014-04-17 18:41:12');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `albumcontent`
--
ALTER TABLE `albumcontent`
  ADD CONSTRAINT `fk_albumcontent_album` FOREIGN KEY (`album_id`) REFERENCES `albums` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
