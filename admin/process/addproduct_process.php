<?php 
include_once "../classes/Product.php";
if($_POST){
    if(isset($_POST["add_product"])){
        $prod_name=$_POST["pname"];
        $brandcategory_id=$_POST["category"];
        $prod_desc=$_POST["description"];
        $prod_price=$_POST["price"];
        $prod_quant=$_POST["quantity"];
    }
        
        $profile= $_FILES["image"];
         //validation below to make sure you upload a file
        $error=$profile["error"];

         // file error validation
         if($error > 0){
            echo "Please upload a valid file";
            exit();
        }
        //validation for file size. Check size value in bytes.
        // 1MB = 1,048,576 Bytes (binary)
        // 2mb = 2,097,152 Bytes (binary)
        $file_size=$profile["size"];
        if($file_size > 2097152){
            echo "Your file can not be larger than 2mb";
            exit();
        }

        // validate file type via extension
        // allowed extensions
        $allowed_extension=["png", "jpg","jpeg"];

        $filename= $profile["name"];
        // trying to get the extension of the file the user uploaded
        $arrayfilename = explode(".", $filename);
        $file_ext =end ($arrayfilename);
        // echo $fileext;

        // if the uploaded file is not in our list of acceptable file
        if(!in_array($file_ext, $allowed_extension)){
          echo "Please upload an image of type png or jpg";
            exit();
        }

        // generate a unique file name for the file
        $final_filename="product_img_"."ecomerce".time(). "." .$file_ext;
        $destination="../uploads/$final_filename";
        // temporary file location
        $tempo=$profile["tmp_name"];
        //move_uploaded_file: function that moves file from temporary directory to server
        $file_uploaded=move_uploaded_file($tempo, $destination);

        // if the upload is successfully, send the file name and user-id to User class method where it will be updated for the user
        if($file_uploaded){
           $prod= new Product();
          $response= $prod->add_product($prod_name,$prod_desc,$prod_price,$prod_quant,$brandcategory_id, $final_filename);
          if($response){
            //echo "$response";
           header("location:../productlist.php");
            //This inserted product to the productlist
          }
          
        }

    
      }


?>