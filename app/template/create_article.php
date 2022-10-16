

<?php ob_start(); ?>

<?php
require("../models/getData.php");
$user = getUserData($pdo)

?>

<h1>Home</h1>
<p>Bienvenue <?php echo $user[0]['username']; ?></p>

<main>
    <form action="./homepage.php" method="POST">
        <label for="username">Titre du post: <span>*</span> :</label>
        <input class="input"  id="username" type="text" name="title" maxlength="250" required >

        <label for="post">Your text: <span>*</span> :</label>
        <textarea class="input" id="post" name="post"  cols="30" rows="4" placeholder="Entrez votre texte" onfocus="this.onfocus=null;" maxlength="950" required ></textarea>

        <div id="btn-container">
            <input type="submit" value="Enregistrer" name="register">
            <input type="button" value="Annuler" id="cancel-button">
        </div>
    </form>
</main>

<?php $content = ob_get_clean(); ?>

<?php require("layout.php") ?>
