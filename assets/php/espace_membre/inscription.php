<!DOCTYPE html>
<html lang="FR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>

<body>
    <form id="form" method="post" action="">
        <div>
            <label for="pseudo">Pseudo :</label>
            <input type="text" name="pseudo" id="pseudo" placeholder="Pseudo" required>
        </div>
        <br />
        <div>
           <label for="email">Email :</label>
            <input type="email" name="user_mail" placeholder="Email" required>
        </div>
        <br />
        <div>
           <label for="pass">Mot de passe :</label>
            <input type="password" name="pass" id="pass" placeholder="Mot de passe" required>
        </div>
        <div class="button">
            <button type="submit">Valider</button>
        </div>

    </form>
</body>

</html>
