<?php ob_start(); ?>
    <main class="container-fluid p-0">

        <section class="container-fluid custom-hero-container">
            <div class="d-flex justify-content-center align-item-center py-5 p-0">
                <div class="p-sm-5 pb-sm-5 mx-sm-5 bg-custom-secundary-transparent position-relative rounded-3">
                    <div>
                        <h1 class="text-white text-center fs-1 pt-3">Bienvenue sur info Veille !</h1>
                        <h2 class="text-white text-center fs-3"></h2>
                    </div>
                </div>
            </div>
        </section>

        <section class="container mt-5 d-flex justify-content-center align-item-center">
            <form action="../src/models/register.php" method="POST">
                <label for="username">Create your username: <span>*</span> :</label>
                <input class="input"  id="username" type="text" name="username" maxlength="250" required >

                <label for="password">Create your password: <span>*</span> :</label>
                <input class="input" id="password" type="password" name="password" maxlength="250" required >

                <div id="btn-container">
                    <input type="submit" value="Valider" name="register">
                </div>
            </form>
        </section>
    </main>
<?php $content = ob_get_clean(); ?>

<?php require("layout.php");