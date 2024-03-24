<?php

require "getDatabase.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["form"] == "addTweet") {
    if ($_POST["tweet"] != "" && $_POST["user"] != "") {
        $newTweet = [
            "user" => $_POST["user"],
            "tweet" => $_POST["tweet"]
        ];

        $requete = $database -> prepare("INSERT INTO tweet(contenu, user_id) VALUES (:tweet, :user)");

        if ($requete-> execute($newTweet)) {
            echo "Tweet bien publié";
        } else {
            echo "Échec de l'ajout";
        }
    
    } else {
        echo "Tweet Incomplet";
    }
}