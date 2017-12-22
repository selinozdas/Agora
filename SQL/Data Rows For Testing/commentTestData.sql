/*
CREATE TABLE `comment` (
 `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
 `body` varchar(8000) NOT NULL,
 `since` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
 `rating` int(11) NOT NULL DEFAULT '0',
 `helpful_flag` int(10) NOT NULL DEFAULT '0',
 `time_posted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
 `userID` int(10) unsigned NOT NULL,
 `postID` int(10) unsigned NOT NULL,
 PRIMARY KEY (`ID`),
 FOREIGN KEY (`userID`) REFERENCES `user` (`ID`),
 FOREIGN KEY (`postID`) REFERENCES `post` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
*/

INSERT INTO post VALUES(
   NULL,
   'Your post is stupid',
   CURRENT_TIMESTAMP,
   '0',
   '0',
   CURRENT_TIMESTAMP,
   '3000000006',
   '17');
INSERT INTO post VALUES(
   NULL,
   'You are an awesome human being, so don\'t worry',
   CURRENT_TIMESTAMP,
   '0',
   '0',
   CURRENT_TIMESTAMP,
   '3000000006',
   '28');
INSERT INTO post VALUES(
   NULL,
   'Life is wonderful, don\'t mess it up. Cuz you are of those who can!',
   CURRENT_TIMESTAMP,
   '0',
   '0',
   CURRENT_TIMESTAMP,
   '3000000006',
   '45');
INSERT INTO post VALUES(
   NULL,
   'This is funny',
   CURRENT_TIMESTAMP,
   '0',
   '0',
   CURRENT_TIMESTAMP,
   '3000000006',
   '17');
