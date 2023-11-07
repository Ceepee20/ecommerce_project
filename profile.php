<?php

session_start();
include_once "guards/user_guard.php";

require_once "classes/User.php";

if(isset($_SESSION["user_id"])){

   $user_id = $_SESSION["user_id"];
  
    $userr = new User();
    $user = $userr->fetch_user_details($user_id);

    //  echo "<pre>";
    //     print_r ($user);
    //  echo "</pre>";
    //  die();
     include_once "partial/header.php";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
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
    
    <div class="row" style="position: relative;top:130px;height:600px">
         <div class="col-md-3 mb-4">
    <div class="card mb-4">
      <div class="card-header py-3">
        <img src="image/ceo1.jpg" class="img-fluid rounded-circle">
      </div>
      <div class="card-body">
       <div class="row">
        <div class="col-12">
            <div class="text-center mb-3">
            <h5 class="mb-0">Welcome <?php echo $user['user_name']; ?></h5>
            </div>
             <div class="col-12 text-center">
            <a href ="uploadprofilepicture.php" class="btn btn-primary btn-block btn-sm">
          Change Picture
</a>
       </div>
            <hr>
            <div>
            <span><b><?php echo $user['user_name']; ?></b></span>
            <span><i>Member Since <?php echo $user['user_created'];?></i></span>
            
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
      <div class="card-body" style="min-height:200px">
       <p>You can use the navigation at the top of the page to move around the site and the navigations below to carry out tasks on the platform</p>
       <p><a href="editprofile.php">Edit My Profile</a></p>
        <p><a href="changepassword.php">Change Password</a></p>
         <p><a href="signup.php">Logout</a></p>
      </div>
    </div>
  </div>
</div>
</div>
<?php
include_once "partial/footer.php";
?>
</div>
<script src="bootstrap/js/bootstrap.bundle.js"></script>
</body>
</html>