CREATE TABLE users
(
	userid INT(11) PRIMARY KEY AUTO_INCREMENT,

	privilege INT(2) DEFAULT 0,

	username VARCHAR(128) UNIQUE,
	email VARCHAR(128) UNIQUE NOT NULL,
	password VARCHAR(73) NOT NULL

);


CREATE TABLE article
(
  articleid INT(11) PRIMARY KEY AUTO_INCREMENT,
  title VARCHAR(512)  NOT NULL,
  intro TEXT(1)
);

CREATE TABLE paragraph
(
  paragraphid INT(11) PRIMARY KEY AUTO_INCREMENT,
  article INT(11),
  title varchar(521) NOT NULL
);

CREATE TABLE subparagraph
(
  subparagraphid INT(11) PRIMARY KEY AUTO_INCREMENT,
  paragraph INT(11),
  content TEXT(1),
  title varchar(521) NOT NULL
);

CREATE TABLE paragraphimage
(
  subparagraphid INT(11) PRIMARY KEY,
  filename varchar(128) NOT NULL
);