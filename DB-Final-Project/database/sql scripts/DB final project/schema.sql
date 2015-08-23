create database DbFinal;
use DbFinal;
drop table user;
drop table band;
drop table location;
drop table genre;
drop table concert;
drop table attends;
drop table genre_user;
drop table genre_band;
drop table user_band;
drop table user_rating;
drop table followers;
drop table rec_genre;
drop table rec_concert;
SELECT distinct table_name from information_schema.COLUMNS
WHERE TABLE_SCHEMA = 'dbfinal';
select * from followers;
# table creation

create table user(

	userid varchar(20) primary key,
	uname varchar(20),
    email varchar(30),
    yob year,
    city varchar(20),
    pwd varchar(20),
    starttime datetime,
    lastlogin datetime
);

create table band(
	bid varchar(20) primary key,
	bname varchar(20),
    email varchar(30),
    yob year,
    city varchar(20),
    pwd varchar(20),
    starttime datetime,
    lastlogin datetime,
	bio varchar(100),
    permission varchar(20)
);


create table location(
	lid varchar(20) primary key,
    lname varchar(20),
    city varchar(20),
    capacity int
);


create table genre
(
	gid varchar(20),
    gname varchar(20),
    subgname varchar(20),
    primary key(gid)
);


create table genre_band(
	bid varchar(20),
    gid varchar(20),
    foreign key(bid) references band(bid),
    foreign key(gid) references genre(gid)
);


create table concert
(
	cid varchar(20),
    bid varchar(20),
    gid varchar(20),
    venue varchar(20),
    tktsold int,
    tprice int,
    ctime datetime,
    foreign key(venue) references location(lid),
    foreign key(bid) references band(bid),
    foreign key(gid) references genre(gid),
    primary key(cid,bid,ctime)
);


create table attends
(

	userid varchar(20),
    cid varchar(20),
    attendtime datetime,
    foreign key(userid) references user(userid),
    foreign key(cid) references concert(cid)

);


create table genre_user
(
	userid varchar(20),
    gid varchar(20),
    liketime datetime,
    foreign key(userid) references user(userid),
    foreign key(gid) references genre(gid)
);


create table user_band(
	userid varchar(20),
    bid varchar(20),
    liketime datetime,
    foreign key(userid) references user(userid),
    foreign key(bid) references band(bid)
);



create table user_rating
(
	userid varchar(20),
    cid varchar(20),
    rating int,
    review varchar(30),
	rtime datetime,
    foreign key(userid) references user(userid),
    foreign key(cid) references concert(cid)
);


    
create table followers
(
	followerid varchar(20),
    followingid varchar(20),
    ftime datetime,
    foreign key(followerid) references user(userid),
    foreign key(followingid) references user(userid)
    
);



create table rec_concert
(
	userid varchar(20),
    cid varchar(20),
    rec_time datetime,
    foreign key(userid) references user(userid),
    foreign key(cid) references concert(cid)
);


create table rec_genre
(
	userid varchar(20),
    gid varchar(20),
    rec_time datetime,
    foreign key(userid) references user(userid),
    foreign key(gid) references genre(gid)
);



# data insertion


insert into user values("user1","Amit","a@123.com","1990","manglore","pwd1",20141110000000,20141119000000);
insert into user values("user2","chaithra","c@123.com","1993","hyderabad","pwd2",20141120000000,20141121000000);
insert into user values("user3","db","d@123.com","1970","newyork","pwd3",19801110000000,20141119000000);


insert into band values("band1","rockers","r@123.com","1990","newyork","bpwd1",19801111000000,20141119000000,"we rock","no");
insert into band values("band2","shakers","s@123.com","1991","california","bpwd2",19891012000000,20141119000000,"we shake","no");
insert into band values("band3","crackers","ck@123.com","1992","florida","bpwd3",19891012000000,20141119000000,"we shake","no");

 
insert into location values("loc1","location1","brooklyn","100");
insert into location values("loc2","location2","manhattan","200");
insert into location values("loc3","location3","queens","300");


insert into genre values("g1","jazz","free jazz");
insert into genre values("g2","jazz","cool jazz");
insert into genre values("g3","jazz","bebob");
insert into genre values("g4","hiphop","free hiphop");
insert into genre values("g5","hiphop","cool hiphop");
insert into genre values("g6","hiphop","bebob");


insert into genre_band values("band1","g1");
insert into genre_band values("band2","g2");
insert into genre_band values("band3","g3");
insert into genre_band values("band1","g4");
insert into genre_band values("band2","g5");
insert into genre_band values("band3","g6");


insert into concert values("concert1","band1","g1","loc1",0,10,20141124080000);
insert into concert values("concert2","band2","g2","loc2",0,20,20141125080000);
insert into concert values("concert3","band3","g3","loc3",0,30,20141126080000);


insert into attends values("user1","concert1",20141124080000);
insert into attends values("user2","concert2",20141125080000);
insert into attends values("user3","concert3",20141126080000);


insert into genre_user values("user1","g1",20141110000000);
insert into genre_user values("user2","g2",20141120000000);
insert into genre_user values("user3","g3",19801110000000);


insert into user_band values("user1","band1",20141110000000);
insert into user_band values("user2","band2",20141120000000);
insert into user_band values("user3","band3",19801110000000);


insert into user_rating values("user1","concert1",7,"good",20141124080000);
insert into user_rating values("user2","concert2",3,"bad",20141125080000);
insert into user_rating values("user3","concert3",5,"average",20141126080000);


insert into followers values("user1","user2",20141124080000);
insert into followers values("user2","user3",20141125080000);
insert into followers values("user3","user1",20141126080000);


insert into rec_concert values("user1","concert2",20141121080000);
insert into rec_concert values("user2","concert3",20141122080000);
insert into rec_concert values("user3","concert1",20141123080000);
insert into rec_concert values("user1","concert1",20141124080000);
insert into rec_concert values("user2","concert2",20141125080000);
insert into rec_concert values("user3","concert3",20141126080000);


insert into rec_genre values("user1","g1",20141121080000);
insert into rec_genre values("user2","g2",20141122080000);
insert into rec_genre values("user3","g3",20141123080000);
insert into rec_genre values("user1","g4",20141124080000);
insert into rec_genre values("user2","g5",20141125080000);
insert into rec_genre values("user3","g6",20141126080000);
    

