
function getWorkout(){
    
    $.get("includes/getWorkouts.php",function(response){
       console.log(response);
       response = JSON.parse(response);

       for(i=0; i<response.length; i++){
           addToPage(response[i]);
       }
       console.log(response[0].Lifts);
       //console.log(response[1]);
       //console.log(response[2]);
    });
    
    
}

function addToPage(data){
    var t1 = document.getElementById("testTable");
    console.log(data);
    t1.innerHTML += '<tr>\n\
                    <td>'+data.Lifts+'</td>\n\
                    <td>'+data.Sets+'</td>\n\
                    <td>'+data.Reps+'</td>\n\
                    <td></td>\n\
                </tr>';
    
    
                    
}