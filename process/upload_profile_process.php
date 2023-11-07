<?php
error_reporting(E_ALL);
require_once "../classes/User.php";

if($_POST){
        if(isset($_POST["uploadbtn"])){
            
            $user_id = $_POST["user_id"];

            $profile =$_FILES["profile"];

             //do file error validaton
    $error = $profile["error"];
    if($error > 0){
        echo "please upload a valid file";
        exit();
    }
        //validate file size
        $file_size = $profile["size"];
        //limit in this case is:2097152
        if($file_size > 2097152){
            echo "Your profile picture cannot be larger than 2mb";
            exit();
        }
        //validate file type via the extension

        $allowed = ["JPEG","jpg","PNG"]; //file extension that we allow
        $filename = $profile["name"];
        // weare trying to get the extension of the user upload file

        $arrfilename = explode(".",$filename);
        $file_ext = end($arrfilename);
//if the file extension they tried to upload is not in our list of acceptable files
        if(!in_array($file_ext,$allowed)){
            echo "please upload an image of type png and jpg";
            exit();
        }


        $final_filename  = "ecomerce" . time() . "." . $file_ext;

        $destination ="../uploads/$final_filename";
        $tempo =$profile["tmp_name"];

        $fileUploaded = move_Uploaded_file($tempo,$destination);


        //if the upload is successful send the filename and user id to user class method where it will be updated
        if($fileUploaded){
            $user = new User();
            $response = $user->upload_profile_image($user_id,$final_filename);
            if ($response){
                header("location:../profile.php");
            }
        }

        }
}else{
    header("location:../index.php");
}




?>