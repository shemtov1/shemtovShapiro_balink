mysql --host=localhost --user="root" << EOF
ALTER USER 'root'@'localhost' IDENTIFIED BY '${MYSQLROOTPASS}';
flush privileges;
CREATE USER 'projectshare'@'localhost' IDENTIFIED BY '${DBPASS}';
CREATE DATABASE IF NOT EXISTS species;
GRANT ALL PRIVILEGES ON species . * TO  'projectshare'@'localhost';
flush privileges;

USE species;

CREATE TABLE `animals` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `species` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB;

CREATE TABLE `persons` (
  `id` int NOT NULL AUTO_INCREMENT,
  `firstName` varchar(45) DEFAULT NULL,
  `lastName` varchar(45) DEFAULT NULL,
  `phoneNumber` varchar(45) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `country` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB;

CREATE TABLE `membership` (
  `animals_id` int NOT NULL,
  `persons_id` int NOT NULL,
  PRIMARY KEY (`animals_id`),
  UNIQUE KEY `animals_id_UNIQUE` (`animals_id`),
  KEY `fk_membership_persons_persons_id_idx` (`persons_id`),
  CONSTRAINT `fk_membership_animals_animals_id` FOREIGN KEY (`animals_id`) REFERENCES `animals` (`id`),
  CONSTRAINT `fk_membership_persons_persons_id` FOREIGN KEY (`persons_id`) REFERENCES `persons` (`id`)
) ENGINE=InnoDB;

EOF
