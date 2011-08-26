CREATE TABLE `options` (
`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`name` VARCHAR( 250 ) NOT NULL
) ENGINE = InnoDB;

CREATE TABLE `voters` (
`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`option_id` INT NOT NULL ,
`ip` VARCHAR( 250 ) NOT NULL ,
`number` INT NOT NULL
) ENGINE = InnoDB;

INSERT INTO `options` (`id` ,`name`)VALUES (NULL , 'PHP'), (NULL , 'JQuery'),(NULL , 'C++'),(NULL , 'Java');