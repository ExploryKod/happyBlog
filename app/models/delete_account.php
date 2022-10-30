<?php
session_start();
require_once("db_connexion.php");

function delete_my_account($pdo) {
    if(isset($_SESSION['user'])) {

        $userId = $_SESSION['user'];

        $dropUserPosts = $pdo->prepare('DELETE FROM posts WHERE user_id = :user_posts_id');
        $dropUserPosts->execute([
            ":user_posts_id" => $userId
        ]);

        $dropUserReq = $pdo->prepare("DELETE FROM user WHERE id = :userId");
        $dropUserReq->execute([
                    ":userId" =>  $userId
        ]);

        header('Location: ../index.php?drop_user=ok');
        exit();
    } else {
        header('Location: ../index.php?error="no-session"');
        exit();
    }

}

delete_my_account($pdo);

