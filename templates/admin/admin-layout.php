<?php

use App\Core\Session;

$session = new Session;

if (!$session->isAdmin()) {
    header('Location:/car-location/');
    exit();
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boxshadow - Location de voitures</title>
    <!-- CDN Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="shortcut icon" href="/car-location/public/img/icon/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="/car-location/public/css/style.css">
</head>

<body>

    <header>
        <nav class="navbar navbar-expand-sm bg-primary" data-bs-theme="dark">
            <div class="container">
                <a class="navbar-brand" href="/car-location/">
                <i class="bi bi-lightning-charge-fill mx-2"></i>
                Boxshadow
                <img src="/car-location/public/img/icon/camaro.png" alt="" class="logo">
            </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-sm-0">
                        <?php
                        if ($session->isAdmin()) {
                        ?>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="/car-location/tableau-de-bord-admin">Backoffice</a>
                            </li>
                        <?php
                        }
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="/car-location/">Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/car-location/contactez-nous">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/car-location/inscription">Inscription</a>
                        </li>
                        <?php
                        if ($session->isLoggedIn()) {
                        ?>
                            <li class="nav-item">
                                <a class="nav-link" href="/car-location/deconnexion">Deconnexion</a>
                            </li>
                        <?php
                        } else {
                        ?>
                            <li class="nav-item">
                                <a class="nav-link" href="/car-location/connexion">Connexion</a>
                            </li>
                        <?php
                        }

                        ?>

                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <?php

        $session->displayFlashMessage();
        echo $content;

        ?>
    </main>

    <footer></footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>