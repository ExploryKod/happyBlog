<?php

require_once("models/getData.php");
require_once("models/postData.php");

$getData = getUserData($pdo);
$postData = postUserData($pdo);

require("views/common/template.php");