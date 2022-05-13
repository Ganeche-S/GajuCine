<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<?php
if (!defined('CONST_INCLUDE')){
    die('Accès direct interdit');
}

class VueConnexion extends VueIndex{

    public function __construct() {
         echo '<link rel="stylesheet" type="text/css" href="module/module_Connexion/VC.css"/>';

     }

	function afficheForm(){
        echo '<center>
        <body>
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card border-0 shadow rounded-3 my-5">
          <div class="card-body p-4 p-sm-5">
            <h5 class="card-title text-center mb-5 fw-light fs-5">Connexion</h5>
            <form action="index.php?action=connexion&module=Connexion" method="post">
              <div class="form-floating mb-3">
                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email"  placeholder="Email" required>
                <label for="floatingInput">Adresse Email</label>
              </div>
              <div class="form-floating mb-3">
                <input type="password" class="form-control" id="floatingPassword" name="mdp" placeholder="Mot de passe" required>
                <label for="floatingPassword">Entrer votre mot de passe :</label>
              </div>
              <div class="d-grid">
              <button class="btn btn-primary btn-login text-uppercase fw-bold" type="submit" value="Connexion">Connexion
                </button>
              </div>
              <hr class="my-4">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
        </center>';
	 }

    function afficheFormInscription(){
        echo '<center>
        <div class="container">
        <div class="row">
          <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card border-0 shadow rounded-3 my-5">
              <div class="card-body p-4 p-sm-5">
                <h5 class="card-title text-center mb-5 fw-light fs-5">Inscription</h5>
        <form action="index.php?action=inscription&module=Connexion" method="post" enctype="multipart/form-data">
                <label>Entrer votre nom : </label></br>
                <input type="text" class="form-control" name="nom"  placeholder="Nom" required></br>
                <label>Entrer votre prenom : </label></br>
                <input type="text" class="form-control" name="prenom"  placeholder="Prenom" required></br>
                <label>Entrer votre mot de passe : </label></br>
                <input type="password" class="form-control" name="mdp" placeholder="Mot de passe" required></br>
                <label>Confirmer votre mot de passe : </label></br>
                <input type="password" class="form-control" name="mdp2" placeholder="Mot de passe" required></br>
                <label>Entrer votre sexe : </label></br>
                <input type="radio" name="sexe" value="H" checked>Homme</br><input type="radio" name="sexe" value="F">Femme</br></br>
                <label>Entrer votre date de naissance : </label></br>
                <input type="date" class="form-control" name="dateNaissance" required></br>
                <label>Entrer votre email : </label></br>
                <input type="text" class="form-control" name="email" placeholder="Email" required></br>
                <label>Entrer votre telephone : </label></br>
                <input type="tel" class="form-control" name="telephone" minlength="10" maxlength="10" placeholder="Numéro de Téléphone" required></br>
                <div class="d-grid">
                <button class="btn btn-primary btn-login text-uppercase fw-bold" type="submit" value="Inscription">Inscription
                  </button>
                </div>
                <hr class="my-4">
            </form>
            </center>';
        echo "</div>";
        ;
	}
}
?>
