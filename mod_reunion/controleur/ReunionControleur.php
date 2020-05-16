<?php

class ReunionControleur {

    private $parametre; //array
    private $oModele; // objet
    private $oVue; // objet

    public function __construct($parametre) {

        $this->parametre = $parametre;
//Création d'un objet modele
        $this->oModele = new ReunionModele($this->parametre);
//Création d'un objet vue
        $this->oVue = new ReunionVue($this->parametre);
    }

    public function liste() {

        $valeurs = $this->oModele->getListeReunions();

        $this->oVue->genererAffichageListe($valeurs);
    }

    public function form_consulter() {

        $valeurs = $this->oModele->getUnReunion();

        $this->oVue->genererAffichageFiche($valeurs);
    }

    public function form_ajouter() {

        $prepareReunion = new ReunionTable();

        $this->oVue->genererAffichageFiche($prepareReunion);
    }

    public function form_modifier() {

        $valeurs = $this->oModele->getUnReunion();

        $this->oVue->genererAffichageFiche($valeurs);
    }

    public function form_supprimer() {

        $valeurs = $this->oModele->getUnReunion();

        $this->oVue->genererAffichageFiche($valeurs);
    }

    public function ajouter() {

        $controleReunion = new ReunionTable($this->parametre);

        if ($controleReunion->getAutorisationBD() == false) {
// ici nous sommes en erreur
            $this->oVue->genererAffichageFiche($controleReunion);
        } else {
// ici l'insertion est possible !
            $this->oModele->addReunion($controleReunion);
//Ici l'objet controleur (oControleur)
//Il a été créé dans le routeur
            $this->liste();
        }
    }

    public function modifier() {

        $controleReunion = new ReunionTable($this->parametre);

        if ($controleReunion->getAutorisationBD() == false) {
// ici nous sommes en erreur
            $this->oVue->genererAffichageFiche($controleReunion);
        } else {
// ici l'édition est possible !
            $this->oModele->editReunion($controleReunion);
//Ici l'objet controleur (oControleur)
//Il a été créé dans le routeur

            $this->liste();
        }
    }

    public function supprimer() {

        $this->oModele->deleteReunion();

        $this->liste();
    }

}
