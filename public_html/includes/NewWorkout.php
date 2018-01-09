<?php
session_start();
require '../../Connection.php';

if(isset($_POST['ProgramName'])&& isset($_SESSION["id"])){
    $conn = GetMyConnection();
    $pName = $_POST['ProgramName'];
    $pDecr = $_POST['ProgramDescription'];
    $mysqldate = date( 'Y-m-d H:i:s');
    //$phpdate = strtotime( $mysqldate );
    $creator = $_SESSION["id"];
    //echo $_SESSION["id"];
    //echo $mysqldate; 
    $sql = "INSERT INTO Program (Pro_Name, Program_Description, Date_Created, Person_id)"
            ."Values('$pName', '$pDecr',NOW(),'$creator')" ;
    $result = mysqli_query($conn,$sql);
    if($result){
        echo "".$result;
    }else {
        echo "error: " . $conn->error;
    }
    CleanUpDB();
}else{
    echo "didn't work";
}

?>

