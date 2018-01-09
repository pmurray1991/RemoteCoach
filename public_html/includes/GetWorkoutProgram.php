<?php
session_start();
require '../../Connection.php';
if(isset($_SESSION["id"])){
    $creator = $_SESSION["id"];
    $conn = GetMyConnection();
    $sql = "Select  Program.Program_id,"
            . "     Program.Pro_Name,"
            . "     Program.Date_created "
            ."From  Program join Person_Program on Program.Program_id = Person_Program.Program_id  "
            ."Where Person_Program.Person_id = '$creator' ";
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
