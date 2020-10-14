<?php
// Connexion à la base de données
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=JF_blog;charset=utf8', 'root', 'root');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

// Insertion du commentaire à l'aide d'une requête préparée
$req = $bdd->prepare('INSERT INTO commentaires (id_billet, auteur, commentaire) VALUES(?, ?, ?)');
$req->execute(array($_POST['auteur'], $_POST['commentaire']));

// Redirection du visiteur vers la page du post
$billet =$_POST['id_billet'];
header('Location: commentaires.php?billet="'$billet");
?>