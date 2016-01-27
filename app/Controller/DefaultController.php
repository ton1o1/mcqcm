<?php

namespace Controller;

use \W\Controller\Controller;

class DefaultController extends Controller
{

	/**
	 * Page d'accueil par défaut
	 */
	public function home()
	{
		$this->show('default/home');
	}


public function answerviewerinput()
{
	$this->show('view/answerviewerinput');
}

/**
* Page à propos
*/
public function answerviewer()
{
	$this->show('view/answerviewer');
}


public function answerviewerresults()
{
	$this->show('view/answerviewerresults');
}



}
