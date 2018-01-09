<?php
session_start();
require '../../Connection.php';

if(isset($_SESSION["id"]) && isset($_POST["selectid"])){
    $conn = GetMyConnection();
    $proId = $_POST["selectid"];
    $sql = "Select Workout_id, "
            . "Workout_Day "
            . "From Workout "
            . "Where Program_ID = $proId";
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