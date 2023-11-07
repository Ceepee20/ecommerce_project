<?php
session_start();
error_reporting(E_ALL);

 include_once "guards/admin_guard.php";

// require_once "classes/Admin.php";

// if(isset($_SESSION["admin_id"])){

//    $admin_id = $_SESSION["admin_id"];
  
  
//     $adminn = new Admin();
//     $admin= $adminn->fetch_details($admin_id);

    //  echo "<pre>";
    //     print_r ($admin);
    //  echo "</pre>";
    //  die();

          include_once "partial/header.php";
         // include_once "guards/admin_guard.php";
         
//}
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Profile</title>
   <link href='bootstrap/css/bootstrap.css' rel="stylesheet" type="text/css">
    <style type="text/css">
    #container{     
             min-height:100px;
            
            
            display: flex;    
      }
 


      

    </style>
</head>
<body>


    <div class="container-fluid">
      
    <div class="row" style="position: relative;top:100px;height:510px">
         <div class="col-md-3 mb-4">
    <div class="card mb-4">
      <div class="card-header py-3">
      <h5 class="mb-0">Admin Profile</h5>
      </div>
      <div class="card-body">
       <div class="row">
        <div class="col-12">
        <div class="text-center mb-3">
                <img src="image/vovo1.jpg" class="img-fluid rounded-circle">
            </div>
          
        </div>

      
       </div>
      </div>
    </div>
  </div>
  <div class="col-md-9 mb-4">
    <div class="card mb-4">
      <div class="card-body" style="min-height:200px">
         <p><a href="productlist.php">View Available Products</a></p>
        <p><a href="addproduct.php">Add Products</a></p>
        <p><a href="signup.php">Logout</a></p>
      </div>
    </div>
  </div>

 
</div>
</div>

 

                 
            </div>
            
                  
                     
        </div>
        <?php
           
           include_once "partial/footer.php";
        
        ?>
                
            

            
            
                
    
                
         
        <script src="bootstrap/js/bootstrap.bundle.js"></script>
</body>
</html>