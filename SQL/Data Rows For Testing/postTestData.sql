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

-- Crimianl Mind Channel
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
   "2000000005",
   "500000000");
INSERT INTO post VALUES(
   NULL,
   "I love Garcia!",
   "What do you think of Garcia?",
   NULL,
   CURRENT_TIMESTAMP,
   "3000000001",
   "500000000");
INSERT INTO post VALUES(
   NULL,
   "I love Emily!",
   "What do you think of Emily?",
   NULL,
   CURRENT_TIMESTAMP,
   "3000000002",
   "500000000");
INSERT INTO post VALUES(
   NULL,
   "(S11E6) SPOILER ALERT! What do you think of the new episode?",
   "Do you think that this plot twist? Isn't it awesome?? But my question is why JJ did that? Any ideas?",
   NULL,
   CURRENT_TIMESTAMP,
   "3000000003",
   "500000000");
INSERT INTO post VALUES(
   NULL,
   "(S4E20) SPOILER ALERT! Derek Morgan's plot twist.",
   "Why did Derej leave the show?",
   NULL,
   CURRENT_TIMESTAMP,
   "3000000004",
   "500000000");
INSERT INTO post VALUES(
   NULL,
   "I think I learn how to get away with a murderer with this show lol",
   "What were the things you learnt from the show that taught you how to get away with a murder?",
   NULL,
   CURRENT_TIMESTAMP,
   "1000000000",
   "500000000");
INSERT INTO post VALUES(
   NULL,
   "When is the next season's (season 12) premiere?",
   "Do you know if the show has a next season? I cant wait for it.",
   NULL,
   CURRENT_TIMESTAMP,
   "1000000002",
   "500000000");
INSERT INTO post VALUES(
   NULL,
   "Ankara! COMIC COM on Criminal Minds in February 2018!",
   "There will be a Comic Con organized next year. Details are still unknown, but subscribe to this post to learn the details first!",
   NULL,
   CURRENT_TIMESTAMP,
   "2000000001",
   "500000000");
INSERT INTO post VALUES(
   NULL,
   "Can anyone draw in Criminal Minds style?",
   "I am looking for a person who could draw my GF in Criminal Minds style. She is a huge fan and I want to make her gift. Please, contact me.",
   NULL,
   CURRENT_TIMESTAMP,
   "1000000002",
   "500000000");
