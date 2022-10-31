<?php
session_start();
require_once("models/db_connexion.php");

if ($_SESSION['user']) {
    require("layout.php");
    ?>

<main class="container-fluid p-0">
    <section class="container-fluid custom-hero-container">
        <div class="d-flex justify-content-center align-item-center py-5 p-0">
            <div class="p-sm-5 pb-sm-5 mx-sm-5 bg-custom-secundary-transparent position-relative rounded-3">
                <div>
                    <h1 class="text-white text-center fs-1 pt-3">Devenir administrateur</h1>
                    <h2 class="text-white text-center fs-3"></h2>
                </div>
            </div>
        </div>
    </section>

    <section class="container">
        <h1>Terrible test pour devenir administrateur:</h1>
        <p>Quelle est la couleur du cheval blanc d'henri IV ?</p>
        <section class="container mt-5 d-flex justify-content-center align-item-center">
            <form class="shadow bg-light p-5" action="models/register_admin.php" method="POST">
                <div class="mb-3">
                    <label for="username" class="form-label">Ecrivez votre réponse ici: <span>*</span> :</label>
                    <input class="form-control" id="admin-test" type="text" name="admin-test" maxlength="250"  aria-describedby="admin-test-input"  required >
                </div>
                <div class="d-grid gap-2">
                    <input class="w-100 btn btn-primary" type="submit" value="Soumettre sa réponse" name="register-admin">
                </div>
            </form>
        </section>
    </section>

    <?php } else {
        header('Location: ../index.php?error=session-id');
    } ?>