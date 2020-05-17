<?php

class ReunionTable
{

    // 1 Déclarer les propriétés
    private $reu_ide = "";
    private $reu_dat = "";
    private $reu_heu = "";
    private $reu_dur = "";
    private $reu_cap = "";
    private $reu_pre = "";
    private $reu_pub = "";
    private $reu_nbr = "";

    private $acc_ide = "";
    private $acc_nom = "";

    private $lie_ide = "";
    private $lie_nom = "";

    private $autorisationBD = true;
    private static $messageErreur = "";
    private static $messageSucces = "";

    // 2 Importer la méthode hydrater
    public function hydrater(array $row)
    {

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

    public function __construct($data = null)
    {

        if ($data != null) {

            $this->hydrater($data);
        }
    }

    // 3 Getters + Setters : ALT + INSERT
    // =========== GETTERS =================

    function getReu_ide()
    {
        return $this->reu_ide;
    }

    function getReu_dat()
    {
        return $this->reu_dat;
    }

    function getReu_heu()
    {
        return $this->reu_heu;
    }

    function getReu_dur()
    {
        return $this->reu_dur;
    }

    function getReu_cap()
    {
        return $this->reu_cap;
    }

    function getReu_pre()
    {
        return $this->reu_pre;
    }

    function getReu_pub()
    {
        return $this->reu_pub;
    }

    function getAcc_ide()
    {
        return $this->acc_ide;
    }
    function getAcc_nom()
    {
        return $this->acc_nom;
    }
    function getLie_ide()
    {
        return $this->lie_ide;
    }
    function getLie_nom()
    {
        return $this->lie_nom;
    }
    function getReu_nbr()
    {
        return $this->reu_nbr;
    }

    // =========== SETTERS =================

    function setReu_ide($reu_ide)
    {

        $this->reu_ide = $reu_ide;
    }

    function setReu_dat($reu_dat)
    {
        if (empty($reu_dat)) {
            self::setMessageErreur("La date est invalide");
            $this->setAutorisationBD(false);
        }
        $this->reu_dat = $reu_dat;
    }

    function setReu_heu($reu_heu)
    {
        if (empty($reu_heu) || $reu_heu < 6 ) {
            self::setMessageErreur("Il est trop tôt !");
            $this->setAutorisationBD(false);
        }
        elseif (empty($reu_heu) || $reu_heu > 19 ) {
            self::setMessageErreur("Il est trop tard !");
            $this->setAutorisationBD(false);
        }
        $this->reu_heu = $reu_heu;
    }

    function setReu_dur($reu_dur)
    {
        if (empty($reu_dur) || $reu_dur > 3) {
            self::setMessageErreur("La réunion est trop longue");
            $this->setAutorisationBD(false);
        }
        $this->reu_dur = $reu_dur;
    }

    function setLie_ide($lie_ide)
    {
        $this->lie_ide = $lie_ide;
    }
    function setLie_nom($lie_nom)
    {
        if (!is_string($lie_nom) || ctype_space($lie_nom) || empty($lie_nom)) {
            self::setMessageErreur("Le lieu est invalide");
            $this->setAutorisationBD(false);
        }
        $this->lie_nom = $lie_nom;
    }

    function setReu_cap($reu_cap)
    {
        if (empty($reu_cap) || $reu_cap > 300 || $reu_cap < 0) {
            self::setMessageErreur("La salle ne convient pas");
            $this->setAutorisationBD(false);
        }

        $this->reu_cap = $reu_cap;
    }

    function setReu_pre($reu_pre)
    {
        $this->reu_pre = $reu_pre;
    }

    function setAcc_ide($acc_ide)
    {
        $this->acc_ide = $acc_ide;
    }

    function setAcc_nom($acc_nom)
    {
        if ($acc_nom != $this->acc_nom) {
            self::setMessageErreur("Cet accompagnateur n'existe pas");
            $this->setAutorisationBD(false);
        }
        $this->acc_nom = $acc_nom;
    }

    function setReu_pub($reu_pub)
    {
        $this->reu_pub = $reu_pub;
    }
    function setReu_nbr($reu_nbr)
    {
        if ($reu_nbr > $this->reu_cap) {
            self::setMessageErreur("Capacité maximale atteinte");
            $this->setAutorisationBD(false);
        }
        $this->reu_nbr = $reu_nbr;
    }

    /*     * *************AutorisationBD****************** */

    function getAutorisationBD()
    {
        return $this->autorisationBD;
    }

    function setAutorisationBD($autorisationBD)
    {
        $this->autorisationBD = $autorisationBD;
    }

    /*     * ********getMessageErreur ou getMessageSucces**************************** */

    public static function getMessageErreur()
    {
        return self::$messageErreur;
    }

    public static function getMessageSucces()
    {
        return self::$messageSucces;
    }

    public static function setMessageErreur($msg)
    {
        self::$messageErreur = self::$messageErreur . $msg . "<br>";
    }

    public static function setMessageSucces($msg)
    {
        self::$messageSucces = self::$messageSucces . $msg . "<br>";
    }

}
