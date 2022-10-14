<?php
require_once("db_connexion.php");

function getUserData($pdo) {

    $req = $pdo->prepare("SELECT id, `username`, `password` FROM user");
    $req->execute();
    $users = $req->fetchAll(PDO::FETCH_ASSOC);
    return $users;

}

function getDataFromPosts($pdo) {
    $req = $pdo->prepare("SELECT * FROM posts");
    $req->execute();
    $posts = $req->fetchAll(PDO::FETCH_ASSOC);
    return $posts;
}