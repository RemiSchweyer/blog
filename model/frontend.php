<?php

function postComment($postId, $author, $comment)
{
    $db = dbConnect();
    $comments = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
    $affectedLines = $comments->execute(array($postId, $author, $comment));

    return $affectedLines;
}

function getPosts()
{
    $db = dbConnect();
    $req = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT 0, 5');

    return $req;
}

function getPost($postId)
{
    $db = dbConnect();
    $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts WHERE id = ?');
    $req->execute(array($postId));
    $post = $req->fetch();

    return $post;
}

function getComments($postId)
{
    $db = dbConnect();
    $comments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
    $comments->execute(array($postId));

    return $comments;
}

function registerUser ($username, $pass_hache, $email) {
    $db = dbConnect();
    $req = $db->prepare('INSERT INTO users(username, password, email, register_date) VALUES(:username, :password, :email, CURDATE())');
    $req->execute(array(
    'username' => $username,
    'password' => $pass_hache,
    'email' => $email));
    
    return $req;
}

function connectUser () {
    $db = dbConnect();
    $req = $bd->prepare('SELECT username, password FROM users WHERE username = :username');
    $req->execute(array(
    'username' => $username));
    $result = $req->fetch();
}

function checkUsername ($username) {
    $db = dbConnect();
    $req = $bd->prepare('SELECT username FROM users WHERE username = :username');
    $req->excecute(array(
    'username' => $username));
    return $req;
}

function checkEmail ($email) {
    $db = dbConnect();
    $req = $bd->prepare('SELECT username FROM users WHERE email = :email');
    $req->excecute(array(
    'email' => $email));
    return $req;
}

// Connection à la database
function dbConnect()
{
    try
    {
        $db = new PDO('mysql:host=localhost;dbname=JF_blog;charset=utf8', 'root', 'root');
        return $db;
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
}