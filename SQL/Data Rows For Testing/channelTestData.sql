/*
create table channel(
    ID int(10) unsigned primary key auto_increment,
    name varchar(32) not null,
    description varchar(140),
    userID int(10) unsigned,
    since timestamp,
    foreign key (userID) references user(ID))
ENGINE=InnoDB DEFAULT CHARSET=latin1;
*/

INSERT INTO channel VALUES(
  '500000000', -- ID
  'Criminal Minds TV Show',    -- name
  'Welcome!\n\nThis channel is dedicated to discussions about Criminal Minds TV Show.\n\nPlease, inform about spoilers before writing any.\n\nThanks!\n\nEnjoy the channel!', -- description
  '2000000003', -- userID
  '2017-12-18 02:55:07');

INSERT INTO channel VALUES(
 '500000001', -- ID
 'Cute Cats',    -- name
 'Oh, my God!\n\nThank you for visiting this channel! ^_^ I am soo excited!!!\n\nPlease, subscribe! You won\'t regret! Promise ^_^\n\nCats will save the world!\n\nLove you, guys!\nXOXO', -- description
 '2000000004', -- userID
 '2017-12-18 03:05:35');

INSERT INTO channel VALUES(
   '500000002', -- ID
   'Death',    -- name
   'Dear Guests,\n\nYou are kindly invite to philosophical discussions related to highly significant subject in civilizaation\'s current period of time.\n\nDo not hesitate to share your unique ideas with us. One and only rule is to respect other participants\' ideas. If you have any objections, please, give a clear objective counter-argument.\n\nThank you for your attention.\n\nAlways Yours,\nJohn Brown.', -- description
   '2000000005', -- userID
   '2017-12-18 03:05:35');

INSERT INTO channel VALUES(
   '500000003', -- ID
   'Today I Regret About ...',    -- name
   'Hi, fellas!\n\nThis is platform where you can share your negative experience of today, specifically, the ones you regret about. Humor is very welcome.\n\nHopefully, your stories will be met with humor and understanding by others.\n\nThank you for being brave and sharing your story.\n\nHave fun!\nP.S. Please, don\'t be mean to others :)', -- description
   '3000000002', -- userID
   '2017-12-18 03:18:46');
INSERT INTO channel VALUES(
   '500000004', -- ID
   'Cars',    -- name
   'Yo yo yo!\n\nHi, people!\n\nThis is cool place where we can chit chat about cool cars and stuff.\n\nPlease join\n\nYo yo yo!\nDon\'t forget to subscribe!\n\nPeace, bros!', -- description
   '3000000001', -- userID
   '2017-12-18 03:23:02');
