<?php
require_once("../partial/header.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
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
    
    <div class="row" style="position:relative; top:100px;height: 600px;">
         <div class="col-md-3 mb-4">
    <div class="card mb-4">
      <div class="card-header py-3">
        <h5 class="mb-0">Admin Edit Profile</h5>
      </div>
      <div class="card-body">
       <div class="row">
        <div class="col-12">
        <div class="text-center mb-3">
                <img src="image/vovo1.jpg" class="img-fluid rounded-circle">
            </div>
             
            <hr>
            <div>
            
            <a href="productlist.php"><<< Back To Productlist</a>
        </div>
            
        </div>

      
       </div>
      </div>
    </div>
  </div>
  <div class="col-md-9 mb-4">
    <div class="card mb-4">
      <div class="card-header py-3">
        <h5 class="mb-0">Update Product details</h5>
      </div>
      <div class="card-body">
        <form>
          <!-- 2 column grid layout with text inputs for the first and last names -->
          <div class="row mb-4">
            <div class="col">
              <div class="form-outline">
                <input type="text" id="form7Example1" class="form-control" />
                <label class="form-label" for="form7Example1">Product Name</label>
              </div>
            </div>
            <div class="col">
              <div class="form-outline">
                <input type="text" id="form7Example1" class="form-control" />
                <label class="form-label" for="form7Example1">Product Quantity</label>
              </div>
            </div>
          </div>


          <div class="row mb-4">
            <div class="col">
              <div class="form-outline">
                <input type="text" id="form7Example1" name="price"class="form-control" />
                <label class="form-label" for="form7Example1">Product Price</label>
              </div>
            </div>
            <div class="col">
              <div class="form-outline">
                <input type="text" id="form7Example1" class="form-control" />
                <label class="form-label" for="form7Example1">Product Added Date</label>
              </div>
            </div>
          </div>

          <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label" >Product Description</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="desc"></textarea>
          </div>

          <!-- Message input -->
          <div class="form-outline mb-4">
            <button class="btn btn-primary btn-lg">Update Product</button>
          </div>
 
        </form>
      </div>
    </div>
  </div>

 
</div>
</div>

 



<?php
require_once("../partial/footer.php");
?>

   
<script src="bootstrap/js/bootstrap.bundle.js"></script>
</body>
</html>