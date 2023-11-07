<?php
session_start();
include_once "partial/header.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User LogIn</title>
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="assets/fontawesome/css/all.css">
    <style type="text/css">
        #container {     
            min-height: 100px;
            display: flex;
        }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <div class="col-md"></div>
    </div>
    <div class="row" style="height: 710px;">
        <div class="col-md">
            <img src="image/login.webp" alt="Login Image" style="position:relative; top:160px;height: 400px; left:250px; width:300px;height:500px;">
        </div>
        <div class="col-md" style="position: relative; top:200px;background-color: antiquewhite; height:400px;">
            <h2>User LogIn</h2>
            <br>
            <?php
            if(isset($_SESSION["errorlogin"])){
            ?>
                <p class="alert alert-danger text-center bg-warning text-light mt-5 py-2 animate__animated animate__rollIn"><b><?php echo $_SESSION["errorlogin"]; ?></b></p>
                <?php unset($_SESSION["errorlogin"]); ?>
            <?php
            }
         
            ?>
            <form action="process/login_process.php" method="post">
                <div class="row mb-3">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Email Address</label>
                    <div class="col-sm-10">
                        <input type="email" name="email" class="form-control" id="inputEmail3">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" name="password" class="form-control" id="inputPassword3">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-10 offset-sm-2">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="gridCheck1">
                            <label class="form-check-label" for="gridCheck1">
                                Keep me signed in
                            </label>
                            <div>
                                <a style="text-decoration: none;color:black;" href="#" class="btn text-primary">Forgot your password?</a>
                            </div>
                        </div>
                    </div>
                </div>
                <input type="submit" class="btn btn-primary" name="logbtn" value="Submit">
            </form>
            <p class="mt-3">Not signed up with us yet? <a href="signup.php" class="btn text-primary" name="login_btn">Signup Here</a></p>
        </div>
    </div>
</div>

<?php
include "partial/footer.php";
?>

</div>

<script src="bootstrap/js/bootstrap.bundle.js"></script>
</body>
</html>
