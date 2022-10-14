<?php
require_once("db_connexion.php");

function postUserData($pdo) {

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (isset($_POST['register'])) {

            $username = filter_input(INPUT_POST, "username");
            $password = filter_input(INPUT_POST, "password");

            var_dump($username);
            var_dump($password);

            // Nous vérifions qu'aucune entrée n'est vide
            if (!empty($username) && !empty($password)) {

                // Pour chaque entrée utilisateur : retirer les balises HTML/PHP et encoder les charactères.
                $username = strip_tags($username);
                $username = htmlentities($username);

                $password = strip_tags($password);
                $password = htmlentities($password);

                $RegisterClientReq = $pdo->prepare("INSERT INTO `user` (`username`, `password`) 
                                                    VALUES (:username, :password)");
                $RegisterClientReq->execute([
                    ":username" => $username,
                    ":password" => $password
                ]);

                http_response_code(302);
                //header('Location: ');
                exit();
            }
        }
    }
}
