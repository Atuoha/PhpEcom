<?php
$conn =  mysqli_connect("localhost","root","","ecom");

if(!$conn){
	die("DATABASE PROBLEM" + mysql_error($conn));
}



?>