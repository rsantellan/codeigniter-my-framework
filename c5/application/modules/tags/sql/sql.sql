CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


--
-- Table structure for table `tags_objetos`
--

CREATE TABLE IF NOT EXISTS `tags_objetos` (
  `id_tag` int(11) NOT NULL,
  `id_objecto` int(11) NOT NULL,
  `class_objecto` varchar(255) NOT NULL,
  PRIMARY KEY (`id_tag`,`id_objecto`, `class_objecto`),
  KEY `id_tag` (`id_objecto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tags_actas`
--
ALTER TABLE `tags_objetos`
  ADD CONSTRAINT `tags_actas_ibfk_2` FOREIGN KEY (`id_tag`) REFERENCES `tags` (`id`) ON DELETE CASCADE;


