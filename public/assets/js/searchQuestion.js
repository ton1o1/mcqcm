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
	//console.log($urlVal  + " + " + $searchQuestionVal)
	if ($searchQuestionVal.length>=3){
		console.log($urlVal)
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
	
				$button = $("<button>");
				$button.html("Ajouter au quiz").attr("data-id",$id);
				$tdButton = $("<td>").append($button);
				$button.on("click", function(e){
					e.preventDefault;	
					$(this).html("Ajouté!")
					//ajaxAddQuestionjs($(this).attr("data-id"));
					$questionId = $(this)
					$quizId = $("#quizId").val()
					//console.log($urlVal.replace("questionrecherche","questionajouter") + ", quizId= " + $quizId +", questionId = " + $questionId);
				
					$.ajax({
						"url": $urlVal.replace("questionrecherche","questionajouter"), //ok, on se rend independant de 					l'url local
						//"url": $urlVal.replace("questionrecherche","questionajouter"), //ok, on 					se rend independant de l'url local
						"data" : { //ecrit automatiquement ?foo=bar à la fin de l'url
							"quizId" : $quizId, 
							"questionId" : $(this).attr("data-id")
						},
						"dataType": 'json', 
						"type": "POST"
					})
					.done(function(response){ 
						console.log("insertion d'une question ou pas ?")
						console.log(response);
					})
					.fail(function(){
						console.log("FAIL add");
					})
					.always(function(){
				
					});		
				})

				//append everything in the following order
				$tr = $("<tr>")
					.append($tdId)
					.append($tdTitle)
					.append($tdButton);
				$resultsList
					.append($tr);
			}
		})
		.fail(function(){
			console.log("FAIL search");
			$details.empty();
			$resultsList.empty();	
		})
		.always(function(){
			//console.log("...");
		});
	} 	

})


/*
function ajaxAddQuestionjs($questionId){
	
	$quizId = $("#quizId").val()
	console.log($urlVal.replace("questionrecherche","questionajouter") + ", quizId= " + $quizId +", questionId = " + $questionId);

	$.ajax({
		"url": "/mcqcm/public/questionajouter", //ok, on se rend independant de l'url local
		//"url": $urlVal.replace("questionrecherche","questionajouter"), //ok, on se rend independant de l'url local
		"data" : { //ecrit automatiquement ?foo=bar à la fin de l'url
			"quizId" : $quizId, 
			"questionId" : $questionId
		},
		"dataType": 'json', 
		"type": "POST"
	})
	.done(function(response){ 
		console.log("insertion d'une question ou pas ?")
		console.log(response);
	})
	.fail(function(){
		console.log("FAIL add");
	})
	.always(function(){

	});


}



*/




