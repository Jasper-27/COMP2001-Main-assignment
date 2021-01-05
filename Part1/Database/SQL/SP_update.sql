DROP PROCEDURE if EXISTS [dbo].[spUsers_update]
GO
CREATE PROCEDURE dbo.spUsers_update
@id INT, 
@firstname VARCHAR(30),
@lastname VARCHAR(30), 
@email VARCHAR(30), 
@password VARCHAR(255)
AS 
BEGIN
    
    UPDATE dbo.Users SET firstname=@firstname WHERE user_id = @id AND (@firstname IS NOT NULL);

    UPDATE dbo.Users SET lastname=@lastname WHERE user_id = @id AND (@lastname IS NOT NULL);
    
    UPDATE dbo.Users SET email=@email WHERE user_id = @id AND (@email IS NOT NULL);
    
    UPDATE dbo.Users SET [password]=@password WHERE user_id = @id AND (@password IS NOT NULL);

END 