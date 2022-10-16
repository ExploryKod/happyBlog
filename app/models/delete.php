<?php
require_once("db_connexion.php");

if(!empty($_GET['title']))
{
    $title = filter_input(INPUT_POST, "title");
    $dropClientReq = $pdo->prepare("DELETE FROM posts WHERE title = :title");

    $dropClientReq->execute([ ":title" => $title ]);

    header("Location: ../profile.php");
    die();
}