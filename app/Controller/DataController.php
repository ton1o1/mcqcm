<?php

namespace Controller;

use \W\Controller\Controller;

class DataController extends Controller
{
	/**
	 * generate users data
	 * @param nb, strictly positive integer
	 * @return data insertion
	 */
	
	public function dataGenerate()
	{
		//init results message
		$resultat = "";

		//insert users data via faker if a integer has been posted
		if(isset($_POST["nbToInsert"])){

			$nbToInsert = $_POST["nbToInsert"];

			$dataManager = new \Manager\DataManager();
			$dataManager->insertUserViaFaker($nbToInsert);

			//over-zelousness about the message
			if($nbToInsert>1){
				$resultat = "Succès : " . $nbToInsert . "utilisateurs ajoutés";
			} else {
				$resultat = "Succès : " . $nbToInsert . "utilisateur ajouté";
			}
		} else 
		{
			$resultat = "Aucun utilisateur créé, veuillez saisir un nombre strictement positif d'utilisateurs à insérer.";
		}

		//display template
		$this->show('admin/data_generate', [
			"resultat" => $resultat, 
		]);                                                                     		
	}
}








