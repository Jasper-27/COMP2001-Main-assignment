DROP VIEW if EXISTS dbo.vNumberLogins
go 
create VIEW dbo.vNumberLogins
as

select user_id,count(*) as "password Changes" 
from Passwords
group by user_id


