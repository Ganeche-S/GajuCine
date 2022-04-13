<?php
class VueIndex {
	function __construct(){
		ob_start();
	}

	function getAffichage(){
		return ob_get_clean();
	}

    public function result($result){
        if($result){
			echo "<h2>Opération réussite</h2>";
		}
		else{
			echo "<h2>Opération échoué</h2>";
		}
    }
}
?>