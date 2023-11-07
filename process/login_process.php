

<?php 
session_start();
include_once "../classes/User.php";


session_start();
include_once "../classes/User.php";

if($_POST){
    if(isset($_POST["logbtn"])){
        
    
        // fetch form values
        $user_email= $_POST['email'];
        $user_password=  $_POST['password'];
         
         
       
        //validate email &password field not empty
        if(empty($user_email) || empty($user_password)){
            $_SESSION["errorlogin"]="All fields are required";
            header("location:../login.php");
           
            exit();
        }   

         $user1 = new User();
        
         echo$feedbacks=$user1->login($user_email,$user_password);
         if($feedbacks ==1){
            echo"yes ";
            header("location:../profile.php");
            
        }else{
            $_SESSION["errorlogin"]= "Incorrect Password";
            header("location:../login.php");
               
           }
        

    }

}else{
    header("location:../login.php");
}

?>