<?php
session_start();
require '../../Connection.php';
if(isset($_SESSION["id"])){
    $creator = $_SESSION["id"];
    $conn = GetMyConnection();
    $sql = "Select  Program_id,"
            . "     Pro_Name,"
            . "     Date_created "
            ."From  Program "
            ."Where Creator_id = '$creator' ";
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





?>
