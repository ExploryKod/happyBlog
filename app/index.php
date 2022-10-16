<?php require("layout.php") ?>

<main>
    <section class="container-fluid custom-hero-container">
        <div class="d-flex justify-content-center align-item-center py-5 p-0">
            <div class="p-sm-5 pb-sm-5 mx-sm-5 bg-custom-secundary-transparent position-relative rounded-3">
                <div>
                    <h1 class="text-white text-center fs-1 pt-3">Bienvenue sur happyBlog</h1>
                    <h2 class="text-white text-center fs-3"></h2>
                </div>
            </div>
        </div>
    </section>
    <?php if(isset($_GET['erreur']) && !empty($_GET['erreur'])) {

        if($_GET['erreur'] == 'alreadylog') {
            ?>
        <div class="w-50 mt-5 alert alert-info" role="alert">
            Vous avez déjà un compte chez nous: veuillez vous logger ci-dessous.
        </div>
    <?php } } ?>
    <section class="container mt-5 d-flex justify-content-center align-item-center">
        <form action="models/login.php" method="POST">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Pseudo: <span>*</span></label>
                <input class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" type="text" name="username" maxlength="250" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Mot de passe: <span>*</span></label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password" maxlength="250" required>
            </div>

            <div class="d-flex flex-column ">
                <input class="btn btn-primary" type="submit" value="Valider" name="login">
                <div><p>Pas encore inscris ? <a href="register_form.php">créer un compte</a></p></div>
            </div>
        </form>
    </section>

</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<script src="public/js/script.js?<?php echo time(); ?>"></script>
</body>
</html>
