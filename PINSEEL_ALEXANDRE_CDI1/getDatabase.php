<?php

try {
    $database = new PDO('mysql:host=localhost;dbname=tuiteure', 'root', '');
} catch(PDOException $e) {
    die('site indisponible');
}