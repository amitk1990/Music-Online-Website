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

select * from band;