<?php
if(!defined('CONST_INCLUDE'))die('Accès direct interdit');
require_once('./ConnexionBD.php');

class ModeleUtilisateur extends ConnexionBD{

	private $requestPrepare;
	private $request;
	private $arg;

	public function __construct(){
		parent::initConnexion();
		$this->arg = array();
	}

	public function utili(){
		$idUtilisateur = $_SESSION['idUtilisateur'];
		$this->request = 'SELECT * FROM utilisateur WHERE idUtilisateur=?';
		$this->arg = array($idUtilisateur);
		$this->requestPrepare = self::$bdd->prepare($this->request);
		$this->requestPrepare->execute($this->arg);
		return $this->requestPrepare->fetchAll();
	}

    public function modifProfil()
    {
        $this->vue->formulaireUpdateProfil();
    }

    public function updateProfil()
    {
        $idUtilisateur = $_SESSION['idUtilisateur'];
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
            return;
        }
        else if(!empty($_POST['email']) && !empty($_POST['telephone'])) {
            $req = self::$bdd->prepare("UPDATE utilisateur SET email=?, telephone=? WHERE idUtilisateur = ?");
            $req->execute(array($email, $telephone, $idUtilisateur));
        } else if (!empty($_POST['email'])) {
            $req = self::$bdd->prepare("UPDATE utilisateur SET email=? WHERE idUtilisateur = ?");
            $req->execute(array($email, $idUtilisateur));
        } else if (!empty($_POST['telephone'])) {
            $req = self::$bdd->prepare("UPDATE utilisateur SET telephone=? WHERE idUtilisateur = ?");
            $req->execute(array($telephone, $idUtilisateur));
        }
    }

}
?>
