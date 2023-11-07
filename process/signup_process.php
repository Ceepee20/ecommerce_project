

<?php
session_start();
error_reporting(E_ALL);
include "../classes/User.php";
include_once "../utilities/sanitizer.php";

if($_POST){
     if(isset($_POST["sign_btn"])){
       echo $fullname=sanitize($_POST["fullname"]);
       echo $email=$_POST["email"];
       echo$password=$_POST["password"];
       echo $confirm_password=$_POST["confirm_password"];
   
        // validation. If empty, I want to save an error message in sssion and refer user back to the register page
        if(empty($fullname) || empty($email)|| empty($password) || empty($confirm_password) ){
          $_SESSION["logerror"]="All fields are requirde";
          header("location:../signup.php");
            exit();
        }

        // $_SESSION["fullname"]=$fullname;
        // $_SESSION["email"]=$email;


        if($password != $confirm_password){
            echo"Password and confirm password do not match";
           return false;
            exit();
        }

        if(strlen($password) <8){
           echo"Password lenght must be atleast 8 characters";
           return false;
            exit(); 
        }
        $hashed_password=password_hash($password, PASSWORD_DEFAULT);
        
        $user1=new User();
        echo$feedbacks=$user1->insertUsers($fullname,$email, $hashed_password);

      
           if($feedbacks ==1){
             echo"yes ";
             header("location:../login.php");
           }else{
            echo "no";
               
           }
          }
    
}else{
    header("location:../signup.php");
}


?>