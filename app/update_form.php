<?php
require_once("models/db_connexion.php");

$id = $_GET['id'];
$postToModify = $pdo->prepare("SELECT * FROM posts WHERE id = :id");
$postToModify->execute([ ":id" => $id ]);
$myPost = $postToModify->fetch();
require("layout.php");
?>


<main class="container-fluid bg-light">
    <h2>Voici le post initial: </h2>
    <section class="row mt-5 d-flex align-items-center justify-content-center">
        <div class="col-12 w-50 card shadow p-5 bg-white" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title"><?= $myPost['title'] ?></h5>
                <p class="card-text"><?= $myPost['post'] ?></p>
                <a href="./profile.php" class="btn btn-primary btn-sm">Retour à votre profile</a>
            </div>
        </div>
    </section>
    <h2>Vous pouvez modifier le post ici: </h2>
    <form action="../models/postData.php" method="POST">
        <section class="shadow p-5 bg-light">
            <div class="mb-3">
                <label class="form-label" for="title">Titre du post: <span>*</span> :</label>
                <input class="form-control"  id="title" type="text" name="title" placeholder="<?= $myPost['title'] ?>" maxlength="250" required >
            </div>

            <div class="mb-3">
                <label class="form-label" for="post">Texte du post: <span>*</span> :</label>
                <textarea class="form-control" id="post" name="post"  cols="30" rows="4" placeholder="<?= $myPost['post'] ?>" onfocus="this.onfocus=null;" maxlength="950" required ></textarea>
            </div>

            <input  id="client-id" type="hidden" name="id" value="<?= $myPost["id"] ?>" >

            <div class="mb-3">
                <input class="btn btn-primary btn-lg" type="submit" value="Modifier l'article" name="modify_article">
            </div>
        </section>
    </form>
</main>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<script src="public/js/script.js?<?php echo time(); ?>"></script>
</body>
</html>