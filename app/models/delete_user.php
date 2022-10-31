<?php
require('db_connexion.php');
if(isset($_GET) && !empty($_GET)) {

    $userId = $_GET['identity_user'];

    $dropUserPosts = $pdo->prepare('DELETE FROM posts WHERE user_id = :user_posts_id');
    $dropUserPosts->execute([
        ":user_posts_id" => $userId
    ]);

    $dropUserReq = $pdo->prepare("DELETE FROM user WHERE id = :userId");
    $dropUserReq->execute([
        ":userId" =>  $userId
    ]);

    header('Location: ../profile.php?drop_other_user=ok');
    exit();

} else {
    header('Location: ../index.php?error=user_supp_noId');
    die();
}
