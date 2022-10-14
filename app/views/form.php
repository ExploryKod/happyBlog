
<?php

require_once("../index.php");
require("common/template.php");
?>
<main>
    <form action="" method="POST">
        <label for="username">Username <span>*</span> :</label>
        <input class="input"  id="username" type="text" name="username" maxlength="250" required >

        <label for="password">Nom <span>*</span> :</label>
        <input class="input" id="password" type="password" name="password" maxlength="250" required >

        <div id="btn-container">
            <input type="submit" value="Enregistrer" name="register">
            <input type="button" value="Annuler" id="cancel-button">
        </div>
    </form>
</main>