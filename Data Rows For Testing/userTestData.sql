/*
CREATE TABLE `user`(
	`ID` INT (10) unsigned PRIMARY KEY AUTO_INCREMENT,
	`username` VARCHAR (20) UNIQUE NOT NULL,
	`password` VARCHAR (20) NOT NULL,
	`email` VARCHAR (50) UNIQUE NOT NULL,
	`firstName` VARCHAR (50) NOT NULL,
   `laststName` VARCHAR (50) NOT NULL,
	`picture` VARCHAR(100),
   `isAdmin` BOOLEAN NOT NULL,
	`up_down_votes` INT DEFAULT 0,
	`helpful_fags` INT unsigned DEFAULT 0,
	`number_of_reports` INT unsigned DEFAULT 0,
	`total_reputation` INT DEFAULT 0)
ENGINE=InnoDB DEFAULT CHARSET=latin1;
*/

INSERT INTO user VALUES(
 '1000000000',
 'shompot',
 'sholpotthegreat',
 'cholpon94@gmail.com',
 'Cholpon',
 'Mambetova',
 '',
 'true',
 );
