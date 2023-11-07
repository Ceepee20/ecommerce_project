<?php
// check if the logged in user is not an admin
if(!isset($_SESSION["admin_id"])){
    header("location:login.php");
    exit();

}



?>