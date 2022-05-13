<?php
if (!defined('CONST_INCLUDE')){
    die('Accès direct interdit');
}
require_once('./ConnexionBD.php');

class ModeleConnexion extends ConnexionBD {

    public function __construct(){
        parent::initConnexion();
    }

    public function verifConnexion() {
 
    $mdp = $_POST['mdp'];

        if (!isset($_POST['email']) || !isset($_POST['mdp'])) {
        ?>
            <script type="text/javascript"> 
                alert("email ou mot de passe non renseigner");
            </script>
        <?php
        }
        else{
            $bd = self::$bdd->prepare('SELECT * FROM utilisateur where email like ? and mdp like ?');
            $bd->execute(array($_POST['email'], $mdp));
            $response = $bd->fetch();
            if ($response) {
                $_SESSION['idUtilisateur'] = $response['idUtilisateur'];
                $_SESSION['email'] = $response['email'];
                header('Location:index.php?module=Utilisateur&action=afficheProfil');
            } else {
                ?>
                <script type="text/javascript">
                    alert("email ou mot de passe incorrect");
                </script>
                <?php
            }
        }
    }

    public function deconnexion(){
        session_unset();
        header('Location:index.php');
    }   

    public function inscription(){

        $mdp = $_POST['mdp'];
        $mdp2 = $_POST['mdp2'];

        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];

        $sexe = $_POST['sexe'];
        $dateNaissance = $_POST['dateNaissance'];
        $email = $_POST['email'];
        $telephone = $_POST['telephone'];

        $bd = self::$bdd->prepare('SELECT email FROM utilisateur where email like ?');
        $bd->execute(array($email));
        $response = $bd->fetch();
        if ($response) {
            ?>
            <script type="text/javascript">
                alert("L'email existe deja!");
            </script>
            <?php
        }
        else if($_POST['mdp2']!=$_POST['mdp']) {
        ?>
            <script type="text/javascript">
                alert("Les mots de passes ne sont pas identiques, Veuillez réessayer !");
            </script>
        <?php

        }
        else{
            $bd = self::$bdd->prepare('INSERT into utilisateur values(default,?,?,?,?,?,?,?)');
            $bd->execute(array($nom, $prenom , $mdp, $sexe, $dateNaissance, $email, $telephone));
            ?>
            <script type="text/javascript">
                alert("Inscription reussi !");
            </script>
            <?php
        }
    }

}

?>
