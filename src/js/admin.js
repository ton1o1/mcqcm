$("#searchUserForm").on("submit",function(e){
    e.preventDefault();
});


$("#searchUser").on("keyup", function(){
    
    var $t = $(this).val();
    
    if($t.length > 1) {

        console.log($t);

        $.ajax({

            "url" : $("#searchUserForm").attr("action"),
                "type": $("#searchUserForm").attr("method"),
                "dataType" : "json",
                "data" : $("#searchUserForm").serialize()
            }).done(function(response){

                $("#userResult").empty();
                var responseLength = response.length;

                for(var i =0; i <responseLength; i++ ){

                    var user = response[i];
                    var line = '<a href="#" data-toggle="modal" data-target="#usermodal" class="list-group-item" id=' + user.id + ' >'   + user.email + " - " + user.first_name + " - " + user.last_name  + '</a>';
                    var  $content = $("#userResult").append(line);
                }
            });
    } else {
         $("#userResult").empty();
    }

});



function completeModal(){

    $currentUser = [];

    $currentUserId = { 'id' : $el.attr('id')};
    console.log("click on : " + $currentUserId.id);



    $.ajax({

        "url" : '/administrator/find-user/',
        "type": 'GET',
        "dataType" : "json",
        "data" : $currentUserId

    }).done(function(response){

        $("#usermodal__userName").empty();
        $("#usermodal__userStatus").empty();
        $("#usermodal__userId").empty();
        $("#usermodal__button").empty();
        
        var user = response;
        var $userName = user.last_name +" " + user.first_name;
        var $userStatus = user.is_active;
        var $userId = user.id;
        var $buttonText = (user.is_active == 1 ) ? 'suspendre' : 'activer';

        $("#usermodal__userName").append($userName);
        $("#usermodal__userStatus").val($userStatus);
        $("#usermodal__userId").val($userId);
        $("#usermodal__button").append($buttonText);

        $("#usermodal").addClass('in').css({"display": "block" ,"padding-right" : "17px"});


    });

}

//EventListener
$("#userResult").on('click', "a", function(e){

    e.preventDefault;
    $el = $(this);
    completeModal($el);


});


$("#userTable").on('click', "tr", function(e){

    e.preventDefault;
    $el = $(this);
    completeModal($el);


});

//inifiniteScroll
$('#jscroll').jscroll();
