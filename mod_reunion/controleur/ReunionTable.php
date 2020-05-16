<?php

class ReunionTable {

    // 1 Déclarer les propriétés
    private $acc_ide = "";
    private $acc_pre = "";
    private $acc_nom = "";
    private $acc_tel = "";
    private $acc_mai = "";
    private $acc_spe = "";
    private $acc_log = "";
    private $acc_mpa = "coopemploi";
    private $autorisationBD = true;
    private static $messageErreur = "";
    private static $messageSucces = "";

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

    // 3 Getters + Setters : ALT + INSERT
    // =========== GETTERS =================

    function getAcc_ide() {
        return $this->acc_ide;
    }

    function getAcc_pre() {
        return $this->acc_pre;
    }

    function getAcc_nom() {
        return $this->acc_nom;
    }

    function getAcc_tel() {
        return $this->acc_tel;
    }

    function getAcc_mai() {
        return $this->acc_mai;
    }

    function getAcc_spe() {
        return $this->acc_spe;
    }

    function getAcc_log() {
        return $this->acc_log;
    }

    function getAcc_mpa() {
        return $this->acc_mpa;
    }

    // =========== SETTERS =================

    function setAcc_ide($acc_ide) {

        $this->acc_ide = $acc_ide;
    }

    function setAcc_nom($acc_nom) {

        if (!is_string($acc_nom) || ctype_space($acc_nom) || empty($acc_nom)) {
            self::setMessageErreur("Le nom est invalide");
            $this->setAutorisationBD(false);
        }

        $this->acc_nom = $acc_nom;
    }

    function setAcc_pre($acc_pre) {

        if (!is_string($acc_pre) || ctype_space($acc_pre) || empty($acc_pre)) {
            self::setMessageErreur("Le prénom est invalide");
            $this->setAutorisationBD(false);
        }

        $this->acc_pre = $acc_pre;
    }

    function setAcc_tel($acc_tel) {

        if (ctype_space($acc_tel) || empty($acc_tel)) {
            self::setMessageErreur("Le téléphone est invalide");
            $this->setAutorisationBD(false);
        }

        $this->acc_tel = $acc_tel;
    }

    function setAcc_mai($acc_mai) {

        if (!is_string($acc_mai) || ctype_space($acc_mai) || empty($acc_mai)) {
            self::setMessageErreur("L'adresse mail semble invalide");
            $this->setAutorisationBD(false);
        }

        $this->acc_mai = $acc_mai;
    }

    function setAcc_spe($acc_spe) {

        $this->acc_spe = $acc_spe;
    }

    function setAcc_log($acc_log) {

        if (!is_string($acc_log) || ctype_space($acc_log) || empty($acc_log)) {
            self::setMessageErreur("Le login est invalide");
            $this->setAutorisationBD(false);
        }

        $this->acc_log = $acc_log;
    }

    function setAcc_mpa() {

        $pw = $this->acc_mpa;
        //technique du salade /
        //définir une variable à gauche et à droite
        $gauche = 'ar30&y%';
        $droite = 'tk!@';

        $this->acc_mpa = hash('ripemd128', "$gauche$pw$droite");
    }

    /*     * *************AutorisationBD****************** */

    function getAutorisationBD() {
        return $this->autorisationBD;
    }

    function setAutorisationBD($autorisationBD) {
        $this->autorisationBD = $autorisationBD;
    }

    /*     * ********getMessageErreur ou getMessageSucces**************************** */

    public static function getMessageErreur() {
        return self::$messageErreur;
    }

    public static function getMessageSucces() {
        return self::$messageSucces;
    }

    public static function setMessageErreur($msg) {
        self::$messageErreur = self::$messageErreur . $msg . "<br>";
    }

    public static function setMessageSucces($msg) {
        self::$messageSucces = self::$messageSucces . $msg . "<br>";
    }

}
