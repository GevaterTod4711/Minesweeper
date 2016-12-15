CREATE DATABASE IF NOT EXISTS minesweeper;

--erst datenbank anlegen und auswählen; dann andere befehle

CREATE TABLE IF NOT EXISTS minesweeper.users (
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	name VARCHAR(25),
	email VARCHAR(50),
	pwd TEXT
	);
	
CREATE TABLE IF NOT EXISTS minesweeper.highscore (
	id INT REFERENCES user.id,
	score INT
	);
	
CREATE TABLE IF NOT EXISTS minesweeper.achievements_all (
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	name VARCHAR(25),
	description TEXT
	);

CREATE TABLE IF NOT EXISTS minesweeper.achievements_user (
	user_id INT REFERENCES user.id,
	achievement_id INT REFERENCES achievements_all.id
	);
	
CREATE TABLE IF NOT EXISTS minesweeper.messages (
	from_id INT REFERENCES user.id,
	message TEXT
	);

CREATE USER minesweeper_user IDENTIFIED BY 'asdf';
GRANT ALL ON minesweeper.* TO minesweeper_user;
