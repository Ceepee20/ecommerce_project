<?php 
session_start();
include_once "../classes/User.php";
if($_POST){

    if(isset($_POST["btnedit"])){
        $fullname = $_POST["fullname"];
        $id = $_POST["user_id"];
        if(empty($fullname) || empty($id)){
            $_SESSION["success"]="All fields are required";
            header("location:../editprofile.php");
            exit();
        }
        $upload = new User();
        $upload1 = $upload->update_profile($fullname,$id);

   if($upload1){
    $_SESSION["success"]="profile updated successful";
    header("location:../editprofile.php");
   }
    }
}

?>