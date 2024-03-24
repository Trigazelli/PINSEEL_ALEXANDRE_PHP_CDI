<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Rendu</title>
</head>

<body>
    <?php 
    require "getDatabase.php";
    
    $requete = $database -> prepare("SELECT * FROM `user` JOIN `tweet` ON user.id = tweet.user_id ORDER BY tweet.createdAt DESC");
    $requete -> execute();
    $tweets = $requete->fetchAll(PDO::FETCH_ASSOC);
    $requete2 = $database -> prepare("SELECT * FROM `user`");
    $requete2 -> execute();
    $users = $requete2 -> fetchAll(PDO::FETCH_ASSOC);
    ?>
    <h1>Inscrivez vous à tuiteure !</h1>
    <!-- form pour pouvoir se créer un compte -->
    <form action="add_user.php" method="post">
        <input type="hidden" name="form" value="addUser">
        <label for="name"> Entrez votre Nom :</label>
        <input type="text" name="name" id="name"><br><br>

        <label for="email">Entrez votre email ici :</label>
        <input type="text" name="email" id="email"><br><br>

        <label for="password">Entrez votre mot de passe ici :</label>
        <input type="password" name="password" id="password"><br><br>

        <label for="SocialSecu">Entrez votre numéro de sécurité sociale :</label>
        <input type="text" name="SocialSecu"><br><br>

        <button type="submit">Envoyer</button>
    </form><br><br>
    <h1>Postez un tweet !</h1>

    <!-- Form pour pouvoir poster un tweet -->
    <form action="addTweet.php" method="post">
        <input type="hidden" name="form" value="addTweet">

        <label for="user">Entrez l'id de l'user ici :</label>
        <input type="text" name="user" id="user"><br><br>


        <label for="tweet">Écrivez votre tweet ici :</label>
        <textarea name="tweet" id="tweet" cols="30" rows="10"></textarea><br><br>

        <button type="submit">Envoyer</button>
    </form><br><br>

    <h1>Gérez les tweets ci dessous !</h1>

    <?php foreach ($tweets as $tweet) : ?>
        <form action="delTweet.php" method="post">
            <input type="hidden" name="form" value="supprimer">
            <input type="hidden" name="suppr" value="<?php echo $tweet["id"]; ?>">
            <?php echo '<li>' . $tweet["contenu"] . " | Tweet de l'utilisateur numéro " .$tweet["user_id"] . "</li>"; 
            echo "<li>" . "Tweet posté le " . $tweet["createdAt"] . "<li>" ?>
            <button type="submit">Supprimer</button>
        </form>
    <?php endforeach; ?>

    <h1>Gérez les comptes ici !</h1>
    <?php foreach ($users as $user) : ?>
        <form action="delUser.php" method="post">
            <input type="hidden" name="form" value="supprimer">
            <input type="hidden" name="suppr" value="<?php echo $user["id"]; ?>">
            <?php echo "<li>" . $user["nom"] . "<li>"; ?>
            <button type="submit">Supprimer</button>
        </form>
    <?php endforeach ?>
    <h1>Faites une recherche dans les tweets !</h1>
    <form action="search.php" method="post">
        <input type="hidden" name="form" value="search">
        <label for="search">Entrez votre recherche ici :</label>
        <input type="text" name="search" id="search"><br><br>
        <button type="submit">Rechercher</button>
    </form>


</body>
</html>