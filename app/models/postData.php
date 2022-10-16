<?php
session_start();
require_once("db_connexion.php");

function postsData($pdo) {

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (isset($_POST['register_article'])) {

            $title = filter_input(INPUT_POST, "title");
            $post = filter_input(INPUT_POST, "post");

            // Nous vérifions qu'aucune entrée n'est vide
            if (!empty($title) && !empty($post)) {

                // Pour chaque entrée utilisateur : retirer les balises HTML/PHP et encoder les charactères.
                $post = strip_tags($post);
                $post = htmlentities($post);

                $title = strip_tags($title);
                $title = htmlentities($title);

                $OneUser = $pdo->prepare('SELECT * FROM user WHERE id = :id');
                $OneUser -> execute (array(
                    'id' => $_SESSION["user"]));
                $user = $OneUser->fetch();

                $RegisterPostReq = $pdo->prepare("INSERT INTO `posts` (`post`, `title`,`user_id` ) 
                                                    VALUES (:post, :title, :user_id)");
                $RegisterPostReq->execute([
                    ":post" => $post,
                    ":title" => $title,
                    ":user_id" => $user['id']
                ]);

                http_response_code(302);
                header('Location: ../profile.php');
                exit();
            }
        }
    }
}

function modifyData($pdo) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (isset($_POST['modify_article'])) {

            $id = filter_input(INPUT_POST, "id");
            $title = filter_input(INPUT_POST, "title");
            $post = filter_input(INPUT_POST, "post");


            $query = $pdo->prepare(
                "UPDATE posts
                SET title = :title, `post` = :post,
                WHERE id=:id");
            $query->execute([
                ":title" => $title,
                ":post" => $post,
                ":id" => $id
            ]);

            http_response_code(302);
            header('Location: ../profile.php');
            exit();

        }
    }
}

postsData($pdo);
modifyData($pdo);