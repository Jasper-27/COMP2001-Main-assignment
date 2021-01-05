DROP PROCEDURE if EXISTS [dbo].[spUsers_validate]
GO
CREATE PROCEDURE dbo.spUsers_validate
@email VARCHAR(30), 
@password VARCHAR(255)
AS 
BEGIN

    DECLARE  @validated int = 0; 

    IF EXISTS ( SELECT * FROM dbo.Users WHERE email = @email and [password] = @password  )
    BEGIN
        set @validated = 1
    END
    
    RETURN @validated
    

END 