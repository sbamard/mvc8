<?php
/**
 * Description of accueilVue
 *
 * @author tvosgiens
 */
class AccueilVue {
	
	private $tpl; // Objet Smarty
	
	
	public function __construct(){
		
		$this->tpl = new Smarty();
		
	}
	
	public function chargementValeurs(){
		
		$this->tpl->assign('titre','Gestion Coop\'Emploi');
		$this->tpl->assign('deconnexion','Déconnexion');
		$this->tpl->assign('piedPage','Exercice PHP MVC réalisé avec un moteur de templates');
		
	}
	
	public function genererAffichage(){
		
		$this->chargementValeurs();	
		
		$this->tpl->display('mod_accueil/vue/accueilVue.tpl');
			
	}
	
}
