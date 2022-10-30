<?php
require_once("db_connexion.php");

$id = $_GET['id'];
$dropClientReq = $pdo->prepare("DELETE FROM posts WHERE id = :id");
$dropClientReq->execute([ ":id" => $id ]);

header('Location: ../profile.php');
exit();


