<?php
session_start();
require('db_connexion.php');

function becomeAdmin($pdo) {
    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        if (isset($_POST['register-admin'])) {

            $answer = filter_input(INPUT_POST, "admin-test");
            htmlspecialchars($answer);
            if(!empty($answer)) {
                if( strtolower($answer) !== 'blanc')  {
                    header('Location: ../admin.php?error=bad-answer');
                    exit();
                } else {
                    if($_SESSION['user']) {
                        $id = $_SESSION['user'];
                        $admin = 1;
                        $query = $pdo->prepare(
                            "UPDATE user
                        SET admin = :admin
                        WHERE id=:id ");
                        $query->execute([
                            ":admin" => $admin,
                            ":id" => $id
                        ]);

                        http_response_code(302);
                        header('Location: ../profile.php?admin=ok');
                        exit();
                    } else {
                        header('Location: ../profile.php?session_id=no');
                        exit();
                    }
                }

            } else {
                header('Location: ../admin.php?error=no-answer');
                exit();
            }
        } else  {
            header('Location: ../admin.php?error=pbm-register');
            exit();
        }
    }
}

becomeAdmin($pdo);