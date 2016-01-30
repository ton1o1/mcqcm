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
		$dataManager = new \Manager\DataManager();
		$dataManager->insertUserViaFaker();
		$this->show('admin/datagenerer', [
		]);
	}



}








