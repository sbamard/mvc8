<?php

abstract class Modele {

	private $db; // Object

	protected function executeQuery($sql, $parameter = NULL) {
		
		if ($parameter == NULL) {
			
			$result = $this->getBD()->query($sql); //Requête simple
			
		} else {

			$result = $this->getBD()->prepare($sql); // requête préparée
			
			$result->execute($parameter);
		}

		return $result;
	}

	private function getBD() {
		

		if ($this->db == NULL) {

			$this->db = new PDO('mysql:host=' . SERVEUR . ';dbname=' . BASE, NOM, PASSE, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8", PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
			
		}
		
		return $this->db;
	}

}
