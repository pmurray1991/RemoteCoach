<?php
session_start();
require '../../Connection.php';

if(isset($_SESSION["id"]) && isset($_POST["selectid"]) || isset($_POST["woID"]) || isset($_POST["program_ID"])){
    $conn = GetMyConnection();
    $user = $_SESSION['id'];
    $nested_sql="SELECT Results.Exercise_Workout_id FROM Results WHERE Person_id = $user";
    if(isset($_POST["selectid"])) {
        $progId = $_POST["selectid"];
        $where = "Where W.Program_ID = $progId AND Exercise_Workout.ExWork_id NOT in($nested_sql) ";
        $_SESSION['program_id'] = $progId;
    }elseif (isset($_POST["woID"])){
        $woID = $_POST["woID"];
        $woDay = $_POST["woDay"];
        $where = "Where W.Program_ID = $woID AND W.Workout_Day = \"$woDay\" ";
    }elseif (isset($_POST["program_ID"])){
        $progId = $_POST["program_ID"];
        $where = "Where W.Program_ID = $progId ";
    }


    if(isset($_POST["program_name"])) {
        $_SESSION['program_name'] = $_POST["program_name"];
    }


//    $tempList = $_POST['woDay'];
//    $woDay = "('".implode("','", $tempList)."')";
    $sql = "Select Exercise_Workout.ExWork_id, 
                   Exercise_Workout.Ex_id, 
                   Exercise.Ex_Name, 
                   Exercise_Workout.SetsAndReps, 
                   Exercise_Workout.WorkoutSequence, 
                   Exercise_Workout.Workout_id, 
                   W.Workout_Day 
            From Exercise_Workout 
                 join Exercise on Exercise_Workout.Ex_id = Exercise.Exercise_id 
                 join Workout W ON Exercise_Workout.Workout_id = W.Workout_id 
            {$where}
            ORDER BY W.Workout_Day ASC, Exercise_Workout.WorkoutSequence ASC ";

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
