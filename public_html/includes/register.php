<?php
require '../../Connection.php';
if(isset($_POST['email'])&& isset($_POST['password'])){
    $email = $_POST['email'];
    $pass = hash('sha256',trim($_POST['password']));
    $conn = GetMyConnection();
    
    $sql = "INSERT INTO Person (email, password)"
            ."Values('$email', '$pass')" ;
    $result = mysqli_query($conn,$sql);
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
