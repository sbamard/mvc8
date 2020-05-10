<?php

/**
 * Description of autoloader
 *
 * @author tvosgiens
 */
class Autoloader {

    //put your code here

    public static function inscrire() {

        spl_autoload_register(array(__CLASS__, 'autoload'));
    }

    public static function autoload($maClasse) {
        // $maClasse accepte le nom de la classe : Accueil (routeur du module accueil),
        // Reunion (routeur, controleur, modele,...)
        $chemins = array(
            'mod_accueil/',
            'mod_accueil/controleur/',
            'mod_accueil/modele/',
            'mod_accueil/vue/',
            'mod_lieu/',
            'mod_lieu/controleur/',
            'mod_lieu/modele/',
            'mod_lieu/vue/',
            'mod_accompagnateur/',
            'mod_accompagnateur/controleur/',
            'mod_accompagnateur/modele/',
            'mod_accompagnateur/vue/',
            'mod_authentification/',
            'mod_authentification/controleur/',
            'mod_authentification/modele/',
            'mod_authentification/vue/'
        );

        foreach ($chemins as $chemin) {
            if (file_exists($chemin . $maClasse . '.php')) {
                require_once($chemin . $maClasse . '.php');
                return;
            }
        }
    }

}
