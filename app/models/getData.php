<?php
session_start();
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

function getOnlyYourPosts($pdo) {
    $OneUser = $pdo->prepare('SELECT * FROM user WHERE id = :id');
    $OneUser -> execute (array(
        'id' => $_SESSION["user"]));
    $user = $OneUser->fetch();

    $SelectYourPost = $bdd->prepare('SELECT * FROM posts INNER JOIN user WHERE posts.user_id = user.id');
    $SelectYourPost -> execute();
    $your_post_list = $SelectYourPost->fetchAll(PDO::FETCH_ASSOC);
    $your_id = $your_post_list[0]['user_id'];
    return $your_post_list;
}

getOnlyYourPosts($pdo);
getDataFromPosts($pdo);