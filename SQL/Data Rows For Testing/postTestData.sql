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
   "2000000004",
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

-- Regret about
INSERT INTO post VALUES(
   NULL,
   "Today I regret about cheating on the exam.",
   "Today I had this Database Midterm in university, and I had a chance to cheat. So, I did. But I was caught and I am about to be expelled. I am freaking out and don't know what to do... :(",
   NULL,
   CURRENT_TIMESTAMP,
   "3000000001",
   "500000003");
INSERT INTO post VALUES(
   NULL,
   "I regret about proposing my gf today",
   "I just got rejected.",
   NULL,
   CURRENT_TIMESTAMP,
   "2000000005",
   "500000003");
INSERT INTO post VALUES(
   NULL,
   "Today I regret about living",
   "Life sucks and don't want to exist anymore...",
   NULL,
   CURRENT_TIMESTAMP,
   "3000000001",
   "500000003");
INSERT INTO post VALUES(
   NULL,
   "Today I regret about treating my friend",
   "I treated my friend to day with Nutella Sandwich, but then she made me watch this horrible movie called The Room (2003). It was terrible decision to invite her in the first place.",
   NULL,
   CURRENT_TIMESTAMP,
   "3000000002",
   "500000003");
INSERT INTO post VALUES(
   NULL,
   "I hit my head",
   "I regret about getting up, cuz I hit my head...",
   NULL,
   CURRENT_TIMESTAMP,
   "3000000003",
   "500000003");
INSERT INTO post VALUES(
   NULL,
   "I regert about reading leaked script of Game of Thrones",
   "Why did I read this script? just whyyy?",
   NULL,
   CURRENT_TIMESTAMP,
   "3000000008",
   "500000003");
INSERT INTO post VALUES(
   NULL,
   "I think I regret about eating today",
   "I ate a sandwich and now I feel guilty for the carbs I just consumed.",
   NULL,
   CURRENT_TIMESTAMP,
   "1000000000",
   "500000003");
INSERT INTO post VALUES(
   NULL,
   "Today I regret about waking up",
   "I learnt my Midterm grade, therefore, I regret about actually being awake right now",
   NULL,
   CURRENT_TIMESTAMP,
   "1000000002",
   "500000003");
INSERT INTO post VALUES(
   NULL,
   "Today I regret about visiting hospital",
   "I saw my ex today in hospital... That brought some memorie, bad and sad ones...",
   NULL,
   CURRENT_TIMESTAMP,
   "2000000001",
   "500000003");
INSERT INTO post VALUES(
   NULL,
   "I regret about my life in general",
   "I am 73 and I am totally lonely. Rich but lonely. I regret I didn't build stronged relationships with people and family my whole life.",
   NULL,
   CURRENT_TIMESTAMP,
   "1000000002",
   "500000003");

-- Death
INSERT INTO post VALUES(
   NULL,
   "How to prevent your teen child from suicide",
   "Experienced parents, please, share your wisedom.",
   NULL,
   CURRENT_TIMESTAMP,
   "3000000006",
   "500000002");
INSERT INTO post VALUES(
   NULL,
   "Is there a life after death?",
   "is there any scintific evidence that there is life after death?",
   NULL,
   CURRENT_TIMESTAMP,
   "2000000005",
   "500000002");
INSERT INTO post VALUES(
   NULL,
   "When I die I will become a butterfly, and I mean it",
   "I believe in reincornation, and I want to be a butterfly after I die. How can I manage this?",
   NULL,
   CURRENT_TIMESTAMP,
   "3000000001",
   "500000002");
INSERT INTO post VALUES(
   NULL,
   "I wanna kill Raza. How to manage a murder?",
   "I think I will just burn him. Will that cover the evidences?",
   NULL,
   CURRENT_TIMESTAMP,
   "3000000002",
   "500000002");
INSERT INTO post VALUES(
   NULL,
   "I bleed, I think I'm dying",
   "I see blood on my pants, and I keep bleeding for a few days. I think I am dying, but I am scared to tell to my parents, cuz I don't want to make them sad.",
   NULL,
   CURRENT_TIMESTAMP,
   "3000000003",
   "500000002");
INSERT INTO post VALUES(
   NULL,
   "IS Jon Snow really dead???",
   "Please, tell me if Jon Snow is really dead???",
   NULL,
   CURRENT_TIMESTAMP,
   "3000000002",
   "500000002");
INSERT INTO post VALUES(
   NULL,
   "I think I learn how to get away with a murderer with this show called Criminal Minds lol",
   "What were the things you learnt from the show that taught you how to get away with a murder?",
   NULL,
   CURRENT_TIMESTAMP,
   "3000000005",
   "500000002");
INSERT INTO post VALUES(
   NULL,
   "When is the next season's (season 12) premiere?",
   "Do you know if the show has a next season? I cant wait for it.",
   NULL,
   CURRENT_TIMESTAMP,
   "3000000006",
   "500000002");
INSERT INTO post VALUES(
   NULL,
   "What is the minimum inprisonment period for double homocide in America?",
   "Hi! I am 12 and I have a brother, who is 28. He was protecting himself and accidentally killed two robbers. For how long they might put him in jail? What is the minimum?",
   NULL,
   CURRENT_TIMESTAMP,
   "3000000007",
   "500000002");
INSERT INTO post VALUES(
   NULL,
   "Do you knoe anyone who came back to life after clinical death?",
   "My father is back from short clinical death. Doctors say it will take some time for him to recover. Has anyone experienced that? Can you please share your thoughts and suggestions?",
   NULL,
   CURRENT_TIMESTAMP,
   "3000000008",
   "500000002");

INSERT INTO `post` (`ID`, `title`, `body`, `rating`, `time_posted`, `userID`, `channelID`) VALUES (NULL, 'The Grand Tour Review on V8 Engine', '\r\nThe once outlast topGear host tell therir review on the neww Volkswagen V8 engine. They suggest that it is the best engine ever made', '0', CURRENT_TIMESTAMP, '3000000001', '500000004');


INSERT INTO `post` (`ID`, `title`, `body`, `rating`, `time_posted`, `userID`, `channelID`) VALUES (NULL, 'Is it necessary for a car to have an engine?', 'Sooo hey guys the thing i wanna impress my boyfriend....but i don\'t know squat about cars. So my question is is it necessary for a car to have an enginer... OMG this engine is too heavy XOXOXO to all my followers', '0', CURRENT_TIMESTAMP, '1000000000', '500000004');

INSERT INTO `post` (`ID`, `title`, `body`, `rating`, `time_posted`, `userID`, `channelID`) VALUES (NULL, 'The new tesla  is the think of the future', 'I would like to buy a tesla but i am a noob in cars.Should i buy it', '0', CURRENT_TIMESTAMP, '2000000005', '500000004');




INSERT INTO `post` (`ID`, `title`, `body`, `rating`, `time_posted`, `userID`, `channelID`) VALUES (NULL, 'I love persian cat', 'I love persian cas soo much , like they feel like royalty . I would really appreciate if someone can help me buy a cat', '0', CURRENT_TIMESTAMP, '1000000002', '500000001');

INSERT INTO `post` (`ID`, `title`, `body`, `rating`, `time_posted`, `userID`, `channelID`) VALUES (NULL, 'NEED HELP', 'GUYSSS I AM SADDD SEND ME CAT VIDEOSSS PLSSSS', '0', CURRENT_TIMESTAMP, '2000000004', '500000001');
