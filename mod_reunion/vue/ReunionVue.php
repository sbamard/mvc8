<?php

class ReunionVue {

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

        $this->tpl->assign('piedPage', 'Exercice PHP MVC réalisé by Simon :)');
    }

    public function genererAffichageListe($valeurs) {

        $this->valeurs = $valeurs;

        $this->chargementValeurs();

        $this->tpl->assign('titreGestion', 'Liste des réunions d\'information collective ');

        $this->tpl->assign('message', /* ReunionTable::getMessageSucces() */ '');

        $this->tpl->assign('listeReunions', $this->valeurs);

        $this->tpl->display('mod_reunion/vue/reunionListeVue.tpl');
    }

    public function genererAffichageFiche($valeurs) {

        $this->valeurs = $valeurs;

        $this->chargementValeurs();

        switch ($this->parametre['action']) {

            case 'form_consulter':

                $this->tpl->assign('titreGestion', 'Consultation d\'une réunion');

                $this->tpl->assign('action', 'consulter');

                $this->tpl->assign('comportement', 'disabled');

                $this->tpl->assign('unReunion', $this->valeurs);

                break;

            case 'form_ajouter':
            case 'ajouter':

                $this->tpl->assign('titreGestion', 'Création d\'une réunion ');

                $this->tpl->assign('action', 'ajouter');

                $this->tpl->assign('comportement', '');

                $this->tpl->assign('unReunion', $this->valeurs);

                break;

            case 'form_modifier':
            case 'modifier':

                $this->tpl->assign('titreGestion', 'Modification d\'une réunion');

                $this->tpl->assign('action', 'modifier');

                $this->tpl->assign('comportement', '');

                $this->tpl->assign('unReunion', $this->valeurs);

                break;

            case 'form_supprimer':

                $this->tpl->assign('titreGestion', 'Suppression d\'une réunion');

                $this->tpl->assign('action', 'supprimer');

                $this->tpl->assign('comportement', 'disabled');

                $this->tpl->assign('unReunion', $this->valeurs);

                break;
        }


        $this->tpl->display('mod_reunion/vue/reunionFicheVue.tpl');

        //Fin méthode
    }

}
