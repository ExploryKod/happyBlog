<?php require("layout.php") ?>
<main>
    <?php
        require("../src/models/getData.php");
        require("../src/models/postData.php");
        $posts = getDataFromPosts($pdo);
        $users = getUserData($pdo);
        print_r($posts);
        print_r($users[0]['username']);
        postsData($pdo)
    ?>

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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="../src/public/js/script.js?<?php echo time(); ?>"></script>
</body>
</html>

