<?php

use \Blog\Model\PostManager;
use \Blog\Model\CommentManager;
use \Blog\Model\UserManager;

require_once('model/PostManager.php');
require_once('model/CommentManager.php');

function listPosts()
{
    $PostManager = new PostManager(); // Création d'un objet
    $posts = $PostManager->getPosts(); // Appel d'une fonction de cet objet

    require('view/frontend/listPostsView.php');
}

function post()
{
    $PostManager = new PostManager();
    $CommentManager = new CommentManager();

    $post = $PostManager->getPost($_GET['id']);
    $comments = $CommentManager->getComments($_GET['id']);

    require('view/frontend/postView.php');
}

function addComment()
{
    $CommentManager = new CommentMAnager();

    $postId = $_GET['id'];
    $author = $_POST['author'];
    $comment = $_POST['comment'];
    
    $affectedLines = $CommentManager->postComment($postId, $author, $comment);

    if ($affectedLines === false) {
        // Erreur gérée. Elle sera remontée jusqu'au bloc try du routeur !
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}

function createUser() 
{
    $UserManager = new UserManager();

    $username = $_POST['username'];
    $pass_hache = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $email = $_POST ['email'];
    $userOk = $UserManager->checkUsername($username);
    $emailOk = $UserManager->checkEmail($email);
    if (($userOk->rowCount() == 0) && ($emailOk->rowCount() == 0)) {
        $UserManager->registerUser($username, $passe_hache, $email);
    }
    else {
        throw new Exception('Nom ou email déjà pris');
    }
}