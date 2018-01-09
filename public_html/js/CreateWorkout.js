function loadNewWorkout(){
    history.pushState({},"","create/new");
    $("#CreateNew").show();
    $("#ExistingOrNew").hide();
};
$(document).ready(function(){
    $.post("includes/GetWorkoutPrograms.php",{},function(response){
        //console.log("response: " + response); 
        var res = jQuery.parseJSON(response);
        //console.log(res);
        for(var i = 0; i < res.length;i++){
            var obj = res[i];
            $("#ExistingPrograms").append("<div class=\"row\" id=\""+obj["id"]+"\"><p class=\"col-xs-5\" id=\""+obj["Pro_Name"]+"\">"+obj["Pro_Name"]+"</p><button class=\"btn btn-warning col-xs-3\">Edit</button><button class=\"btn btn-danger col-xs-3 col-xs-offset-1\">Delete</button></div>");
        }
        
    });
});
/*function DeleteWorkout(e){
    var delId = $(this).parent().attr("id");
    console.log(delId);
}*/
$(document).on("click",".btn-warning",function(){
    alert(""+$(this).parent().attr("id"));
    alert(""+$(this).siblings("p").attr("id"));
    $(".container").empty();
    $(".container").load("includes/CreateProgram.php");
});
$(document).on("click",".btn-danger",function(){
    var delId = $(this).parent().attr("id");
    $(this).parent().remove();
    console.log("Id to Delete: "+ delId);
    $.post("includes/DeleteWorkoutProgram.php",{"delId": delId},function(response){
        console.log("response: " + response);
        if(response == 0){
            console.log("remove worked");
            //$("#"+delId).remove();
        }
    });
    
});
function NewWorkoutProgram(){
    var pName = $("#programName").val();
    var pDesc = $("#ProgramDescription").val();
    $.post("includes/NewWorkout.php",{"ProgramName": pName, "ProgramDescription": pDesc},function(response){
        console.log("response: " + response); 
        if(response){
            var newId = response;
            $("#ExistingPrograms").append("<div class=\"row\" id=\""+newId+"\"><p class=\"col-xs-5\" id=\""+pName+"\">"+pName+"</p><button class=\"btn btn-warning col-xs-3\">Edit</button><button class=\"btn btn-danger col-xs-3 col-xs-offset-1\">Delete</button></div>");
            $("#myModal").modal('toggle');
        }
    });
}
