<?php $this->layout('layout', ['title' => $play['quizTitle']]) ?>

<?php $this->start('main_content') ?>

    <div class="page-header">
        <h1><?= $play['quizTitle'] ?></h1>
    </div>

    <?= !empty($alerts) ? $alerts : '' ?>

    <?php
    $panels = '';
    $tabs =
    '<div class="panel panel-default">
        <div class="panel-heading">Naviguer dans les questions</div>
            <div class="panel-body">';

    $i = 1;
    $countQuestions = count($play['questions']);
    foreach($play['questions'] as $question){
        $tabs .= '<a class="label label-info question-nav" role="button" data-question="'.$i.'" data-questionID="'.$question['id'].'" title="Afficher la question '.$i.'">'.$i.'</a>';
        $panels .= '
        <div class="panel panel-default question" id="question'.$i.'">
            <div class="panel-heading">
                <h3 class="panel-title"><span class="badge pull-right">Question '.$i.' / '.$countQuestions.'</span>'.$question['title'].'</h3>
            </div>
            <div class="panel-body">
                <button type="button" value="'.$i.'" class="btn btn-default btn-warning btn-mark pull-right">Marquer</button>';
        foreach($question['choices'] as $choice){

            if($question['solutionsCount'] > 1){
                $panels .= '<div class="checkbox"><label for="choice'.$choice['id'].'"><input type="checkbox" name="'.$question['id'].'[]" id="choice'.$choice['id'].'" value="'.$choice['id'].'"> '.$choice['title'].'</label></div>';
            }
            else{
                $panels .= '<div class="checkbox"><label for="choice'.$choice['id'].'"><input type="radio" name="'.$question['id'].'" id="choice'.$choice['id'].'" value="'.$choice['id'].'"> '.$choice['title'].'</label></div>';
            }
        }
        $panels .='
            </div>
        </div>';
        $i++;
    }
  
    $tabs .= '
            <hr>Légende :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="label label-info">&nbsp;&nbsp;</span>non répondu&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="label label-primary">&nbsp;&nbsp;</span>répondu&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="label label-warning">&nbsp;&nbsp;</span>marquée à revoir
        </div>
    </div>';
    ?>

    <?= $tabs ?>

    <?= $panels ?>

    <button type="button" id="prevQuestion" class="btn btn-primary pull-left question-nav"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>Question précédente</button>
    <button type="button" id="nextQuestion" class="btn btn-primary pull-right question-nav" data-question="2">Question suivante <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></button>
    
<?php $this->stop('main_content') ?>

<?php $this->start('scripts') ?>

    <script>
    //////
    // Quiz session initialization

    // Set current question id
    var currentQuestion = 1;

    // Set last question id
    var lastQuestion = <?= $countQuestions ?>;
    
    // Hide prev button
    $("#prevQuestion").hide();
    
    // Hide all question panels
    $(".question").hide();
    
    // Show first question panel
    $("#question1").show();


    //////
    // Quizz session events

    // Switch question event
    $(".question-nav").on("click", function(){
        
        // Get question id selection
        var switchTo = $(this).data("question");

        // Set selection to current
        currentQuestion = switchTo;

        // Change data in next & prev buttons
        var prev = currentQuestion - 1;
        var next = currentQuestion + 1;
        $("#prevQuestion").data("question", prev);
        $("#nextQuestion").data("question", next);


        // Reset buttons display
        $("#nextQuestion").show();
        $("#prevQuestion").show();

        // Check if some button needs to be hidden
        if(currentQuestion == 1){
            $("#prevQuestion").hide();
        }
        else if(currentQuestion == lastQuestion){
            $("#nextQuestion").hide();
        }

        // Hide all question panels
        $(".question").hide();

        // Show current question panel
        $("#question" + currentQuestion).fadeIn("fast");
    });

    // Check/uncheck choice event
    $("input[type=checkbox], input[type=radio]").on("click", function(){
        
        // Get question targetted
        var name = $(this).attr("name");
        var questionId = parseInt(name);
        
        // Reset question tab style
        $('a[data-questionID="' + questionId + '"]').removeClass('label-info label-primary');

        // Question is answered ?
        var nbChecked = $('input[name="' + name + '"]:checked').length;
        if(nbChecked > 0){
            $('a[data-questionID="' + questionId + '"]').addClass('label-primary');
        }
        else{
            $('a[data-questionID="' + questionId + '"]').addClass('label-info');
        }
    });

    // Question mark event
    $(".btn-mark").on("click", function(){
        // Get question number
        var questionNumber = $(this).val();
        
        // Get question panel
        var questionPanel = $("#question" + questionNumber);

        // Get question tab
        var questionTab = $('a[data-question="' + questionNumber + '"]');
        
        // Toggle warning style
        questionPanel.toggleClass("panel-warning");
        questionTab.toggleClass("label-warning");
        $(this).toggleClass("btn-warning");
        
    });

    </script>

<?php $this->stop('scripts') ?>
