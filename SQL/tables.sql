-- User

CREATE TABLE `user`(
	`ID` INT (10) unsigned PRIMARY KEY AUTO_INCREMENT,
	`username` VARCHAR (20) UNIQUE NOT NULL,
	`password` VARCHAR (20) NOT NULL,
	`email` VARCHAR (50) UNIQUE NOT NULL,
	`firstName` VARCHAR (20) NOT NULL,
   `lastName` VARCHAR (20) NOT NULL,
	`picture` VARCHAR(100),
   `isAdmin` BOOLEAN NOT NULL DEFAULT 0,
	`up_down_votes` INT DEFAULT 0,
	`helpful_fags` INT unsigned DEFAULT 0,
	`number_of_reports` INT unsigned DEFAULT 0,
	`total_reputation` INT DEFAULT 0)
ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Channel

create table channel(
    ID int(10) unsigned primary key auto_increment,
    name varchar(32) not null,
    description varchar(500),
    userID int(10) unsigned,
    since timestamp,
    foreign key (userID) references user(ID))
ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Private Channel

create table private_channel(
    ID int(10) unsigned primary key,
    foreign key(ID) references channel(ID))
ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Subscribes

create table subscribes(
    userID int(10) unsigned primary key,
    channelID int(10) unsigned,
    foreign key (userID) references user(ID),
    foreign key (channelID) references channel(ID))
ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Requests

create table requests_follow(
    userID int(10) unsigned primary key,
    channelID int(10) unsigned,
    isApproved boolean default false,
    foreign key (userID) references user(ID),
    foreign key (channelID) references private_channel(ID))
ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Reports Channel

CREATE TABLE `reports_channel`(
   `reportID` INT (10) unsigned NOT NULL AUTO_INCREMENT,
   `userID` INT (10) unsigned NOT NULL,
   `channelID` INT (10) unsigned NOT NULL,
   `type` INT NOT NULL,
   PRIMARY KEY (`reportID`),
   FOREIGN KEY (`userID`) REFERENCES user (`ID`),
   FOREIGN KEY (`channelID`) REFERENCES channel (`ID`))
ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Post

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Reports Post

CREATE TABLE `reports_post`(
   `reportID` INT (10) unsigned NOT NULL AUTO_INCREMENT,
   `userID` INT (10) unsigned NOT NULL,
   `postID` INT (10) unsigned NOT NULL,
   `type` INT NOT NULL,
   PRIMARY KEY (`reportID`),
   FOREIGN KEY (`userID`) REFERENCES user (`ID`),
   FOREIGN KEY (`postID`) REFERENCES post (`ID`))
ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Comment

CREATE TABLE `comment` (
 `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
 `body` varchar(8000) NOT NULL,
 `since` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
 `rating` int(11) NOT NULL DEFAULT '0',
 `helpful_flag` int(10) NOT NULL DEFAULT '0',
 `time_posted` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
 `userID` int(10) unsigned NOT NULL,
 `postID` int(10) unsigned NOT NULL,
 PRIMARY KEY (`ID`),
 FOREIGN KEY (`userID`) REFERENCES `user` (`ID`),
 FOREIGN KEY (`postID`) REFERENCES `post` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Reports Comment

CREATE TABLE `reports_comment`(
   `reportID` INT (10) unsigned NOT NULL AUTO_INCREMENT,
   `userID` INT (10) unsigned NOT NULL,
   `commentID` INT (10) unsigned NOT NULL,
   `type` INT NOT NULL,
   PRIMARY KEY (`reportID`),
   FOREIGN KEY (`userID`) REFERENCES user (`ID`),
   FOREIGN KEY (`commentID`) REFERENCES comment (`ID`))
ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Replies

CREATE TABLE `replies` (
 `childCommentID` int(10) unsigned NOT NULL AUTO_INCREMENT,
 `parentCommentID` int(10) unsigned NOT NULL,
 PRIMARY KEY (`childCommentID`),
 KEY `parentCommentID` (`parentCommentID`),
 CONSTRAINT `replies_ibfk_1` FOREIGN KEY (`childCommentID`) REFERENCES `comment` (`ID`),
 CONSTRAINT `replies_ibfk_2` FOREIGN KEY (`parentCommentID`) REFERENCES `comment` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Ban

CREATE TABLE `bans` (
 `bannedUserID` int(10) unsigned NOT NULL AUTO_INCREMENT,
 `userID` int(10) unsigned NOT NULL,
 PRIMARY KEY (`bannedUserID`),
 FOREIGN KEY (`bannedUserID`) REFERENCES user (`ID`),
 FOREIGN KEY (`userID`) REFERENCES user (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Removes Channel

CREATE TABLE `removes_channel` (
 `channelID` int(10) unsigned NOT NULL,
 `userID` int(10) unsigned NOT NULL,
 PRIMARY KEY (`channelID`),
 CONSTRAINT `removes_channel_ibfk_1` FOREIGN KEY (`channelID`) REFERENCES `channel` (`ID`),
 CONSTRAINT `removes_channel_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `user` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Removes Post

CREATE TABLE `removes_post` (
 `postID` int(10) unsigned NOT NULL,
 `userID` int(10)unsigned NOT NULL,
 PRIMARY KEY (`postID`),
 CONSTRAINT `removes_post_ibfk_1` FOREIGN KEY (`postID`) REFERENCES `post` (`ID`),
 CONSTRAINT `removes_post_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `user` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



-- Removes Comment

CREATE TABLE `removes_comment` (
 `commentID` int(10) unsigned NOT NULL AUTO_INCREMENT,
 `userID` int(10) unsigned NOT NULL,
 PRIMARY KEY (`commentID`),
 CONSTRAINT `removes_comment_ibfk_1` FOREIGN KEY (`commentID`) REFERENCES `comment` (`ID`),
 CONSTRAINT `removes_comment_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `user` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Votes Post

CREATE TABLE `votes_post` (
 `postID` int(10) unsigned NOT NULL,
 `userID` int(10) unsigned NOT NULL,
 `isUp` BOOLEAN NOT NULL,
 PRIMARY KEY (`postID`, `userID`),
 FOREIGN KEY (`postID`) REFERENCES post (`ID`),
 FOREIGN KEY (`userID`) REFERENCES user (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Votes Comment

CREATE TABLE `votes_comment` (
 `commentID` int(10) unsigned NOT NULL,
 `userID` int(10) unsigned NOT NULL,
 `isUp` BOOLEAN NOT NULL,
 PRIMARY KEY (`commentID`, `userID`),
 FOREIGN KEY (`commentID`) REFERENCES comment (`ID`),
 FOREIGN KEY (`userID`) REFERENCES user (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
