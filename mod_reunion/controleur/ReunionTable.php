<?php

class ReunionTable
{

    // 1 Déclarer les propriétés
    private $reu_ide = "";
    private $reu_dat = "";
    private $reu_heu = "";
    private $reu_dur = "";
    private $reu_lie = "";
    private $reu_cap = "";
    private $reu_pre = "";
    private $reu_acc = "";
    private $reu_pub = "";
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

    function getReu_lie()
    {
        return $this->reu_lie;
    }

    function getReu_cap()
    {
        return $this->reu_cap;
    }

    function getReu_pre()
    {
        return $this->reu_pre;
    }

    function getReu_acc()
    {
        return $this->reu_acc;
    }

    function getReu_pub()
    {
        return $this->reu_pub;
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
        if (empty($reu_heu)) {
            self::setMessageErreur("L'heure de début est invalide'");
            $this->setAutorisationBD(false);
        }
        $this->reu_heu = $reu_heu;
    }

    function setReu_dur($reu_dur)
    {
        if (empty($reu_dur)) {
            self::setMessageErreur("La durée prévisible est invalide");
            $this->setAutorisationBD(false);
        }
        $this->reu_dur = $reu_dur;
    }

    function setReu_lie($reu_lie)
    {
        if (!is_string($reu_lie) || ctype_space($reu_lie) || empty($reu_lie)) {
            self::setMessageErreur("Le lieu est invalide");
            $this->setAutorisationBD(false);
        }
        $this->reu_lie = $reu_lie;
    }

    function setReu_cap($reu_cap)
    {
        $this->reu_cap = $reu_cap;
    }

    function setReu_pre($reu_pre)
    {
        $this->reu_pre = $reu_pre;
    }

    function setReu_acc($reu_acc)
    {
        $this->acc_ide = $reu_acc;
    }

    function setReu_pub($reu_pub)
    {
        $this->reu_pub = $reu_pub;
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
