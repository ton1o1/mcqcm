<?php $this->layout('layout', ['title' => 'Résultats numériques']) ?>

<?php $this->start('main_content') ?>

	<h2>Résultats de pour le quiz de la session </h2>
<?php

$sqlUserQuiz = "SELECT u.last_name, u.first_name, q.title FROM quizs q, users u  
WHERE (u.id = '1') AND (q.user_id = u.id) AND (q.id = '1')";

$statementUserQuiz = $pdo->prepare($sqlUserQuiz);
$statementUserQuiz->execute();
$resultUserQuiz = $statementUserQuiz->fetchAll();

foreach ($resultUserQuiz as $key => $value) {
	$textPresentation = "Résultats du " . $value["title"] . " pour le candidat " . $value["last_name"] . " " . $value["first_name"] . " : ";
	echo('<h2 style="font-size: 24px; color:blue;"><strong>' . $textPresentation . '</strong></h2>');
	}

$sql = "SELECT a.choices, a.question_id FROM quizs__questions q, answers a 
WHERE (q.question_id = a.question_id) AND (a.user_id = '1') AND (q.quiz_id = '1')";

$statement = $pdo->prepare($sql);
$statement->execute();
$result = $statement->fetchAll();


$choiceId = [];
$tabSolution = [];
$tabChoiceTot = [];
$tabChoice = [];
$resultSolution = [];
$str = "";
$strChoice = "";
$answer = "";
$m = 0;
$noteTotale = 0;

foreach ($result as $key => $value) {
	
	$tabChoice = unserialize($value["choices"]);
	$tabChoiceTot = $tabChoiceTot + $tabChoice;
	echo('<br />' . "\n");
	echo ('<span style="font-size: 20px;">' . "Pour la question " . '<strong>' . $value["question_id"] . '</strong>' . ", " . '</span>');

	foreach ($tabChoice as $key => $value) {
		$sqlSolution = "SELECT c.is_true FROM choices c WHERE c.id = '$key'";
		$statementSolution = $pdo->prepare($sqlSolution);
		$statementSolution->execute();
		$resultSolution = $statementSolution->fetchAll(PDO::FETCH_COLUMN, 0); 
		$tabSolution[$key] = intval($resultSolution[0]);
	}

	$noteTotale += valCompareQuestion($tabChoice, $tabSolution);
} 

echo ('<br />' . "\n");
echo ('<h2 style="color:red;"><strong>' . "Note : " . $noteTotale . "/20" . '</strong></h2>');
	
?>


<?php $this->stop('main_content') 

namespace View;

use \app\View\Viewer;

class UserViewer extends Viewer
	{

	public function ShowUserQuizViewer($resultUserQuiz)
		{
		foreach ($resultUserQuiz as $key => $value) {
			$textPresentation = "Résultats du " . $value["title"] . " pour le candidat " . $value["last_name"] . " " . $value["first_name"] . " : " . '<br />' . "\n";
			echo('<strong>' . $textPresentation . '</strong>');
			}
		}

	public function InputUserQuizViewer()
		{
		echo('<form method="POST" novalidate>
		<input type="text" name="quiz" placeholder="Quel quiz ?">
		<button type="submit">Consulter</button>
		</form>');

		}
	}



?>