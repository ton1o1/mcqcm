console.log("JS start !");

var $searchQuestion = $("#search-question");
var $urlVal = $("#search-question").attr("data-url");
var $resultsList = $(".results-list");

$searchQuestion.on("keyup", function(e){
	e.preventDefault();

	$searchQuestionVal = $searchQuestion.val();
	console.log($urlVal  + " + " + $searchQuestionVal)
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
		$resultsList.empty();
		console.log(response)
		
		for (var i = 0, c = response.length; i < c; i++){
			console.log(response[i].title + response[i].id)
		}

		for (var i = 0; i < 5; i++){

			$id = response[i].id;
			$tdId = $("<td>").html($id);

			$title = response[i].title;
			$tdTitle = $("<td>").html($title);

			$status = response[i].title;
			$tdStatus = $("<td>").html($title);

			//append everything in the following order
			$tr = $("<tr>")
				.append($tdId)
				.append($tdTitle)
				.append($tdStatus);
			$resultsList
				.append($tr);



		}


	})
	.fail(function(){
		console.log("FAIL");
	})
	.always(function(){
		//console.log("...");
	});

})


//SELECT questions.* , quizs__questions.* FROM `questions`, `quizs__questions` WHERE questions.title LIKE '%pourquoi%' AND (questions.id != quizs__questions.quiz_id) ORDER BY questions.title ASC LIMIT 5









