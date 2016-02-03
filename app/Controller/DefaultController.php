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


	public function about()
	{
		$this->show('default/about');
	}

	public function legal()
	{
		$this->show('default/legal'); //attention, ici legal est bien le nom de la fonction et non, le nom de la route
	}

	public function blog()
	{
		$this->show('default/blog');
	}

	public function contact()
	{
		$this->show('default/contact');
	}



/*

public function answerviewerinput()
{
	$this->show('view/answerviewerinput');
}

public function answerviewer()
{
	$this->show('view/answerviewer');
}


public function answerviewerresults()
{
	$this->show('view/answerviewerresults');
}
*/


}

