<?php
require_once("partial/header.php");
require_once "classes/Category.php";
$cat = new Category();
$categories =$cat->fetch_category();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Add Product</title>
   <link href='bootstrap/css/bootstrap.css' rel="stylesheet" type="text/css">
    <style type="text/css">
    #container{ 
                
             min-height:100px; 
            
             
              
      }
  

    </style>
</head>
<body>
<div class="container-fluid">
    
    <div class="row" style="position:relative; top:100px; height: 700px;">
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
        <h5 class="mb-0">New Product details</h5>
      </div>
      <div class="card-body">
        <!-- form -->
        <form action="process/addproduct_process.php" method="post" enctype="multipart/form-data">
          <!-- 2 column grid layout with text inputs for the first and last names -->
          <div class="row mb-4">
            <div class="col">
              <div class="form-outline">
                <input type="text" id="form7Example1" name="pname" class="form-control" />
                <label class="form-label" for="form7Example1">Product Name</label>
              </div>
            </div>
            
            </div>
          </div>

          <div class="row mb-4">
            <div class="col">
              <div class="form-outline">
                <input type="file" id="image" name="image" class="form-control" />
                <label class="form-label" for="categ">Product Image</label>
              </div>
            </div>
            <div class="col">
              <div class="form-outline">
                <select name="category" id="categ">
      <option value="">SELECT CATEGORY</option>
                <?php foreach($categories as $cat){ ?>
                  <option value="<?php echo $cat['cat_id']; ?>"> <?php echo $cat['cat_name']; ?> </option>
                <?php  }?>

                </select>
                <label class="form-label" for="form7Example1">Product Category</label>
              </div>
            </div>
          </div>

          <div class="row mb-4">
            <div class="col">
              <div class="form-outline">
                <input type="text" id="form7Example1" name="price" class="form-control" />
                <label class="form-label" for="form7Example1">Product Price</label>
              </div>
            </div>
            <div class="col">
              <div class="form-outline">
                <input type="text" id="form7Example1" name="quantity" class="form-control" />
                <label class="form-label" for="form7Example1">Product Quantity</label>
              </div>
            </div>
          </div>

          <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Product Description</label>
            <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
          </div>


          <!-- Message input -->
          <div class="form-outline mb-4">
            <button type="submit" name="add_product" class="btn btn-primary btn-lg">Add Product</button>
          </div>
 
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