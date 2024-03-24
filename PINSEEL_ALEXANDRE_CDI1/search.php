<?php
require "getDatabase.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["form"] == "search") {
    $mot = [
        "mot" => "%" . $_POST["search"] . "%"
    ];

    $requete = $database-> prepare("SELECT * FROM `tweet` WHERE tweet.contenu LIKE :mot");
    $requete -> execute($mot);
    $results = $requete -> fetchAll(PDO::FETCH_ASSOC);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <ul>
        <?php foreach($results as $result) {
            echo "<li>" . $result["contenu"] . " de l'utilisateur numéro " . $result["user_id"] . "</li>";
        } ?>
    </ul>
</body>
</html>