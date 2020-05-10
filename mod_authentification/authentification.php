<?php

class Authentification {

    private $parametre = array();
    private $oControleur; // objet

    public function __construct($parametre) {

        $this->parametre = $parametre;
        $this->oControleur = new AuthentificationControleur($this->parametre);
    }

    public function choixAction() {

        if (isset($this->parametre['action'])) {

            switch ($this->parametre['action']) {

                case 'connexion':

                    $this->oControleur->connexion();
                    break;

                case 'deconnexion':

                    $this->oControleur->deconnexion();
                    break;
            }
        } else {

            $this->oControleur->form_connexion();
        }
    }

}
