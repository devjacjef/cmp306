DROP TABLE IF EXISTS `users`;

-- Create table for the user
CREATE TABLE `users` (
    ID int NOT NULL AUTO_INCREMENT,
    Username varchar(255),
    Password varchar(255),
    PRIMARY KEY (ID)
);

INSERT INTO `users` (Username, Password)
VALUES ('admin1', SHA2('password1', 256));
