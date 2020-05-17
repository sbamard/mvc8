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
        $sql = "SELECT * FROM " . P . "reunion, " . P . "accompagnateur, " . P . "lieu WHERE " . P . "reunion.lie_ide = " . P . "lieu.lie_ide 
        AND " . P . "reunion.acc_ide = " . P . "accompagnateur.acc_ide";
        $idRequete = $this->executeQuery($sql);
        return $idRequete->fetchall(PDO::FETCH_ASSOC);
    }

    public function getUnReunion()
    {
        $sql = "SELECT *  FROM " . P . "reunion, " . P . "accompagnateur, " . P . "lieu 
          WHERE " . P . "reunion.lie_ide = " . P . "lieu.lie_ide  AND " . P . "reunion.acc_ide = " . P . "accompagnateur.acc_ide AND reu_ide = ?";
        $idRequete = $this->executeQuery($sql, array($this->parametre['reu_ide']));
        $reunion = new ReunionTable($idRequete->fetch());
        return $reunion;
    }


    public function addReunion(ReunionTable $valeurs)
    {
        // Requête de type Insert (création)
        $sql = "INSERT INTO " . P . "reunion (reu_dat, reu_heu, reu_dur, reu_cap, reu_pre, "
            . "reu_pub, reu_nbr, lie_ide, acc_ide) "
            . "VALUES (?,?,?,?,?,?,?, "
            . "(SELECT lie_ide FROM " . P . "lieu WHERE lie_nom = ?), "
            . "(SELECT acc_ide FROM " . P . "accompagnateur WHERE acc_nom = ?))";

        $idRequete = $this->executeQuery($sql, array(
            $valeurs->getReu_dat(),
            $valeurs->getReu_heu(),
            $valeurs->getReu_dur(),
            $valeurs->getReu_cap(),
            $valeurs->getReu_pre(),
            $valeurs->getReu_pub(),
            $valeurs->getReu_nbr(),
            $valeurs->getLie_nom(),
            $valeurs->getAcc_nom()

        ));

        if ($idRequete) {
            ReunionTable::setMessageSucces("Création effectuée avec succès !");
        }
    }

    public function editReunion(ReunionTable $valeurs)
    {
        $sql = "UPDATE " . P . "reunion SET reu_dat = ?, reu_heu = ?, reu_dur = ?, "
            . "reu_cap = ?, reu_pre = ?, reu_pub = ?, reu_nbr = ?, "
            . "lie_ide = (SELECT " . P . "lieu.lie_ide FROM " . P . "lieu WHERE " . P . "lieu.lie_nom = ?), "
            . "acc_ide = (SELECT " . P . "accompagnateur.acc_ide FROM " . P . "accompagnateur WHERE " . P . "accompagnateur.acc_nom = ?) "
            . "WHERE reu_ide = ?";

        $idRequete = $this->executeQuery($sql, array(
            $valeurs->getReu_dat(),
            $valeurs->getReu_heu(),
            $valeurs->getReu_dur(),
            $valeurs->getReu_cap(),
            $valeurs->getReu_pre(),
            $valeurs->getReu_pub(),
            $valeurs->getReu_nbr(),
            $valeurs->getLie_nom(),
            $valeurs->getAcc_nom(),
            $valeurs->getReu_ide()

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
