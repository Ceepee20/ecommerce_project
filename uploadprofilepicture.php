<?php
session_start();
include_once "guards/user_guard.php";
require_once("partial/header.php");
require_once "classes/User.php";

if(isset($_SESSION["user_id"])){

    $user_id =$_SESSION["user_id"];

    $userr = new User();
    $user =$userr->fetch_user_details($user_id);

    //  echo "<pre>";
    //     print_r ($user);
    //  echo "</pre>";
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile Image Upload</title>
   <link href='bootstrap/css/bootstrap.css' rel="stylesheet" type="text/css">
   <link rel="stylesheet" href="assets/fontawesome/css/all.css">
    <style type="text/css">
    #container{     
             min-height:100px;
            
            
            display: flex;    
      }
 


      

    </style>
</head>
<body>
<div class="container-fluid">
    
    <div class="row">
         <div class="col-md-3 mb-4" style="position:relative;top:100px;  height: 35rem;">
    <div class="card mb-4">
      <div class="card-header py-3">
        <h5 class="mb-0">WELCOME <?php echo $user["user_name"]?></h5>
      </div>
      <div class="card-body">
       <div class="row">
        <div class="col-12">
            <div class="text-center mb-3">
                <img src="image/ceo1.jpg" class="img-fluid rounded-circle">
            </div>
             <div class="col-12 text-center">
            <button type="button" class="btn btn-primary btn-block btn-sm">
          Change Picture
        </button>
       </div>
            <hr>
            <div>
            <span><b><?php echo $user["user_name"]; ?></b></span>
            <span><i>Member Since<?php echo $user ["user_created"];?></i></span>
        </div>
        <hr>
            <div>
            
            <a href="profile.php"><<< Back To Profile</a>
        </div>
        </div>

      
       </div>
      </div>
    </div>
  </div>
  <div class="col-md-9 mb-4">
    <div class="card mb-4">
      <div class="card-header py-3">
        <h5 class="mb-0">Profile</h5>
      </div>
      <div class="card-body" style="min-height:400px">

      <form action= "process/upload_profile_process.php" method= "post" enctype="multipart/form-data">

        <div>
         <label for = "profile" class="my-2">Change profile picture</label>
        <input type="file" name="profile" id="profile" class="form-control">
    </div>

    <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">

        <input type="submit" name="uploadbtn" value="change" class="btn btn-primary">

      </form>
     
      </div>
    </div>
  </div>

 
</div>
</div>

 



<?php
require_once("partial/footer.php");
?>

           
         
<script src="bootstrap/js/bootstrap.bundle.js"></script>
</body>
</html>