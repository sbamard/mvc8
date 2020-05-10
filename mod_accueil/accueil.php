<?php

/**
 * Routeur du module accueil
 */
class Accueil {

	private $parametre = array();
	private $oControleur; // Attention cette propriété est un objet !

	public function __construct($parametre) {

		$this->parametre = $parametre;

		$this->oControleur = new AccueilControleur();
	}

	public function choixAction() {
		// Par défaut sans action de précisée
		// affichage par défaut de la liste
		$this->oControleur->liste();
	}

}
