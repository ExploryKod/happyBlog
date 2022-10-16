<?php
require_once("models/db_connexion.php");

$id = $_GET['id'];
$fromPost = $pdo->prepare("SELECT * FROM posts WHERE id = :id");
$fromPost->execute([ ":id" => $id ]);
$the_post = $fromPost->fetch();
require("layout.php");
?>


<main class="container-fluid bg-light">
    <section class="row mt-5 d-flex align-items-center justify-content-center">
        <div class="col-12 w-50 card shadow p-5 bg-white" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title"><?= $the_post['title'] ?></h5>
                <p class="card-text"><?= $the_post['post'] ?></p>
                <a href="./profile.php" class="btn btn-primary btn-sm">Retour à votre profile</a>
            </div>
        </div>
    </section>
</main>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<script src="public/js/script.js?<?php echo time(); ?>"></script>
</body>
</html>
