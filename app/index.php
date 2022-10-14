<?php

require_once("models/getData.php");
require_once("models/postData.php");

getUserData($pdo);
postUserData($pdo);


require("views/common/template.php");