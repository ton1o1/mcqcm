	console.log("JS start !");

	var $searchQuestion = $("#search-question");
	var $urlVal = $("#search-question").attr("data-url");
	var $resultsList = $(".results-list");
	var $details = $(".details");
	console.log($urlVal);

/****************************************
RECHERCHE VIA REQUETE AJAX
****************************************/
	$searchQuestion.on("keyup", function(e){
		//interdit les erreurs bloquantes
		e.preventDefault();
		$details.empty();
		$resultsList.empty();

		$searchQuestionVal = $searchQuestion.val();
		//la recherche s'active à partir de 2 caractères dans le text input
		if ($searchQuestionVal.length>=2){
			console.log($urlVal)
			$.ajax({	
				"url": $urlVal,
				"data" : {
					"input" : $searchQuestionVal
				},
				"dataType": 'json', 
				"type": "GET"
			})
			.done(function(response){ 
			//$response ici récupère la réponse de la requête AJAX		
				console.log(response.length);
				console.log(response);
				//affiche le nombre de résultats si supérieur à 5
				if(response.length > 5){
					$details.html( response.length + " résultats au total sur 5 affichés");
				}
				if(!response){
					$details.empty();
					$details.html(" 0 résultat");					
				}

				for (var i = 0, c = 5; i < c; i++){
					console.log(response[i].title + response[i].id + " coucou")
			
						$id = response[i].id;
						$tdId = $("<td>").html($id + ", ");
			
						$title = response[i].title;
						$tdTitle = $("<td>").html($title + ", ");
			
						$button = $("<button>");
						$button.html("Ajouter au quiz").attr("data-id",$id).addClass("btn btn-default"	);
						$tdButton = $("<td>").append($button);
	
						$button.on("click", function(e){
							e.preventDefault;								
							$questionId = $(this).attr("data-id")
							$quizId = $("#quizId").val()
							$thisButton = $(this);
							
							ajaxAddQuestionjs($questionId, $quizId, $thisButton);
									
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


	function ajaxAddQuestionjs($questionId, $quizId, $button){
		console.log($urlVal.replace("questionrecherche","questionajouter"))
		$route = $urlVal.replace("questionrecherche","questionajouter");
			console.log("quizId:" + $quizId + " et " + "questionId:" + $questionId)
		$.ajax({
			"url": $route, //ok, on se rend independant de 					l'url local
			"data" : { //ecrit automatiquement ?foo=bar à la fin de l'url
				"quizId" : $quizId, 
				"questionId" : $questionId,
			},
			"dataType": 'text', 
			"type": "POST"
		})
		.done(function(response){ 
			console.log(response);
			if(response){
				$button.html("déjà ajouté !").removeClass("btn-default").addClass("btn-warning");
			} else {
				$button.html("Ajouté!").removeClass("btn-default").addClass("btn-success");
			}
			
		})
		.fail(function(){
			console.log("FAIL add");
		})
		.always(function(){
			//console.log("...");
		});
	}
