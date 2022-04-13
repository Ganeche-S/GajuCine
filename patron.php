<!DOCTYPE html>
<html>
    <!-- en-tête de la page -->
    <title>MapAnime</title>
    <head>

        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/jpg" href="./images/logo.jpg"/>
        <link href="sloga.css" rel="stylesheet" type="text/css">
    </head>
    
    <!-- corps de la page -->
    <body>
        <header>
            <a href="index.php"><img src="./images/logo.jpg"></a>
        </header>
            <nav>
                <div class="gauche">
                    <a href="index.php?module=Recherche&action=films">Films</a>
                </div>
                
                <div class="droite">
                    <?php
                        if (isset($_SESSION['idUtilisateur'])) {
                            echo "<a href=\"index.php?module=Utilisateur&action=afficheProfil\" class=\"profil\">Profil</a>";
                            echo "<a href=\"index.php?module=Connexion&action=deconnexion\" name=\"deconnecter\" value=\"Logout\" class=\"logout\"/>Déconnexion</a>";
                        } else {
                            echo "<a href=\"index.php?module=Connexion&action=form\" name=\"connecter\" value=\"Login\" class=\"login\"/>Connexion</a>";
                            echo "<a href=\"index.php?module=Connexion&action=formInscription\" name=\"connecter\" value=\"Sign Up\" class=\"sign\"/>Inscription</a>";
                        }
                    ?>
                </div>
            </nav>
        
        <!-- Corps de la page -->
        <main>
            <div class="container">
                <?= $module ?>
            </div>
        </main>

        <footer>
            <p>Tout droits réservés,  SIVASANKAR Ganeche, FELLOUS Jules</p>
        </footer>

    </body>

</html>