<?php
include 'VueConnexion.php';
include 'ModeleConnexion.php';
if (!defined('CONST_INCLUDE')){
    die('Accès direct interdit');
}
	class ContConnexion{
        
		protected $ModeleConnexion;
		protected $VueConnexion;
        
		public function __construct(){
			$this->ModeleConnexion = new ModeleConnexion();
			$this->VueConnexion = new VueConnexion();
		}
        
		function formulaire() {
			$this->VueConnexion->afficheForm();
		}

		function connexion() {
			$this->ModeleConnexion->verifConnexion();
		}

		function deconnexion(){
			$this->ModeleConnexion->deconnexion();
		}
        
		function formulaireInscription(){
			$this->VueConnexion->afficheFormInscription();
		}

		function Inscription(){
			$this->ModeleConnexion->Inscription();
                
		}
	}

?>