use dbfinal;
drop procedure bsignup;
DELIMITER $$
create procedure bsignup(in bnd	varchar(20),in bndname varchar(20),in mail	varchar(30),
in yb	year(4),in cty	varchar(20),in pswd	varchar(20),in strt	datetime,in lstlogin	datetime, in about varchar(100),
inout flag int)
begin 
declare count int default 0;
select count(*) into count from band where band.bid= bnd;
if count<1 then
    set flag=2;
	insert into band values(bnd,bndname,mail,yb,cty,pswd,strt,lstlogin,about,"no");
else set flag=1;
end if;
end $$
DELIMITER ;

set @flag=0;
set @bnd="bnd4";
set @pswd="pwd4";
call bsignup(@bnd,"cxsdav","v@123.com","1975","detroit",@pswd,now(),now(),"we play rock and roll",@flag);
select @flag;
desc band;
select * from user;
select * from band;
select * from user_rating;



DELIMITER $$
create procedure bedit_personal(
in user varchar(20),
in username	varchar(20),
in yr	year(4),
in cty	varchar(20),
in pswd	varchar(20),
in about varchar(100),
inout update_user_flag int)
begin 
if update_user_flag=1 then
	update band set bname = username, yob=yr, city = cty, pwd = pswd, bio = about where bid=user;	
end if;
end $$
DELIMITER 
select * from band;
select * from user;


DELIMITER $$
create procedure bedit_interests(
in User varchar(20),
in G varchar(20),
inout update_user_flag int)
begin 
declare count int default 0;
select count(*) into count from genre_band g where g.bid = User and g.gid=G;
if update_user_flag=0 and count<1 then
		set update_user_flag=2;
		insert into genre_band values(User,G);
elseif update_user_flag=1 then 
		set update_user_flag=3;
		delete from genre_band where userid=User and gid=G;
end if;
end $$
DELIMITER ;

select * from genre_band;


DELIMITER $$
CREATE PROCEDURE add_or_remove_rating(In user varchar(20), in concert varchar(20), in rate int, comments varchar(30),inout flag int)
BEGIN
declare count int default 0;
select count(*) into count from user_rating r where r.userid=user and r.cid=concert;
if count<1 and flag = 0 then
	insert into user_rating values(user,concert,rate,comments,now());
elseif count>0 and flag = 1 then
	delete from user_rating where userid=user and cid=concert;
end if;
END $$
DELIMITER ;

set @flag=0;
call add_or_remove_rating("user1","concert3",10,"good",@flag);
select * from user_rating;