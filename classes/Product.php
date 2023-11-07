<?php
require_once "Db.php";
class Product extends Db{
    public function add_product($prod_name,$prod_desc,$prod_price,$prod_quant,$brandcategory_id,$prod_image){
        $sql="INSERT INTO product(prod_name,prod_desc,prod_price,prod_quant,brandcategory_id,prod_image) VALUES(?, ?, ?, ?, ?,?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(1,$prod_name, PDO::PARAM_STR);
        $stmt->bindParam(2,$prod_desc, PDO::PARAM_STR);
        $stmt->bindParam(3,$prod_price, PDO::PARAM_STR);
        $stmt->bindParam(4,$prod_quant, PDO::PARAM_STR);
        $stmt->bindParam(5,$brandcategory_id, PDO::PARAM_INT);
        $stmt->bindParam(6,$prod_image, PDO::PARAM_STR);
        
        $response= $stmt->execute();
        if($response){
            return true;
        }else{
            return false;
        }
    }
       //To fetch allproducts for admin.
            //This is the read from CRUD.
            public function fetch_all_products(){
                $sql = "SELECT * FROM product";
                $stmt = $this->connect()->prepare($sql);
                $stmt->execute();
                $product = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $product;
            }
    
    
                //product details method
            public function get_product_detail($prod_id){
                $sql = "SELECT * FROM product WHERE prod_id = ?";
                $stmt = $this->connect()->prepare($sql);
                $stmt->bindparam(1, $prod_id, PDO::PARAM_INT);
                $stmt->execute();
                $count = $stmt->rowCount(); //count how many records have the id.
                //Count < 1 means no record with that id.
                    if($count < 1){
                        return false;
                        exit();
                    } else {
                    //This mean the productexist, so we fetch it and return it
                        $product = $stmt->fetch(PDO::FETCH_ASSOC);
                        return $product;
                    }
    
            }
                //Updating products
            public function update_product($prod_name, $prod_desc, $prod_price,$prod_added_date,$prod_id){
                $sql = "UPDATE Product SET prod_name = ?, prod_desc = ?, prod_price = ?, prod_quant = ? WHERE prod_id = ?";
                $stmt = $this->connect()->prepare($sql);
                $stmt->bindParam(1, $prod_name, PDO::PARAM_STR);
                $stmt->bindParam(2, $prod_desc, PDO::PARAM_STR);
                $stmt->bindParam(3, $prod_price, PDO::PARAM_STR);
                $stmt->bindParam(4, $prod_quant, PDO::PARAM_STR);
                $stmt->bindParam(5, $prod_id, PDO::PARAM_INT);
                
    
                 $updated =  $stmt->execute();
                 return $updated;
    
            }
    
            public function delete_product($prod_id){
                $sql = "DELETE FROM product WHERE prod_id = ?";
                $stmt = $this->connect()->prepare($sql);
                $stmt->bindparam(1, $prod_id, PDO::PARAM_INT);
                $deleted = $stmt->execute();
                    return $deleted;
    
            }
    
    
        }//class end!
    
            // $prod = new Product();
            // echo $prod->delete_product(12);
    
            // $prod = new Product();
            // echo $product->update_product("History", "Marvis Yu", "JK publisher", "History", 1996, 3);
    
        
            //fetch product details
            // $product = new Product();
            // $prod_detail = $product->get_product_detail(3);
            // print_r($prod_detail);
    
    
            //Test for fetching method for products
            // $product = new Product();
            // $productlist = $product->fetch_all_products();
            //  echo"<pre>";
            // print_r($productlist);
            // echo"</pre>";
    
            //Test for adding product method for products
            // $product = new Product();
            // echo $product->add_product("Big Pilot Watche AMG 63", "Weather Reader", "49240 USD", 2,3, "admin1.jpg", );
    
    
           
    
    
    
?>