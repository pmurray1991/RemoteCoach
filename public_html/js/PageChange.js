/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(".navbar-inverse a").on("click", function(){
    $(".nav.navbar-nav").find(".active").removeClass("active");
    $(this).parent().addClass("active");
    var contLink = "html/"+$(this).text().replace(/ /g,'') +".html";
    
    var clickId = ""+$(this).attr("id")
    //checkingHash(clickId);
    //console.log(''+clickId)
    /*if(clickId == "MakeProgram"){
        
        $(".container").load("includes/WorkoutPrograms.php");
    }*/
    
    /*switch(clickId){
        case "MakeProgram":
            $(".container").load("includes/WorkoutPrograms.php");
            break;
        case "ProgramPage":
            $(".container").load("html/Program.html");
    }*/
    //$("#content").load(contLink);
});

window.onload = function(){
    var hash = window.location.hash;
    console.log(hash);
    hash = hash.split("#")[1];
    console.log($("#"+hash).parent().addClass("active"));
    console.log("got here");
    if(hash != undefined){
        checkingHash(hash);
        $(".container").empty();
    }
    
};
function checkingHash(hashValue){
    $(".container").empty();
    switch(hashValue){
        case "MakeProgram":
            $(".container").load("includes/WorkoutPrograms.php");
            break;
        case "Program":
            $(".container").load("includes/Programs.php");
            break;
        case undefined:
            $(".container").load("includes/Programs.php");
            break;
        case "CreateExercise":
            $(".container").load("includes/CreateExercise.php");
            break;
        case "CreateWorkout":
            $(".container").load("includes/CreateWorkout.php");
            break;
        case "Logout":
            $(".container").load("includes/Logout.php");
            break;

    }
    return;
}
$(window).on('hashchange',function(){
    var hash = location.hash;
    hash = hash.split("#")[1];
    checkingHash(hash);
    $(".container").empty();
    console.log(""+hash);
});
/*$("#example-navbar-collapse a").on("click", function(){
    console.log("got here");
    $(".nav").find(".active").removeClass("active");
    $(this).parent().addClass("active");
    var contLink = "html/"+$(this).text().replace(/ /g,'') +".html";
    var contLink
    $("#content").clear;
    $("#content").load(contLink);
});*/


$("#register").click(function(){
    $(".container").clear;
    $(".container").load("html/Register.html");
});

/*$(window).bind('hashchange',function(){
    console.log("worked");
    $('.container').load("html/Program.html");
});*/