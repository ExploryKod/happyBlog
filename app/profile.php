
<?php

require_once("models/db_connexion.php");

$SelectYourPost = $pdo->prepare('SELECT * FROM posts INNER JOIN user WHERE posts.user_id = user.id');
$SelectYourPost -> execute();
$your_post_list = $SelectYourPost->fetchAll(PDO::FETCH_ASSOC);
print_r($your_post_list);
require('layout.php'); ?>

<main class="container-fluid">
    <section class="container d-flex align-content-center justify-content-center">
        <h1>Bienvenue sur votre page</h1>
    </section>
    <section class="mt-5 row">

        <article class="col-sm-6 container-fluid d-flex align-items-start justify-content-center">
            <form action="../models/postData.php" method="POST">
                <section class="shadow p-5 bg-light">
                    <div class="mb-3">
                        <label class="form-label" for="username">Titre du post: <span>*</span> :</label>
                        <input class="form-control"  id="username" type="text" name="title" maxlength="250" required >
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="post">Texte du post: <span>*</span> :</label>
                        <textarea class="form-control" id="post" name="post"  cols="30" rows="4" placeholder="Entrez votre texte" onfocus="this.onfocus=null;" maxlength="950" required ></textarea>
                    </div>

                    <div class="mb-3">
                        <input class="btn btn-primary btn-lg" type="submit" value="Enregistrer l'article" name="register_article">
                    </div>
                </section>
            </form>
        </article>

        <article class="col-sm-6 container d-flex flex-column align-items-start justify-content-start">
            <h2>Liste de vos articles: </h2>

            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Handle</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($your_post_list as $your_post): ?>
                <tr>
                    <th scope="row">1</th>
                    <td><?php echo $your_post['title'] ?></td>
                    <td><a href='models/delete.php?id=<?php echo $your_post['title'] ?>'>Supprimer ce post </a></td>
                    <td></td>
                </tr>
                <?php endforeach ?>

        </article>
    </section>
</main>






<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<script src="public/js/script.js?<?php echo time(); ?>"></script>
</body>
</html>