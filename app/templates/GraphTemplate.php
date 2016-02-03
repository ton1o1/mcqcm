<?php $this->layout('layout', ['title' => 'Graphiques']) ?>

<?php $this->start('main_content') ?>
	<h2>Let's code.</h2>
	<p></p>


<section class="droite">

     <article id="main">
          <p><canvas id="graphe" width="500" height="400">HTML5 canvas non compatible avec votre navigateur.</canvas></p>
          

          <form action='javascript:void(0)'> 
               <p>
                    <select name="fonction" id="indice">
                         <option value="1">f(x) = cos(x)</option>
                         <option value="2">f(x) = exp(-|x|^0,5)</option>
                    </select>
                    
                    <select name="étude" id="indice_etude">
                         <option value="1">Fonction f</option>
                    </select>
					<input type="button" value="&lArr;" onClick="draw(-2,0)"><label>&nbsp;Translation gauche</label><br />
					<input type="button" value="&rArr;" onClick="draw(2,0)"><label>&nbsp;Translation droite</label><br />
					<input type="button" value="&tArr;" onClick="draw(0,1)"><label>&nbsp;Agrandissement</label><br />
					<input type="button" value="&bArr;" onClick="draw(0,-1)"><label>&nbsp;Réduction</label><br />
                    <input type="submit" name="Envoi" value="Tracer" onclick="draw(0,0)" /><label>&nbsp;Initialisation à 0</label><br />
               </p>
          </form>
     </article>

     <article id="explanations">
          <p>Fonction</p>
     </article>

</section>  


<script src="js/courbes_mcqcm.js"></script>
<?php $this->stop('main_content') ?>
