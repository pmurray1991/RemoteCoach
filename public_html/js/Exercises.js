/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function(){
    
    $.get("includes/GetUnitsOfMeasure.php",function(response){
       console.log(response);
       response = JSON.parse(response);

       for(i=0; i<response.length; i++){
           $("#UnitMeasure").append("<option id=\""+response[i].UnitID+"\">"+response[i].Measure+"</option")
           //addToPage(response[i]);
           console.log(response[i]);
       }
       //console.log(response[0].Lifts);
       //console.log(response[1]);
       //console.log(response[2]);
    });
    
    
});

$(document).on("click","#AddExerciseButton",function(e){
    e.preventDefault()
    var exName = $("#exerciseName").val();
    var exDesc = $("#exerciseDescription").val();
    var exUrl = $("#Ex_URL").val();
    var unOMes = $("#UnitMeasure").children(":selected").attr("id");
    
    var NewExercise = {"Ex_Name": exName,
                       "Ex_Desc": exDesc,
                       "Ex_Url" : exUrl,
                       "UnitMeasure": unOMes};
    $.post("includes/AddExToDB.php",NewExercise,function(result){
        console.log(result);
        if(result == -1){
            $("#exerciseName").addClass("alert-danger");
            $("#ExistEx").show();
        }
    });
    
});