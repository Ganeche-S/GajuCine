<?php
if (!defined('CONST_INCLUDE')){die('Accès direct interdit');}
require_once('ContFilm.php');

class ModFilm{

	private $controleur;

	public function __construct(){
		$this->controleur = new ContFilm();
		if( isset($_GET['action']) ){
			$choix=htmlspecialchars($_GET['action']);
			switch($choix){
				case "films":
					$this->controleur->listeDesFilms();
					break;
				case "topFilm":
					$this->controleur->topDesFilmsTemps();
					$this->controleur->topDesFilmsProfit();
					break;
                case "recherche":
                    $this->controleur->formRecherche();
                    break;
                case "parNom":
                    $this->controleur->rechercheParNom();
                    break;
                case "parPays":
                    $this->controleur->rechercheParPays();
                    break;
                case "parGenre":
                    $this->controleur->rechercheParGenre();
                    break;
				default:
					?>
						<script type="text/javascript"> 
        					alert("Action Inexistante"); 
 		 				</script>
 		 			<?php
				break;
			}
		}
	}
}

$modRecherche = new ModFilm();

?>