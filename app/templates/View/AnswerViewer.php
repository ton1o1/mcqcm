<?php $this->layout('layout', ['title' => 'Résultats']) ?>

<?php $this->start('main_content') ?>

	<h2>Résultats individuels</h2>

	<form method = "POST" action = "<?= $this->assetUrl('answerviewerresults.php') ?>" novalidate>
		<input type="text" name="quiz" placeholder="Quel quiz ?">
		<button type="submit">Consulter</button>
	</form>
	
<?php $this->stop('main_content') 

namespace View;

use \W\View\Viewer;

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