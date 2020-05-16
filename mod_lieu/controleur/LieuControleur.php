<?php

/**
 * Description of lieuControleur
 *
 * @author tvosgiens
 */
class LieuControleur {

	private $parametre; //array
	private $oModele; // objet
	private $oVue; // objet

	public function __construct($parametre) {

		$this->parametre = $parametre;
//Création d'un objet modele
		$this->oModele = new LieuModele($this->parametre);
//Création d'un objet vue
		$this->oVue = new LieuVue($this->parametre);
	}

	public function liste() {

		$valeurs = $this->oModele->getListeLieux();

		$this->oVue->genererAffichageListe($valeurs);
	}

	public function form_consulter() {

		$valeurs = $this->oModele->getUnLieu();

		$this->oVue->genererAffichageFiche($valeurs);
	}

	public function form_ajouter() {

		$prepareLieu = new LieuTable();

		$this->oVue->genererAffichageFiche($prepareLieu);
	}

	public function form_modifier() {

		$valeurs = $this->oModele->getUnLieu();

		$this->oVue->genererAffichageFiche($valeurs);
	}

	public function form_supprimer() {

		$valeurs = $this->oModele->getUnLieu();

		$this->oVue->genererAffichageFiche($valeurs);
	}

	public function ajouter() {

		$controleLieu = new LieuTable($this->parametre);

		if ($controleLieu->getAutorisationBD() == false) {
// ici nous sommes en erreur
			$this->oVue->genererAffichageFiche($controleLieu);
		} else {
// ici l'insertion est possible !
			$this->oModele->addLieu($controleLieu);
//Ici l'objet controleur (oControleur) 
//Il a été créé dans le routeur
			$this->liste();
		}
	}

	public function modifier() {

		$controleLieu = new LieuTable($this->parametre);

		if ($controleLieu->getAutorisationBD() == false) {
// ici nous sommes en erreur
			$this->oVue->genererAffichageFiche($controleLieu);
		} else {
// ici l'édition est possible !
			$this->oModele->editLieu($controleLieu);
//Ici l'objet controleur (oControleur) 
//Il a été créé dans le routeur

			$this->liste();
		}
	}

	public function supprimer() {

		$this->oModele->deleteLieu();

		$this->liste();
	}

}
