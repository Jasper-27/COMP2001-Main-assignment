CREATE TABLE dbo.Users (
  user_id INT NOT NULL PRIMARY KEY, 
  firstname VARCHAR(30) NOT NULL, 
  lastname VARCHAR(30) NOT NULL, 
  email VARCHAR(255) NOT NULL,
  password VARCHAR(255) NOT NULL,  
  );

  CREATE TABLE dbo.Passwords (
      password_id INT NOT NULL PRIMARY KEY, 
  ); 