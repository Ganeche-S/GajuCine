<?php
if (!defined('CONST_INCLUDE')){die('Accès direct interdit');}
// require_once('./ConnexionBD.php');
require_once( "sparqllib.php" );

class ModeleFilm {

	public function __construct(){
		$this->db = sparql_connect( "https://dbpedia.org/sparql" );
	}


	public function listeFilms(){
        if( !$this->db ) { print sparql_errno() . ": " . sparql_error(). "\n"; exit; }
        sparql_ns( "foaf","http://xmlns.com/foaf/0.1/" );

        $sparql = "
        SELECT DISTINCT  ?image, ?name, ?abstract
        WHERE
         {
            ?film dbo:thumbnail ?image.
            ?film rdfs:label ?name .
            ?film rdfs:comment ?abstract .
            ?film gold:hypernym dbr:Film .
            FILTER ( LANG ( ?abstract ) = 'fr' ).
            FILTER ( LANG ( ?name ) = 'fr' ).
          }
          LIMIT 100
             ";
        $result = sparql_query( $sparql );
        if( !$result ) { print sparql_errno() . ": " . sparql_error(). "\n"; exit; }

        return $result;
	}

    public function listeFilmsParNom($result){
        if( !$this->db ) { print sparql_errno() . ": " . sparql_error(). "\n"; exit; }
        sparql_ns( "foaf","http://xmlns.com/foaf/0.1/" );
        $sparql = "
        SELECT DISTINCT  ?image, ?name, ?abstract
        WHERE
         {
            ?film dbo:thumbnail ?image.
            ?film rdfs:label ?name .
            ?film rdfs:comment ?abstract .
            ?film gold:hypernym dbr:Film .
            FILTER ( LANG ( ?abstract ) = 'fr' ).
            FILTER ( LANG ( ?name ) = 'fr' ).
            FILTER CONTAINS(?name,'".$result."')
          }
          LIMIT 100
             ";
        $result = sparql_query( $sparql );
        if( !$result ) { print sparql_errno() . ": " . sparql_error(). "\n"; exit; }

        return $result;
    }
    public function listeFilmsParGenre($result){
        if( !$this->db ) { print sparql_errno() . ": " . sparql_error(). "\n"; exit; }
        sparql_ns( "foaf","http://xmlns.com/foaf/0.1/" );
        $sparql = "
        SELECT DISTINCT  ?image, ?name, ?abstract
        WHERE
         {
            ?film dbo:thumbnail ?image.
            ?film rdfs:label ?name .
            ?film rdfs:comment ?abstract .
            ?film gold:hypernym dbr:Film .
            ?film dbo:wikiPageWikiLink dbr:".$result." .
            FILTER ( LANG ( ?abstract ) = 'fr' ).
            FILTER ( LANG ( ?name ) = 'fr' ).
         }
             ";
        $result = sparql_query( $sparql );
        if( !$result ) { print sparql_errno() . ": " . sparql_error(). "\n"; exit; }

        return $result;
    }

    public function listeFilmsParPays($result){
        if( !$this->db ) { print sparql_errno() . ": " . sparql_error(). "\n"; exit; }
        sparql_ns( "foaf","http://xmlns.com/foaf/0.1/" );
        $sparql = "
        SELECT DISTINCT  ?image, ?name, ?abstract
        WHERE
         {
            ?film dbo:thumbnail ?image.
            ?film rdfs:label ?name .
            ?film rdfs:comment ?abstract .
            ?film gold:hypernym dbr:Film .
            ?film dbp:country ?country.
            ?country foaf:name '".$result."'@en.
            FILTER ( LANG ( ?abstract ) = 'fr' ).
            FILTER ( LANG ( ?name ) = 'fr' ).
         }
             ";
        $result = sparql_query( $sparql );
        if( !$result ) { print sparql_errno() . ": " . sparql_error(). "\n"; exit; }

        return $result;
    }

    public function listeFilmsParTemps(){
        if( !$this->db ) { print sparql_errno() . ": " . sparql_error(). "\n"; exit; }
        sparql_ns( "foaf","http://xmlns.com/foaf/0.1/" );

        $sparql = "
        SELECT DISTINCT  ?image, ?name, ?abstract
        WHERE
         {
            ?film dbo:thumbnail ?image.
            ?film rdfs:label ?name .
            ?film rdfs:comment ?abstract .
            ?film dbo:runtime ?time.
            ?film gold:hypernym dbr:Film .
            FILTER ( LANG ( ?abstract ) = 'fr' ).
            FILTER ( LANG ( ?name ) = 'fr' ).
          } ORDER BY DESC (?time)
            LIMIT 5
             ";
        $result = sparql_query( $sparql );
        if( !$result ) { print sparql_errno() . ": " . sparql_error(). "\n"; exit; }

        return $result;
    }

    public function listeFilmsParProfit(){
        if( !$this->db ) { print sparql_errno() . ": " . sparql_error(). "\n"; exit; }
        sparql_ns( "foaf","http://xmlns.com/foaf/0.1/" );

        $sparql = "
        SELECT DISTINCT  ?image, ?name, ?abstract
        WHERE
         {
            ?film dbo:thumbnail ?image.
            ?film rdfs:label ?name .
            ?film rdfs:comment ?abstract .
            ?film dbo:gross ?budget.
            ?film gold:hypernym dbr:Film .
            FILTER ( LANG ( ?abstract ) = 'fr' ).
            FILTER ( LANG ( ?name ) = 'fr' ).
          } ORDER BY DESC(?budget)
            LIMIT 5
             ";
        $result = sparql_query( $sparql );
        if( !$result ) { print sparql_errno() . ": " . sparql_error(). "\n"; exit; }

        return $result;
    }
} 
?>