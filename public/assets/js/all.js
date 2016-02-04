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

        //init the modal
        $("#usermodal__userName").empty();
        $("#usermodal__userStatus").empty();
        $("#usermodal__userId").empty();
        $("#usermodal__userActivity1").prop('checked', false);
        $("#usermodal__userActivity2").prop('checked', false);
        $("#usermodal__userRole1").prop('checked', false);
        $("#usermodal__userRole2").prop('checked', false);

        //set values  and modifie modal content
        var user = response;
        var $userName = user.first_name +" " +  user.last_name.toUpperCase();
        var $userStatus = user.is_active;
        var $userId = user.id;
        var $userRole = user.role;
        //var $buttonText = (user.is_active == 1 ) ? 'suspendre' : 'activer';
        if($userStatus == '1'){
            $("#usermodal__userActivity1").prop('checked', true);
        }else{
            $("#usermodal__userActivity2").prop('checked', true);
        }

        if($userRole == 'student'){
            $("#usermodal__userRole1").prop('checked', true);
        }else{
            $("#usermodal__userRole2").prop('checked', true); 
        }

        $("#usermodal__userName").append($userName);
        //$("#usermodal__userStatus").val($userStatus);
        $("#usermodal__userId").val($userId);
        //$("#usermodal__button").append($buttonText);

        $("#usermodal").addClass('in');


    });

}
//display result when user search a word
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


//EventListeners

$("#searchUserForm").on("submit",function(e){
    e.preventDefault();
});


//add user info on modals when click search result
$("#userResult").on('click', "a", function(e){

    e.preventDefault;
    $el = $(this);
    completeModal($el);


});

//add user info on modals when click list result
$("#userTable").on('click', "tr", function(e){

    e.preventDefault;
    $el = $(this);
    completeModal($el);


});
