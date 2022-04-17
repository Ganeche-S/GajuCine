<?php
if(!defined('CONST_INCLUDE'))die('Accès direct interdit');

class VueUtilisateur extends VueIndex{

    public function __construct(){
        echo '<link rel="stylesheet" type="text/css" href="module/module_Utilisateur/VU.css"/>';
    }

    public function affichageDuProfilUtilisateur($id) {
        echo "<div class =\"Div\">";
        foreach ($id as $key) {
            echo "<h1>" . $key['nom'] . " " . $key['prenom'] . " </h1>";
            echo "<h3>Sexe</h3> " . $key['sexe'];
            echo "<hr>";
            echo "<h3>Date de naissance</h3> " . $key['dateNaissance'];
            echo "<hr>";
            echo "<h3>Email</h3> " . $key['email'];
            echo "<hr>";
            echo "<h3>Numéro de téléphone</h3> " . $key['telephone'];
            echo "<hr>";
        }
        echo "<a href=\"index.php?module=Utilisateur&action=modifProfil\" class=\"divModif\">Modifier le profil</a>";
        echo "</div>";
    }

        public function formulaireUpdateProfil()
        {
            echo "<div class =\"Formulaire\">";
            echo "<form action=\"index.php?action=modifProfilEnCours&module=Utilisateur\" method=\"post\" enctype=\"multipart/form-data\">
    				<label>Entrer l'email : </label><br/>
    			 	<input type=\"text\" name=\"email\"><br/>
    			 	<label>Entrer le numéro de téléphone : </label><br/>
    			 	<input type=\"text\" name=\"telephone\"><br/>";
            echo '<input type="submit" name="submit" value="Modifier">
    			</form>';
            echo "</div>";
        }
}
?>