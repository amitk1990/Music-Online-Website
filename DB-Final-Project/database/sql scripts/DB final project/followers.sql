DROP PROCEDURE IF EXISTS `add_or_remove_follower`

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