CREATE TABLE UserName ( UserNameID int(9) NOT NULL auto_increment,
userName VARCHAR(40) NOT NULL,
pass VARCHAR(40) NOT NULL,
PRIMARY KEY(UserNameID)
);

INSERT INTO
UserName (userName, pass)
VALUES
("saussam18","0864196");


ALTER TABLE `username` ADD `type` VARCHAR(40) NOT NULL DEFAULT 'Student/Guardian Access' AFTER `pass`;
