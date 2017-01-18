<?php

namespace Minesweeper;

class User {

    private $passwordHash;
    private $name;
    private $email;

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
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

    public function setPassword($password) {
        $this->passwordHash = password_hash($password);
    }

}