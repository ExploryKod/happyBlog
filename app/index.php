

<?php

print_r($_SERVER['REQUEST_URI']);
if ($_SERVER['REQUEST_URI'] == '/')     {

    require("template/welcome.php");

} elseif ($_SERVER['REQUEST_URI'] == '/register_form.php') {

    require("template/register_form.php");
}