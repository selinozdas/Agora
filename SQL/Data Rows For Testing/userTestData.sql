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
 '1000000000', -- ID
 'shompot',    -- username
 'sholpotthegreat', -- password
 'cholpon94@gmail.com',
 'Cholpon',
 'Mambetova',
 '',
 '1', -- isAdmin
 '0',
 '0',
 '0',
 '0');

INSERT INTO user VALUES(
 '1000000001', -- ID
 'douglas',    -- username
 'douglas', -- password
 'douglas@gmail.com',
 'Douglas',
 'Mills',
 '',
 '1', -- isAdmin
 '0',
 '0',
 '0',
 '0');

INSERT INTO user VALUES(
  '1000000002', -- ID
  'alan',    -- username
  'alan', -- password
  'alan@gmail.com',
  'Alan',
  'Callahan',
  '',
  '1', -- isAdmin
  '0',
  '0',
  '0',
  '0');
INSERT INTO user VALUES(
   '2000000001', -- ID
   'alibek',    -- username
   'alibek', -- password
   'alibek@gmail.com',
   'Alibek',
   'Nurdin uulu',
   '',
   '0', -- isAdmin
   '0',
   '0',
   '0',
   '0');
INSERT INTO user VALUES(
 '2000000002', -- ID
 'mark',    -- username
 'mark', -- password
 'mark@gmail.com',
 'Mark',
 'Sobolev',
 '',
 '0', -- isAdmin
 '0',
 '0',
 '0',
 '0');
INSERT INTO user VALUES(
  '2000000003', -- ID
  'emily002',    -- username
  'emily002', -- password
  'emily002@gmail.com',
  'Emily',
  'Turner',
  '',
  '0', -- isAdmin
  '0',
  '0',
  '0',
  '0');
INSERT INTO user VALUES(
 '2000000004', -- ID
 'priscilla',    -- username
 'priscilla', -- password
 'priscilla@gmail.com',
 'Priscilla',
 'Ahn',
 '',
 '0', -- isAdmin
 '0',
 '0',
 '0',
 '0');
INSERT INTO user VALUES(
   '2000000005', -- ID
   'john',    -- username
   'john', -- password
   'john@gmail.com',
   'John',
   'Brown',
   '',
   '0', -- isAdmin
   '0',
   '0',
   '0',
   '0');
INSERT INTO user VALUES(
   '3000000001', -- ID
   'sexyboy',    -- username
   'sexyboy', -- password
   'sexyboy@gmail.com',
   'Boy',
   'Sexy',
   '',
   '0', -- isAdmin
   '0',
   '0',
   '0',
   '0');

INSERT INTO user VALUES(
 '3000000002', -- ID
 'yourfear',    -- username
 'yourfear', -- password
 'yourfear@gmail.com',
 'Fear',
 'Your',
 '',
 '0', -- isAdmin
 '0',
 '0',
 '0',
 '0');
