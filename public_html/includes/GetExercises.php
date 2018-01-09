<?php
session_start();
require '../../Connection.php';

if(isset($_SESSION["id"])){
    $conn = GetMyConnection();
    
    $sql = "Select Exercise_id, "
            . "      Ex_Name "
            . "From Exercise ";
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
}