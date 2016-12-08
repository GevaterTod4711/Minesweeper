CREATE DATABASE IF NOT EXISTS minesweeper;

--erst datenbank anlegen und auswählen; dann andere befehle

CREATE TABLE IF NOT EXISTS users (
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	name VARCHAR(25),
	email VARCHAR(50),
	pwd TEXT
	);
	
CREATE TABLE IF NOT EXISTS highscore (
	id INT REFERENCES user.id,
	score INT
	);
	
CREATE TABLE IF NOT EXISTS achievements_all (
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	name VARCHAR(25),
	description TEXT
	);

CREATE TABLE IF NOT EXISTS achievements_user (
	user_id INT REFERENCES user.id,
	achievement_id INT REFERENCES achievements_all.id
	);
	
CREATE TABLE IF NOT EXISTS messages (
	from_id INT REFERENCES user.id,
	message TEXT
	);