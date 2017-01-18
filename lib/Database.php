<?php

namespace Minesweeper;

use PDO;

class Database {

    private static $dbname = 'minesweeper';
    private static $db_user = 'apache';
    private static $db_pass = 'asdf';
    private static $pdo;

    public function registerUser(User $user) {

        $stmt = static::$pdo->prepare('INSERT INTO users (name, pwd, email) VALUES(:name, :pwd, :email)');

        $stmt->bindParam(':name', $user->getName());
        $stmt->bindParam(':pwd', $user->getPasswordHash());
        $stmt->bindParam('email', $user->getEMail());

        return $stmt->execute();
    }

    public function getPasswordHashForUser($user) {
        $stmt = static::$pdo->prepare('SELECT pwd FROM users WHERE name=:name');

        $stmt->bindParam(':name', $user, PDO::PARAM_STR);
        $stmt->execute();
        $pass = $stmt->fetch();
        if (!empty($pass)) {
            return $pass[0];
        } else {
            return '';
        }
    }

    public function getUserByName($name) {
        $stmt = static::$pdo->prepare('SELECT * FROM users WHERE name=:name');
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->execute();
        $row = $stmt->fetch();
        if ($row === false) {

            return null;
        }
        $user = new User;
        $user->setEmail($row['email']);
        $user->setName($row['name']);
        $user->setPasswordHash($row['pwd']);
        $user->setId($row['id']);
        return $user;
    }

    public static function getInstance() {
        if (static::$pdo === null) {
            static::$pdo = new PDO('mysql:host=localhost;dbname=' . static::$dbname, static::$db_user, static::$db_pass);
        }
        return new self();
    }

}
