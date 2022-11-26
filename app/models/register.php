<?php

require_once("db_connexion.php");

if(!empty($_POST['username']) && !empty($_POST['password'])) {

    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);
    $admin = 0;

    $check = $pdo->prepare('SELECT username, password, admin FROM user WHERE username = ?');
    $check->execute(array($username));
    $data = $check->fetch();
    $row = $check->rowCount();

    // L'utilisateur existe si $row != 0 sinon:
    if ($row === 0) {

        // On hash le mot de passe avec Bcrypt, via un coût de 12
        $cost = ['cost' => 12];
        $password = password_hash($password, PASSWORD_BCRYPT, $cost);

        $insert = $pdo->prepare('INSERT INTO user(username, password, admin) VALUES(:username, :password, :admin)');
        $insert->execute([
            ":username" => $username,
            ":password" => $password,
            ":admin" => $admin
        ]);

        // Variante => via la méthode bindValue ($query->bindValue("password", $password, PDO::PARAM_STR);

        //http_response_code(302);
        header('Location: ../index.php?login=ok');
        die();


    } else{
        header('Location: ../index.php?erreur=alreadylog');
    }
} else {
    //header('Location: welcome.php');
    print_r("empty variables");
}