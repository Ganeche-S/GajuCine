<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<?php
if (!defined('CONST_INCLUDE')){die('Accès direct interdit');}
include_once('./VueIndex.php');

class VueFilm extends VueIndex{

	public function __construct(){
        echo '<link rel="stylesheet" type="text/css" href="module/module_Film/style_film.css"/>';
    }

    public function rechercher(){
        echo '<center>
            <div class="container">
                <div class="row">
                    <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                        <div class="card border-0 shadow rounded-3 my-5">
                            <div class="card-body p-4 p-sm-5">';
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
                            echo "</div>
                        </div>
                    </div>
                </div>
            </div>
        </center>";
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
