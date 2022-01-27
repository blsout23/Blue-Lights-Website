

DROP TABLE IF EXISTS email;
CREATE TABLE email (
  id INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  email VARCHAR(100) NOT NULL
);

DROP TABLE IF EXISTS songRequest;
CREATE TABLE songRequest (
  id INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  song VARCHAR(100) NOT NULL,
  artist VARCHAR(100) NOT NULL
);

DROP TABLE IF EXISTS events;
CREATE TABLE events (
  id INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  title VARCHAR(100),
  date INT UNSIGNED,
  location VARCHAR(100),
  image VARCHAR(100),
  contentSmall VARCHAR(1000),
  contentLarge VARCHAR(1000)
);

DROP TABLE IF EXISTS members;
CREATE TABLE members (
  id INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  firstName VARCHAR(100),
  lastName VARCHAR(100),
  image VARCHAR(100),
  bio VARCHAR(1000),
  classYear INT UNSIGNED
);

DROP TABLE IF EXISTS videos;
CREATE TABLE videos (
  id INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  url VARCHAR(200),
  title VARCHAR(100)
);
