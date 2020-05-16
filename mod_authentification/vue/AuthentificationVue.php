<?php

class AuthentificationVue {

    private $parametre; //array
    private $tpl; //objet
    private $valeurs;

    public function __construct($parametre) {

        $this->parametre = $parametre;

        $this->tpl = new Smarty();
    }

    public function chargementValeurs() {

        $this->tpl->assign('titre', 'Gestion Coop\'Emploi');

        $this->tpl->assign('titreGestion', 'Authentification');

        $this->tpl->assign('message', AuthentificationTable::getMessageErreur());

        $this->tpl->assign('deconnexion', 'Déconnexion');

        $this->tpl->assign('piedPage', 'Exercice PHP MVC réalisé avec un moteur de templates');
    }

    function genererAffichageFiche($valeurs = null) {

        $this->valeurs = $valeurs;

        $this->chargementValeurs();

        $this->tpl->assign('authentification', $this->valeurs);

        $this->tpl->assign('action', 'connexion');

        $this->tpl->display("mod_authentification/vue/authentificationVue.tpl");
    }

}
