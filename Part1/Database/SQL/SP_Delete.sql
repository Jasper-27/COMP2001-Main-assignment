DROP PROCEDURE if EXISTS [dbo].[spUsers_delete]
GO

create PROCEDURE dbo.spUsers_delete
@user_id int
as 
BEGIN
    DELETE FROM dbo.Users WHERE  user_id = @user_id  
end 