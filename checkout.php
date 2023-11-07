<?php
session_start();
error_reporting(E_ALL);
require_once("classes/Product.php");
require_once("classes/State.php");
require_once("classes/User.php");
require_once("classes/Delivery.php");
require_once("guards/user_guard.php");
// var_dump($_SESSION['cart']);
if (!isset($_SESSION['cart'])) {
  $_SESSION['cart'] = array();
}
// fetch customer details for checkout 
if(isset($_SESSION["user_id"])){
    $user_id=$_SESSION["user_id"];
    
    $cust1=new User();
    $customer=$cust1->fetch_user_details($user_id);
    if($customer){
      $fullname=$customer["user_name"];
      $email=$customer["user_email"];
     
    }
    $_SESSION["email"]=$email;
    // echo $email;
}

$ship1=new Delivery();
$shipping=$ship1->fetch_delivery();
// print_r($shipping);

$state1= new State();
$states=$state1->fetch_states();
$totalPrice=0;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout  Page</title>
   <link href='bootstrap/css/bootstrap.css' rel="stylesheet" type="text/css">
   <link rel="stylesheet" href="assets/fontawesome/css/all.css">
    <style type="text/css">
    #container{     
             min-height:100%;
             max-width:100%

      }
      .quantity{
             display:none;
      }
 

                              
               

    </style>
</head>
<body>
<div class="container-flexbox;" style="position: relative; top: 4rem; max-width: 100%; justify-content: center;">
        <!-- Navbar Section -->
        <?php include("Partial/header.php") ?>
        <!-- order Summary -->
        <div class="row mt-5 ">
            <div class="col">
                <h2 class="mt-5 pbold text-center" id="top">Check Out</h2>
                
            </div>
        </div> 

        <div class="row p-4 mt-5 justify-content-around ">
          <div class="row">

            <div class="col">

              <?php 
                  if(isset($_SESSION["feedback"])){ 
                  
                  ?>
                  
                  <div class="col justify-content-center alert alert-danger alert-dismissible fade show" role="alert">
                  <p class="text-center, text-dark"><strong><?php echo $_SESSION["feedback"];?></strong></p>
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                  
                  <?php unset($_SESSION["feedback"]); ?>
                      
                  <?php } ?>

            </div>

          </div>
            <!-- form to fill to process order -->
            <div class="col-md-6">
                  <h3 class="">Shiping Details</h3>
                  <form action="process/checkout_process.php" method="post" id="checkout_form" class="customform">
                  <p id="errorMessage"></p>

                    <label for="fullname" class="label-control">Full Name</label>
                    <input type="text" id="fullname" name="fullname" class="form-control col-md-6" value="<?php if(isset($fullname)){
                      echo $fullname;
                    } ?>">

                    <label for="phone" class="label-control">Phone Number</label>
                    <input type="text" id="phone" name="phone"  class="form-control">

                    <label for="address" class="label-control">Street Address </label>
                   <input type="text" id="address" name="address"  class="form-control">

                    <label for="state" class="label-control">State</label>
                   <select name="stateid" id="stateid" class="form-control" >
                       <option value="#">Select a state</option>
                    <?php
                        foreach($states as $state1){
                    ?>
                        <option value="<?php echo $state1["state_id"]; ?>"><?php echo $state1["state_name"]; ?></option>
                    <?php 
                        }
                    ?>
                       
                   </select>

                   <label for="lga" class="label-control">Local Government Area</label>
                   <select name="lga" id="lga" class="form-control" >
                       <option value="#">Select a LGA</option>
                   </select>
                   <input type="hidden" name="finalamount" id="finalamount" value="">
                   <input type="hidden" name="user_id" id="custid" value="<?php echo $user_id; ?>">
                    
                   <div class="col d-grid gap-2 mx-auto mt-5">
                      <button type="submit"class="btn btn-outline-dark btn-lg proimage" name="checkout" id="checkout">Place Order</button>
                   </div>
                  </form>
                </div>
                <!-- Details showing orders by customer -->
                <div class="col-md-6 ">
                <h3 class="text-center">Order Details</h3> 
                <table class="table">
                  <thead>
                      <tr>
                        <th >Product</th>
                        <th >SubTotal</th>
                      </tr>
                   </thead> 
                   <tbody class="table-group-divider">
                    <?php
                        if (is_array($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                            foreach ($_SESSION['cart'] as $productId => $quantity) {
                                // 
                                $pro1 = new Product();
                                $productDetails = $pro1->get_product_detail($productId);
                                $subtotal=$productDetails['prod_price'] * $quantity;
                                $subtotals[]=$subtotal;
                              ?>    

                               
                                  <tr>
                                    <td><?php echo $productDetails['prod_name']; ?> x <?php echo $quantity; ?></td>
                                    <td>&#36;<?php echo $subtotal;?></td>
                                  
                                  </tr>

                                </tbody>    
                              
                                
                    <?php             
                            }
                        }
                        else{
                          echo "<div>Your cart is empty.</div>";
                        }
                    ?>
            </table>
            <?php ?>
            <!-- shipping -->
            <h4>Ship Location:</h4><input type="radio" name="shipping" class="form-check-input shipping" value="<?php echo $shipping[0][2]; ?>" id="lagos">&nbsp;<span><b>Lagos:+10,000 Delivery Fee</b></span>&nbsp;&nbsp;
            <input type="radio" name="shipping" class="form-check-input shipping" value="<?php echo $shipping[1][2]; ?>" id="notlagos">&nbsp;<span><b>Outside Lagos:+20,000 Delivery Fee</b></span>

            
                <h4 class="mt-3" id="totalamount">Total: &#36; <?php if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])){
                  $totalPrice=array_sum($subtotals); echo number_format($totalPrice,2);
                }?></h4>

            
          </div>
            </div>
            
            <div class="text-end">
                <a href="#top" class="text-secondary"><i class="fa-solid fa-arrow-turn-up fa-flip-horizontal"></i>Back to top</a>
            </div>
            
        </div>
        
        <div class="row justify-content-center mb-4">
            
    
        </div>
        
        <!-- footer -->
     
         
    </div>
    <?php include("Partial/footer.php") ?>
