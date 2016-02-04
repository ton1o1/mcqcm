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
		if(!empty($_POST)){


			$errormessage = '<div class="alert alert-danger">Nous avons rencontré un problème lors de l\'envoi du message. Ressayez ultérieurement ou utilez l\'un des deux autres moyens de contacts mis à votre disposition </div>';
			$messageInfo = '<div class="alert alert-info">Votre message a été envoyé. Nous revenons vers vous dans les plus brefs délais.</div>';


			//debug($_POST);
			$mail = new \Service\Sendmails();
			
			//send mail to contact
			
			$fromMail    = $_POST['userEmail'];
			$fromName 	 = $_POST['userEmail'];
			$toMail      = "contact.mcqcm@gmail.com";
			$mailSubject = $_POST['contactSubject'];
			$contentMail = $_POST['contactMessage'];
			
			$messageInfo = $mail->sendmails($fromMail ,$toMail , $fromName, $contentMail, $mailSubject, $errormessage, $messageInfo);
			
			//confirm to client by mail
			$fromMail ="contact.mcqcm@gmail.com";
			$fromName = "MCQCM";
			$toMail = $_POST['userEmail'];
			$mailSubject = "Confirmation de votre demande d'information";
			$contentMail = "<p>Bonjour,<br> Nous avons bien reçu votre message. <br> L'équipe MCQCM met tout en oeuvre pour vous répondre dans les plus brefs délais.<br> A très vite sur mcqcm.com.";

			$mail->sendmails($fromMail ,$toMail , $fromName, $contentMail, $mailSubject, $errormessage, $messageInfo);
		
		}

		$this->show('default/contact', ['messageInfo'=>$messageInfo]);
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

