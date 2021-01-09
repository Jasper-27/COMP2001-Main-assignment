
CREATE TABLE dbo.Users (
  user_id INT IDENTITY(1,1) NOT NULL PRIMARY KEY, 
  firstname VARCHAR(30) NOT NULL, 
  lastname VARCHAR(30) NOT NULL, 
  email VARCHAR(255) NOT NULL,
  password VARCHAR(255) NOT NULL
  );


CREATE TABLE dbo.Passwords (
    password_id INT IDENTITY(1,1) NOT NULL PRIMARY KEY, 
    user_id int FOREIGN KEY REFERENCES Users(user_id), 
    password VARCHAR(30) NOT NULL, 
    date_changed DATETIME NOT NULL
); 

CREATE TABLE dbo.Sessions (
    Session_id INT IDENTITY(1,1) NOT NULL PRIMARY KEY, 
    user_id int FOREIGN KEY REFERENCES Users(user_id), 
    date_issued DATETIME NOT NULL
     
); 

  go 
