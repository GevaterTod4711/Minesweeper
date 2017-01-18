<?php

namespace Minesweeper;

class User {

    private $passwordHash;
    private $name;
    private $email;
    private $id;

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getEMail() {
        return $this->email;
    }

    public function setEmail($mail) {
        $this->email = $mail;
    }

    public function verifyPassword($password) {
        return password_verify($password, $this->passwordHash);
    }

    public function getPasswordHash() {
        return $this->passwordHash;
    }

    public function setPasswordHash($password) {
        $this->passwordHash = $password;
    }

    public function setPassword($password) {
        $this->passwordHash = password_hash($password, PASSWORD_DEFAULT);
    }

}
