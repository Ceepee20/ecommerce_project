<?php
session_start();
require_once("partial/header.php");
include_once "classes/User.php";
if(isset($_SESSION["user_id"])){
    $user_id = $_SESSION["user_id"];

    $user1 = new User();
    $user= $user1->fetch_user_details( $user_id);

    $final_id = $user["user_id"];
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile Page</title>
   <link href='bootstrap/css/bootstrap.css' rel="stylesheet" type="text/css">
    <style type="text/css"></style>
</head>
<body>
<div class="container-fluid">
    
    <div class="row" style="position:relative; top:100px;min-height:40rem">
   
         <div class="col-md">
    <div class="card mb-4">
      <div class="card-header py-3">
        <h5 class="mb-0">Profile</h5>
      </div>
      <div class="card-body">
       <div class="row">
        <div class="col-md">
            <div class="text-center mb-3">
                <img src="image/ceo1.jpg" class="img rounded-circle">
            </div>
             <div class="col-md text-center" >
             <a href ="uploadprofilepicture.php" class="btn btn-primary btn-block btn-sm">
          Change Picture
</a>
       </div>
            <hr>
            <div>
            <span><b><?php echo $user['user_name']; ?></b></span>
            <span><i>Member Since <?php echo $user['user_created'];?></i></span>
        </div>
        <hr>
            <div>
            
            <a href="profile.php" style="text-decoration:none; color:red"><< Back To Profile</a>
        </div>
        </div>

      
       </div>
      </div>
    </div>
  </div>
  <div class="col-md-9 mb-4">
    <div class="card mb-4">
      <div class="card-header py-3">
        <h5 class="mb-0">Welcome <?php echo $user["user_name"]?></h5>
      </div>

      <div class="card-body" style="min-height:5rem">
     
       <h2 class="text-center">Edit Name</h2>
       <br>
       <?php
            if(isset($_SESSION["success"])){
            ?>
                <p class="alert alert-danger text-center bg-warning text-light mt-5 py-2 animate__animated animate__rollIn"><b><?php echo $_SESSION["success"]; ?></b></p>
                <?php unset($_SESSION["success"]); ?>
            <?php
            }
            ?>
       <form action="process/edit_process.php" method="post">
            <div class="mb-3">
            
                <label for="exampleInputPassword1" class="form-label">FullName</label>
                <input type="text"  name="fullname" class="form-control" id="exampleInputPassword1">
            </div>
             <div class="mb-3">
             <input type="hidden"  class="form-control" name="user_id" value="<?php echo $final_id?>">
             </div> 
            <button type="submit"  name="btnedit" class="btn btn-danger form-control">Update Profile</button>
       </form>
       
      </div>
    </div>
  </div>

 
 </div>
</div>

<div class="text-end">
                <a href="#top" class="text-secondary"><i class="fa-solid fa-arrow-turn-up fa-flip-horizontal"></i>Back to top</a>
            </div>



<?php
require_once("partial/footer.php");
?>

           
         
<script src="bootstrap/js/bootstrap.bundle.js"></script>
</body>
</html>