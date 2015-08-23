use dbfinal;
drop procedure signup;
DELIMITER $$
create procedure signup(in uid	varchar(20),in user	varchar(20),in mail	varchar(30),
in yb	year(4),in cty	varchar(20),in pswd	varchar(20),in strt	datetime,in lstlogin	datetime,
inout flag int)
begin 
declare count int default 0;
select count(*) into count from user where user.userid= uid;
if count<1 then
    set flag=2;
	insert into user values(uid,user,mail,yb,cty,pswd,strt,lstlogin);
else set flag=1;
end if;
end $$
DELIMITER ;

set @flag=0;
set @uid="user9";
set @pswd="pwd9";
call signup(@uid,"cxsdav","v@123.com","1975","detroit",@pswd,now(),now(),@flag);
select @flag;

select * from user;