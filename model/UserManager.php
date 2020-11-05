<?php

namespace Blog\Model;

require_once("Manager.php");

class UserManager extends Manager {

    public function registerUser ($username, $pass_hache, $email) {
        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO users(username, password, email, register_date) VALUES(:username, :password, :email, CURDATE())');
        $req->execute(array(
        'username' => $username,
        'password' => $pass_hache,
        'email' => $email));
        
        return $req;
    }

    public function connectUser () {
        $db = $this.dbConnect();
        $req = $bd->prepare('SELECT username, password FROM users WHERE username = :username');
        $req->execute(array(
        'username' => $username));
        $result = $req->fetch();
    }

    public function checkUsername ($username) {
        $db = $this.dbConnect();
        $req = $bd->prepare('SELECT username FROM users WHERE username = :username');
        $req->excecute(array(
        'username' => $username));
        return $req;
    }

    public function checkEmail ($email) {
        $db = $this.dbConnect();
        $req = $bd->prepare('SELECT username FROM users WHERE email = :email');
        $req->excecute(array(
        'email' => $email));
        return $req;
    }
}