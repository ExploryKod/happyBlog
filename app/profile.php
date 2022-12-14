<?php
session_start();
require_once("models/db_connexion.php");

$SelectYourPost = $pdo->prepare('SELECT * FROM posts INNER JOIN user WHERE posts.user_id = user.id');
$SelectYourPost -> execute();
$your_post_list = $SelectYourPost->fetchAll(PDO::FETCH_ASSOC);

$everyPost = $pdo->prepare('SELECT * FROM posts');
$everyPost-> execute();
$allposts = $everyPost-> fetchAll(PDO::FETCH_ASSOC);

$everyUsers = $pdo->prepare('SELECT * FROM user');
$everyUsers->execute();
$allUsers = $everyUsers->fetchAll(PDO::FETCH_ASSOC);

$user_session_id = $_SESSION['user'];
$you = $pdo->prepare('SELECT * FROM user WHERE id = :user_session_id');
$you->execute(
        [':user_session_id' => $user_session_id]
);
$only_you = $you->fetch();

if(isset($your_post_list[0]['user_id'])) {
$your_id = $your_post_list[0]['user_id'];
}
// We create an array with all values but without repeated values:
$allvalues = $allposts+$your_post_list;



require('layout.php'); ?>

<main class="container">
    <div class="container d-flex align-content-center justify-content-center mt-3 mb-2">
        <h1>Bienvenue sur votre page</h1>
    </div>
    <section class="container d-flex align-content-center justify-content-center gap-2">
        <a class="w-25 btn btn-primary btn-sm mt-2" href="logout.php">Me déconnecter</a>
        <button type="button" class="w-25 mt-2 btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#suppress-account-modal">Supprimer mon compte</button>
        <button type="button" class="w-25 mt-2 btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#all_users">Liste des utilisateurs</button>
        <?php if($only_you['admin'] !== 1) { ?>
        <a class="fs-5 w-25 text-primary" href="admin.php">Devenir administrateur</a>
        <?php } else {   ?>
        <p>Statut: administrateur</p>
        <?php } ?>
    </section>
    <?php if(isset($_GET['admin']) && $_GET['admin'] === 'ok') { ?>
    <div class="container d-flex align-content-center justify-content-center my-2">
        <div class="alert alert-success p-2">
            <p class="fs-5 text-center">Vous êtes désormais administrateur: vos nouveaux pouvoirs magiques sont apparus plus bas.</p>
        </div>
    </div>
    <?php } ?>

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


            <?php if(isset($your_id) && ($_SESSION['user'] === $your_id)) { ?>
                <h2>Liste de vos articles: </h2>
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
                <?php } else {  ?>

                <div class="alert alert-success mx-auto my-2 w-75">
                    <p class="fs-6 fw-bold p-3"> Vous n'avez pas encore créé d'articles. Libérez votre créativité, écrivez un article pour le montrer au monde.</p>
                </div>

                <?php }  ?>

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

    <?php  if($only_you['admin'] === 1) { ?>
            <section class="container w-75 m-auto row mt-5 shadow bg-white rounded align-items-center justify-content-center">
                <h2 class="text-center fs-5"> Vos droits administrateurs</h2>
                    <article class="col-sm-6">
                    <?php foreach($allUsers as $user): ?>
                        <div class="list-group-item d-flex justify-content-center align-items-center">
                            <a class="fs-2 text-dark text-center" href="" >
                                <?php echo $user['username'] ?>
                            </a>
                            <?php if($user['admin'] === 1) { ?>
                                <a href="" class="text-info ms-5">Demandes</a>
                            <?php } else { ?>
                                <a class="text-danger ms-5" href="models/delete_user.php?identity_user=<?= $user['id'] ?>">Supprimer</a>
                            <?php } ?>
                        </div>
                    <?php endforeach ?>
                </article>
            </section>
    <?php } ?>
    

    <div class="modal fade" id="all_users" tabindex="-1" aria-labelledby="suppress-account-modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Liste des membres et leur statut</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="list-group">
                        <?php foreach($allUsers as $user): ?>
                        <div class="list-group-item">
                            <a class="fs-2 text-dark" href="" >
                                <?php echo $user['username'] ?>
                            </a>
                            <?php if($user['admin'] === 1) { ?>
                            <p>Administrateur</p>
                            <?php } else { ?>
                            <p>Utilisateur</p>
                            <?php } ?>
                        </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="suppress-account-modal" tabindex="-1" aria-labelledby="suppress-account-modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title" id="exampleModalLabel">Suppression du compte</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body border-0">
                    <p>En cliquant sur valider, vous supprimez votre compte et tous vos articles.</p>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <a role="button" href="models/delete_account.php" class="btn btn-primary">Supprimer mon compte</a>
                </div>
            </div>
        </div>
    </div>
    </div>
</main>






<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<script src="public/js/script.js?<?php echo time(); ?>"></script>
</body>
</html>