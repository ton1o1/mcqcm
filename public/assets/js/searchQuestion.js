console.log("searchQuestion.js started");


$searchQuestion = $("#search-question");

$searchQuestion.on("keyup", function(e){
	e.preventDefault();
	$searchQuestionVal = $searchQuestion.val();

	$.ajax({

		//what the fuck is the url here?
		"url":"/questionediteur?input=" + $searchQuestionVal,
		"type": "GET"
	})
	.done(function(){

		if( $searchQuestionVal.length < 3 ){
			console.log("<3");
			$(".warning-msg").html("Recherche active à partir de 3 caractères");
		} else {
			console.log("ok :D ");
		}

	})
	.fail(function(){
		console.log("FAIL");
	})
	.always(function(){
		console.log("...");
	});

})