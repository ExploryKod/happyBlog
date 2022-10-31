<?php require("layout.php") ?>

    <main class="container-fluid p-0">
        <section class="container-fluid custom-hero-container">
            <div class="d-flex justify-content-center align-item-center py-5 p-0">
                <div class="p-sm-5 pb-sm-5 mx-sm-5 bg-custom-secundary-transparent position-relative rounded-3">
                    <div>
                        <h1 class="text-white text-center fs-1 pt-3">Entrez dans la Communauté HappyBlog !</h1>
                        <h2 class="text-white text-center fs-3"></h2>
                    </div>
                </div>
            </div>
        </section>

        <section class="container mt-5 d-flex justify-content-center align-item-center">
            <form class="shadow bg-light p-5" action="../models/register.php" method="POST">
                <div class="mb-3">
                    <label for="username" class="form-label">Créez un pseudo: <span>*</span> :</label>
                    <input class="form-control" id="username" type="text" name="username" maxlength="250"  aria-describedby="username-input"  required >
                </div>

                <div class="mb-3">
                    <label for="password">Créez un mot de passe: <span>*</span> :</label>
                    <input class="form-control" id="password" type="password" name="password" maxlength="250" required >
                </div>

                <div class="d-grid gap-2">
                    <input class="btn btn-primary" type="submit" value="S'inscrire" name="register">
                </div>
            </form>
        </section>
    </main>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<script src="public/js/script.js?<?php echo time(); ?>"></script>
</body>
</html>