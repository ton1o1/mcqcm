<?php $this->layout('layout', ['title' => 'Accueil']) ?>

<?php $this->start('main_content') ?>


<?= !empty($alerts) ? $alerts : '' ?>

<div class="jumbotron">
 	<h1>On se fait un quiz ?</h1>
	<p>Dis-moi quelles sont tes compétences, et voyons ce que tu vaut vraiment !</p>
	
		<form name="search" method="get" action="<?= $this->url("quiz_search") ?>">
  			<div class="form-group select2fix">
				<div class="input-group select2-bootstrap-append">
					<select name="tags[]" id="skillSearch" class="form-control select2" multiple>
						<?php
						if(!empty($_GET['tags'])){
							foreach($_GET['tags'] as $tag){
								$tag = explode('|', $tag);
								$tagId = $tag[0];
								$tagLabel = $tag[1];
								echo '<option value="'.$tagId.'|'.$tagLabel.'" text="'.$tagLabel.'" selected="selected">'.$tagLabel.'</option>';
							}
						}
						?>
					</select>
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
if(!empty($quizzes) && !empty($total)){
	foreach($quizzes as $value){
		$url = $this->url('quiz_view', ['quizId' => $value['id'], 'quizSlug' => $value['title'][0]]);
		echo '
		<a href="' . $url . '" role="button" title="Consulter le quiz : '.$value['title'][1].'">
		<div class="panel panel-default">
			<div class="panel-body">
				<span class="icon-mcqcm pull-left" aria-label="MCQCM" style="font-size:30px"></span>
				<h4 class="quiz-title pull-left"> '.$value['title'][1].'</h4>
			</div>
		</div>
		</a>';
	}

	// Pagination
	$prevDisabled = false;
	$nextDisabled = false;

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
		$prevDisabled = true;
	}

	if($currentPage == $lastPage){
		$nextDisabled = true;
	}

	echo '<nav class="text-center">
	  <ul class="pagination">';
	  if($prevDisabled){
	  	echo '<li class="disabled"><a href="#" data-page="'.$prevPage.'" title="Page précédente"><span aria-hidden="true">&laquo;</span></a></li>';
	  }
	  else{
	    echo '<li><a href="#" data-page="'.$prevPage.'" title="Page précédente" class="page-nav"><span aria-hidden="true">&laquo;</span></a></li>';
	   }


	    for($i = 1; $i <= $lastPage; $i++){
	    	$active = null;
	    	if($i == $currentPage){ $active = ' class="active"'; }
	    	echo '<li'.$active.'><a href="#" data-page="'.$i.'" title="Aller à la page '.$i.'" class="page-nav">1</a></li>';
	    }

	if($nextDisabled){
	  	echo '<li class="disabled"><a href="#" data-page="'.$nextPage.'" title="Page précédente"><span aria-hidden="true">&raquo;</span></a></li>';
	  }
	  else{
	    echo '<li><a href="#" data-page="'.$nextPage.'" title="Page suivante" class="page-nav"><span aria-hidden="true">&raquo;</span></a></li>';
	   }
	  echo '</ul>
	</nav>';
}
?>

<?php $this->stop('main_content') ?>

<?php $this->start('scripts') ?>

<script>
$(function() {

  	// Skills search
    $("#skillSearch").select2({
        theme: "bootstrap",
        language: "fr",
        placeholder: "Saisir une compétence...",
        multiple: true,
        ajax: {
            method: "POST",
          url: "<?= $this->url('skill_search') ?>",
          dataType: "json",
          delay: 250,
          data: function (params) {
            return {
              q: params.term, // search term
              page: params.page,
              source: 'homepage'
            };
          },
          processResults: function (data, params) {
            // parse the results into the format expected by Select2
            // since we are using custom formatting functions we do not need to
            // alter the remote JSON data, except to indicate that infinite
            // scrolling can be used
            params.page = params.page || 1;

            return {
              results: data.results,
              pagination: {
                more: (params.page * 30) < data.total
              }
            };
          },
          cache: true
        },
        escapeMarkup: function (markup) {
          return markup; // let our custom formatter work
        },
        minimumInputLength: 2,
        templateResult: function(skill) {
          return skill.tag;
        },
        templateSelection: function(skill) {
          if(skill.tag){
            return skill.tag;
          }
          else{
            return skill.text;
          }
        }
    });

	// Pagination
	$(".page-nav").on("click", function(){
        
	    // Get page selection
    	var page = $(this).data("page");

    	$("input[name=page]").val(page);
    	$("form[name=search]").submit();
	});
});
</script>

<?php $this->stop('scripts') ?>