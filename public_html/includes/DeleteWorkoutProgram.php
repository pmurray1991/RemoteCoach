<?php
session_start();
require '../../Connection.php';
if(isset($_SESSION["id"]) && isset($_POST["delId"])){
    $delId = $_POST["delId"];
    $conn = GetMyConnection();
    
    $sql = "DELETE FROM Program "
            . "Where id = $delId";
    $result = mysql_query($sql);
    if($result){
        echo "0";
    }else {
        echo "error: " . $conn->error;
    
    }
    CleanUpDB();
}else{
    echo "didn't work";
}

?>