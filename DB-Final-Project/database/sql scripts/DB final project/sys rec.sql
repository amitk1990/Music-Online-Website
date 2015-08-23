select distinct bid,bname from band natural join genre natural join genre_band natural join genre_user 
	where genre_user.gid="g1" and genre_user.userid="user1" group by genre.gid; 
    
select distinct cid from concert join concert join 