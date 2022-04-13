<?php
if (!defined('CONST_INCLUDE')){
    die('Accès direct interdit');
}
include 'ContConnexion.php';


	$controleur = new ContConnexion();

	
	$action =!isset($_GET['action'])?"":$_GET['action'];


		switch($action){
			case 'form':
					$controleur->formulaire();
					break;
			case 'connexion':
					$controleur->connexion();
					break;
			case 'deconnexion':
					$controleur->deconnexion();	
				break;
       		case 'inscription':
					$controleur->inscription();
				break;
			case 'formInscription':
					$controleur->formulaireInscription();
					break;
			default :
				?>
					<script type="text/javascript"> 
        				alert("Action Inexistante"); 
 		 			</script>
 		 		<?php
				break;
			}
?>
