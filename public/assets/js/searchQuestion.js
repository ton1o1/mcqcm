console.log("JS start !");

$searchQuestion = $("#search-question");
$urlVal = $("#search-question").attr("data-url");

$searchQuestion.on("keyup", function(e){
	e.preventDefault();

	$searchQuestionVal = $searchQuestion.val();
	console.log($urlVal  + " + " + $searchQuestionVal)
	$.ajax({	
		"url": $urlVal,
		"data" : { //ecrit automatiquement ?foo=bar à la fin de l'url
			"input" : $searchQuestionVal
		},
		"datatype": 'json', 
		"type": "GET" //peut-être POST également
	})
	.done(function(response){ 
	//$response ici récupère la réponse de la requête AJAX
		console.log(response)
		console.log("debut " + response + " fin");

	})
	.fail(function(){
		console.log("FAIL");
	})
	.always(function(){
		//console.log("...");
	});

})











