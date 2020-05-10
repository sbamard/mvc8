<?php

/**
 * Description of lieuTable
 *
 * @author tvosgiens
 */
class LieuTable {

	// 1 Déclarer les propriétés 
	private $lie_ide = "";
	private $lie_nom = "";
	private $lie_ad1 = "";
	private $lie_ad2 = "";
	private $lie_ad3 = "";
	private $lie_ad4 = "";
	private $lie_cpo = "";
	private $lie_vil = "";
	private $lie_tel = "";
	private $lie_con = "";
	private $lie_tco = "";
	private $lie_cap = "";
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

	function getLie_ide() {
		return $this->lie_ide;
	}

	function getLie_nom() {
		return $this->lie_nom;
	}

	function getLie_ad1() {
		return $this->lie_ad1;
	}

	function getLie_ad2() {
		return $this->lie_ad2;
	}

	function getLie_ad3() {
		return $this->lie_ad3;
	}

	function getLie_ad4() {
		return $this->lie_ad4;
	}

	function getLie_cpo() {
		return $this->lie_cpo;
	}

	function getLie_vil() {
		return $this->lie_vil;
	}

	function getLie_tel() {
		return $this->lie_tel;
	}

	function getLie_con() {
		return $this->lie_con;
	}

	function getLie_tco() {
		return $this->lie_tco;
	}

	function getLie_cap() {
		return $this->lie_cap;
	}

	// =========== SETTERS =================
	function setLie_ide($lie_ide) {

		$this->lie_ide = $lie_ide;
	}

	function setLie_nom($lie_nom) {

		if (!is_string($lie_nom) || ctype_space($lie_nom) || empty($lie_nom)) {
			self::setMessageErreur("Le nom est invalide");
			$this->setAutorisationBD(false);
		}

		$this->lie_nom = $lie_nom;
	}

	function setLie_ad1($lie_ad1) {
		$this->lie_ad1 = $lie_ad1;
	}

	function setLie_ad2($lie_ad2) {
		$this->lie_ad2 = $lie_ad2;
	}

	function setLie_ad3($lie_ad3) {
		$this->lie_ad3 = $lie_ad3;
	}

	function setLie_ad4($lie_ad4) {
		$this->lie_ad4 = $lie_ad4;
	}

	function setLie_cpo($lie_cpo) {

		if ((strlen($lie_cpo) != 5) || ctype_space($lie_cpo) || empty($lie_cpo)) {
			self::setMessageErreur("Le code postal est invalide");
			$this->setAutorisationBD(false);
		}

		$this->lie_cpo = $lie_cpo;
	}

	function setLie_vil($lie_vil) {

		if (!is_string($lie_vil) || ctype_space($lie_vil) || empty($lie_vil)) {
			self::setMessageErreur("La ville est invalide");
			$this->setAutorisationBD(false);
		}

		$this->lie_vil = $lie_vil;
	}

	function setLie_tel($lie_tel) {
		$this->lie_tel = $lie_tel;
	}

	function setLie_con($lie_con) {

		if (!is_string($lie_con) || ctype_space($lie_con) || empty($lie_con)) {
			self::setMessageErreur("Le nom du contact est invalide");
			$this->setAutorisationBD(false);
		}
		$this->lie_con = $lie_con;
	}

	function setLie_tco($lie_tco) {

		if (ctype_space($lie_tco) || empty($lie_tco)) {
			self::setMessageErreur("Le téléphone du contact est invalide");
			$this->setAutorisationBD(false);
		}
		$this->lie_tco = $lie_tco;
	}

	function setLie_cap($lie_cap) {

		if (!is_numeric($lie_cap) || ctype_space($lie_cap) || empty($lie_cap)) {
			self::setMessageErreur("La capacité de la salle est invalide");
			$this->setAutorisationBD(false);
		}
		$this->lie_cap = $lie_cap;
	}

	/*	 * *************AutorisationBD****************** */

	function getAutorisationBD() {
		return $this->autorisationBD;
	}

	function setAutorisationBD($autorisationBD) {
		$this->autorisationBD = $autorisationBD;
	}

	/*	 * ********getMessageErreur ou getMessageSucces**************************** */

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
		self::$messageSucces = self::$messageSucces . $msg. "<br>";
	}

}
