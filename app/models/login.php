<?php
session_start();
require_once("db_connexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if(!empty($_POST['username']) && !empty($_POST['password']))  {
        $username = strip_tags($_POST['username']);
        $username = htmlentities($_POST['username']);

        $password = strip_tags($_POST['password']);
        $password = htmlentities($_POST['password']);

        $login = $pdo->prepare('SELECT id, username, password FROM user WHERE username= ?');
        $login->execute(array($username));
        $subscribed_users = $login->fetch();
        $row = $login->rowCount();

        if($row > 0)
        {
            if(password_verify($password, $subscribed_users['password']))
            {
                $_SESSION['user'] =  $subscribed_users['id'];

                header('Location: ../profile.php');
                die();

            }else{
                header("Location: ../index.php?error=1");
                die();
            };
        }
        header("Location: ../index.php?error=2");
        die();
    } else {
        header("Location: ../index.php?error=3");
        die();
    }
    header("Location: ../index.php?error=4");
    die();
}