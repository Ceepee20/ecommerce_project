<?php
error_reporting(E_ALL);
require_once "../classes/Product.php";


    if($_POST){
        if(isset($_POST['btn_delete'])){

            $prod_id = $_POST['prod_id'];

            $prod = new Product();
            $deleted = $prod->delete_product($prod_id);
                if($deleted){
                    //You can save deleted successfully inside SESSION and display on productlist.php page
                    header("location:../productlist.php");
                    exit();
                }

        }

    }
        


?>