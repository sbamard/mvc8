<?php

class AuthentificationModele extends Modele {

    private $parametre;

    public function __construct($parametre) {

        $this->parametre = $parametre;
    }

    public function rechercherUtilisateur(AuthentificationTable $authEnCours) {

        $sql = 'SELECT * FROM ' . P . 'accompagnateur WHERE acc_log = ?';

        $this->idRequete = $this->executeQuery($sql, array($authEnCours->getF_login()));
        $authExistant = $this->idRequete->fetch(PDO::FETCH_ASSOC);

        if ($authEnCours->getF_login() == $authExistant[acc_log] && $authEnCours->getF_motdepasse() == $authExistant[acc_mpa]) {

//Création de la session ! (Connexion à la session
            $_SESSION['login'] = $authEnCours->getF_login();
            $_SESSION['prenomNom'] = $authExistant['acc_pre'] . ' ' . $authExistant['acc_nom'];
            return true;
        }

        AuthentificationTable::setMessageErreur("Authentification Invalide !");
    }

}
