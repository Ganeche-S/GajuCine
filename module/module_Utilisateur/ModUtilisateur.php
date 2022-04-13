<?php
if(!defined('CONST_INCLUDE'))die('Accès direct interdit');
require_once('ContUtilisateur.php');

class ModUtilisateur{

	private $controleur;

	public function __construct(){
		$this->controleur = new ContUtilisateur();
		if( isset($_SESSION['idUtilisateur']) ){
			if( isset($_GET['action']) ){
				$choix=htmlspecialchars($_GET['action']);
				switch($choix){
                    case "afficheProfil":
                    	$this->controleur->profil();
                    break;
                    case "modifProfil":
                        $this->controleur->modifProfil();
                        break;
                    case "modifProfilEnCours":
                        $this->controleur->modifProfilEnCours();
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
		else{
		?>
			<script type="text/javascript"> 
       			alert("Non Connecter"); 
 		 	</script>
 		<?php
		}
	}
}

$modUtilisateur = new ModUtilisateur();

?>