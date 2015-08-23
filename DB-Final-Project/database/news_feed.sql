drop procedure news_feed;
DELIMITER $$
create procedure news_feed(
in user varchar(20))
begin 
select distinct * from concert natural join genre where (now()-concert.ctime) >0 and concert.bid in (select bid from user_band where concert.bid = user_band.bid and user_band.userid = user) or concert.gid in (select gid from genre_user where concert.gid = genre_user.gid and genre_user.userid = user);
end $$
DELIMITER ;

select * from user;

call news_feed("nyu123");
select * from genre_user;
drop procedure news_feed;
DELIMITER $$
create procedure news_feed(
in user varchar(20))
begin 
select distinct * from concert natural join genre where (concert.bid in 
(select bid from user_band where concert.bid = user_band.bid and user_band.userid = 'user1') or concert.gid in (select gid from genre_user where concert.gid = genre_user.gid and genre_user.userid = 'user1')) and concert.ctime-now()>0;
end $$
DELIMITER ;

call news_feed("user1");


call news_feed("user2");
select * from user;
select * from user_rating;

drop procedure rsvp;
DELIMITER $$
create procedure rsvp(
in user varchar(20),
in concert varchar(20))
begin 
declare count int default 0;
select count(*) into count from rsvp_concert r where r.userid=user and r.cid=concert;
if count<1 then
insert into rsvp_concert values(user,concert);
end if;
end $$
DELIMITER ;

call rsvp("user1","concert1");

select * from rsvp_concert;
delete from rsvp_concert where userid="user2";














drop procedure sys_rec1;
DELIMITER $$
create procedure sys_rec1(
in user varchar(20))
begin 
select distinct bid from band b natural join genre natural join genre_band natural join genre_user 
	where b.bid not in (select bid from user_band where userid = user) and genre_user.gid in (select gid from genre_user where userid = user) and genre_user.userid=user group by genre.gid ; 
end $$
DELIMITER ;
select * from band;
call sys_rec1('user3');

drop procedure sys_rec2;

drop procedure sys;


DELIMITER $$
create procedure sys(
in user varchar(20))
begin 
select distinct userid from genre_user where userid not in (select followingid from followers where followerid = user) and gid in 
	(select gid from genre_user where userid = user) and userid!=user; 
end $$
DELIMITER ;

call sys('user3');


DELIMITER $$
CREATE PROCEDURE add_or_remove_follower(In follower varchar(20), in following varchar(20), inout flag int)
BEGIN
declare count int default 0;
select count(*) into count from followers f where f.followerid=follower and f.followingid=following;
if count<1 and flag = 0 then
insert into followers values(follower,following,now());
elseif count>0 and flag = 1 then
delete from followers where followerid=follower and followingid=following;
end if;
END $$
DELIMITER ;
set @flag=0;
call add_or_remove_follower("user1","user3",@flag);
select @flag;

select * from followers;


DELIMITER $$
CREATE PROCEDURE fan (in user varchar(20),in band varchar(20),inout flag int)
BEGIN
declare count int default 0;
select count(*) into count from user_band u where u.userid=user and u.bid=band;
if count<1 and flag=0 then
	insert into user_band values(user,band,now());
elseif count>0 and flag=1 then 
	delete from user_band where userid=user and bid=band;
end if;
END $$;
DELIMITER ;

set @flag=0;
call fan("user1","band2",@flag);
select * from user_band;
delete from user_band where userid = "user2" and bid = "band1" ;
select * from user;

drop procedure news_feed;
DELIMITER $$
create procedure news_feed(
in user varchar(20))
begin 
select distinct * from concert natural join genre where (concert.bid in (select bid from user_band where user_band.userid = user)) or (concert.gid in (select gid from genre_user where genre_user.userid = user))
or (concert.cid in (select cid from user_publish u where u.userid = user)) or (select cid from user_publish u2 where u2.userid in (select followingid from followers where followerid = user));
end $$
DELIMITER ;

call news_feed("user1");


drop procedure bpublish_concert;
DELIMITER $$
CREATE PROCEDURE bpublish_concert(in con varchar(20), band varchar(20), in genre varchar(20), location varchar(20), price int, showtime datetime,  inout flag int)
BEGIN
declare count int default 0;
select count(*) into count from concert c where c.cid = con;
if count<1 and flag = 0 then
	set flag = 2;
    insert into concert values(con,band,genre,location,0,price,showtime,now());
else
	set flag = 1;
end if;
END $$
DELIMITER ;

set @flag = 0;
call bpublish_concert("z","band2","g4","loc1",100,"2014-12-18",@flag);
select @flag;

desc concert;
select * from user_publish;
update user set lastlogin = now() where bid = "band2";


drop procedure trust;
DELIMITER $$
create procedure trust(
in user varchar(20), inout flag int)
begin 

select count(*) into flag from user where datediff(lastlogin,starttime)>100 and userid in
	(select followingid from followers group by followingid having count(followerid)>=2 and followingid in
		(select userid from user_rating where userid = user group by userid having count(cid)>=2 ));

end $$
DELIMITER ;
set @flag = 0;
call trust("user1",@flag);
select @flag;














drop procedure news_feed;
DELIMITER $$
create procedure news_feed(
in user varchar(20))
begin 
select distinct * from concert natural join genre where (concert.bid in 
(select bid from user_band where concert.bid = user_band.bid and user_band.userid = 'user1') or concert.gid in (select gid from genre_user where concert.gid = genre_user.gid and genre_user.userid = 'user1')) and concert.ctime-now()>0;
end $$
DELIMITER ;

call news_feed("user1");
select * from user;