DROP DATABASE IF EXISTS DB;
CREATE DATABASE DB;
Use DB;



DROP TABLE IF EXISTS `Burrito`;
CREATE TABLE IF NOT EXISTS `Burrito` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `BuritoFormaat` int(50) NOT NULL,
  `saus` varchar(50) NOT NULL,
  `Bonen` varchar(50) NOT NULL,
  `Rijst` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
COMMIT;


select * from Burrito;



