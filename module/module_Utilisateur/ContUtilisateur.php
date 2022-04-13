<?php
if(!defined('CONST_INCLUDE'))die('Accès direct interdit');
require_once('ModeleUtilisateur.php');
require_once('VueUtilisateur.php');

class ContUtilisateur{

	private $modele;
	private $vue;

	public function __construct(){
		$this->modele = new ModeleUtilisateur();
		$this->vue = new VueUtilisateur();
	}
    
    public function profil(){
		$this->vue->affichageDuProfilUtilisateur($this->modele->utili());
	}

    public function modifProfil()
    {
        $this->vue->formulaireUpdateProfil();
    }

    public function modifProfilEnCours()
    {
        $this->modele->updateProfil();
        header('Location:index.php?module=Utilisateur&action=afficheProfil');
    }

   
}
?>