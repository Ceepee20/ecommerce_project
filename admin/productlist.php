<?php
session_start();
require_once "partial/header.php";

//Guarding booklist. We MUST always start session on pages that requires it before using it
//require_once "guards/guards.php";
require_once("partial/header.php");

//To have the book data, you need to include the class and instantiate it and call the method
require_once "classes/Product.php";

//The variable $books is what is being looped over in line 70.
$prod = new Product();
$product = $prod->fetch_all_products();
// print_r($product);


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Product List</title>
   <link href='bootstrap/css/bootstrap.css' rel="stylesheet" type="text/css">
    <style type="text/css">
    #container{ 
                
             min-height:100px; 
            
             
              
      }
  

    </style>
</head>
<body>
<div class="container-fluid">
    
    <div class="row" style="position:relative; top:100px; height:80rem;">
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
             <div class="col-12 text-center">
            
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
        <h5 class="mb-0">Available Products</h5>
      </div>
      <div class="card-body" style="min-height:200px">
        <a href="addproduct.php" class="btn btn-success">Add New</a>
  <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Description</th>  
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
            <!-- This is done to create and increase a book numbering -->
              <?php $sn = 1; ?>
        <?php foreach($product as $product){ ?>
                <tr>
                  <th scope="row"><?php echo $sn++; ?></th>
                  <!-- To make the fieds heading dynamic -->
                  <td><?php echo $product['prod_name']; ?></td>    
                  <td><?php echo $product['prod_desc']; ?></td> 
                  <td style="display:flex";>
                    
                    <form action="process/deleteproduct_process.php" method="post">
                      <input type="hidden" name="prod_id" value="<?php echo $product['prod_id']; ?>">
                      <button type="submit" classs="btn btn-sm btn-danger" name="btn_delete"><i class='fa fa-trash'></i>delete</button>
                    </form>
                    
                    &nbsp;&nbsp;
                    <a href='details.html' class='btn btn-sm btn-info'><i class='fa fa-list'></i>Details</a>
                    &nbsp;&nbsp;
                    <!-- Below, we are using query string to pass the id of book while editing -->
                    <a href="editproduct.php?id=<?php echo $product['prod_id']; ?>" class='btn btn-sm btn-success'><i class='fa fa-pencil'>&nbsp</i>Edit</a>
                  </td>
                </tr>

              <?php } ?>

  </tbody>
</table>

      </div>
    </div>
  </div>

 
</div>
</div>

 



<?php
require_once "partial/footer.php";
?>


<script src="bootstrap/js/bootstrap.bundle.js"></script>
</body>
</html>