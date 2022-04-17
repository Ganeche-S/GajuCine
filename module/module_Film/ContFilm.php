<?php
if (!defined('CONST_INCLUDE')){die('Accès direct interdit');}
require_once('ModeleFilm.php');
require_once('VueFilm.php');

class ContFilm{

	private $modele;
	private $vue;

	public function __construct(){
		$this->modele = new ModeleFilm();
		$this->vue = new VueFilm();
	}

	public function listeDesFilms(){
		$this->vue->afficheListeFilms($this->modele->listeFilms());
	}

    public function topDesFilmsTemps(){
        $this->vue->afficheTopListeFilmsTime($this->modele->listeFilmsParTemps());
    }

    public function topDesFilmsProfit(){
        $this->vue->afficheTopListeFilmsProfit($this->modele->listeFilmsParProfit());
    }

    public function formRecherche(){
        $this->vue->rechercher();
    }

    public function rechercheParNom(){
        $nom=htmlspecialchars($_POST['nom']);
        $this->vue->afficheListeFilms($this->modele->listeFilmsParNom($nom));
    }

    public function rechercheParGenre(){
        $genre=htmlspecialchars($_POST['genre']);
        $this->vue->afficheListeFilms($this->modele->listeFilmsParGenre($genre));
    }

    public function rechercheParPays(){
        $pays=htmlspecialchars($_POST['pays']);
		$this->vue->afficheListeFilms($this->modele->listeFilmsParPays($pays));
    }

}
?>