<?php $this->layout('layout', ['title' => 'Contact']) ?>

<?php $this->start('main_content') ?>
	<div class="jumbotron visuel"><h2>Contact.</h2>
	<p>Vous avez besoin de nous contacter ? </p>
	<p>Avec MCQCM vous avez l'embarras du choix !</p>
	</div>
	<div class="row">
	<div class="left col-lg-6">
	<h4>Par email</h4>
     <?= $messageInfo = (!empty($messageInfo))? $messageInfo : '';?>
	<form action="" method="POST" novalidate>
        <div class="form-group <?php if(!empty($errormessage['userEmail'])){ echo 'has-error';}?>">
            <label for="userEmail">Adresse e-mail <span class="required">*</span></label>
            <input type="email" class="form-control" id="userEmail" name="userEmail" placeholder="Email" value="<?= $userEmail =(!empty($_POST['userEmail']))?htmlentities($_POST['userEmail']):'';?>">
             <?= $userEmail =(!empty($errormessage['userEmail']))?$errormessage['userEmail']:'';?>
        </div>
		<div class="form-group">
			<label for="">Objet de votre demande: </label>
			<select class="form-control" name="contactSubject" id="contactSubject">
				<option value="Je vous aime">Je vous aime</option>				
				<option value="A propos d'un quiz">A propos d'un quiz</option>				
				<option value="A propos de mon compte">A propos de mon compte</option>
			</select>
		</div>
		<div class="form-group">
			<label for="">Message : </label>
			<textarea class="form-control" name="contactMessage" id="contactMessage" cols="30" rows="10"></textarea>
		</div>
		<div class="form-group">
			<button class="btn btn-default" type="submit">Envoyer</button>
		</div>

	</form>
	</div>
	<div class="right col-lg-6">
		<h4>Par téléphone</h4>
		<p>Tel: 0820 820 820</p>
		<h4>Par courrier</h4>
		<p>Vous pouvez nous écrire à l'adresse suivante :</p>
		<address itemprop="adr" itemscope>
		<p itemprop="fn"><trong>MCQCM</trong></p>
		<p itemprop="street-address">24 avnue de l'Opéra</p>
		<p itemprop="locality">75001 <span itemprop="postal-code">PARIS</span> - <span itemprop="country-name">FRANCE</span></p>
		</address>
		</p>
	</div>
	</div>
<?php $this->stop('main_content') ?>
