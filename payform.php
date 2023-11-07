<?php
session_start();
require_once("classes/User.php");
if(isset($_SESSION["user_id"])){
    $order_id=$_SESSION["order_id"];
    $user_id=$_SESSION["user_id"];
    $total=$_SESSION["totalamount"];
    $cust1=new User();
    $customer=$cust1->fetch_user_details($user_id);
    if($customer){
        $fullname=$customer["user_name"];
        $email=$customer["user_email"];
      }
    //   print_r($order_id);
}
    // echo $email;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pay Form Page</title>
   <link href='bootstrap/css/bootstrap.css' rel="stylesheet" type="text/css">
   <link rel="stylesheet" href="assets/fontawesome/css/all.css">
    <style type="text/css">
    #container{     
             min-height:500px;
            

      }
      .quantity{
             display:none;
      }
 

                              
               

    </style>
</head>
<body>

<div class="container-flexbox;" >
        <!-- Navbar Section -->
        <?php include("partial/header.php") ?>
        <!-- order Summary -->
        <div class="row text-center mt-5 justify-content-center paycontent" >
            <div class="col-12 text-center mt-5">
                <h2 class="pbold" id="top">Pay For Your Goodies</h2>
            </div>
                <div>
                    <div>
                        <p class="alert alert-success" id="message" style="display:none;"></p>
                        <p class="alert alert-danger" id="message2" style="display:none;"></p></p>
                    </div>
                </div>
            <div class="col-8 my-5">
                <h5>Hi <?php echo $customer["user_name"] ?> we appreciate you stopping by to purchase our Luxury Audimar brand watches with us. You deserve only the best!</h5>
                <h4 class="my-5">Click Here to pay</h4>
                <form id="paymentform">
                    <input type="hidden" name="user_id" id="user_id" value="<?php echo $user_id;?>">
                    <input type="hidden" name="order_id" id="order_id" value="<?php echo $order_id;?>">
                    <input type="hidden" name="total" id="total" value="<?php echo $total;?>">
                    <input type="hidden" name="email" id="email" value="<?php echo $email;?>">
                    <div class="d-grid gap-2 mx-auto">
                        <button class="btn btn-outline-dark proimage btn-lg" id="pay">Pay</button>
                        <i class="fa-solid fa-arrow-pointer fa-beat-fade fa-lg"></i>
                    </div>
                    <hr>
            <div>
            
            <a href="brand_category.php"><<< Back To Brand Category Product</a>
        </div>
                </form>
            </div>
            <div class="text-end">
                <a href="#top" class="text-secondary"><i class="fa-solid fa-arrow-turn-up fa-flip-horizontal"></i>Back to top</a>
            </div>
            <div class="col-6">
            </div>
        </div>
        <!-- footer -->
        <?php include("partial/footer.php") ?>
    </div>
    <script src="assets/scripts/jquery.js"></script>
    <script src="https://js.paystack.co/v1/inline.js"></script>
    <script>
    var paymentForm = document.getElementById('paymentform');
        paymentForm.addEventListener('submit', payWithPaystack, false);
        function payWithPaystack(e) {
            e.preventDefault();
        var handler = PaystackPop.setup({
            key: 'pk_test_53b8969320f91d0689db72eeef08cca782aa45ee', // Replace with your public key
            email: document.getElementById('email').value,
            amount: document.getElementById('total').value * 100, // the amount value is multiplied by 100 to convert to the lowest currency unit
            currency: 'NGN', // Use GHS for Ghana Cedis or USD for US Dollars
            // ref: 'YOUR_REFERENCE', // Replace with a reference you generated
            callback: function(response) {
            //    console.log("call back reached");
            //this happens after the payment is completed successfully
            var reference = response.reference;
            alert('Payment complete! Reference: ' + reference);
            // Make an AJAX call to your server with the reference to verify the transaction
            var order_id=document.getElementById("order_id").value;
            // alert(order_id)
            $.ajax({
                type:"post",
                url: "process/pay_process.php",
                data:{"reference": reference, "order_id":order_id},
                success:function(response){
                    console.log(response+"a response")
                    var data= JSON.parse(response);
                    if(data.success==true){
                        alert("Payment received successfully")
                    }else{
                        alert("Payment failed. Please keep the ref code in case you have a compliant.")
                    }
                },
                error:function(error){
                    console.log(error);
                }
            })
            },
            onClose: function() {
            alert('Transaction was not completed, window closed.');
            },
        });
        handler.openIframe();
        }
  </script>
</body>
</html>