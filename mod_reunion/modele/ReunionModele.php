<?php

class ReunionModele extends Modele {

    private $parametre;

    public function __construct($parametre) {

        $this->parametre = $parametre;
    }

    public function getListeReunions() {

        //Requête attendue de type SELECT (liste des lieux)
        $sql = "SELECT * FROM " . P . "reunion";

        $idRequete = $this->executeQuery($sql);

        return $idRequete->fetchall(PDO::FETCH_ASSOC);
    }

    public function getUnReunion() {

        //Requête attendue de type SELECT (un seul lieu)
        $sql = "SELECT * FROM " . P . "reunion WHERE acc_ide = ?";

        $idRequete = $this->executeQuery($sql, array($this->parametre['acc_ide']));

        //var_dump($idRequete->fetch());
        $reunion = new ReunionTable($idRequete->fetch());

        return $reunion;
    }

    public function addReunion(ReunionTable $valeurs) {
        // Requête de type Insert (création)
        $sql = "INSERT INTO " . P . "reunion (acc_pre, acc_nom, acc_tel, acc_mai, acc_spe, "
                . " acc_log, acc_mpa)"
                . " VALUES (?,?,?,?,?,?,?)";

        $idRequete = $this->executeQuery($sql, array(
            $valeurs->getAcc_pre(),
            $valeurs->getAcc_nom(),
            $valeurs->getAcc_tel(),
            $valeurs->getAcc_mai(),
            $valeurs->getAcc_spe(),
            $valeurs->getAcc_log(),
            $valeurs->getAcc_mpa()
        ));

        if ($idRequete) {
            ReunionTable::setMessageSucces("Création effectuée avec succès !");
        }
    }

    public function editReunion(ReunionTable $valeurs) {
        // Requête de type Insert (création)
        $sql = "UPDATE " . P . "reunion SET acc_pre = ?, acc_nom = ?, acc_tel = ?,"
                . " acc_mai = ?, acc_spe = ?, "
                . " acc_log = ? WHERE acc_ide = ?";


        $idRequete = $this->executeQuery($sql, array(
            $valeurs->getAcc_pre(),
            $valeurs->getAcc_nom(),
            $valeurs->getAcc_tel(),
            $valeurs->getAcc_mai(),
            $valeurs->getAcc_spe(),
            $valeurs->getAcc_log(),
            $valeurs->getAcc_ide()
        ));

        if ($idRequete) {
            ReunionTable::setMessageSucces("Modification effectuée avec succès !");
        }
    }

    public function deleteReunion() {

        $sql = "DELETE FROM " . P . "reunion WHERE acc_ide = ?";


        $idRequete = $this->executeQuery($sql, array($this->parametre['acc_ide']));

        if ($idRequete) {

            ReunionTable::setMessageSucces("Suppression effectuée avec succès !");
        }
    }

}
