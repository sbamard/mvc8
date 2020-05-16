<?php

/**
 * Description of lieuModele
 *
 * @author tvosgiens
 */
class LieuModele extends Modele {

	private $parametre;

	public function __construct($parametre) {

		$this->parametre = $parametre;
	}

	public function getListeLieux() {

		//Requête attendue de type SELECT (liste des lieux)
		$sql = "SELECT * FROM " . P . "lieu";

		$idRequete = $this->executeQuery($sql);

		return $idRequete->fetchall(PDO::FETCH_ASSOC);
	}

	public function getUnLieu() {

		//Requête attendue de type SELECT (un seul lieu)
		$sql = "SELECT * FROM " . P . "lieu WHERE lie_ide = ?";

		$idRequete = $this->executeQuery($sql, array($this->parametre['lie_ide']));

		//var_dump($idRequete->fetch());
		$lieu = new LieuTable($idRequete->fetch());

		return $lieu;
	}

	public function addLieu(LieuTable $valeurs) {
		// Requête de type Insert (création)
		$sql = "INSERT INTO " . P . "lieu (lie_nom, lie_ad1, lie_ad2, lie_ad3, lie_ad4, "
				. " lie_cpo, lie_vil, lie_tel, lie_con, lie_tco, lie_cap)"
				. " VALUES (?,?,?,?,?,?,?,?,?,?,?)";

		$idRequete = $this->executeQuery($sql, array(
			$valeurs->getLie_nom(),
			$valeurs->getLie_ad1(),
			$valeurs->getLie_ad2(),
			$valeurs->getLie_ad3(),
			$valeurs->getLie_ad4(),
			$valeurs->getLie_cpo(),
			$valeurs->getLie_vil(),
			$valeurs->getLie_tel(),
			$valeurs->getLie_con(),
			$valeurs->getLie_tco(),
			$valeurs->getLie_cap()
		));

		if ($idRequete) {
			LieuTable::setMessageSucces("Création effectuée avec succès !");
		}
	}

	public function editLieu(LieuTable $valeurs) {
		// Requête de type Insert (création)
		$sql = "UPDATE " . P . "lieu SET lie_nom = ?, lie_ad1 = ?, lie_ad2 = ?,"
				. " lie_ad3 = ?, lie_ad4 = ?, "
				. " lie_cpo = ?, lie_vil =?, "
				. "lie_tel = ?, lie_con =? , lie_tco = ?, "
				. "lie_cap = ? WHERE lie_ide = ?";


		$idRequete = $this->executeQuery($sql, array(
			$valeurs->getLie_nom(),
			$valeurs->getLie_ad1(),
			$valeurs->getLie_ad2(),
			$valeurs->getLie_ad3(),
			$valeurs->getLie_ad4(),
			$valeurs->getLie_cpo(),
			$valeurs->getLie_vil(),
			$valeurs->getLie_tel(),
			$valeurs->getLie_con(),
			$valeurs->getLie_tco(),
			$valeurs->getLie_cap(),
			$valeurs->getLie_ide()
		));

		if ($idRequete) {
			LieuTable::setMessageSucces("Modification effectuée avec succès !");
		}
	}

	public function deleteLieu() {

		$sql = "DELETE FROM " . P . "lieu WHERE lie_ide = ?";


		$idRequete = $this->executeQuery($sql, array($this->parametre['lie_ide']));

		if ($idRequete) {

			LieuTable::setMessageSucces("Suppression effectuée avec succès !");
		}
	}

}
