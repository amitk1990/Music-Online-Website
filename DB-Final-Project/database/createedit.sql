
drop procedure create_or_edit_personal;

DELIMITER $$
create procedure create_or_edit_personal(
in user varchar(20),
in username	varchar(20),
in yr	year(4),
in cty	varchar(20),
in pswd	varchar(20),
inout update_user_flag int)
begin 
if update_user_flag=1 then
	update user set uname = username, yob=yr, city = cty, pwd = pswd where userid=user;	
end if;
end $$
DELIMITER ;

set @flag=1;
call create_or_edit_personal("user5","Venu",1975,"Detroit","pwd5",@flag);
select * from user;


#this procedure will be called by looping through the checkbox values of genres multiple times.

drop procedure create_or_edit_interests;

DELIMITER $$
create procedure create_or_edit_interests(
in User varchar(20),
in G varchar(20),
inout update_user_flag int)
begin 
declare count int default 0;
select count(*) into count from genre_user g where g.userid = User and g.gid=G;
if update_user_flag=0 and count<1 then
		set update_user_flag=2;
		insert into genre_user values(User,G,now());
elseif update_user_flag=1 then 
		set update_user_flag=3;
		delete from genre_user where userid=User and gid=G;
end if;
end $$
DELIMITER ;

set @flag=0;
call create_or_edit_interests("user1","g2",@flag);
select @flag;
select * from genre_user;

select * from genre;