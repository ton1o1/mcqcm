console.log("JS start !");

var $searchQuestion = $("#search-question");
var $urlVal = $("#search-question").attr("data-url");
var $resultsList = $(".results-list");
var $details = $(".details");

$searchQuestion.on("keyup", function(e){
	e.preventDefault();
	$details.empty();
	$resultsList.empty();

	$searchQuestionVal = $searchQuestion.val();
	console.log($urlVal  + " + " + $searchQuestionVal)
	if ($searchQuestionVal.length>=3){

		$.ajax({	
			"url": $urlVal,
			"data" : { //ecrit automatiquement ?foo=bar à la fin de l'url
				"input" : $searchQuestionVal
			},
			"dataType": 'json', 
			"type": "GET" //peut-être POST également
		})
		.done(function(response){ 
	//$response ici récupère la réponse de la requête AJAX
	
			console.log(response.length);

			if(response.length > 5){
				$details.html( response.length + " résultats au total")
			}

			for (var i = 0, c = response.length; i < c; i++){
				console.log(response[i].title + response[i].id)
			}
	
			for (var i = 0; i < 5; i++){
	
				$id = response[i].id;
				$tdId = $("<td>").html($id + ", ");
	
				$title = response[i].title;
				$tdTitle = $("<td>").html($title + ", ");
	


				//append everything in the following order
				$tr = $("<tr>")
					.append($tdId)
					.append($tdTitle)
					//.append($tdStatus);
				$resultsList
					.append($tr);
			}
		})
		.fail(function(){
			console.log("FAIL");
			$details.empty();
			$resultsList.empty();	
		})
		.always(function(){
			//console.log("...");
		});
	} 	

})












