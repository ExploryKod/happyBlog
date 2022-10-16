
<?php

if(!isset($_SESSION["user"])){

    require("template/login_form.php");
} else {
    session_start();
    print_r($_SESSION);
    require("template/homepage.php");
}



