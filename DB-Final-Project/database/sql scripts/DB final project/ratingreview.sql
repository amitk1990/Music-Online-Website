DROP PROCEDURE IF EXISTS `add_or_remove_rating`

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

