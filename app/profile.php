
<?php

require_once("models/db_connexion.php");

$SelectYourPost = $pdo->prepare('SELECT * FROM posts INNER JOIN user WHERE posts.user_id = user.id');
$SelectYourPost -> execute();
$your_post_list = $SelectYourPost->fetchAll(PDO::FETCH_ASSOC);

$everyPost = $pdo->prepare('SELECT * FROM posts');
$everyPost-> execute();
$allposts = $everyPost-> fetchAll(PDO::FETCH_ASSOC);

// As we can't use a session superglobal as we already call it, we fetch the user id from here:
if(isset($your_post_list[0]['user_id'])) {
$your_id = $your_post_list[0]['user_id'];
}
// We create an array with all values but without repeated values:
$allvalues = $allposts+$your_post_list;


echo "----\n";

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
            <?php if(!isset($your_id)) { ?>
            <div class="w-50 mt-5 alert alert-info" role="alert">
                Vous n'avez pas encore d'articles ou alors si vous venez de les créér : rafraîchissez la page.
            </div>
            <?php } ?>

            <?php if(isset($your_id)) { ?>
            <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">ID du post:</th>
                        <th scope="col">Votre ID:</th>
                        <th scope="col">Titre du post:</th>
                        <th scope="col">Opération</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($allvalues as $one_post):
                        if($your_id === $one_post['user_id']):
                        ?>

                        <tr>
                            <th scope="row"><?php echo $one_post['id'] ?></th>
                            <th scope="row"><?php echo $one_post['user_id'] ?></th>
                            <td><?php echo $one_post['title'] ?></td>
                            <td><a href='models/delete.php?id=<?php echo $one_post['id'] ?>'>Supprimer ce post </a></td>
                            <td><a href='update_form.php?id=<?php echo $one_post['id'] ?>'>modifier ce post </a></td>
                            <td></td>
                        </tr>
                        <?php endif ?>
                    <?php endforeach ?>
                    </tbody>
                    </table>
                <?php } ?>

                <h2 class="mt-2">Liste des articles écrit par d'autres talents: </h2>
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Titre du post</th>
                            <th scope="col">Lire</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($allposts as $a_post): ?>
                            <tr>
                                <th scope="row"><?php echo $a_post['id'] ?></th>
                                <td><?php echo $a_post['title'] ?></td>
                                <td><a href='readPost.php?id=<?php echo $a_post['id']?>'>Consulter ce post </a></td>
                                <td></td>
                            </tr>
                        <?php endforeach ?>
                        </tbody>
                    </table>

        </article>

    </section>
</main>






<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<script src="public/js/script.js?<?php echo time(); ?>"></script>
</body>
</html>