<?php

require_once("db_connexion.php");

// Si les variables existent et qu'elles ne sont pas vides
if(!empty($_POST['username']) && !empty($_POST['password'])) {
    // Patch XSS
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);
    print_r($_POST['username']);
    print_r($_POST['password']);
    // On vérifie si l'utilisateur existe
    $check = $pdo->prepare('SELECT username, password FROM user WHERE username = ?');
    $check->execute(array($username));
    $data = $check->fetch();
    $row = $check->rowCount();

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
        header('Location: welcome.php');
        die();


    } else{
        header('Location: welcome.php');
    }
} else {
    header('Location: welcome.php');
}