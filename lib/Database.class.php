<?php

class Database {
    
    var $dbname='internettechdb';
    var $db_user='apache';
    var $db_pass='asdf';
    
    public function registerUser($user, $pass, $note) {
	$dbh = new PDO('mysql:host=localhost;dbname=' . $this->dbname, $this->db_user, $this->db_pass);
	$stmt = $dbh->prepare('INSERT INTO user VALUES(?, ?, ?)');
	
	$stmt->bindParam(1, $user, PDO::PARAM_STR);
	$stmt->bindParam(2, $pass, PDO::PARAM_STR);
	$stmt->bindParam(3, $note, PDO::PARAM_INT);
	return $stmt->execute();
    }
    
    public function getPasswordHash($user) {
	$dbh = new PDO('mysql:host=localhost;dbname=' . $this->dbname, $this->db_user, $this->db_pass);
	$stmt = $dbh->prepare('SELECT passwd FROM user WHERE name=?');
	
	$stmt->bindParam(1, $user, PDO::PARAM_STR);
	$stmt->execute();
	$pass = $stmt->fetch();
	if (!empty($pass)) {
	    return $pass[0];
	}
	else {
	    return '';
	}
    }
    public function getNote($user) {
	$dbh = new PDO('mysql:host=localhost;dbname=' . $this->dbname, $this->db_user, $this->db_pass);
	$stmt = $dbh->prepare('SELECT note FROM user WHERE name=?');
	
	$stmt->bindParam(1, $user, PDO::PARAM_STR);
	$stmt->execute();
	$pass = $stmt->fetch();
	if (!empty($pass)) {
	    return $pass[0];
	}
	else {
	    return '';
	}
    }
    
    public static function getInstance() {
	return new Database();
    }
}

?>