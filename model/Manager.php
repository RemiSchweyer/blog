<?php

namespace Blog\Model;

class Manager {
    
    protected function dbConnect() {
        $db = new \PDO('mysql:host=localhost;dbname=JF_blog;charset=utf8', 'root', 'root');
        return $db;

    }
}