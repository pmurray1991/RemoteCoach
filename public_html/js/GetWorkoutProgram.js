/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$("#datepicker").datepicker();
var daylist = [];
$(document).ready(function(){
    var today = new Date();
    var dayOfWeekStartingSundayZeroIndexBased = today.getDay(); // 0 : Sunday ,1 : Monday,2,3,4,5,6 : Saturday
    for(var i=0; i< 7; i++){
        thedate = new Date(today.getFullYear(), today.getMonth(), today.getDate()+i)
        daylist.push(moment(thedate).format("YYYY-MM-DD"));
        $("#DateButton_"+(i+1)).append('<p scope="col" id="date"'+i+1+'>'+moment(thedate).format("MM/DD/YYYY")+'<br></p>');
    }
    $.post("includes/GetWorkoutProgram.php",{},function(response){
       console.log(response);
       response = JSON.parse(response);

       for(i=0; i<response.length; i++){
           // if()
           $("#workoutProgramList").append('<li><a data-value='+response[i].Program_id+'>'+ response[i].Pro_Name+'</a></li>');
       }
       console.log(response[0].Program_id);
       //console.log(response[1]);
       //console.log(response[2]);

    });
    if($("#programsText").val() != "-1"){
        setWorkouts()
    }
   
});


function setWorkouts(){
    var getDaysWorkout = {
        "selectid": $("#programsText").data('value'),
        "woDay[]": daylist,
        "program_name": $("#programsText").text()
    };
    $.post("includes/GetDaysWorkout.php", getDaysWorkout, function (response) {
        console.log(response);
        response = JSON.parse(response);
        for(i=0; i<response.length; i++){
            response_date = response[i].Workout_Day;
            column_index = daylist.indexOf(response_date)+1;
            $("#Workout_"+column_index).append('<p scope="col">'+response[i].Ex_Name+'</p>');

        }

    });
}
$("#workoutProgramList").on('click','li a',function(){
   $("#programsText").text($(this).text());
   // $("#programsText").val($(this).data('value'));
   $("#programsText").data('value',$(this).data('value'));
   console.log($(this).data('value'));
   setWorkouts();


});

$(".seven-cols").on('click','div',function () {
    var divNumber = this.id.split("_")[1];


});


