<?php
/**
 * 
 */
class AccueilControleur{
	
	public function __construct(){
		
		$this->oVue = new AccueilVue();
	}
	
	public function liste(){
		
		$this->oVue->genererAffichage();
	}
	
}

