<?php

class ReunionModele extends Modele
{

    private $parametre;

    public function __construct($parametre)
    {

        $this->parametre = $parametre;
    }

    public function getListeReunions()
    {

        //Requête attendue de type SELECT (liste des lieux)
        $sql = "SELECT * FROM " . P . "reunion";

        $idRequete = $this->executeQuery($sql);

        return $idRequete->fetchall(PDO::FETCH_ASSOC);
    }

    public function getUnReunion()
    {

        //Requête attendue de type SELECT (un seul lieu)
        $sql = "SELECT * FROM " . P . "reunion WHERE reu_ide = ?";

        $idRequete = $this->executeQuery($sql, array($this->parametre['reu_ide']));

        //var_dump($idRequete->fetch());
        $reunion = new ReunionTable($idRequete->fetch());

        return $reunion;
    }

    public function addReunion(ReunionTable $valeurs)
    {
        // Requête de type Insert (création)
        $sql = "INSERT INTO " . P . "reunion (reu_dat, reu_heu, reu_dur, reu_lie, "
            . "   reu_cap, reu_pre, reu_acc, reu_pub"
            . " VALUES (?,?,?,?,?,?,?,?)";

        $idRequete = $this->executeQuery($sql, array(
            $valeurs->getReu_dat(),
            $valeurs->getReu_heu(),
            $valeurs->getReu_dur(),
            $valeurs->getReu_lie(),
            $valeurs->getReu_cap(),
            $valeurs->getReu_pre(),
            $valeurs->getReu_acc(),
            $valeurs->getReu_pub(),
        ));

        if ($idRequete) {
            ReunionTable::setMessageSucces("Création effectuée avec succès !");
        }
    }

    public function editReunion(ReunionTable $valeurs)
    {
        // Requête de type Insert (création)
        $sql = "UPDATE " . P . "reunion SET reu_date = ?, reu_lie = ?, reu_acc = ?, reu_pub WHERE reu_ide = ?";


        $idRequete = $this->executeQuery($sql, array(
            $valeurs->getReu_ide(),
            $valeurs->getReu_dat(),
            $valeurs->getReu_lie(),
            $valeurs->getReu_acc(),
            $valeurs->getReu_pub()
        ));

        if ($idRequete) {
            ReunionTable::setMessageSucces("Modification effectuée avec succès !");
        }
    }

    public function deleteReunion()
    {

        $sql = "DELETE FROM " . P . "reunion WHERE reu_ide = ?";


        $idRequete = $this->executeQuery($sql, array($this->parametre['reu_ide']));

        if ($idRequete) {

            ReunionTable::setMessageSucces("Suppression effectuée avec succès !");
        }
    }

}
