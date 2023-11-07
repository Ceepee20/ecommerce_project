<?php 
session_start();

include_once "../classes/User.php";
if($_POST){

    if(isset($_POST["btnchange"])){
        $oldpass = $_POST["oldpassword"];
        $newpass = $_POST["newpassword"];
        $id = $_POST["user_id"];
        if(empty($oldpass) || empty($newpass) || empty($id)){
            $_SESSION["success"]="All fields are required";
            header("location:../changepassword.php");
            exit();
        }

        $upload = new User();
        $upload1 = $upload-> fetch_user_details($id);
        $oldpassword = $upload1["user_password"];
        $password_verify= password_verify($oldpass,$oldpassword);
        if($password_verify){
          $upload2 = $upload->update_password( $oldpass, $newpass,$id);
          if($upload2){
            $_SESSION["success"]="password updated successful";
            header("location:../changepassword.php");
        }else{
            $_SESSION["success"]="password not updated";
            header("location:../changepassword.php");

        }
        }else{
            $_SESSION["success"]= " please confirm old password matches previous password";
            header("location:../changepassword.php");
        }

      
            }
}

?>
 