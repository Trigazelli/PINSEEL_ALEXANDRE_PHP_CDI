<?php 

require "getDatabase.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["form"] == "supprimer") {
    $userASupprimer = [
        "id" => $_POST["suppr"]
    ];

$requete = $database->prepare("DELETE FROM user WHERE id = :id");
if ($requete->execute($userASupprimer)) {
    echo "utilisateur correctement supprimé" ;
} else {
    echo "une erreur a eu lieu";
}

}