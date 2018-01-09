var request;
var match;

$("#register-nav").submit(function(event){
    event.preventDefault();
    if(request){
        request.abort();
    }
    
    var $form = $(this);
    var $inputs = $form.find("input, select, button, textarea");
    var serializedData = $form.serialize();
    
    $inputs.prop("disabled", true);
    //request = $.ajax({
    //   url: "includes/register.php",
    //   type: "post",
    //   data: serializedData
    //});
    $.post("includes/register.php",serializedData,function(response){
       console.log("response: " + response); 
       if(response == 0){
           $("#content").clear;
            $("#content").load("html/RegRedirect.html");
       }
    });
    //request.done(function (response, textStatus, jqXHR){
        // Log a message to the console
    //    console.log("Hooray, it worked!");
    //    console.log("response: "+ response);
    //});

    // Callback handler that will be called on failure
    //request.fail(function (jqXHR, textStatus, errorThrown){
       // Log the error to the console
    //    console.error(
    //        "The following error occurred: "+
    //        textStatus, errorThrown
    //    );
    //});

    // Callback handler that will be called regardless
    // if the request failed or succeeded
    /*request.always(function () {
        // Reenable the inputs
        $inputs.prop("disabled", false);
    });*/
    
});