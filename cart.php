<?php 
session_start();
include_once "partial/header.php";
require_once("classes/Product.php");
$totalPrice = 0;

?>
    <!-- Navbar Section -->
    
    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart Page</title>
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="assets/fontawesome/css/all.css">
    <style type="text/css">
        #container {     
            min-height:500px;
          
        }
    </style>
</head>
<body>

<div class="container-fluid">
    <!-- Cart Section -->
   
    <div class="row justify-content-center mt-5 cartsection" id="container">
      <div class="col mt-3">
        <h3 class="text-center pbold mt-5">Shopping Cart</h3>
      </div>
    <?php
         if (!empty($_SESSION['cart'])) {
          foreach ($_SESSION['cart'] as $productId => $quantity) {
              // Fetch product details using $productId from your database (Product class assumed)
              $pro1 = new Product();
              $productDetails = $pro1->get_product_detail($productId);
              $subtotal=$productDetails['prod_price'] * $quantity;
              $subtotals[]=$subtotal;
              // Display product information and create links
              echo "<div class='row mb-3 mt-5 justify-content-center' id='content'><div class='col-md-5'>";
              echo "<a href='product.php?id=$productId'><img src='admin/uploads/{$productDetails['prod_image']}' class='img-fluid mb-2'></a><br>";
              echo "<span>{$productDetails['prod_name']}<span>&nbsp;&nbsp;Price: &#36;{$productDetails['prod_price']} x <input type='number' min='1' class='quantity-input col-2' data-product-id='$productId' value='$quantity'>&nbsp;&nbsp;Subtotal:&#36;". number_format($subtotal). " &nbsp;&nbsp;";
              echo "<button class='btn btn-sm btn-danger remove-btn'><i class='fa-solid fa-trash'></i></button>";
              echo "</div></div>";
          }
          $totalPrice=array_sum($subtotals);
          echo "<div><h4 class='text-end me-5'>Total:&#36;". number_format($totalPrice) . " </h4></div>";
          // link to proceed to checkout
          echo "<div class='mt-5 mb-5 justify-content-center'><div class='row justify-content-center'><div class='col-8 d-grid gap-2 mx-auto'> <a href='checkout.php' class='btn btn-lg mb-2 proimage btn-outline-secondary'>Proceed to Checkout</a></div></div>";
          
      } else {
          echo "<div><h4 class='text-center' >Your cart is empty.</h4></div>";
      }
    
    
    ?>
       </div>
       
            <div>
            
            <a href="brand_category.php"><<< Back To Latest Brand Product</a>
        </div>
       

    <!-- Footer -->
    <?php include "partial/footer.php";?> 
    </div>
    <script src="assets/scripts/jquery.js"></script> 
    <script src="bootstrap/js/bootstrap.bundle.js"></script>
  <script>
    $(document).ready(function(){
      function updateCartQuantity(productId, newQuantity) {
                  $.ajax({
                      url: "process/updateproduct_process.php",
                      method: "post",
                      data: { productId: productId, quantity: newQuantity },
                      dataType: "json",
                      success: function (response) {
                        console.log(response);
                      },
                      error: function (error) {
                        console.log(error);
                      }
                   });
               }

               function removeProductFromCart(productId) {
              $.ajax({
                 url: "process/removeproduct_process.php",
                 method: "post",
                 data: { productId: productId },
                 dataType: "json",
                 success: function (response) {
                  console.log(response);
                },
                 error: function (error) {
                  console.log(error);
             }
            });
            }
            
            
            $(document).on("change", ".quantity-input", function() {
                 var productId = $(this).data("product-id");
                 var newQuantity = parseInt($(this).val());
                //  alert(productId);
                //  alert(newQuantity);
                 updateCartQuantity(productId, newQuantity);
                 showOffcanvasContent()
               });

               $(document).on("click", ".remove-btn", function() {
                var productId = $(this).closest(".row").find(".quantity-input").data("product-id");
                //  alert(productId);
                 removeProductFromCart(productId);
                 showOffcanvasContent()
               });
               function showOffcanvasContent() {
                    $.ajax({
                        url: "cart.php", 
                        type: "GET",
                        success: function(cartContent) {
                            $(".cartsection").html(cartContent);
                        },
                        error: function(xhr, status, error) {
                            console.log(error);
                        }
                    });
     }
              

              

    })
</script>
</body>
</html>