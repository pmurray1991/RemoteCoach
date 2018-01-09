<?php
session_start();
require '../../Connection.php';

if(isset($_SESSION["id"]) && isset($_POST["ExWork_id"])){
    $conn = GetMyConnection();
    $ExWorkId = $_POST["ExWork_id"];
    $sql = "Delete From Exercise_Workout "
            . "Where ExWork_id = $ExWorkId";

    $result = mysql_query($sql);
    if($result){
        echo -1;
    }
    else{
        echo "didn't work";
    }
    
}else{
    echo "didn't make it";
}
