

<?php require("layout.php") ?>

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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<script src="../src/public/js/script.js?<?php echo time(); ?>"></script>
</body>
</html>


