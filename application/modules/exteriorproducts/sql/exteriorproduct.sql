CREATE TABLE IF NOT EXISTS `product_exterior` (
  `id` INT(40) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `genericname` VARCHAR(255) NOT NULL DEFAULT '',
  `presentation` VARCHAR(255) NOT NULL DEFAULT '',
  `country_id` INT(40) NOT NULL,
  `category_id` INT(40) NOT NULL,
  `presencetype` VARCHAR(2) NOT NULL,
  `compuesto` VARCHAR(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `country_id` (`country_id`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
 
--
-- Constraints for dumped tables
--
 
--
-- Constraints for table `product_exterior`
--
ALTER TABLE `product_exterior`
  ADD CONSTRAINT `product_exterior_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_exterior_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;