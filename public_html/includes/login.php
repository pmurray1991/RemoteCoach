<?php 
require '../../Connection.php';
if(isset($_POST['email'])&& isset($_POST['password'])){
    
    $email = $_POST['email'];
    $pass = hash('sha256',trim($_POST['password']));
    //echo $pass;
    $conn = GetMyConnection();
    $sql = "Select  Person_id "
            ."From  Person "
            ."Where email = '$email' "
            . "and  password = '$pass'" ;
    
    $result = mysqli_query($conn,$sql);
    if($result){
        session_start();
        $row = $result->fetch_row();
        $_SESSION["login"]="1";
        $_SESSION["id"]= $row[0];
        //echo mysql_result($result,0);
        echo $_SESSION["id"];
    }else {
        echo "0";
    }
    CleanUpDB();
}else{
    echo "didn't work";
}




?>
