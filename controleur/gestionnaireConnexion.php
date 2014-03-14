<?php

class gestionnaireConnexion {
	protected $bdd;
	public function __construct() {
		try {
			$user = 'root';
			$pass = '';
			$this->bdd = new PDO('mysql:host=localhost;dbname=edu', $user, $pass);

		} catch (PDOException $e) {
			print "Erreur !: " . $e->getMessage() . "<br/>";
			die();
		}
	}


	public function getBdd() {
		return $this->bdd;
	}
}
?>