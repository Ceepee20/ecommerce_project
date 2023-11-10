<?php
session_start();
require_once "admin/classes/Product.php";
include_once "partial/header.php";
$product = new Product();
$productlist = $product->fetch_all_products();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brand Category Page</title>
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="assets/fontawesome/css/all.css">
    <style type="text/css">
        #container {
            min-height: 100%;
            max-width: 100%;
        }
        .quantity {
            display: none;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row" style="height: 5rem; position: relative; top: 18rem;">
            <div class="col-md">
                <h1 style="text-decoration: none; color: black; position: relative; left: 20px; bottom: 9rem;">Audemars Davislaurex x</h1>
                <p style="color: gray; position: relative; left: 2rem; bottom: 7rem;">Latest Brands>>></p>
            </div>
        </div>

        <div class="col-md-12" style="position: relative; top: 13rem;">
            <div class="row">
                <?php foreach ($productlist as $product) { ?>
                    <div class="card" style="width: 18rem; min-height: 5rem; max-width: 100%;">
                        <img src="admin/uploads/<?php echo $product['prod_image'] ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $product['prod_name'] ?></h5>
                            <p class="card-text"><b class="card-title"><?php echo $product['prod_desc'] ?></b></p>
                        </div>
                        <div class="card-body">
                            <p><?php echo $product['prod_price'] ?></p>
                            <form>
                                <input type="number" name="qty" class="form-control quantity" min="1" value="1" id="qty">
                                <button class="buy" data-product-id="<?php echo $product['prod_id'] ?>" name="subbuybtn">Buy</button>
                            </form>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>

        <div class="row" style="height: 19rem; justify-content: center;">
            <div class="col-md-float">
                <nav aria-label="Page navigation example" style="position: relative; top: 15rem;">
                    <ul class="pagination justify-content-center">
                        <li class="page-item disabled">
                            <a class="page-link">Previous</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="brand_category.php">1</a></li>
                        <li class="page-item"><a class="page-link" href="index.php">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">Next</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

    <?php
    include_once "partial/footer.php";
    ?>
    
    <script src="assets/scripts/jquery.js"></script>
    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function(){
            $(document).on("click", ".buy", function(event){
                event.preventDefault();
                var prodId = $(this).data("product-id");
                var quantity = $(".quantity").val();
                var data = {"productid": prodId, "quantity": quantity};
                console.log(data);
                $.ajax({
                    url: "process/brand_process.php",
                    data: data,
                    type: "POST",
                    dataType: "json",
                    success: function(response){
                        console.log(response);
                        $("#cartcount").text(response.cartcount);
                    },
                    error: function(xhr, status, error){
                        console.log(error);
                    }
                });
            });
        });
    </script>
</body>
</html>
