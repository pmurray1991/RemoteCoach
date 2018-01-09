<?php
session_start();
require '../../Connection.php';

$conn = GetMyConnection();
$sql = "Select  UnitID,"
        . "     Measure "
        ."From  UnitsOfMeasure";
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
