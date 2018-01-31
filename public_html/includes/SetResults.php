<?php
/**
 * Created by IntelliJ IDEA.
 * User: paulmurray
 * Date: 1/31/18
 * Time: 7:59 AM
 */

session_start();
require '../../Connection.php';

if(isset($_SESSION["id"]) && isset($_POST["Results"])){
    $conn = GetMyConnection();
    $results = $_POST["Results"];
    $person_id = $_SESSION["id"];
    $sql = "";
    for ($i = 0; $i<sizeof($results); $i++){
        $workout_id = $results[$i][0];
        $res_input = $results[$i][1];
        $sql .= "INSERT INTO Results (Person_id, Exercise_Workout_id, result) VALUES($person_id, $workout_id, '$res_input') ON DUPLICATE KEY UPDATE result='$res_input'";
        if($i != sizeof($results)-1){
            $sql.=";";
        }
    }
    $results = mysqli_multi_query($conn, $sql);
    echo($results);
}


?>