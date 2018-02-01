/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var tableHead = "<div class=\"row\">\
            <div class=\"col-xs-3\"><label>Delete Row</label></div>\
            <div class=\"col-xs-3\"><label>Exercise Sequence</label></div>\
            <div class=\"col-xs-3\"><label>Exercise</label></div>\
            <div class=\"col-xs-3\"><label>Reps and Sets</label></div>\
        </div>";
var woID;
var woDay;
var workoutsList;
$(function(){
    console.log("Create Workout Page");
    $.post("includes/GetWorkoutPrograms.php",{},function(response){
        
        var res = JSON.parse(response);
        console.log(response);
        for(var i = 0; i < res.length;i++){
            var obj = res[i];
            $("#ProgramsList").append('<li><a href="#WorkoutsPage" id="'+obj["Program_id"]+'" data-toggle="tab" aria-expanded=\"false\">'+obj.Pro_Name+'</a></li>')
           //addToPage(response[i]);
        }
    });
    $.post("includes/GetExercises.php",{},function(response){
        var res = JSON.parse(response);
        //console.log(response);
        for(var i = 0; i < res.length;i++){
            var obj = res[i];
            $("#workoutEx").append("<option id=\""+obj["Exercise_id"]+"\">"+obj["Ex_Name"]+"</option")
           //addToPage(response[i]);
        }
    });
 });
 var selProgId;
 $("#ProgramsList").on("change",function(){
     selProgId = $("#ProgramsList").children(":selected").attr("id");
     console.log(selProgId);
     $.post("includes/GetWorkoutDay.php",{"selectid":selProgId},function(response){
        var res = JSON.parse(response);
        console.log(response);
        for(var i = 0; i < res.length;i++){
            var obj = res[i];
            $("#workoutDay").append("<option id=\""+obj["Workout_id"]+"\">"+obj["Workout_Day"]+"</option")
        }
     });
         
     
     $("#pSelect").hide();
     $("#CWEW").fadeIn();
     $("#dayInput, #theExercise, #SetsAndReps, #WorkoutSequence").fadeIn();
     
 });
 $("#ProgramsList").on("click","li a",function(){
     woID = $(this).attr("id");
     $("#editWorkout").fadeOut();
     workoutsList = {};
     $.post("includes/GetDaysWorkout.php",{"program_ID": woID},function(response) {
         var res = JSON.parse(response);
         console.log(response);
         for (var i = 0; i < res.length; i++) {
             var obj = res[i];

             var ewString = editWorkoutString(obj);
             console.log(workoutsList);
             if(!(obj["Workout_Day"] in workoutsList)) {
                 workoutsList[obj["Workout_Day"]] = [];
             }
             workoutsList[obj["Workout_Day"]].push(ewString)
         }
     });
     $("#datepicker").datepicker({
         "dateFormat": 'yy-mm-dd',
         beforeShowDay: function(date){

             var search = date.getFullYear() + '-' + ('0'+(date.getMonth() + 1)).slice(-2) + '-' + date.getDate();
             if(search in workoutsList){
                 // alert(search);
                 return [true, 'highlight', search]
             }
             return [true, '', '']
         }
     });
 });


$("#datepicker").on('change',function(event){
    event.preventDefault();
    var date = $("#datepicker").datepicker("option", "dateFormat", "yy-mm-dd" ).val();
    $("#editWorkout").empty();
    $("#editWorkout").append(tableHead);

    // woDay = date;
    console.log(date);
    var selectedDay = date;
    if(date in workoutsList){
        for(var i = 0; i < workoutsList[date].length; i++){
            $("#editWorkout").append(workoutsList[date][i])
        }
    }

    $("#editWorkout").fadeIn();
});




 var deleteRow;
$(document).on("click","span.glyphicon.glyphicon-minus-sign.btn",function(){
    deleteRow = $(this).parent().parent();
    console.log(deleteRow);
    //var y = x.parent().attr("class");
    //$("#"+$(this).parent().attr("id")).remove();
    
});

$(document).on("click","#deleteRow",function(){
    console.log("DeleteRow, got here!");
    console.log(deleteRow);
    var toDelete =deleteRow.attr("id");
    console.log(toDelete);
    $.post("includes/DeleteExWork.php",{"ExWork_id": toDelete},function(response){
        console.log(response);
        if(resposne = -1){
            deleteRow.remove();
        }
    });
});
    

function editWorkoutString(sequence){
    var seqString = "<div class=\"row\" id=\""+sequence["ExWork_id"]+"\">\
                        <div class=\"col-xs-3\"><span data-toggle=\"\modal\" data-target=\"#youSure\" style=\"color:red\" class=\"glyphicon glyphicon-minus-sign btn\"></span></div>\
                        <div class=\"col-xs-3\" id=\""+sequence["WorkoutSequence"]+"\">"+sequence["WorkoutSequence"]+"</div>\
                        <div class=\"col-xs-3\" id=\""+sequence["Ex_id"]+"\">"+sequence["Ex_Name"]+"</div>\
                        <div class=\"col-xs-3\" id=\""+sequence["SetsAndReps"]+"\">"+sequence["SetsAndReps"]+"</div>\
                    </div>";
    return seqString;
            
}