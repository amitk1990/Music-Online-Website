use dbfinal;

DELIMITER $$
create procedure create_or_edit(
in uname	varchar(20),
in yob	year(4),
in city	varchar(20),
in pwd	varchar(20),
inout flag int)
begin 
	update user set userid=Userid;	
end $$
DELIMITER ;