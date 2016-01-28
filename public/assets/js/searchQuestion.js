console.log("searchQuestion.js started");


$searchQuestion = $("#search-question");
$urlVal = $("#search-question").attr("data-url");

$searchQuestion.on("keyup", function(e){
	e.preventDefault();

	$searchQuestionVal = $searchQuestion.val();


	$.ajax({

		
		"url": $urlVal,
		"data" : { //ecrit automatiquement ?foo=bar à la fin de l'url
			"input" : $searchQuestionVal
		},
		"type": "GET" //peut-être POST également
	})
	.done(function(response){ //$response ici récupère la réponse de la requête AJAX

		console.log($searchQuestionVal)
		console.log(response);


			console.log("ok :D ");


	})
	.fail(function(){
		console.log("FAIL");
	})
	.always(function(){
		console.log("...");
	});

})