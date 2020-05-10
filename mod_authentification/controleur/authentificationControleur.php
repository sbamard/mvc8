<?php

class AuthentificationControleur {

    private $parametre; //array
    private $oModele; // objet
    private $oVue; // objet

    public function __construct($parametre) {

        $this->parametre = $parametre;
//Création d'un objet modele
        $this->oModele = new AuthentificationModele($this->parametre);
//Création d'un objet vue
        $this->oVue = new AuthentificationVue($this->parametre);
    }

    public function form_connexion() {

        $prepareAuthentification = new AuthentificationTable($this->parametre);

        $this->oVue->genererAffichageFiche($prepareAuthentification);
    }

    public function connexion() {

        $controleAuthentification = new AuthentificationTable($this->parametre);

        if ($controleAuthentification->getAutorisationSession() == false || $this->oModele->rechercherUtilisateur($controleAuthentification) == false) {
            //Erreur on repropose le formulaire (la fiche)

            $this->oVue->genererAffichageFiche($controleAuthentification);
        } else {
            //Sinon on lui donne accès
            header('location:index.php');
        }
    }

    public function deconnexion() {
        session_destroy();
        $_SESSION = array();
        header('location:index.php');
    }

}
