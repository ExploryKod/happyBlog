


<header>
    <nav class="navbar navbar-expand-md fixed-top navbar-light bg-light fixed-top">   <!--"...fixed-top" pour fixer la barre de navig-->

        <div class="container">  <!-- ou "container-fluid" pour l'ajuster à toute la fenêtre navigation-->

            <a class="navbar-brand text-uppercase fw-bold" href="/">   <!--La MARQUE du site-->
                <span class="bg-primary bg-gradient p-1 rounded-3 text-light"> Vigile</span> La veille scientifique
                <!-- <p class="h6 text-end">Entièrement automatisée</p>  -->
            </a>
            <!--Texte associé à la MARQUE du site >> peut aussi se mettre entre </span>....</a> -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!--data-bs-target de boutton ET id de <div class="collapse" DOIVENT être la MEME = "navbarNav"-->

            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item-active">
                        <a class="nav-link" href="http://localhost:8003">Accueil</a>  <!--Puisque Single page, chaque lien href = id de la section à laquelle il est lié...)-->
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/recherche_traditionnelle">Recherche Automatisée</a>  <!--Puisque Single page, chaque lien href = id de la section à laquelle il est lié...)-->
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/recherche_semantique">Recherche Optimisée</a>  <!--Puisque Single page, chaque lien href = id de la section à laquelle il est lié...)-->
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="/#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Resultats</a>  <!--Puisque Single page, chaque lien href = id de la section à laquelle il est lié...)-->
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                            <p class="dropdown-item">lien</p>
                            <a class="dropdown-item" href="#">Ressource</a>

                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

</header>