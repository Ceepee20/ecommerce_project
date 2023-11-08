<?php
                 session_start();
          include_once "partial/header.php";
    
    ?>             



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User SignUp</title>
   <link href='bootstrap/css/bootstrap.css' rel="stylesheet" type="text/css">
   <link rel="stylesheet" href="assets/fontawesome/css/all.css">
    <style type="text/css">
    #container{     
             min-height:100px;
            
            
            display: flex;    
      }
 


      

    </style>
</head>
<body id="destination">
    <div class="container-fluid">
      
        <div class="row">
                 <div class='col'>
                    
                 </div>

             </div>
             <div class="row" style="height: 750px;">
                  <div class='col'>
                     
                        <img src="image/signup.webp" style="position:relative; top:150px;height: 400px; left:250px">  
                        <h3 style="position: relative;top:150px;left:100px">Sign up to be able to access the <br>following extra features:</h3> 
                        <ul style="position: relative;top:150px;left:100px">
                            <li>Create your own personalized wish list of watches</li>
                            <li>Ask your friends what they think by sharing watches and articles</li>
                            <li>Be the first to discover the very latest timepieces in our  monthly newsletter</li>
                        </ul> 
                             
                            
                          
                  </div>
                  <div class="col" style="position: relative;top:200px;background-color: antiquewhite; height:500px;">
                    <h2>User SingUp</h2>
                    <br>
                    <!-- over here I am continuing my validation by checking if there's an error of empty input fields the unset function undo the error message after a refresh -->
            <?php 
            if(isset($_SESSION["logerror"])){ 
            
            ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <p class="text-center, text-danger"><strong><?php echo $_SESSION["logerror"];?></strong></p>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            
            <?php unset($_SESSION["logerror"]); ?>
                
           <?php } ?>
                    
                    <form action="process/signup_process.php" method="post"id="myformreg">
                      <p class="alert alert-danger" style="display:none"id="error_message"></P>
                    <div class="row mb-3">
                          <label for="inputfullnamel3" class="col-sm-2 col-form-label">Fullname</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputfullname"  name="fullname">
                          </div>
                        </div>
                    
                        <div class="row mb-3">
                          <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                          <div class="col-sm-10">
                            <input type="email" class="form-control" id="inputEmail3"  name="email">
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                          <div class="col-sm-10">
                            <input type="password" class="form-control" id="inputPassword3" name="password">
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label for="inputPassword3" class="col-sm-2 col-form-label">Comfirm Password</label>
                          <div class="col-sm-10">
                            <input type="password" class="form-control" id="inputPassword3" name="confirm_password">
                          </div>
                          
                        </div>
                        
                        <div class="row mb-3">
                          <div class="col-sm-10 offset-sm-2">
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" id="gridCheck1">
                              <label class="form-check-label" for="gridCheck1">
                              Please confirm that you agree to our terms of service 
                              </label>
                            </div>
                          
                          </div>
                        </div>
                        <button type="submit" class="btn btn-danger" name="sign_btn" >Submit</button>
                      </form>
                      <p class="mt-3">Already have account?<a href="login.php" class="btn text-primary" name="login_btn">Login Here</a></p>
                  </div>
    
            </div>
            <div class="text-end">
                <a href="#top" class="text-secondary"><i class="fa-solid fa-arrow-turn-up fa-flip-horizontal"></i>Back to top</a>
            </div>
                  
                     
        </div>
        <?php
           
           include_once "partial/footer.php";
        
        ?>
                
            </div>
             
                
         
            </body>
            <script src="bootstrap/js/bootstrap.bundle.js"></script>
        <script src="bootstrap/jquery313.js"></script>
         <script>
          
        
         </script>

</html>