DROP PROCEDURE if EXISTS [dbo].[spUsers_validate]
GO
CREATE PROCEDURE dbo.spUsers_validate
@email VARCHAR(30), 
@password VARCHAR(255)
AS 
BEGIN

    DECLARE  @validated int = 0; 
    DECLARE @User int = null ; 

    SET @User = (SELECT Users.user_id
                  FROM dbo.Users
                 where email = @email and [password] = @password)

    PRINT @User

    IF (@User = null)
        return 0; 
    ELSE
    BEGIN
        DECLARE @currentDate DATETIME = GETDATE(); 
           
        INSERT INTO dbo.Sessions(user_id, date_issued)
        VALUES(@User, @currentDate); 

        set @validated = 1
    END
    
    RETURN @validated
    

END 
GO