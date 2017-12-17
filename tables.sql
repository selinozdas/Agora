//Channel

create table channel(
    id int(10) primary key auto_increment,
    name varchar(32) not null,
    description varchar(140),
    owner_id int(10),
    since timestamp,
    foreign key (owner_id) references user(id));

//Private Channel

create table private_channel(
    id int(10) primary key,
    foreign key(id) references channel(id));

//Subscribes

create table subscribes(
    u_id int(10) primary key,
    c_id int(10),
    foreign key (u_id) references user(id),
    foreign key (c_id) references channel(id));

//Requests

create table requests_follow(
    u_id int(10) primary key,
    c_id int(10),
    isApproved boolean default false,
    foreign key (u_id) references user(id),
    foreign key (c_id) references private_channel(id));

//bann

CREATE TABLE `bans` (
 `bannedUserID` int(10) NOT NULL AUTO_INCREMENT,
 `userID` int(10) NOT NULL,
 PRIMARY KEY (`bannedUserID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1


//comments

CREATE TABLE `comment` (
 `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
 `body` varchar(8000) NOT NULL,
 `since` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
 `rating` int(11) NOT NULL DEFAULT '0',
 `helpful_flag` int(10) NOT NULL DEFAULT '0',
 `time_posted` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
 PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1


//removeChannel

CREATE TABLE `remove_channel` (
 `channelID` int(10) unsigned NOT NULL,
 `userID` int(10) NOT NULL,
 PRIMARY KEY (`channelID`),
 CONSTRAINT `remove_channel_ibfk_1` FOREIGN KEY (`channelID`) REFERENCES `channel` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1


//remove post

CREATE TABLE `remove_post` (
 `postID` int(10) unsigned NOT NULL,
 `userID` int(10) NOT NULL,
 PRIMARY KEY (`postID`),
 CONSTRAINT `remove_post_ibfk_1` FOREIGN KEY (`postID`) REFERENCES `post` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1



//remove Channel
CREATE TABLE `remove_comment` (
 `commentID` int(10) unsigned NOT NULL AUTO_INCREMENT,
 `userID` int(10) NOT NULL,
 PRIMARY KEY (`commentID`),
 CONSTRAINT `remove_comment_ibfk_1` FOREIGN KEY (`commentID`) REFERENCES `comment` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1


//remove commnent

CREATE TABLE `remove_comment` (
 `commentID` int(10) unsigned NOT NULL AUTO_INCREMENT,
 `userID` int(10) NOT NULL,
 PRIMARY KEY (`commentID`),
 CONSTRAINT `remove_comment_ibfk_1` FOREIGN KEY (`commentID`) REFERENCES `comment` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1



//post
CREATE TABLE `post` (
 `ID` int(11) unsigned NOT NULL AUTO_INCREMENT,
 `title` varchar(800) NOT NULL,
 `body` varchar(8000) NOT NULL,
 `rating` int(11) DEFAULT '0',
 `time_posted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
 PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1


//has post
CREATE TABLE `has_post` (
 `postID` int(10) unsigned NOT NULL,
 `channelID` int(11) unsigned NOT NULL,
 PRIMARY KEY (`postID`),
 KEY `channelID` (`channelID`),
 CONSTRAINT `has_post_ibfk_1` FOREIGN KEY (`postID`) REFERENCES `post` (`ID`),
 CONSTRAINT `has_post_ibfk_2` FOREIGN KEY (`channelID`) REFERENCES `channel` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1


//post posts
CREATE TABLE `posts_post` (
 `postID` int(10) unsigned NOT NULL,
 `userID` int(10) unsigned NOT NULL,
 PRIMARY KEY (`postID`),
 CONSTRAINT `posts_post_ibfk_1` FOREIGN KEY (`postID`) REFERENCES `post` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1


//replies
CREATE TABLE `replies` (
 `childCommentID` int(10) unsigned NOT NULL AUTO_INCREMENT,
 `parentCommentID` int(10) unsigned NOT NULL,
 PRIMARY KEY (`childCommentID`),
 KEY `parentCommentID` (`parentCommentID`),
 CONSTRAINT `replies_ibfk_1` FOREIGN KEY (`childCommentID`) REFERENCES `comment` (`ID`),
 CONSTRAINT `replies_ibfk_2` FOREIGN KEY (`parentCommentID`) REFERENCES `comment` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1


//has_comment
CREATE TABLE `has_comment` (
 `commentID` int(10) unsigned NOT NULL,
 `postID` int(10) unsigned NOT NULL,
 PRIMARY KEY (`commentID`),
 KEY `postID` (`postID`),
 CONSTRAINT `has_comment_ibfk_1` FOREIGN KEY (`commentID`) REFERENCES `comment` (`ID`),
 CONSTRAINT `has_comment_ibfk_2` FOREIGN KEY (`postID`) REFERENCES `post` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1


//postComments
CREATE TABLE `posts_comment` (
 `commentID` int(10) unsigned NOT NULL,
 `userID` int(10) NOT NULL,
 PRIMARY KEY (`commentID`),
 CONSTRAINT `posts_comment_ibfk_1` FOREIGN KEY (`commentID`) REFERENCES `comment` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1


<<<<<<< HEAD
// user
CREATE TABLE `User`(
	`ID` INT (10) unsigned PRIMARY KEY AUTO_INCREMENT,
=======
// user
CREATE TABLE `user`(
	`ID` INT (10) PRIMARY KEY AUTO_INCREMENT,
>>>>>>> 5184c7efb7325d95029a36af8eb93ecff41fd0b2
	`username` VARCHAR (20) UNIQUE NOT NULL,
	`password` VARCHAR (20) NOT NULL,
	`email` VARCHAR (50) UNIQUE NOT NULL,
	`name` VARCHAR (50) NOT NULL,
	`picture` VARCHAR(100),
	`up_down_votes` INT DEFAULT 0,
	`helpful_fags` INT unsigned DEFAULT 0,
	`number_of_reports` INT unsigned DEFAULT 0,
	`total_reputation` INT DEFAULT 0)
ENGINE=InnoDB DEFAULT CHARSET=latin1;

// reports_channel
CREATE TABLE Reports_Channel(
   userID INT (10) unsigned,
   channelID INT (10) unsigned,
   reportID INT (10) unsigned,
   type INT NOT NULL,
   PRIMARY KEY (reportID),
   FOREIGN KEY (userID) REFERENCES user (ID),
   FOREIGN KEY (channelID) REFERENCES channel (ID))
ENGINE=InnoDB DEFAULT CHARSET=latin1;
