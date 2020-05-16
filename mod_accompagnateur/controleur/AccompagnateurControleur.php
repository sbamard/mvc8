<?php

class AccompagnateurControleur {

    private $parametre; //array
    private $oModele; // objet
    private $oVue; // objet

    public function __construct($parametre) {

        $this->parametre = $parametre;
//Création d'un objet modele
        $this->oModele = new AccompagnateurModele($this->parametre);
//Création d'un objet vue
        $this->oVue = new AccompagnateurVue($this->parametre);
    }

    public function liste() {

        $valeurs = $this->oModele->getListeAccompagnateurs();

        $this->oVue->genererAffichageListe($valeurs);
    }

    public function form_consulter() {

        $valeurs = $this->oModele->getUnAccompagnateur();

        $this->oVue->genererAffichageFiche($valeurs);
    }

    public function form_ajouter() {

        $prepareAccompagnateur = new AccompagnateurTable();

        $this->oVue->genererAffichageFiche($prepareAccompagnateur);
    }

    public function form_modifier() {

        $valeurs = $this->oModele->getUnAccompagnateur();

        $this->oVue->genererAffichageFiche($valeurs);
    }

    public function form_supprimer() {

        $valeurs = $this->oModele->getUnAccompagnateur();

        $this->oVue->genererAffichageFiche($valeurs);
    }

    public function ajouter() {

        $controleAccompagnateur = new AccompagnateurTable($this->parametre);

        if ($controleAccompagnateur->getAutorisationBD() == false) {
// ici nous sommes en erreur
            $this->oVue->genererAffichageFiche($controleAccompagnateur);
        } else {
// ici l'insertion est possible !
            $this->oModele->addAccompagnateur($controleAccompagnateur);
//Ici l'objet controleur (oControleur)
//Il a été créé dans le routeur
            $this->liste();
        }
    }

    public function modifier() {

        $controleAccompagnateur = new AccompagnateurTable($this->parametre);

        if ($controleAccompagnateur->getAutorisationBD() == false) {
// ici nous sommes en erreur
            $this->oVue->genererAffichageFiche($controleAccompagnateur);
        } else {
// ici l'édition est possible !
            $this->oModele->editAccompagnateur($controleAccompagnateur);
//Ici l'objet controleur (oControleur)
//Il a été créé dans le routeur

            $this->liste();
        }
    }

    public function supprimer() {

        $this->oModele->deleteAccompagnateur();

        $this->liste();
    }

}
