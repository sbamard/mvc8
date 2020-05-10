<?php

class AccompagnateurModele extends Modele {

    private $parametre;

    public function __construct($parametre) {

        $this->parametre = $parametre;
    }

    public function getListeAccompagnateurs() {

        //Requête attendue de type SELECT (liste des lieux)
        $sql = "SELECT * FROM " . P . "accompagnateur";

        $idRequete = $this->executeQuery($sql);

        return $idRequete->fetchall(PDO::FETCH_ASSOC);
    }

    public function getUnAccompagnateur() {

        //Requête attendue de type SELECT (un seul lieu)
        $sql = "SELECT * FROM " . P . "accompagnateur WHERE acc_ide = ?";

        $idRequete = $this->executeQuery($sql, array($this->parametre['acc_ide']));

        //var_dump($idRequete->fetch());
        $accompagnateur = new AccompagnateurTable($idRequete->fetch());

        return $accompagnateur;
    }

    public function addAccompagnateur(AccompagnateurTable $valeurs) {
        // Requête de type Insert (création)
        $sql = "INSERT INTO " . P . "accompagnateur (acc_pre, acc_nom, acc_tel, acc_mai, acc_spe, "
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
            AccompagnateurTable::setMessageSucces("Création effectuée avec succès !");
        }
    }

    public function editAccompagnateur(AccompagnateurTable $valeurs) {
        // Requête de type Insert (création)
        $sql = "UPDATE " . P . "accompagnateur SET acc_pre = ?, acc_nom = ?, acc_tel = ?,"
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
            AccompagnateurTable::setMessageSucces("Modification effectuée avec succès !");
        }
    }

    public function deleteAccompagnateur() {

        $sql = "DELETE FROM " . P . "accompagnateur WHERE acc_ide = ?";


        $idRequete = $this->executeQuery($sql, array($this->parametre['acc_ide']));

        if ($idRequete) {

            AccompagnateurTable::setMessageSucces("Suppression effectuée avec succès !");
        }
    }

}
