<?php
/**
 * Created by IntelliJ IDEA.
 * User: paulmurray
 * Date: 1/31/18
 * Time: 11:25 AM
 */
session_start();
require '../../Connection.php';

if(isset($_SESSION["id"]) && isset($_SESSION["program_id"])){
    $conn = GetMyConnection();
    $user = $_SESSION["id"];
    $program_id = $_SESSION["program_id"];
//    $tempList = $_POST['woDay'];
//    $woDay = "('".implode("','", $tempList)."')";
    $sql = "SELECT Exercise_Workout.ExWork_id, 
                   Exercise_Workout.Ex_id,
                   Exercise.Ex_Name, 
                   Exercise_Workout.SetsAndReps, 
                   Exercise_Workout.WorkoutSequence, 
                   Exercise_Workout.Workout_id,  
                   W.Workout_Day,
                   Results.result,
             FROM Person JOIN Results on Person.Person_id=Results.Person_id 
                                JOIN Exercise_Workout on Results.Exercise_Workout_id = Exercise_Workout.ExWork_id 
                                Join Workout W ON Exercise_Workout.Workout_id = W.Workout_id
                                JOIN Exercise on Exercise_Workout.Ex_id=Exercise.Exercise_id
             WHERE Results.Person_id = $user 
               AND W.Program_ID = Program_ID";
    $result = mysqli_query($conn,$sql);
    $data =array();
    if($result){
        while ($row = $result->fetch_object()){
            $data[] = $row; // add the row in to the results (data) array
        }
        echo json_encode($data);
    }
    else{
        echo "didn't work";
    }

}else{
    echo "didn't make it";
}
?>