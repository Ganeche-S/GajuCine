<!DOCTYPE html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<html>
    <!-- en-tête de la page -->
    <title>GajuCine</title>
    <head>

        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/jpg" href="./images/logo.jpg"/>
        <link href="style.css" rel="stylesheet" type="text/css">
    </head>
    
    <!-- corps de la page -->

        <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">   
  <div class="container-fluid">
  <a class="navbar-brand" href="\index.php">
      <img src="./images/logo.jpg" alt="" width="70" height="64" class="d-inline-block align-text">
      GajuCine</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item active">
          <a class="nav-link" href="index.php?module=Film&action=films">Films</a>
          <?php
                        if (isset($_SESSION['idUtilisateur'])) {
                            echo "<li class=nav-item>
                            <a class=nav-link href=\"index.php?module=Film&action=recherche\">Chercher un Film</a>
                            </li>";
                        }
                    ?>
        </li>
          <?php
                        if (isset($_SESSION['idUtilisateur'])) {
                            echo "<li class='nav-item'>
                                    <a class='nav-link'  href=\"index.php?module=Utilisateur&action=afficheProfil\" class=\"profil\">Profil</a>
                                    </li>";
                            echo "<li class=nav-item>
                            <a class='nav-link' href=\"index.php?module=Connexion&action=deconnexion\" name=\"deconnecter\" value=\"Logout\" class=\"logout\"/>Déconnexion</a>
                            </li>";
                        } else {
                            echo "<li class='nav-item'>
                            <a class='nav-link' href=\"index.php?module=Connexion&action=form\" name=\"connecter\" value=\"Login\" class=\"login\"/>Connexion</a>
                            </li>";
                            echo "<li class='nav-item'>
                            <a class='nav-link' href=\"index.php?module=Connexion&action=formInscription\" name=\"connecter\" value=\"Sign Up\" class=\"sign\"/>Inscription</a>
                            </li>";
                        }
                    ?>
      </ul>
    </div>
  </div>
</nav>
</header>
        <body>
        <br></br>
        <br></br>
        <main>
            <div class="container">
                <?= $module ?>
            </div>
        </main>

                    </body>
        <footer class="footer  footer-light bg-light ">
            <p >Tout droits réservés,  SIVASANKAR Ganeche, FELLOUS Jules</p>
        </footer>

 

</html>