<?php
error_reporting(E_ALL);

include_once "../classes/Product.php";

    if($_POST){

        if(isset($_POST['edit_prod'])){
            //These are always passed as argument
            $prod_name=$_POST["pname"];
        $brandcategory_id=$_POST["category"];
        $prod_desc=$_POST["description"];
        $prod_price=$_POST["price"];
        $prod_quant=$_POST["quantity"];
        


            //VALIDATION
            //Connect with the class method
            $prod = new Product();
            $products_updated = $prod->update_product( $prod_name, $brandcategory_id,  $prod_desc,  $prod_price,  $prod_quant);

            if( $products_updated ){
                header("location:../productlist.php");
                exit();
            } else {
                $url = "addproduct.php?id=$prod_id";
                header("location:$url");
                exit();
            }





        }








    } else {
        header("location: ../productlist.php");
    }




?>