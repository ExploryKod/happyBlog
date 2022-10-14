<?php
    require("../models/getData.php");
    require("../models/postData.php");
    require("common/header.php");
    $posts = getDataFromPosts($pdo);
    $users = getUserData($pdo);
    print_r($posts);
    print_r($users[0]['username']);
    postsData($pdo)
?>

<h1>Home</h1>
<p><?php echo $_POST['username']; ?></p>

<main>
    <form action="" method="POST">
        <label for="username">Title: <span>*</span> :</label>
        <input class="input"  id="username" type="text" name="title" maxlength="250" required >

        <label for="post">Your text: <span>*</span> :</label>
        <textarea class="input" id="post" name="post"  cols="30" rows="4" placeholder="Indiquez ici: n° de rue, rue, ville, code-postal" onfocus="this.onfocus=null;" maxlength="950" required ><?php if(isset($_GET["id"])): ?><?= $client[0]["address"]?> <?php endif; ?></textarea>


        <div id="btn-container">
            <input type="submit" value="Enregistrer" name="register">
            <input type="button" value="Annuler" id="cancel-button">
        </div>
    </form>
</main>

<main>
    <section class="table-container">

        <div class="table">
            <div class="table-row" id="table-header">
                <div>Identifiant</div>
                <div>Titre</div>
                <div>Utilisateur</div
            </div>
            <?php
            if(!empty($posts)):
                foreach($posts as $post): ?>
                    <a class="body-row" href="">
                        <div><?= $post ?></div>
                        <div><?= $post ?></div>
                    </a>
                <?php endforeach; ?>
            <?php endif ?>
        </div>

    </section>

    <section id="btn-section">
        <h1 id="no-client"></h1>
        <a id="btn-create-client" href="">Créer un nouveau post</a>
    </section>

</main>