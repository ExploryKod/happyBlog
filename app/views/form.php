
<main>
    <form action="views/homepage.php" method="POST">
        <label for="username">Username <span>*</span> :</label>
        <input class="input"  id="username" type="text" name="username" maxlength="250" required >

        <label for="password">Password <span>*</span> :</label>
        <input class="input" id="password" type="password" name="password" maxlength="250" required >

        <div id="btn-container">
            <input type="submit" value="Enregistrer" name="register">
            <input type="button" value="Annuler" id="cancel-button">
        </div>
    </form>
</main>

<?php
print_r($_POST['username']);
print_r($_POST['password']);
?>