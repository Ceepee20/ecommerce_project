

<?php 
session_start();
include_once "../classes/Admin.php";


if($_POST){
    if(isset($_POST["adminlog"])){
        
    
        // fetch form values
         $admin_email= $_POST['email'];
         $admin_password=  $_POST['password'];
       
        //validate email &password field not empty
        if(empty($admin_email) || empty($admin_password)){
            $_SESSION["login_error"]="All fields are required";
            header("location:../login.php");
           
            exit();
        }

         $log1 = new Admin();
        
        echo$feedbacks=$log1->login_admin($admin_email,$admin_password);
         if($feedbacks ==1){
            echo"yes ";
            header("location:../profile.php");
            
        }else{
            $_SESSION["login_error"]= "Incorrect Password";
            header("location:../login.php");
               
           }
        

    }

}else{
    header("location:../login.php");
}

?>

