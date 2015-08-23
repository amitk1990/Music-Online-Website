drop procedure fan;




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
select * from user_band
