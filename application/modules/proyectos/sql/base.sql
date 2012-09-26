CREATE TABLE IF NOT EXISTS  `proyectos` (
 id int(40) NOT NULL auto_increment,
 nombre VARCHAR(255) NOT NULL,
 cliente VARCHAR(255) NOT NULL,
 tipo_de_trabajo VARCHAR(1000) NOT NULL,
 descripcion VARCHAR(1000) NOT NULL,
 created_at datetime NOT NULL,
 updated_at datetime NOT NULL,
 PRIMARY KEY (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;