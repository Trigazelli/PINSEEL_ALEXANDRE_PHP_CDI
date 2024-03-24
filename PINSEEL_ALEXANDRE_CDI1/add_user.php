<?php

require "getDatabase.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["form"] == "addUser") {
    if ($_POST["name"] != "" && $_POST["email"] != "") {
        $nouvelUser = [
            "nom" => $_POST["name"],
            "email" => $_POST["email"],
            "password" => $_POST["password"]
        ];

        $requete = $database-> prepare("INSERT INTO user(nom, email, password) VALUES (:nom, :email, :password)");

        if ($requete-> execute($nouvelUser)) {
            echo "User bien ajouté";
        } else {
            echo "Échec de l'ajout";
        }

    } else {
        echo "formulaire incomplet";
    }
}