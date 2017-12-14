create table channel(
    id int(10) unsigned primary key auto_increment,
    name varchar(32) not null,
    description varchar(800),
    since timestamp);
create table private_channel(
    id int(10) unsigned primary key, 
    foreign key(id) references channel(id));
    
CREATE TABLE `database_project`.`bans` ( `bannedUserID` INT(10) NOT NULL AUTO_INCREMENT , `userID` INT(10) NOT NULL , PRIMARY KEY (`bannedUserID`)) ENGINE = InnoDB; 


CREATE TABLE `database_project`.`remove_channel` ( `channelID` INT(10) NOT NULL AUTO_INCREMENT , `userID` INT(10) NOT NULL , PRIMARY KEY (`channelID`)) ENGINE = InnoDB; 

CREATE TABLE `database_project`.`remove_post` ( `postID` INT(10) NOT NULL , `userID` INT(10) NOT NULL , PRIMARY KEY (`postID`)) ENGINE = InnoDB; 

CREATE TABLE `database_project`.`remove_comment` ( `commentID` INT(10) NOT NULL AUTO_INCREMENT , `userID` INT(10) NOT NULL , PRIMARY KEY (`commentID`)) ENGINE = InnoDB;  
