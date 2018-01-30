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
        console.log("Programs ID: "+$("#programsText").data('value'));
        setWorkouts($("#programsText").data('value'))
    }
   
});


function setWorkouts(selId){
    var getDaysWorkout = {
        "selectid": selId,
        "program_name": $("#programsText").text()
    };
    $.post("includes/GetDaysWorkout.php", getDaysWorkout, function (response) {
        console.log(response);
        response = JSON.parse(response);
        var workout_days = {};
        var start_day = moment(response[0].Workout_Day).format('YYYY-MM-DD');
        var end_day = moment(response[response.length-1].Workout_Day).format('YYYY-MM-DD');
        while(start_day <= end_day){
            if(!(start_day in workout_days)){
                workout_days[start_day]= [];
            }
            start_day = moment(start_day, "YYYY-MM-DD").add(1, 'days').format('YYYY-MM-DD');
        }
        for(i=0; i<response.length; i++){

            workout_days[response[i].Workout_Day].push(response[i]);
            // response_date = response[i].Workout_Day;
            // response_data = response[i];
            // // addWorkoutToList(response_date, response_data);
            // column_index = daylist.indexOf(response_date)+1;
            // $("#Workout_"+column_index).append('<p scope="col">'+response[i].Ex_Name+'</p>');

        }
        addWorkoutToList(workout_days);

    });
}

function addWorkoutToList(workout_days){
    // var start_date = moment().format('YYYY-MM-DD');
    // console.log(workout_days);
    // var end_date = Object.keys(workout_days)[Object.keys(workout_days).length-1];
    // console.log(end_date);
    // while(start_date < end_date){
    //     if(!(start_date in workout_days)){
    //         workout_days[start_date]= [];
    //     }
    //     start_date = moment(start_date, "YYYY-MM-DD").add(1, 'days').format('YYYY-MM-DD');
    // }
    for(var k in workout_days){
        var formatted_date = moment(k).format('YYYYMMDD');
        var new_row = '<div class="container row workout-rows" id='+formatted_date+'>' +
                '<div class="WorkoutDate">'+
                    '<p>'+moment(k).format("MM/DD/YYYY")+'</p>'+
                '</div>'+
            '</div>';
        $("#WorkoutList").append(new_row);
        if(workout_days[k].length == 0){
            $("#"+formatted_date).append('<div class="rest-day">Rest Day</div>');
            continue;
        }

        for(var v in workout_days[k]){
            var lift_row = '<div class="wRows" id='+"ExID_"+workout_days[k][v].ExWork_id+'></div>';
            $("#"+formatted_date).append(lift_row);
            $("#ExID_"+workout_days[k][v].ExWork_id).append('' +
                '<div id='+workout_days[k][v].Ex_id+' class="col-xs-4">'+ workout_days[k][v].Ex_Name +'</div>'+
                '<div class="col-xs-4">'+ workout_days[k][v].SetsAndReps +'</div>'+
                '<div class="input-group col-xs-4">' +
                '<input type="text" class="" placeholder="Results">'+
                '</div>');
        }
        $("#"+formatted_date).append('<div class="submitWorkout btn ui-button col-xs-offset-5 col-xs-2 col-xs-offset-7">Submit</div>');


    }

};

$("#workoutProgramList").on('click','li a',function(){
   $("#programsText").text($(this).text());
   // $("#programsText").val($(this).data('value'));
   $("#programsText").data('value',$(this).data('value'));
   console.log($(this).data('value'));
   setWorkouts($(this).data('value'));


});

$(".seven-cols").on('click','div',function () {
    var divNumber = this.id.split("_")[1];


});

$('div').one('click','div.submitWorkout',function(e) {
    e.stopImmediatePropagation();
    var workout_data = $(this).siblings('.wRows').get();
    var submitted_data = {"WorkoutData":[]};
    for(var i in workout_data){
        var row_data = workout_data[i].children().get();
        submitted_data.WorkoutData.append({Ex_ID})

    }

    console.log(workout_data);
});
