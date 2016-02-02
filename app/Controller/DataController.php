<?php

namespace Controller;

use \W\Controller\Controller;

class DataController extends Controller
{
	/**
	 * generate users data
	 * @ nb, strictly positive integer
	 * data insertion
	 */
	public function dataGenerate()
	{
		$resultat = "";
		if(isset($_POST)){
			$nbToInsert = $_POST["nbToInsert"];
			$dataManager = new \Manager\DataManager();
			$dataManager->insertUserViaFaker();
			if($nbToInsert>1){
				$resultat = "Succès : " . $nbToInsert . "utilisateurs ajoutés";
			} else {
				$resultat = "Succès : " . $nbToInsert . "utilisateur ajouté";

			}
		} else {
			$resultat = "Aucun utilisateur créé, veuillez saisir un nombre strictement positif d'utilisateurs à insérer.";
		}


		$this->show('admin/data_generate', [
			"resultat" => $resultat . $nbToInsert . " utilisateurs ajoutés", 
		]);                                                                                                                          

		
	}



}








