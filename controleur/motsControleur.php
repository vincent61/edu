<?php

class motsControleur {
	protected $bdd;

	public function __construct($bdd) {
		$this->bdd=$bdd;
	}

	public function getWords() {
		$sth = $this->bdd->prepare('SELECT * FROM mots order by id');
		$sth->execute();
		return $sth->fetchAll();
	}

	public function pushWord($mot) {
		$sth = $this->bdd->prepare('insert into mots(id, valeur) values (null, "'.$mot.'")');
		$sth->execute();
		return $sth->fetchAll();
	}

	public function deleteWord($mot) {
		$sth = $this->bdd->prepare('DELETE FROM mots WHERE valeur= \''.$mot.'\'');
		$sth->execute();
		return $sth->fetchAll();
	}
}
?>