</div>
    <script src="assets/scripts/jquery.js"></script>
    <script>
         $(document).ready(function(){
            $("#stateid").change(function(){
                var stateid=$(this).val();
                $("#lga").load("process/lga_process.php", {"stateid":stateid}, function(response,status, xhr){
                    console.log(response);
                });
            
              var stateid = $(this).val();
              if (stateid == "24") {
                  $("#lagos").prop("checked", true);
                  $("#notlagos").prop("checked", false);
                  var ship=parseFloat($("#lagos").val());
                  var totalPrice = parseFloat(<?php echo json_encode($totalPrice); ?>);
                  // console.log(ship);
                  totalPrice = totalPrice + ship;
                  // console.log(totalPrice);
                  $("#totalamount").text("Total: ₦" + totalPrice.toFixed(2));
                  $("#amount").val(totalPrice.toFixed(2));
                  $("#finalamount").val(totalPrice.toFixed(2));
                  
              } else {
                  $("#notlagos").prop("checked", true);
                  $("#lagos").prop("checked", false);
                  var ship=parseFloat($("#notlagos").val());
                  var totalPrice = parseFloat(<?php echo json_encode($totalPrice); ?>);
                  // console.log(ship);
                  totalPrice = totalPrice + ship;
                  // console.log(totalPrice);
                  $("#totalamount").text("Total: ₦" + totalPrice.toFixed(2));
                  $("#amount").val(totalPrice.toFixed(2));
                  $("#finalamount").val(totalPrice.toFixed(2));
              }    
            });
            
           
            

    })
    </script>


</body>
</html>  