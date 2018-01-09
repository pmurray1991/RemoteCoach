<?php
	
	
$server = "rcdb.c10fcyxbphd5.us-east-1.rds.amazonaws.com:3306";
$username = "pMurray";
$password = "dudeman12";

$link = mysql_connect($server,$username,$password);
if(!$link){
    die('Could not connect: ' . mysql_error());
}

mysql_close();

?>