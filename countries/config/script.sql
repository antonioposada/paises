CREATE SCHEMA `TestCountries` DEFAULT CHARACTER SET utf8 ;

CREATE TABLE `TestCountries`.`paises` (
  `id_pais` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(2) NOT NULL DEFAULT '',
  `nombre` varchar(80) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_pais`),
  KEY `code` (`code`)
) DEFAULT CHARSET=utf8;

INSERT INTO `TestCountries`.`paises` (`code`, `nombre`) VALUES ('DE', 'Alemania');
INSERT INTO `TestCountries`.`paises` (`code`, `nombre`) VALUES ('IT', 'Italia');
INSERT INTO `TestCountries`.`paises` (`code`, `nombre`) VALUES ('FR', 'Francia');
INSERT INTO `TestCountries`.`paises` (`code`, `nombre`) VALUES ('PT', 'Portugal');
