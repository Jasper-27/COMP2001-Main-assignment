DROP PROCEDURE if EXISTS [dbo].[spUsers_register]
GO

create PROCEDURE dbo.spUsers_register 
@firstname VARCHAR(30),
@lastname VARCHAR(30), 
@email VARCHAR(30), 
@password VARCHAR(255),
@responseMessage VARCHAR(255) OUTPUT
as 

IF NOT EXISTS (SELECT  1 From Users WHERE email = @email) 
BEGIN

    insert into dbo.Users (firstname, lastname, email, [password])
        VALUES (@firstname, @lastname, @email, @password); 

   SELECT @responseMessage = CONCAT ('200;', (select user_id from users where email = @email) ) ; 
end 

