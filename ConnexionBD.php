<?php

class ConnexionBD{

	protected static $bdd;

	public function __construct(){}

	public static function initConnexion(){
		$db_host = 'localhost';
		$db_name = 'gajucine_bd';
		$user = 'root';
		$password = '';
		$dns = "mysql:host=".$db_host."; dbname=".$db_name.";charset=utf8";
	
		try{
			self::$bdd = new PDO($dns,$user,$password);
		}catch(PDOException $e){
			echo $e->getMessage();
		}
		}}


?>