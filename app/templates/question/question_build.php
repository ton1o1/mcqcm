  <?php $this->layout('layout', ['title' => 'Formulaire de création de question']) ?>

  <?php $this->start('main_content'); ?>
  <!--  <h2>Formulaire de création de question</h2>
  <p>Vous avez atteint la page de création de question</p> -->
    <div class="process">
      <ol>
        <li>Saisir l'intitulé de la question</li>
        <li>Choisir le type de la question (radio, checkbox)</li>
        <li>Ajouter un ou plusieurs choix nécessaire (5 max)</li>
        <li>Rédiger les choix de la question</li>
        <li>Cocher la ou les bonnes réponses</li>
        <li>Valider le formulaire ok</li>
      </ol>
    </div>  
    
    <section class="searchQuestion container">
  <!-- SEARCH BAR -->
    <form action="#" method="GET">
      <label for="search-question">Rechercher une question : </label>
      <input type="text" id="search-question" data-url="<?php echo $this->url("question_search"); ?>">
      <div class="details"></div>
  <!-- END SEARCH BAR -->    
      
    </form>
  <!-- RESULTS -->
      <div class="results-list">
        <table class="table table-striped table-hover">
        	<!-- RESULTS OF THE SEARCH -->
        </table>
      </div>
  <!-- END RESULTS -->
    </section>

  <!-- QUESTION -->
    <section class="addQuestion container">
      <div>
        <label>Quiz n°</label>
        <input type="text" name="quizId" id= "quizId" min="0" max="100" step="1" value="<?= $quizId ?>" disabled="">
            <!-- 
  		      ALERT the line above is to be replaced by the one underneath during integration phase !!!
            <input type="number" name="quizId" min="0" max="100" step="1" value="<?= $quizId ?>"> 
            <label>Quiz n°<?= $quizId ?></label>
            -->
      </div>
      <form action="" method="POST" class="form-group" novalidate>
        <fieldset>
          <legend>Créer une question</legend>
          <h2>Votre question</h2>
          <div class="form-group">
            <label for="questionTitle">Intitulé</label>
            <textarea name="questionTitle" id="questionTitle" rows="5" cols="100" placeholder="Saisissez l'intitulé de la question"><?php if(isset($written['questionTitle'])) {echo $written['questionTitle'];} ?></textarea>
          </div><div class="error"><?php if(isset($errorMsg['title'])){echo $errorMsg['title'];} ?></div>

          <div class="form-group">
            <label for="questionType">Type de question</label>
            <!-- This is an unfinished functionality -->
            <select name="questionType" id="questionType">
              <option value="radio">radio</option>
              <option value="checkbox">checkbox</option>
              <option value="draganddrop">drag and drop</option>
            </select>
          </div>
          <h2>Choix : <button id="add-choice">Ajouter un choix</button></h2>
    <!-- END QUESTION -->       
    <!-- CHOICES -->
      <!-- 
      Note : the technical solution which consists in coding : name="choices[]"" has not been used because it would have made impossible to connect choice number with a solution number
      -->
          <div class="choices">
            <label class="checkbox-inline">
              <input type="checkbox" name="solution1" value="checked" id="checkbox1" <?php if(isset($written['solution1'])){echo "checked";} ?>>
              <input type="text" name="choice1" value="<?php if(isset($written['choice1'])){ echo $written['choice1'];} ?>"><div class="error"><?php if(isset($errorMsg['choice1'])){echo $errorMsg['choice1'];} ?></div>

            </label><br/>
            <label class="checkbox-inline">
              <input type="checkbox" name="solution2" value="checked" id="checkbox2" <?php if(isset($written['solution2'])){echo "checked";} ?>>
              <input type="text" name="choice2" value="<?php if(isset($written['choice2'])){ echo $written['choice2'];} ?>"><div class="error"><?php if(isset($errorMsg['choice2'])){echo $errorMsg['choice2'];} ?></div>

            </label><br/>
            <label class="checkbox-inline">
              <input type="checkbox" name="solution3" value="checked" id="checkbox3" <?php if(isset($written['solution3'])){echo "checked";} ?>>
              <input type="text" name="choice3" value="<?php if(isset($written['choice3'])){ echo $written['choice3'];} ?>"><div class="error"><?php if(isset($errorMsg['choice3'])){echo $errorMsg['choice3'];} ?></div>

            </label><br/>
            <label class="checkbox-inline">
              <input type="checkbox" name="solution4" value="checked" id="checkbox4" <?php if(isset($written['solution4'])){echo "checked";} ?>>
              <input type="text" name="choice4" value="<?php if(isset($written['choice4'])){ echo $written['choice4'];} ?>"><div class="error"><?php if(isset($errorMsg['choice4'])){echo $errorMsg['choice4'];} ?></div>

            </label><br/>
          </div><div class="error"><?php if(isset($errorMsg['solution'])){echo $errorMsg['solution'];} ?></div>
    <!-- END CHOICES -->    
          <div class="form-group">
            <input type="submit" value="Ajouter la question au portefeuille">
            <?php if(isset($_POST['success'])){echo $_POST['success'];} ?>
        </fieldset>
      </form>
    </section>

    <p>Et maintenant, RTFM dans <strong><a href="../docs/tuto/" title="Documentation de W">docs/tuto</a></strong>.</p>

  <?php $this->stop('main_content') ?>

  <?php $this->start('scripts') ?>
    <script type="text/javascript" src="<?=$this->assetUrl('js/searchQuestion.js') ?>"></script>
  <?php $this->stop('scripts') ?>











