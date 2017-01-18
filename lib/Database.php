<?php

namespace Minesweeper;

use PDO;

class Database {

    var $dbname = 'minesweeper';
    var $db_user = 'apache';
    var $db_pass = 'asdf';

    public function registerUser(User $user) {
        $dbh = new PDO('mysql:host=localhost;dbname=' . $this->dbname, $this->db_user, $this->db_pass);

        $stmt = $dbh->prepare('INSERT INTO users (name, pwd, email) VALUES(:name, :pwd, :email)');

        $stmt->bindParam(':name', $user->getName());
        $stmt->bindParam(':pwd', $user->getPasswordHash());
        $stmt->bindParam('email', $user->getEMail());

        return $stmt->execute();
    }

    public function getPasswordHashForUser($user) {
        $dbh = new PDO('mysql:host=localhost;dbname=' . $this->dbname, $this->db_user, $this->db_pass);
        $stmt = $dbh->prepare('SELECT pwd FROM users WHERE name=:name');

        $stmt->bindParam(':name', $user, PDO::PARAM_STR);
        $stmt->execute();
        $pass = $stmt->fetch();
        if (!empty($pass)) {
            return $pass[0];
        } else {
            return '';
        }
    }

    public static function getInstance() {
        return new Database();
    }

}

?>