<?php 
require '../../Connection.php';

//if(isset($_SESSION["id"])){
    $conn = GetMyConnection();
    $sql = "Select Exercise.Ex_Desc as Lifts, Workout.Set_id as Sets, Workout.repstart_id as Reps "
            . "From Workout join Exercise on "
            . "Workout.Exercise_id = Exercise.id "
            . "Where Workout.id = 1";
    $result = mysqli_query($conn,$sql);
    $rows = array();
    while($r = $result->fetch_object()) {
        $rows[] = $r;
    }

    //echo($rows);
    echo json_encode($rows);
    //echo json_encode(mysql_fetch_array($result));
//}
?>