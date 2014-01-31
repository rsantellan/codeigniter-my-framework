-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 31, 2014 at 05:49 PM
-- Server version: 5.5.35
-- PHP Version: 5.3.10-1ubuntu3.9

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

--
-- Dumping data for table `departamento`
--

INSERT INTO `departamento` (`id`, `name`, `description`, `ordinal`) VALUES
(3, 'Montevideo', 'Montevideo&amp;nbsp;&amp;nbsp;&amp;nbsp; Montevideo&amp;nbsp;&amp;nbsp;&amp;nbsp; 1 319 108&amp;nbsp;&amp;nbsp;&amp;nbsp; 40,14&amp;nbsp;&amp;nbsp;&amp;nbsp; 530&amp;nbsp;&amp;nbsp;&amp;nbsp; 0,30&amp;nbsp;&amp;nbsp;&amp;nbsp; 2488,88', 2),
(4, 'Canelones', 'Canelones&amp;nbsp;&amp;nbsp;&amp;nbsp; Canelones&amp;nbsp;&amp;nbsp;&amp;nbsp; 520 187&amp;nbsp;&amp;nbsp;&amp;nbsp; 15,83&amp;nbsp;&amp;nbsp;&amp;nbsp; 4536&amp;nbsp;&amp;nbsp;&amp;nbsp; 2,59&amp;nbsp;&amp;nbsp;&amp;nbsp; 114,68', 3),
(5, 'Maldonado', 'Maldonado&amp;nbsp;&amp;nbsp;&amp;nbsp; Maldonado&amp;nbsp;&amp;nbsp;&amp;nbsp; 164 300&amp;nbsp;&amp;nbsp;&amp;nbsp; 5,00&amp;nbsp;&amp;nbsp;&amp;nbsp; 4793&amp;nbsp;&amp;nbsp;&amp;nbsp; 2,74&amp;nbsp;&amp;nbsp;&amp;nbsp; 34,28', 4),
(6, 'Salto', 'Salto&amp;nbsp;&amp;nbsp;&amp;nbsp; Salto&amp;nbsp;&amp;nbsp;&amp;nbsp; 124 878&amp;nbsp;&amp;nbsp;&amp;nbsp; 3,80&amp;nbsp;&amp;nbsp;&amp;nbsp; 14 163&amp;nbsp;&amp;nbsp;&amp;nbsp; 8,09&amp;nbsp;&amp;nbsp;&amp;nbsp; 8,82', 5),
(7, 'Colonia', 'Colonia&amp;nbsp;&amp;nbsp;&amp;nbsp; Colonia del Sacramento&amp;nbsp;&amp;nbsp;&amp;nbsp; 123 203&amp;nbsp;&amp;nbsp;&amp;nbsp; 3,75&amp;nbsp;&amp;nbsp;&amp;nbsp; 6106&amp;nbsp;&amp;nbsp;&amp;nbsp; 3,49&amp;nbsp;&amp;nbsp;&amp;nbsp; 20,18', 6),
(8, 'Paysandú', 'Paysand&amp;uacute;&amp;nbsp;&amp;nbsp;&amp;nbsp; Paysand&amp;uacute;&amp;nbsp;&amp;nbsp;&amp;nbsp; 113 124&amp;nbsp;&amp;nbsp;&amp;nbsp; 3,44&amp;nbsp;&amp;nbsp;&amp;nbsp; 13 922&amp;nbsp;&amp;nbsp;&amp;nbsp; 7,95&amp;nbsp;&amp;nbsp;&amp;nbsp; 8,13', 7),
(9, 'San José', 'San Jos&amp;eacute;&amp;nbsp;&amp;nbsp;&amp;nbsp; San Jos&amp;eacute; de Mayo&amp;nbsp;&amp;nbsp;&amp;nbsp; 108 309&amp;nbsp;&amp;nbsp;&amp;nbsp; 3,30&amp;nbsp;&amp;nbsp;&amp;nbsp; 4992&amp;nbsp;&amp;nbsp;&amp;nbsp; 2,85&amp;nbsp;&amp;nbsp;&amp;nbsp; 21,70', 8),
(10, 'Rivera', 'Rivera&amp;nbsp;&amp;nbsp;&amp;nbsp; Rivera&amp;nbsp;&amp;nbsp;&amp;nbsp; 103 493&amp;nbsp;&amp;nbsp;&amp;nbsp; 3,15&amp;nbsp;&amp;nbsp;&amp;nbsp; 9370&amp;nbsp;&amp;nbsp;&amp;nbsp; 5,35&amp;nbsp;&amp;nbsp;&amp;nbsp; 11,05', 9),
(11, 'Tacuarembó', 'Tacuaremb&amp;oacute;&amp;nbsp;&amp;nbsp;&amp;nbsp; Tacuaremb&amp;oacute;&amp;nbsp;&amp;nbsp;&amp;nbsp; 90 053&amp;nbsp;&amp;nbsp;&amp;nbsp; 2,74&amp;nbsp;&amp;nbsp;&amp;nbsp; 15 438&amp;nbsp;&amp;nbsp;&amp;nbsp; 8,82&amp;nbsp;&amp;nbsp;&amp;nbsp; 5,83', 10),
(12, 'Cerro Largo', 'Cerro Largo&amp;nbsp;&amp;nbsp;&amp;nbsp; Melo&amp;nbsp;&amp;nbsp;&amp;nbsp; 84 698&amp;nbsp;&amp;nbsp;&amp;nbsp; 2,58&amp;nbsp;&amp;nbsp;&amp;nbsp; 13 648&amp;nbsp;&amp;nbsp;&amp;nbsp; 7,80&amp;nbsp;&amp;nbsp;&amp;nbsp; 6,21', 11),
(13, 'Soriano', 'Soriano&amp;nbsp;&amp;nbsp;&amp;nbsp; Mercedes&amp;nbsp;&amp;nbsp;&amp;nbsp; 82 595&amp;nbsp;&amp;nbsp;&amp;nbsp; 2,51&amp;nbsp;&amp;nbsp;&amp;nbsp; 9008&amp;nbsp;&amp;nbsp;&amp;nbsp; 5,15&amp;nbsp;&amp;nbsp;&amp;nbsp; 9,17', 12),
(14, 'Artigas', 'Artigas&amp;nbsp;&amp;nbsp;&amp;nbsp; Artigas&amp;nbsp;&amp;nbsp;&amp;nbsp; 73 378&amp;nbsp;&amp;nbsp;&amp;nbsp; 2,23&amp;nbsp;&amp;nbsp;&amp;nbsp; 11 928&amp;nbsp;&amp;nbsp;&amp;nbsp; 6,82&amp;nbsp;&amp;nbsp;&amp;nbsp; 6,15', 13),
(15, 'Rocha', 'Rocha&amp;nbsp;&amp;nbsp;&amp;nbsp; Rocha&amp;nbsp;&amp;nbsp;&amp;nbsp; 68 088&amp;nbsp;&amp;nbsp;&amp;nbsp; 2,07&amp;nbsp;&amp;nbsp;&amp;nbsp; 10 551&amp;nbsp;&amp;nbsp;&amp;nbsp; 6,03&amp;nbsp;&amp;nbsp;&amp;nbsp; 6,45', 14),
(16, 'Florida', 'Florida&amp;nbsp;&amp;nbsp;&amp;nbsp; Florida&amp;nbsp;&amp;nbsp;&amp;nbsp; 67 048&amp;nbsp;&amp;nbsp;&amp;nbsp; 2,04&amp;nbsp;&amp;nbsp;&amp;nbsp; 10 417&amp;nbsp;&amp;nbsp;&amp;nbsp; 5,95&amp;nbsp;&amp;nbsp;&amp;nbsp; 6,44', 15),
(17, 'Lavalleja', 'Lavalleja&amp;nbsp;&amp;nbsp;&amp;nbsp; Minas&amp;nbsp;&amp;nbsp;&amp;nbsp; 58 815&amp;nbsp;&amp;nbsp;&amp;nbsp; 1,79&amp;nbsp;&amp;nbsp;&amp;nbsp; 10 016&amp;nbsp;&amp;nbsp;&amp;nbsp; 5,72&amp;nbsp;&amp;nbsp;&amp;nbsp; 5,87', 16),
(18, 'Durazno', 'Durazno&amp;nbsp;&amp;nbsp;&amp;nbsp; Durazno&amp;nbsp;&amp;nbsp;&amp;nbsp; 57 088&amp;nbsp;&amp;nbsp;&amp;nbsp; 1,74&amp;nbsp;&amp;nbsp;&amp;nbsp; 11 643&amp;nbsp;&amp;nbsp;&amp;nbsp; 6,65&amp;nbsp;&amp;nbsp;&amp;nbsp; 4,90', 17),
(19, 'Río Negro', 'R&amp;iacute;o Negro&amp;nbsp;&amp;nbsp;&amp;nbsp; Fray Bentos&amp;nbsp;&amp;nbsp;&amp;nbsp; 54 765&amp;nbsp;&amp;nbsp;&amp;nbsp; 1,67&amp;nbsp;&amp;nbsp;&amp;nbsp; 9282&amp;nbsp;&amp;nbsp;&amp;nbsp; 5,30&amp;nbsp;&amp;nbsp;&amp;nbsp; 5,90', 18),
(20, 'Treinta y Tres', 'Treinta y Tres&amp;nbsp;&amp;nbsp;&amp;nbsp; Treinta y Tres&amp;nbsp;&amp;nbsp;&amp;nbsp; 48 134&amp;nbsp;&amp;nbsp;&amp;nbsp; 1,46&amp;nbsp;&amp;nbsp;&amp;nbsp; 9529&amp;nbsp;&amp;nbsp;&amp;nbsp; 5,44&amp;nbsp;&amp;nbsp;&amp;nbsp; 5,05', 19),
(21, 'Flores', 'Flores, departamento del Uruguay. Su capital es Trinidad. Ubicado en el suroeste del territorio, limita al norte con el departamento de R&amp;iacute;o Negro, al noreste con el de Durazno, al este con el de Florida, al sur con el de San Jos&amp;eacute;, y al oeste con el de Soriano, teniendo al suroeste un ligero contacto con Colonia.&lt;br /&gt;&lt;br /&gt;', 20);

--
-- Dumping data for table `mail_db`
--

INSERT INTO `mail_db` (`id`, `direccion`, `tipo`, `nombre`, `funcion`) VALUES
(1, 'rsantellan@gmail.com', 'from', 'Rodrigo Santellan', 'contacto'),
(2, 'rswibmer@hotmail.com', 'to', 'Ignacio Wibmer', 'contacto'),
(3, 'rswibmer@hotmail.com', 'cc', 'Juan', 'contacto'),
(4, 'rsantellan@gmail.com', 'bcc', 'pepito', 'contacto'),
(5, 'rodrigosantellan@yahoo.com.ar', 'reply', 'Reply to', 'contacto');

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `activated`, `banned`, `ban_reason`, `new_password_key`, `new_password_requested`, `new_email`, `new_email_key`, `last_ip`, `last_login`, `created`, `modified`) VALUES
(2, 'admin', '$P$BLcJ/R6.B4IG93UnZunn14heHtRclr.', 'rsantellan@gmail.com', 1, 0, NULL, NULL, NULL, NULL, NULL, '127.0.0.1', '2014-01-31 14:01:50', '2012-08-20 18:05:44', '2014-01-31 16:01:50');
SET FOREIGN_KEY_CHECKS=1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
