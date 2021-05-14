<?php
session_start();

$_SESSION['user_id'] = null;
$_SESSION['username'] = null;
$_SESSION['email'] = null;
$_SESSION['lname'] = null;
$_SESSION['pass'] = null;
$_SESSION['status'] = null;
$_SESSION['user_role'] = null;

header("location:../../home.php");

?>