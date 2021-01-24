
--  DECLARE @out1 VARCHAR(255)

-- -- -- EXEC dbo.spUsers_delete 19; 
--  exec dbo.spUsers_register 'Hanz', 'The hand', 'hans@jasper.net', 'password2', @out1 output
--  print @out1

--   exec dbo.spUsers_register 'Jasper', 'Cox', 'Jasper@jasper.net', 'password', @out1 output
--  print @out1

--   exec dbo.spUsers_register 'Hannah', 'Brown', 'han@han.net', '1234', @out1 output
--  print @out1

--   exec dbo.spUsers_register 'Tom', 'N', 'TOM.net', 'pP2d23', @out1 output
--  print @out1


-- EXEC dbo.spUsers_delete 22; 

-- EXEC dbo.spUsers_register 'Hannah', 'Brown', 'Hannah@brown.net', 'password2';  


 --EXEC dbo.spUsers_delete 12; 
 --EXEC dbo.spUsers_delete 13; 


--exec dbo.spUsers_update 10, null, null, "jasper.j.cox@gmail.com", null; 


 DECLARE @out1 int

EXEC  @out1 = dbo.spUsers_validate "Hannah@brown.net", "pas3sword2"; 

print @out1
-- delete from dbo.Users;   -- Deletes at the end 



-- EXEC spUsers_validate 'Jasper@jasper.net', 'password'


-- exec dbo.spUsers_update 24, null, null, null, "password"

-- insert into dbo.passwords (user_id, pass)
-- VALUES


-- DECLARE @date datetime = GETDATE(); 


-- insert into dbo.Passwords (user_id, [password], date_changed)
-- VALUES(24, 'susage', @date); 




--  exec dbo.spUsers_update 23, null, null, null, "password1"



-- select count([password])
-- from Passwords
-- where user_id = 24



select * from dbo.vNumberLogins

  select * from Users; 
  select * from Passwords; 
 
