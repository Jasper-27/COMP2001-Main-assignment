drop TRIGGER if EXISTS dbo.trUsers_saveOldPassword
go 
create trigger dbo.trUsers_saveOldPassword
On dbo.Users
AFTER UPDATE
AS 
BEGIN
    DECLARE @date datetime = GETDATE(); 

    DECLARE @userID int; 
    select @userID = user_id from inserted; 

    DECLARE @insertedPassword varchar(30); 
    SELECT @insertedPassword = [password] FROM inserted;
    DECLARE @deletedPassword varchar(30); 
    SELECT @deletedPassword = [password] FROM deleted;

    
    if (@insertedPassword <> @deletedPassword)
        insert into dbo.Passwords (user_id, [password], date_changed)
        VALUES(@userID, @insertedPassword, @date); 
     




END