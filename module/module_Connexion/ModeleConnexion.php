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

        if (!isset($_POST['nom']) || !isset($_POST['prenom']) || !isset($_POST['mdp'])) {
        ?>
            <script type="text/javascript"> 
                alert("nom, prénom ou mot de passe non renseigner");
            </script>
        <?php
        }
        else{
            $bd = self::$bdd->prepare('SELECT * FROM Utilisateur where nom like ? and prenom like ? and mdp like ?');
            $bd->execute(array($_POST['nom'], $_POST['prenom'], $mdp));
            $response = $bd->fetch();
            if ($response) {
                $_SESSION['idUtilisateur'] = $response['idUtilisateur'];
                $_SESSION['nom'] = $response['nom'];
                $_SESSION['prenom'] = $response['prenom'];
                header('Location:index.php');
            } else {
                ?>
                <script type="text/javascript">
                    alert("nom, prénom ou mot de passe incorrect");
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
        $bd = self::$bdd->prepare('SELECT nom, prenom FROM Utilisateur where nom like ? AND prenom like ?');
        $bd->execute(array($nom, $prenom));
        $response = $bd->fetch();
        if ($response) {
            ?>
            <script type="text/javascript">
                alert("Le nom et prénom existe déja !");
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
            $bd = self::$bdd->prepare('INSERT into Utilisateur values(default,?,?,?)');
            $bd->execute(array($nom, $prenom ,$mdp));
        }
    }

}

?>