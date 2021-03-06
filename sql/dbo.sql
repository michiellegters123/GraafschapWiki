CREATE TABLE users
(
	userid INT(11) PRIMARY KEY AUTO_INCREMENT,

	privilege INT(2) DEFAULT 0,
	banned BIT(1) DEFAULT 0,

	username VARCHAR(128) UNIQUE,
	email VARCHAR(128) UNIQUE NOT NULL,
	password VARCHAR(73) NOT NULL

) DEFAULT CHARSET=utf8;


CREATE TABLE article
(
  articleid INT(11) PRIMARY KEY AUTO_INCREMENT,
  title VARCHAR(512)  NOT NULL,
  target INT(11) DEFAULT -1,
  author INT(11),
  verified BIT(1) DEFAULT 1,
  intro TEXT
)DEFAULT CHARSET=utf8;

CREATE TABLE paragraph
(
  paragraphid INT(11) PRIMARY KEY AUTO_INCREMENT,
  article INT(11),
  pindex INT(2),
  title varchar(521) NOT NULL
)DEFAULT CHARSET=utf8;

CREATE TABLE subparagraph
(
  subparagraphid INT(11) PRIMARY KEY AUTO_INCREMENT,
  paragraph INT(11),
  content TEXT,
  sindex INT(2),
  title varchar(521) NOT NULL
)DEFAULT CHARSET=utf8;

CREATE TABLE paragraphimage
(
  subparagraphid INT(11) PRIMARY KEY,
  filename varchar(128) NOT NULL
)DEFAULT CHARSET=utf8;