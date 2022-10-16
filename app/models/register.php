<?php

require_once("db_connexion.php");

if(!empty($_POST['username']) && !empty($_POST['password'])) {

    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    $check = $pdo->prepare('SELECT username, password FROM user WHERE username = ?');
    $check->execute(array($username));
    $data = $check->fetch();
    $row = $check->rowCount();

    // L'utilisateur existe si $row != 0 sinon:
    if ($row === 0) {

        // On hash le mot de passe avec Bcrypt, via un coût de 12
        $cost = ['cost' => 12];
        $password = password_hash($password, PASSWORD_BCRYPT, $cost);

        $insert = $pdo->prepare('INSERT INTO user(username, password) VALUES(:username, :password)');
        $insert->execute([
            ":username" => $username,
            ":password" => $password
        ]);

        //http_response_code(302);
        header('Location: ../index.php');
        die();


    } else{
        header('Location: ../index.php?erreur=alreadylog');
    }
} else {
    //header('Location: welcome.php');
    print_r("empty variables");
}