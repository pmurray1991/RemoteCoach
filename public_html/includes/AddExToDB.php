<?php
session_start();
require '../../Connection.php';

if(isset($_POST['Ex_Name'])&& isset($_SESSION["id"])&& isset($_POST['UnitMeasure'])){
    $conn = GetMyConnection();
    $Ex_Name = $_POST['Ex_Name'];
    $Ex_Desc = $_POST['Ex_Desc'];
    $UnitMeasure = $_POST['UnitMeasure'];
    $Ex_Url = $_POST['Ex_Url'];
    
    $check = "Select Exercise_id "
            . "From Exercise "
            . "Where Upper(Ex_Name) = Upper($Ex_Name)";
    $checkResult = mysql_query($check);
    
    if(!$checkResult){
    //$phpdate = strtotime( $mysqldate );
    //echo $_SESSION["id"];
    //echo $mysqldate; 
        $sql = "INSERT INTO Exercise (Ex_Name, Ex_Desc, Ex_Video, UnitMeasure)"
                ."Values('$Ex_Name', '$Ex_Desc','$Ex_Url','$UnitMeasure')" ;
        $result = mysql_query($sql);
        if($result){
            echo "".mysql_insert_id();
        }else {
            echo "error: " . $conn->error;
        }
    }else{
        echo -1;
    }
    CleanUpDB();
}else{
    echo "didn't work";
}

?>
