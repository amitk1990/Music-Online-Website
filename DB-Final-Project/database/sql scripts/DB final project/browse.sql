# browse all jazz concerts taking place in brooklyn in next week

select cid,ctime from concert natural join location natural join genre 
	where gname="jazz" and city = "brooklyn" and date(ctime) >= CURDATE() + INTERVAL 7 DAY;







select distinct c.cid from concert c natural join rec_concert r 
	where month(c.ctime) = month(now())+1 and  r.userid in(
		select followingid from followers where followerid="user1");
        


















select distinct cid from concert c, user u where u.userid = "user4" and u.lastlogin < c.posttime;







