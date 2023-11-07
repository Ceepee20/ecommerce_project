<?php
session_start();
include_once "partial/header.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href='bootstrap/css/bootstrap.css' rel="stylesheet" type="text/css">
    <style type="text/css">
    #container { 
        min-height: 100px;
    }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class='col'>
            </div>
        </div>
        <div class="row" style="height: 710px;">
            <div class='col'>
                <img src="image/admin2.jpg" style="position: relative; top: 160px; height: 400px; left: 250px; width: 300px; height: 500px; background-color: white;">  
            </div>
            <div class="col" style="position: relative; top: 200px; background-color: antiquewhite; height: 350px;">
                <h2>Admin LogIn</h2>
                <br>
                <?php 
                if(isset($_SESSION["login_error"])){ 
                ?>
                <p class="alert alert-danger"><?php echo $_SESSION["login_error"] ?></p>
                <?php unset($_SESSION["login_error"]); ?>
                <?php } ?>
                <form action="process/login_process.php" method="post" id="myformlogin">
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
                                    <a style="text-decoration: none; color: black;" href="#" class="btn text-primary">Forgot your password?</a> 
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-primary" name="adminlog" value="Submit">
                </form>
            </div>
        </div>
    </div>
    <?php
    include_once "partial/footer.php";
    ?>
</body>
</html>
