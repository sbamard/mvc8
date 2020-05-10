<?php

class AuthentificationTable {

    //1 Déclaration des propriétés
    private $f_login = "";
    private $f_motdepasse = "";
    private $autorisationSession = true;
    private static $messageErreur = "";

    // 2 Importer la méthode hydrater
    public function hydrater(array $row) {

        foreach ($row as $k => $v) {
            // Concaténation : nom de la méthode setter à appeler
            $setter = 'set' . ucfirst($k);
            // fonction prend 2 paramètres : l'objet en cours et le nom de la méthode
            if (method_exists($this, $setter)) {
                // Invoquer la méthode
                $this->$setter($v);
            }
        }
    }

    public function __construct($data = null) {

        if ($data != null) {

            $this->hydrater($data);
        }
    }

    function getF_login() {
        return $this->f_login;
    }

    function getF_motdepasse() {
        return $this->f_motdepasse;
    }

    function setF_login($f_login) {

        if (ctype_space($f_login) || empty($f_login)) {
            self::setMessageErreur("Authentification invalide");
            $this->setAutorisationBD(false);
        }

        $this->f_login = $f_login;
    }

    function setF_motdepasse($f_motdepasse) {

        if (!ctype_space($f_motdepasse) && !empty($f_motdepasse)) {

            $gauche = 'ar30&y%';
            $droite = 'tk!@';
            $this->f_motdepasse = hash('ripemd128', "$gauche$f_motdepasse$droite");
        } else {

            $this->f_motdepasse = "";
        }
    }

    // =========== AUTORISATION =================

    function getAutorisationSession() {
        return $this->autorisationSession;
    }

    function setAutorisationSession($autorisationSession) {
        $this->autorisationSession = $autorisationSession;
    }

    // =========== MESSAGE ERREUR =================

    static function getMessageErreur() {
        return self::$messageErreur;
    }

    static function setMessageErreur($messageErreur) {
        self::$messageErreur = $messageErreur;
    }

}
