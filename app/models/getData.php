<?php
require_once("db_connexion.php");

function getUserData() {

    $req = $pdo->prepare("SELECT id, `username`, `password` FROM user");
    $req->execute();
    $users = $req->fetchAll(PDO::FETCH_ASSOC);

    return $users;

}