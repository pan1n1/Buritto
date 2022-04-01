Drop if exist DB;
CREATE DB;
Use DB;



DROP TABLE IF EXISTS `pizza`;
CREATE TABLE IF NOT EXISTS `pizza` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `bodemformaat` int(50) NOT NULL,
  `saus` varchar(50) NOT NULL,
  `topping` varchar(50) NOT NULL,
  `kruiden` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
COMMIT;
