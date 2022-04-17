<?php
if (!defined('CONST_INCLUDE')){die('Accès direct interdit');}
include_once('./VueIndex.php');

class VueFilm extends VueIndex{

	public function __construct(){
        echo '<link rel="stylesheet" type="text/css" href="module/module_Film/VF.css"/>';
    }

    public function rechercher(){
    	echo "<div class=\"formulaire\">";
    		?>
            <form action="index.php?module=Film&action=parNom" method="POST">
            		Rechercher un film par nom<br>
    				<input class="form-control mr-sm-2" type="search" placeholder="..." aria-label="Search" name="nom" required="required"><br>
    				<input type="submit" value="Lancer la recherche">
    			</form>
    			<?php
    			echo "<hr>";
    			?>
            <form action="index.php?module=Film&action=parGenre" method="POST">
                Rechercher un film par genre:
                <input type="radio" name="genre" value="Adventure_film" checked>Aventure
                <input type="radio" name="genre" value="Action_film">Action
                <input type="radio" name="genre" value="Comedy_film">Comedie
                <input type="radio" name="genre" value="Mystery_film">Mystere
                </br>
                <input type="submit" name ="submit" value="Lancer la recherche">
            </form>
            <?php
            echo "<hr>";
            ?>
            <form action="index.php?module=Film&action=parPays" method="POST">
                Rechercher un film par pays:
                <input type="radio" name="pays" value="France" checked>France
                <input type="radio" name="pays" value="Japan">Japan
                <input type="radio" name="pays" value="Italy">Italie
                <input type="radio" name="pays" value="Germany">Allemagne
                </br>
                <input type="radio" name="pays" value="China">Chine
                </br>
                <input type="submit" name ="submit" value="Lancer la recherche">
            </form>
    		<?php
    		echo "</div>";
    	}

	public function afficheListeFilms($result){
		echo "<div class=\"block\">";
		echo '<p>Films</p>';
		echo "<hr class = \"haut\">";
        $fields = sparql_field_array( $result );
//         print "<p>Number of rows: ".sparql_num_rows( $result )." results.</p>";
        print "<table class='example_table'>";
        print "<tr>";
        foreach( $fields as $field )
        {
            print "<th>$field</th>";
        }
        print "</tr>";
        while( $row = sparql_fetch_array( $result ) )
        {
            print "<tr>";
            foreach( $fields as $field )
            {
//                 print "<td>$row[$field]</td>";
                    if($field == "image") {
                         echo "<td>";
                         echo "<img src=".$row[$field]." onerror=\"this.onerror=null; this.src='./images/image-not-found.png'\" class=\"cat\">";
                         echo "</td>";
                    }
                    if($field == "name") {
                         echo "<td>$row[$field]</td>";
                    }
                    if($field == "abstract") {
                        echo "<td>$row[$field]</td>";
                    }

            }
            print "</tr>";
        }
        print "</table>";
		echo "<hr class = \"bas\">";
		echo "</div>";
	}

    public function afficheTopListeFilmsTime($result){
        echo "<div class=\"blockTopFilmT\">";
        echo '<p>Top 5 des films les plus longs</p>';
        echo "<hr class = \"haut\">";
        $fields = sparql_field_array( $result );
        print "<table class='example_table'>";
        print "<tr>";
        foreach( $fields as $field )
        {
            print "<th>$field</th>";
        }
        print "</tr>";
        while( $row = sparql_fetch_array( $result ) )
        {
            print "<tr>";
            foreach( $fields as $field )
            {
                    if($field == "image") {
                         echo "<td>";
                         echo "<img src=".$row[$field]." onerror=\"this.onerror=null; this.src='./images/image-not-found.png'\" class=\"cat\">";
                         echo "</td>";
                    }
                    if($field == "name") {
                         echo "<td>$row[$field]</td>";
                    }
                    if($field == "abstract") {
                        echo "<td>$row[$field]</td>";
                    }
            }
            print "</tr>";
        }
        print "</table>";
        echo "<hr class = \"bas\">";
        echo "</div>";
    }

    public function afficheTopListeFilmsProfit($result){
        echo "<div class=\"blockTopFilmP\">";
        echo '<p>Top 5 des films avec le plus de profit</p>';
        echo "<hr class = \"haut\">";
        $fields = sparql_field_array( $result );
        print "<table class='example_table'>";
        print "<tr>";
        foreach( $fields as $field )
        {
            print "<th>$field</th>";
        }
        print "</tr>";
        while( $row = sparql_fetch_array( $result ) )
        {
            print "<tr>";
            foreach( $fields as $field )
            {
                    if($field == "image") {
                         echo "<td>";
                         echo "<img src=".$row[$field]." onerror=\"this.onerror=null; this.src='./images/image-not-found.png'\" class=\"cat\">";
                         echo "</td>";
                    }
                    if($field == "name") {
                         echo "<td>$row[$field]</td>";
                    }
                    if($field == "abstract") {
                        echo "<td>$row[$field]</td>";
                    }
                    if($field == "time") {
                        echo "<td>$row[$field]</td>";
                    }

            }
            print "</tr>";
        }
        print "</table>";
        echo "<hr class = \"bas\">";
        echo "</div>";
    }
}
?>