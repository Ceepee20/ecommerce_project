

<?php
session_start();
error_reporting(E_ALL);
include "../classes/Admin.php";
include_once "../utilities/sanitizer.php";


if($_POST){
     if(isset($_POST["adminsign_btn"])){
        $fullname=sanitize($_POST["fullname"]);
        $email=$_POST["email"];
       $password=$_POST["password"];
        $confirm_password=$_POST["confirm_password"];
   
        // validation. If empty, I want to save an error message in sssion and refer user back to the register page
        if(empty($fullname) || empty($email)|| empty($password) || empty($confirm_password) ){
          $_SESSION["logerror"]="All fields are requirde";
          header("location:../signup.php");
            exit();
        }

        // $_SESSION["fullname"]=$fullname;
        // $_SESSION["email"]=$email;


        if($password != $confirm_password){
          $_SESSION["logerror"]="Password and confirm password do not match";
          header("location:../signup.php");
            exit();
        }

        if(strlen($password) <8){
          $_SESSION["logerror"]="Password lenght must be atleast 8 characters";
          header("location:../signup.php");
            exit(); 
        }
        $hashed_password=password_hash($password, PASSWORD_DEFAULT);
        
        $user1=new Admin();
        $feedbacks=$user1->singup_admin($fullname,$email, $hashed_password);
        if ( $feedbacks) {
         header("location:../login.php");
      } else {
          echo "Error";
      }

      
          
          }
    
}else{
    header("location:../signup.php");
}


?>