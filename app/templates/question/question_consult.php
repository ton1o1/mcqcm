<?php $this->layout('layout', ['title' => 'Détails question']) ?>

<?php $this->start('main_content'); ?>

  <section class="showQuestion">
    <form action="" method="" class="form-group">
  <!-- QUESTION -->       
      <fieldset>
        <legend>Question n° <?= $question['id'] ?> du Quiz <?= $quizInfo['id'] ?></legend>
        <div class="form-group">
          <label for="questionTitle">Intitulé</label>
          <textarea name="questionTitle" id="questionTitle" rows="5" cols="100" placeholder="Saisissez l'intitulé de la question" disabled><?= $question['title'] ?></textarea>
        </div>
        <div class="form-group">
          <label for="questionType">Type de question <?php echo "le type de question"; ?></label>

        </div>
  <!-- END QUESTION -->       
  <!-- CHOICES -->
        <div class="choices">
        <form>
        	
          <label class="checkbox-inline">
            <input type="<?= $question['type'] ?>" name="solution1" id="checkbox1" <?= $choices[0]["is_true"] ?> disabled>
            <input type="text" name="choice1" value="<?= $choices[0]["title"] ?>" disabled>
          </label><br/>	
          <label class="checkbox-inline">
            <input type="<?= $question['type'] ?>" name="solution2" id="checkbox2" <?= $choices[1]["is_true"] ?> disabled >
            <input type="text" name="choice2" value="<?= $choices[1]["title"] ?>" disabled>

          </label><br/>
          <label class="checkbox-inline">
            <input type="<?= $question['type'] ?>" name="solution3" id="checkbox3" <?= $choices[2]["is_true"] ?> disabled >
            <input type="text" name="choice3" value="<?= $choices[2]["title"] ?>" disabled>
          </label><br/>
          <label class="checkbox-inline">
            <input type="<?= $question['type'] ?>" name="solution4" id="checkbox4" <?= $choices[3]["is_true"] ?> disabled>
            <input type="text" name="choice4" value="<?= $choices[3]["title"] ?>" disabled>

          </label><br/>
  <!-- END CHOICES -->
        </form>
      </fieldset>
    </form>
  </section>





	<p>Et maintenant, RTFM dans <strong><a href="../docs/tuto/" title="Documentation de W">docs/tuto</a></strong>.</p>

<?php $this->stop('main_content') ?>
