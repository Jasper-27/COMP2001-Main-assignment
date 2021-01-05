
DECLARE @out1 VARCHAR(255)

EXEC dbo.spUsers_delete 19; 
exec dbo.spUsers_register 'Jasper', 'Cox', 'Jasper@jasper.net', 'password', @out1 output

print @out1
-- EXEC dbo.spUsers_register 'Hannah', 'Brown', 'Hannah@brown.net', 'password2';  


 --EXEC dbo.spUsers_delete 12; 
 --EXEC dbo.spUsers_delete 13; 


--exec dbo.spUsers_update 10, null, null, "jasper.j.cox@gmail.com", null; 




--  EXEC dbo.spUsers_validate "Hannah@brown.net", "password2"; 


-- delete from dbo.Users;   -- Deletes at the end 
