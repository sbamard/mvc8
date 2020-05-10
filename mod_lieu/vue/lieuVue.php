<?php

/**
 * Description of lieuVue
 *
 * @author tvosgiens
 */
class LieuVue {

	private $parametre; //array
	private $tpl; //objet
	private $valeurs;

	public function __construct($parametre) {

		$this->parametre = $parametre;

		$this->tpl = new Smarty();
	}

	public function chargementValeurs() {

		$this->tpl->assign('titre', 'Gestion Coop\'Emploi');

		$this->tpl->assign('deconnexion', 'Déconnexion');

		$this->tpl->assign('piedPage', 'Exercice PHP MVC réalisé avec un moteur de templates');
	}

	public function genererAffichageListe($valeurs) {

		$this->valeurs = $valeurs;

		$this->chargementValeurs();

		$this->tpl->assign('titreGestion', 'Liste des salles - lieux');

		$this->tpl->assign('message', LieuTable::getMessageSucces());

		$this->tpl->assign('listeLieux', $this->valeurs);

		$this->tpl->display('mod_lieu/vue/lieuListeVue.tpl');
	}

	public function genererAffichageFiche($valeurs) {

		$this->valeurs = $valeurs;

		$this->chargementValeurs();

		switch ($this->parametre['action']) {

			case 'form_consulter':

				$this->tpl->assign('titreGestion', 'Consultation d\'un lieu');

				$this->tpl->assign('action', 'consulter');

				$this->tpl->assign('comportement', 'disabled');

				$this->tpl->assign('leLieu', $this->valeurs);

				break;

			case 'form_ajouter':
			case 'ajouter':

				$this->tpl->assign('titreGestion', 'Création d\'un lieu');

				$this->tpl->assign('action', 'ajouter');

				$this->tpl->assign('comportement', '');

				$this->tpl->assign('leLieu', $this->valeurs);

				break;

			case 'form_modifier':
			case 'modifier':

				$this->tpl->assign('titreGestion', 'Modification d\'un lieu');

				$this->tpl->assign('action', 'modifier');

				$this->tpl->assign('comportement', '');

				$this->tpl->assign('leLieu', $this->valeurs);

				break;

			case 'form_supprimer':

				$this->tpl->assign('titreGestion', 'Suppression d\'un lieu');

				$this->tpl->assign('action', 'supprimer');

				$this->tpl->assign('comportement', 'disabled');

				$this->tpl->assign('leLieu', $this->valeurs);

				break;
		}


		$this->tpl->display('mod_lieu/vue/lieuFicheVue.tpl');

		//Fin méthode
	}

//Fin classe
}
