/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var request;
$("#login-nav").submit(function(event){
    event.preventDefault();
    if(request){
        request.abort();
    }
    var $form = $(this);
    var $inputs = $form.find("input, select, button, textarea");
    var serializedData = $form.serialize();
    
    /*$inputs.prop("disabled", true);
    request = $.ajax({
       url: "includes/login.php",
       type: "post",
       data: serializedData
    });*/
    
    $.post("includes/login.php",serializedData,function(response){
        console.log(response);
       if(response != "0"){

           var temp = {"userId": response};
           // temp.userId = response;
           localStorage.setItem("Session", temp);
           window.location.href = "";
       }
    });
    
    /*request.done(function (response, textStatus, jqXHR){
        // Log a message to the console
        console.log("Hooray, it worked!");
        console.log("response: "+ response);
    });*/

    // Callback handler that will be called on failure
    /*request.fail(function (jqXHR, textStatus, errorThrown){
        // Log the error to the console
        console.error(
            "The following error occurred: "+
            textStatus, errorThrown
        );
    });*/

    // Callback handler that will be called regardless
    // if the request failed or succeeded
    /*request.always(function () {
        // Reenable the inputs
        $inputs.prop("disabled", false);
    });*/
});

