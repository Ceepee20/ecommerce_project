<?php 
error_reporting(E_ALL);

if(!isset($_SESSION["user_id"])){
    header("location:login.php");
    exit();

}
?>