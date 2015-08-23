create database DbFinal;
use DbFinal;
drop table user;
drop table band;
drop table location;
drop table genre;
drop table concert;
drop table attends;
drop table genre_user;
drop table user_band;
drop table user_rating;
drop table followers;
drop table recommendation;

SELECT distinct table_name from information_schema.COLUMNS
WHERE TABLE_SCHEMA = 'dbfinal';


create table user(

	userid varchar(20) primary key,
	uname varchar(20),
    email varchar(30),
    yob year,
    city varchar(20),
    pwd varchar(20),
    starttime date,
    lastlogin date
);
create table band(
	bid varchar(20) primary key,
	bname varchar(20),
    email varchar(30),
    yob year,
    city varchar(20),
    pwd varchar(20),
    starttime date,
    lastlogin date
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
    primary key(gid)
);
create table concert
(
	cid varchar(20),
    bid varchar(20),
    gid varchar(20),
    venue varchar(20),
    tktsold int,
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

create table recommendation
(
	userid varchar(20),
    gid varchar(20),
    cid varchar(20),
    rec_time datetime,
    foreign key(userid) references user(userid),
    foreign key(cid) references concert(cid),
    foreign key(gid) references genre(gid)
);

select * from band;
    

 