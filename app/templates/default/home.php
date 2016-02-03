<?php $this->layout('layout', ['title' => 'Accueil']) ?>

<?php $this->start('main_content') ?>

<?= !empty($alerts) ? $alerts : '' ?>

<div class="jumbotron">
 	<h1>On se fait un quiz ?</h1>
	<p>Dis-moi quelles sont tes compétences, et voyons ce que tu vaut vraiment !</p>
	
		<form name="search" method="get" action="<?= $this->url("quiz_search") ?>">
  			<div class="form-group select2fix">
				<div class="input-group select2-bootstrap-append">
					<select name="tags[]" id="skillSearch" class="form-control select2" multiple></select>
					<span class="input-group-btn">
						<button class="btn btn-default select2margin" type="submit" data-select2-open="multi-append">
							<span class="glyphicon glyphicon-search"></span>
						</button>
					</span>
				</div>
			</div>
			<input type="hidden" name="page" value="1" />
		</form>
  	
</div>

<?php
// Display search results
if(!empty($quizzes)){
	foreach($quizzes as $value){
		$url = $this->url('quiz_view', ['quizId' => $value['id'], 'quizSlug' => $value['title'][0]]);
		echo '
		<div class="panel panel-default">
			<div class="panel-body">
				<span class="icon-mcqcm" aria-label="MCQCM"></span>
				<a href="' . $url . '" role="button" title="Consulter le quiz : '.$value['title'][1].'"><h5 class="quiz-title pull-left"> '.$value['title'][1].'</h5></a>
			</div>
		</div>';
	}

	// Pagination
	$prevDisabled = null;
	$nextDisabled = null;

	$currentPage = 1;

	if(!empty($_GET['page'])){
	            
		$currentPageInt = (int) $_GET['page'];

		if($currentPageInt > 1){
			$currentPage = $currentPageInt;
		}
	}

	$prevPage = $currentPage - 1;
	$nextPage = $currentPage + 1;
	$lastPage = ceil($total / 10);

	if($currentPage == 1){
		$prevDisabled = ' class="disabled"';
	}

	if($currentPage == $lastPage){
		$nextDisabled = ' class="disabled"';
	}

	echo '<nav>
	  <ul class="pagination">
	    <li'.$prevDisabled.'><a href="#" data-page="'.$prevPage.'" title="Page précédente" class="page-nav"><span aria-hidden="true">&laquo;</span></a></li>';

	    for($i = 1; $i <= $lastPage; $i++){
	    	$active = null;
	    	if($i == $currentPage){ $active = ' class="active"'; }
	    	echo '<li'.$active.'><a href="#" data-page="'.$i.'" title="Aller à la page '.$i.'" class="page-nav">1</a></li>';
	    }
	echo '<li'.$nextDisabled.'><a href="#" data-page="'.$nextPage.'" title="Page suivante" class="page-nav"><span aria-hidden="true">&raquo;</span></a></li>
	  </ul>
	</nav>';
}
?>

<?php $this->stop('main_content') ?>

<?php $this->start('scripts') ?>

    <script>
    $(".page-nav").on("click", function(){
        
        // Get page selection
        var page = $(this).data("page");

        $("input[name=page]").val(page);
        $("form[name=search]").submit();
    });
    </script>

<?php $this->stop('scripts') ?>