<?php
session_start();
require '../../Connection.php';

if(isset($_SESSION["id"]) && isset($_POST["selectid"])){
    $conn = GetMyConnection();
    $progId = $_POST["selectid"];
    $_SESSION['program_id'] = $progId;
    $_SESSION['program_name'] = $_POST["program_name"];
//    $tempList = $_POST['woDay'];
//    $woDay = "('".implode("','", $tempList)."')";
    $sql = "Select Exercise_Workout.ExWork_id, "
            . "    Exercise_Workout.Ex_id, "
            . "    Exercise.Ex_Name, "
            . "    Exercise_Workout.SetsAndReps, "
            . "    Exercise_Workout.WorkoutSequence, "
            . "    Exercise_Workout.Workout_id, "
            . "    W.Workout_Day "
            . "From Exercise_Workout "
            . "             join Exercise on Exercise_Workout.Ex_id = Exercise.Exercise_id "
            . "             join Workout W ON Exercise_Workout.Workout_id = W.Workout_id "
            . "Where W.Program_ID = $progId "
            . "ORDER BY W.Workout_Day ASC, Exercise_Workout.WorkoutSequence ASC ";
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
