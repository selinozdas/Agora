/*
CREATE TABLE `post` (
 `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
 `title` varchar(800) NOT NULL,
 `body` varchar(8000) NOT NULL,
 `rating` int(11) DEFAULT '0',
 `time_posted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
 `userID` int(10) unsigned NOT NULL,
 `channelID` int(10) unsigned NOT NULL,
 PRIMARY KEY (`ID`),
 FOREIGN KEY (`userID`) REFERENCES `user` (`ID`),
 FOREIGN KEY (`channelID`) REFERENCES `channel` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;*/

INSERT INTO post VALUES(
   NULL,
   "I love Dr.Reid!",
   "What do you think of Dr. Reid?",
   NULL,
   CURRENT_TIMESTAMP,
   "1000000000",
   "500000000");
   INSERT INTO post VALUES(
      NULL,
      "I love JJ!",
      "What do you think of JJ?",
      NULL,
      CURRENT_TIMESTAMP,
      "1000000000",
      "500000000");
      INSERT INTO post VALUES(
         NULL,
         "I love Garcia!",
         "What do you think of Garcia?",
         NULL,
         CURRENT_TIMESTAMP,
         "1000000000",
         "500000000");
         INSERT INTO post VALUES(
            NULL,
            "I love Emily!",
            "What do you think of Emily?",
            NULL,
            CURRENT_TIMESTAMP,
            "1000000000",
            "500000000");
