<?php
    require("../models/getData.php");
    require("../models/postData.php");
    $posts = getDataFromPosts($pdo);
    $users = getUserData($pdo);
    print_r($posts);
    print_r($users[0]['username']);
    postsData($pdo)

?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="../public/css/form.css" rel="stylesheet" />
    <link href="../public/css/blog.css" rel="stylesheet" />
    <meta name="description" content="C'est un blog">
    <title>Happy Blog</title>

</head>
<body>
<main>
    <section class="table-container">

        <div class="table">
            <div class="table-row" id="table-header">
                <div>Identifiant</div>
                <div>Titre</div>
                <div>Extrait</div>
            </div>
            <?php
            if(!empty($posts)):
                foreach($posts as $post): ?>
                    <a class="body-row" href="">
                        <div><?= $post['id'] ?></div>
                        <div><?= $post['title'] ?></div>
                        <div><?= $post['post'] ?></div>
                    </a>
                <?php endforeach; ?>
            <?php endif ?>
        </div>

    </section>

    <section id="btn-section">
        <h1 id="no-client"></h1>
        <a id="btn-create-client" href="create_article.php">Créer un nouveau post</a>
    </section>

</main>
</body>
</html>