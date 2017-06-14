CREATE TABLE UserName ( UserNameID int(9) NOT NULL auto_increment,
userName VARCHAR(40) NOT NULL,
pass VARCHAR(40) NOT NULL,
PRIMARY KEY(UserNameID)
);

INSERT INTO
UserName (userName, pass)
VALUES
("saussam18","0864196");

ALTER TABLE `username` ADD `type` VARCHAR(1) NOT NULL DEFAULT 's' AFTER `pass`;

INSERT INTO `username` (`UserNameID`, `userName`, `pass`, `type`) VALUES ('2', 'ParkerC', 'compsci', 't');



CREATE TABLE `practice`.`classes` ( `Classcode` INT(6) NULL DEFAULT NULL , `Classname` VARCHAR NOT NULL DEFAULT 'New Class' , `users` INT(255) NOT NULL DEFAULT '0' );

ALTER TABLE `classes` ADD `username` VARCHAR(40) NULL DEFAULT NULL FIRST;

ALTER TABLE `username` ADD `class1` VARCHAR(40) NULL DEFAULT NULL AFTER `type`, ADD `class2` VARCHAR(40) NULL DEFAULT NULL AFTER `class1`,
 ADD `class3` VARCHAR(40) NULL DEFAULT NULL AFTER `class2`, ADD `class4` VARCHAR(40) NULL DEFAULT NULL AFTER `class3`, ADD `class5` VARCHAR(40) NULL DEFAULT NULL AFTER `class4`,
  ADD `class6` VARCHAR(40) NULL DEFAULT NULL AFTER `class5`, ADD `class7` VARCHAR(40) NULL DEFAULT NULL AFTER `class6`;
