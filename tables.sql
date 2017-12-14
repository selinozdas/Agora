create table channel(
    id int(10) unsigned primary key auto_increment,
    name varchar(32) not null,
    description varchar(800),
    since timestamp);
create table private_channel(
    id int(10) unsigned primary key, 
    foreign key(id) references channel(id));
